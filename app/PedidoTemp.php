<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoTemp extends Model
{
    protected $table = 'pedidos_temp';

    protected $primaryKey = 'id';

    protected $fillable = [
        'idProduto', 'quantidade', 'cnpj'
    ];

    public function infoProduct()
    {
        return $this->hasOne(Produto::class, 'idProduto', 'idProduto');
    }
}
