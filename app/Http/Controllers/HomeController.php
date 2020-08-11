<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Representate;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clientes = Cliente::orderBy('alph','asc')->get();

        return view('home',['clientes' => $clientes]);
    }
}
