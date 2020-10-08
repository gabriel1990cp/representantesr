<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestSessionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addProduct()
    {
        dd('chegou');

        return view('request');
    }


}
