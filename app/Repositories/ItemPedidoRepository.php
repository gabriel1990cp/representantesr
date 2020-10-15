<?php

namespace App\Repositories;

use App\ItemPedido;

class ItemPedidoRepository
{
    protected $itemPedido;

    public function __construct(ItemPedido $itemPedido)
    {
        $this->itemPedido = $itemPedido;
    }

    public function create($data)
    {
        return ItemPedido::create($data);
    }

    public function getByIdPedido($id)
    {
        return ItemPedido::where('idpedido', $id)->get();
    }
}
