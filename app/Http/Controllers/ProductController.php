<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    protected $product;

    protected $limit = 10;

    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function show()
    {
        return $this->product->find(10);
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
