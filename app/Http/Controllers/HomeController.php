<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function cart()
    {
        // Add some items in your Controller.
        \Cart::add('192ao12', 'Product 1', 1, 9.99);
        \Cart::add('1239ad0', 'Product 3', 2, 5.95, ['size' => 'large']);

        return view('cart');
    }
}
