<?php

namespace App\Http\Controllers;

use App\GenerateQuery;
use Illuminate\Http\Request;
use App\Produto;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
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
