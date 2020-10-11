<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $order;

    public function __construct (OrderRepository $order) {
        $this->middleware('auth');
        $this->order = $order;
    }


    public function save(Request $request)
    {
        //TODO - Colocar o validate
        $dataCreate = $request->all();
        $dataCreate['drqj'] = Carbon::now();
        $dataCreate['an82'] = 150; //TODO - Ajustar cídigo do representante
        $dataCreate['aexp'] = 10.5; //TODO - Ajustar
        $dataCreate['an8'] = 1; //TODO - Ajustar código do cliente

        try {
            $this->order->create($dataCreate);
            return redirect()->route('home');
        } catch (\Exception $exception) {
            return response(['status' => 'error', 'message' => $exception->getMessage()], 500);
        }
    }
}
