<?php

namespace App\Http\Controllers;

use App\Repositories\CarrierRepository;
use App\Repositories\ClientRepository as ClientRepositoryAlias;
use App\Repositories\RequestTempRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ItemPedidoRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class NewRequestController extends Controller
{
    private $clientRepository;
    private $carrierRepository;
    private $requestTempRepository;
    private $orderRepository;
    private $itemPedidoRepository;
    private $productRepository;

    public function __construct(
        ClientRepositoryAlias $clientRepository,
        CarrierRepository $carrierRepository,
        RequestTempRepository $requestTempRepository,
        OrderRepository $orderRepository,
        ItemPedidoRepository $itemPedidoRepository,
        ProductRepository $productRepository

    ) {
        $this->middleware('auth');

        $this->clientRepository = $clientRepository;
        $this->carrierRepository = $carrierRepository;
        $this->requestTempRepository = $requestTempRepository;
        $this->orderRepository = $orderRepository;
        $this->itemPedidoRepository = $itemPedidoRepository;
        $this->productRepository = $productRepository;
    }


    public function index()
    {
        $requests = $this->orderRepository->getAllByRepresentative();

        return view('request', ['requests' => $requests]);
    }


    public function create()
    {
        return view('create-request');
    }

    public function show($id)
    {
        $request = $this->orderRepository->getById($id);

        $request['items'] = $this->otherInformationItem($this->itemPedidoRepository->getByIdPedido($id));

        $request['client'] = $this->clientRepository->getClientByCnpj($request->tax);

        return view('view-request', ['request' => $request]);
    }

    public function otherInformationItem($items)
    {
        if ($items) {
            foreach ($items as $key => $item) {
                $getItem = $this->productRepository->findId($item->id_produto);
                $items[$key]['dsc1'] = $getItem->dsc1;
                $items[$key]['srp1'] = $getItem->srp1;

                if ($item->uprc > 0 ) {
                    $items[$key]['amount'] = $item->uprc * $item->uorg;
                } else {
                    $items[$key]['amount'] = $item->aexp * $item->uorg;
                }
            }
        }
        return $items;
    }


    public function store(Request $request)
    {
        $data = array(
            "idProduto" => $request->idProduto,
            "quantidade" => $request->amount,
            "cnpj" => session()->get('CNPJCurrentClient')
        );

        try {
            $resulCreate = $this->requestTempRepository->addProduct($data);
            return response()->json(['status' => 'success', 'data' => $resulCreate], 201);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'error', 'data' => $exception->getMessage()], 500);
        }
    }


    public function destroy(Request $request)
    {
        $returnDestroy = $this->requestTempRepository->destroy($request->idPedidoTemp);
        return response()->json(['status' => 'success', 'data' => $returnDestroy], 200);
    }


    public function search(Request $request)
    {
        $request->validate([
            'cnpj' => 'required|exists:clientes,tax',
        ]);

        $client = $this->clientRepository->getClientByCnpj($request->cnpj);
        $carries = $this->carrierRepository->getCarrierByCnpj($request->cnpj);

        session(['NameCurrentClient' => $client->alph]);
        session(['CNPJCurrentClient' => $client->tax]);

        return view('create-request', ['client' => $client, 'carries' => $carries]);
    }

    public function getProductByCnpj()
    {
        $cnpj = session()->get('CNPJCurrentClient');

        $returnGetProductByCnpj = $this->requestTempRepository->getProductByCnpj($cnpj);

        if (empty($returnGetProductByCnpj)) {
            throw new \Exception('Error get products by CNPJ');
        }

        $returnGetProductByCnpj->filter(function ($value){
            $value['valorSugerido']  = number_format($value['valorSugerido'], 2);
        });

        return response()->json(['status' => 'success', 'data' => $returnGetProductByCnpj], 201);
    }

    public function suggestedValueProduct(Request $request)
    {
        try {
            $this->requestTempRepository->update($request->valorSugerido, $request->idPedidoTemp);
            return response()->json(['status' => 'success'], 200);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'error', 'message' => $exception->getMessage()], 500);
        }
    }
}
