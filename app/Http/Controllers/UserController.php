<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Table;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $orders = Order::all();

        return view('home', array(
            'orders' => $orders,
        ));
    }
}
