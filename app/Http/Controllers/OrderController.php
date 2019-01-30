<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Table;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create(Request $request)
    {
        $order = new Order();
        $order->table_id = $request->input('table');
        $order->save();

        $order->products()->attach($request->input('product'));

        return redirect()->route('welcome', array(
            'message' => 'Vasa narudzba je zaprimljena!'
        ));
    }
}
