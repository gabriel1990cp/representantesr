<?php

namespace App\Http\Controllers;

use App\Repositories\CarrierRepository;
use App\Repositories\ClientRepository as ClientRepositoryAlias;
use App\Repositories\RequestTempRepository;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class NewRequestController extends Controller
{
    private $clientRepository;
    private $carrierRepository;
    private $requestTempRepository;
    private $orderRepository;

    /**
     * Create a new controller instance.
     *
     * @param ClientRepositoryAlias $clientRepository
     * @param CarrierRepository $carrierRepository
     * @param RequestTempRepository $requestTempRepository
     * @param OrderRepository $orderRepository
     */
    public function __construct(
        ClientRepositoryAlias $clientRepository,
        CarrierRepository $carrierRepository,
        RequestTempRepository $requestTempRepository,
        OrderRepository $orderRepository

    ) {
        $this->middleware('auth');

        $this->clientRepository = $clientRepository;
        $this->carrierRepository = $carrierRepository;
        $this->requestTempRepository = $requestTempRepository;
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $requests = $this->orderRepository->getAllByRepresentative(10);

        return view('request',['requests' => $requests]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('create-request');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
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

        return response()->json(['status' => 'success', 'data' => $returnGetProductByCnpj], 201);
    }

    public function suggestedValueProduct(Request $request)
    {
        try {
            $this->requestTempRepository->update($request->valor_sugerido, $request->idPedidoTemp);
            return response()->json(['status' => 'success'], 200);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'error'], 500);
        }
    }
}
