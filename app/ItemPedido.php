<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    protected $table = 'item_pedido';

    protected $primaryKey = 'idPedido';

    protected $fillable = [
        'doco', 'an82', 'an8', 'tax', 'drqj', 'mcu', 'aexp', 'pddj', 'ptc', 'ky', 'frth', 'processado','trdj','rsdj',
        'AA20','Observacao','AN83','pedidoscol'
    ];

    public $timestamps = false;
}
