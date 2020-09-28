<?php


namespace App\Repositories;


use App\Cliente;

class ClientRepository
{
    protected $client;

    public function __construct(Cliente $cliente)
    {
        $this->client = $cliente;
    }

    public function getClientByCnpj($cnpj)
    {
        return $this->client->where('tax', $cnpj)->first();
    }
}
