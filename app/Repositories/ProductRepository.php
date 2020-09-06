<?php


namespace App\Repositories;


use App\Produto;

class ProductRepository
{
    protected $product;

    public function __construct(Produto $product)
    {
        $this->product = $product;
    }

    public function find($id)
    {
        return $this->product->where('itm', $id)->get();
    }

}
