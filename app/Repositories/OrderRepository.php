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

    public function getAllByRepresentative()
    {
        return Pedidos::get();
    }

    public function getById($id)
    {
        return Pedidos::find($id);
    }

    public function update($data, $id)
    {
        $pedido = Pedidos::find($id);
        $pedido->aexp = $data;
        return $pedido->save();
    }
}
