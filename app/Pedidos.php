<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    protected $table = 'pedidos';

    protected $primaryKey = 'idPedido';

    protected $fillable = [
        'doco', 'an82', 'an8', 'tax', 'drqj', 'mcu', 'aexp', 'pddj', 'ptc', 'ky', 'frth', 'processado','trdj','rsdj',
        'AA20','Observacao','AN83','pedidoscol'
    ];

    public $timestamps = false;
}
