<?php

namespace App\Repositories;

use App\Pedidos;

class OrderRepository
{
    protected $pedidos;

    public function __construct(Pedidos $request)
    {
        $this->request = $request;
    }

    public function create($data)
    {
        return Pedidos::create($data);
    }

    public function getAllByRepresentative($representative)
    {
        return Pedidos::where('an82', $representative)->get();
    }
}
