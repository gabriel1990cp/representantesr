<?php

namespace App\Http\Controllers;

use App\GenerateQuery;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Produto;

class ProductController extends Controller
{
    protected $product;

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
        $validatedData = $request->validate([
            'description' => 'required',
        ]);

        if (!empty($request->description)) {
            $product = Produto::where('dsc1', 'like', "{$request->description}%")->limit(15)->get();
        } else {
            $product = Produto::where('itm', $request->code)->first();
        }

        return response()->json([
            'data' => $product,
        ], 200);

    }
}
