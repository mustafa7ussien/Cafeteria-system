<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
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
        $sorders = DB::table('order_product');

        if ($request->keyword != null){

            $sorders = $sorders->where('users.name','like','%'.$request->keyword .'%');
           }
    
        
        $sorders= $sorders
       ->leftJoin('products','products.id','order_product.product_id')
       ->leftJoin('orders','orders.id','order_product.order_id')
       ->join('users','users.id',"=",'orders.user_id')
       ->select('users.*','users.name as uname','products.*','products.image as pimage','orders.*','orders.room as oroom')
       ->get();

       return view('home',['sorders'=>$sorders]);
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
        return view("admin.orders.create" ,["users"=>$users , "products"=>$products] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //Creating Order
        
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
        // $orders= Order::findOrFail($id);

        // $orders->delete();
       

        
        $sorders = Order::findOrFail($id);

        $sorders->delete();

        return  to_route("sorder");
    }
}
