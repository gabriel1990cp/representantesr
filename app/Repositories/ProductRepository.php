<?php

namespace App\Repositories;

use App\Produto;

class ProductRepository
{
    protected $product;

    protected $limit;

    public function __construct(Produto $product)
    {
        $this->product = $product;
    }

    public function findCode($code)
    {
        return $this->product->where('itm', $code)->limit($this->limit)->get();
    }

    public function findName($name)
    {
        return $this->product->where('dsc1', 'like', "%{$name}%")->limit($this->limit)->get();
    }

    public function withLimit($limit)
    {
        $this->limit = $limit;

        return $this;
    }
}
