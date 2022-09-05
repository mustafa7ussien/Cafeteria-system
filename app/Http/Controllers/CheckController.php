<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
// use App\Models\Order_Product;


class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $orders=Order::all();
        $orders1=Order::find(1);
        // $products=Product::all();
        return  view("admin.checks", ["orders"=>$orders,"orders1"=>$orders1]);

        // $orders=Order::find(1);
        // return view("admin.checks",["orders"=>$orders]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Order $orders)
    {
         // $orders=Order::all();
        // return view("admin.checks",["orders"=>$orders]);
        // return  view("admin.checks", ["orders"=>$orders]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $orders)
    {
        //
    }
}
