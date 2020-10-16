<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    protected $table = 'item_pedido';

    protected $fillable = [
        'idpedido', 'lnid', 'doco', 'itm', 'litm', 'um', 'uorg', 'aexp', 'uncs', 'uprc', 'id_produto'
    ];

    public $timestamps = false;

    public function getUprcAttribute($value)
    {
        return $this->attributes['uprc'] =  number_format($value, 2);
    }

    public function getUncsAttribute($value)
    {
        return $this->attributes['uncs'] =  number_format($value, 2);
    }

    public function getAexpAttribute($value)
    {
        return $this->attributes['aexp'] =  number_format($value, 2);
    }
}
