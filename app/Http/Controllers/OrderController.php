<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use App\Http\Controllers\Controller;
use App\Repositories\RequestTempRepository;
use App\Repositories\ItemPedidoRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    private $order;
    private $temporaryOrder;
    private $itemPedido;

    public function __construct(
        OrderRepository $order,
        RequestTempRepository $temporaryOrder,
        ItemPedidoRepository $itemPedido)
    {
        $this->middleware('auth');
        $this->order = $order;
        $this->temporaryOrder = $temporaryOrder;
        $this->itemPedido = $itemPedido;
    }


    public function save(Request $request)
    {
        //TODO - Colocar o validate

        try {
            DB::beginTransaction();

            $cnpjCurrentClient = session()->get('CNPJCurrentClient');

            if (empty($cnpjCurrentClient)) {
                throw new \Exception('Error CNPJ!', 500);
            }

            $temporaryRequestItem = $this->temporaryOrder->getProductByCnpj($cnpjCurrentClient);

            if (empty($temporaryRequestItem)) {
                throw new \Exception('Error temporary Order!', 500);
            }

            $dataOrderCreate = $request->all();
            $dataOrderCreate['dco'] = 100; //TODO - Verificar com o Alexandre
            $dataOrderCreate['an82'] = 150; //TODO - Código do representante
            $dataOrderCreate['an8'] = 1; //TODO - Ajustar código do cliente
            $dataOrderCreate['drqj'] = Carbon::now(); //TODO - OK
            $dataOrderCreate['aexp'] = 10.5; //TODO - Ajustar valor total


            $returnIdOrderCreate = $this->order->create($dataOrderCreate);

            $amount = 0;

            foreach ($temporaryRequestItem as $rowTemporaryItem) {
                $amountRow = 0;

                if ($rowTemporaryItem['valor_sugerido'] > 0) {
                    $amountRow = $rowTemporaryItem['quantidade'] * $rowTemporaryItem['valor_sugerido'];
                } else {
                    $amountRow = $rowTemporaryItem['quantidade'] * $rowTemporaryItem['infoProduct']['uprc'];
                }

                $dataTemporaryRequestItem['idpedido'] = $returnIdOrderCreate->idPedido;
                $dataTemporaryRequestItem['doco'] = 0;
                $dataTemporaryRequestItem['itm'] = $rowTemporaryItem['infoProduct']['itm'];
                $dataTemporaryRequestItem['litm'] = $rowTemporaryItem['infoProduct']['litm'];
                $dataTemporaryRequestItem['um'] = $rowTemporaryItem['infoProduct']['uom1'];
                $dataTemporaryRequestItem['uorg'] = $rowTemporaryItem['quantidade'];
                $dataTemporaryRequestItem['aexp'] = $rowTemporaryItem['infoProduct']['uprc'];
                $dataTemporaryRequestItem['uncs'] = $rowTemporaryItem['infoProduct']['uprc'];
                $dataTemporaryRequestItem['uprc'] = $rowTemporaryItem['valor_sugerido'] ?? $rowTemporaryItem['infoProduct']['uprc'];

                $returnCreateItemPedido = $this->itemPedido->create($dataTemporaryRequestItem);

                if (is_array($returnCreateItemPedido)) {
                    throw new \Exception('Error create item pedido!', 500);
                }

                $amount += $amountRow;
            }

            if (!$this->order->update($amount, $returnIdOrderCreate->idPedido)) {
                throw new \Exception('Error update amount!', 500);
            }

            if (!$this->temporaryOrder->destroyByCnpj($cnpjCurrentClient)) {
                throw new \Exception('Error destrou by cnpj!', 500);
            }

            DB::commit();

            return redirect()->route('home');
        } catch (\Exception $exception) {
            DB::rollBack();
            return response(['status' => 'error', 'data' => $exception->getMessage()], 500);
        }
    }
}
