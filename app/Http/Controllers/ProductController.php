<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    protected $product;

    protected $limit = 20;

    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function show()
    {
        return $this->product->find(20);
    }

    public function search(Request $request)
    {
        if (!empty($request->itm)) {
            $resulProduct = $this->product->withLimit($this->limit)->findCode($request->itm);
        } else {
            $resulProduct = $this->product->withLimit($this->limit)->findName($request->dsc1);
        }

        return response()->json(['data' => $resulProduct], 200);
    }
}
