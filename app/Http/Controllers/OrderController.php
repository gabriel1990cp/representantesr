<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use App\Http\Controllers\Controller;
use App\Repositories\RequestTempRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    private $order;
    private $temporaryOrder;

    public function __construct (OrderRepository $order, RequestTempRepository $temporaryOrder) {
        $this->middleware('auth');
        $this->order = $order;
        $this->temporaryOrder = $temporaryOrder;
    }


    public function save(Request $request)
    {
        //TODO - Colocar o validate

        try {
            DB::beginTransaction();

            $cnpjCurrentClient = session()->get('CNPJCurrentClient');

            if (empty($cnpjCurrentClient)) {
                throw new \Exception('Error CNPJ!');
            }

            $temporaryRequestItem = $this->temporaryOrder->getProductByCnpj($cnpjCurrentClient);

            if (empty($temporaryRequestItem)) {
                throw new \Exception('Temporary Order!');
            }

            $dataOrderCreate = $request->all();
            $dataOrderCreate['dco'] = 100; //TODO - Verificar com o Alexandre
            $dataOrderCreate['an82'] = 150; //TODO - Código do representante
            $dataOrderCreate['an8'] = 1; //TODO - Ajustar código do cliente
            $dataOrderCreate['drqj'] = Carbon::now(); //TODO - OK
            $dataOrderCreate['aexp'] = 10.5; //TODO - Ajustar valor total


            $returnIdOrderCreate = $this->order->create($dataOrderCreate);

            //$returnIdOrderCreate->idPedido)

            foreach ($temporaryRequestItem as $rowTemporaryItem) {
                //dd($rowTemporaryItem);
            }
            DB::commit();
            return redirect()->route('home');
        } catch (\Exception $exception) {
            DB::rollBack();
            return response(['status' => 'error', 'data' => $exception->getMessage()], 500);
        }




    }
}
