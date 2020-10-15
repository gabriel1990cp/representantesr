<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    protected $table = 'item_pedido';

    protected $fillable = [
        'idpedido', 'lnid', 'doco', 'itm', 'litm', 'um', 'uorg', 'aexp', 'uncs', 'uprc'
    ];

    public $timestamps = false;
}
