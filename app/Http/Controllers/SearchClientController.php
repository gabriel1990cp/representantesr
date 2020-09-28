<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\ClientRepository;
use Illuminate\Http\Request;

class SearchClientController extends Controller
{

    private $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }


    public function search(Request $request)
    {

        $resultClient = $this->clientRepository->getClientByCnpj($request->cnpj);

        return view('create-request',['client' => $resultClient]);
    }

}
