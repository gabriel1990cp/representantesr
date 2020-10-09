<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    protected $primaryKey = 'idProduto';

    protected $fillable = [
        'itm', 'mcu', 'litm', 'dsc1', 'uom1', 'srp1', 'srp2', 'srp3', 'srp5', 'prp0', 'idProduto'
    ];

    public function infoProduct()
    {
        return $this->hasMany(Produto::class, 'idProduto', 'idProduto');
    }
}
