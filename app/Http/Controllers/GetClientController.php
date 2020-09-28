<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\ClientRepository;
use Illuminate\Http\Request;

class GetClientController extends Controller
{
    private $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function post(Request $request)
    {
        dd($request);

        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        $resultClient = $this->clientRepository->getClientByCnpj($request->id_cliente);



        return view('create-request',['client' => $resultClient]);
    }

}
