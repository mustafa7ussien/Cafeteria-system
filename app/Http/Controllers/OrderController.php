<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $products = Product::all();
        // $order = Order::find(2);
        $order = Order::get()->last();
        return view("orders.create" ,["users"=>$users ,"products"=>$products,"order"=>$order] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $myOrder = ["status"=>"processing",
        "notes"=>$request->notes,
        "price"=>$request->price,
        "room"=>$request->room_no,
        "user_id"=>$request->userid
        ];
        $my = Order::create($myOrder);


      //   dump($my);

        foreach($request->request as $key => $val)
        {
            if ($key == "userid" || $key == "_token")
            continue;
            else if ($key == "notes")
            break;
            else{
            $product = (string) $key;

            $query = DB::table('products')->where('name' , $product)->first();
              //   dump($my->id);
            if ($query != null){
                DB::table("order_product")->insert(["order_id" => $my->id , "product_id"=>  $query->id, "amount"=>$val]);
            }
        }
        }
     
            return  to_route("sorder");

       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $orders
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $user = User::all();
        // $order = $user->order;
        $order=Order::all();
        return view("orders.show",["order"=>$order]);
    }
     /**
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
    public function destroy($id)
    {
        //
        $orders= Order::findOrFail($id);

       $dddd= $orders->delete();
       if($dddd)
       {
        Alert::warning('Warning ', 'You will delete Order');

        return to_route("orders.show",$id);
       }
        
    }
}
