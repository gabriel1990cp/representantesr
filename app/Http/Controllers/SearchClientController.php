<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\CarrierRepository;
use App\Repositories\ClientRepository;
use Illuminate\Http\Request;

class SearchClientController extends Controller
{
    private $clientRepository;
    private $carrierRepository;

    public function __construct(ClientRepository $clientRepository, CarrierRepository $carrierRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->carrierRepository = $carrierRepository;
    }


    public function search(Request $request)
    {
        $request->validate([
            'cnpj' => 'required|exists:clientes,tax',
        ]);

        //TODO - Adicionar o CNPJ na sessão para finalizar o carrinho

        $client = $this->clientRepository->getClientByCnpj($request->cnpj);
        $carries = $this->carrierRepository->getCarrierByCnpj($request->cnpj);


        return view('create-request',['client' => $client, 'carries' => $carries]);
    }
}
