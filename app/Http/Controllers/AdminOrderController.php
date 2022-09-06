<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AdminOrderController extends Controller
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
    public function index(Request $request)
    {
        $shows = DB::table('order_product');
        
        
        $shows = $shows
       ->select('products.*','order_product.*')
       ->leftJoin('products','products.id','order_product.product_id')
       ->get();

       $sorders= DB::table('orders');
      
       if ($request->keyword != null){

        $sorders = $sorders->Where('name','like','%'.$request->keyword .'%');
       }

        $sorders= $sorders
       ->join('users','users.id',"=",'orders.user_id')
       ->select('orders.*','users.name as name','users.room_no as room')
       ->get();

      return view('home',['sorders'=>$sorders],['shows'=>$shows]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("orders.create");
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orders= Order::findOrFail($id);

        $orders->delete();
        return to_route("orders.show",$id);

        
        $sorders = Order::findOrFail($id);

        $sorders->delete();

        return to_route('sorder');
    }
}
