<?php

namespace App\Http\Controllers;

use App\Product;
use App\Table;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tables = Table::all();
        $products = Product::all();

        return view('welcome', array(
            'tables' => $tables,
            'products' => $products
        ));
    }
}
