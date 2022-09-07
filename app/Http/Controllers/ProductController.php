<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Constraint\FileExists;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view("products.index",["products"=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
        $categories = Category::all();
        return  view("products.create",["categories"=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_data = $request->all();
        if($request->file("image")){
            $image = $request->file("image");
            $imagename = implode(".", [date("YmdHis"), $image->getClientOriginalName()]);
            $destinationpath = "productimages/";
            $image->move($destinationpath, $imagename);
            $product_data["image"]=$imagename;
        }
        
       $creatproduct= Product::create($product_data);
       if($creatproduct)
       {
        // alert()->success('sucess','Create Product Successfully');
        // Alert::toast('sucess', 'Create Product Successfully');
        Alert::alert('Success', 'Create Product Successfully', 'success');


        return  to_route("products.index");

       }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $products = Product::all();
        return view("products.edit", ["product"=>$product, "products"=>$products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $inputdata = $request->all();
        if ($request->file("image")) {
            $this->deleteImage($product);
            $new_image = $request->file("image");
            $imagename = implode(".",
                [date('YmdHis'), $inputdata["name"], $new_image->getClientOriginalExtension()]);
            $dstentaiton_path = "productimages/";
            $new_image->move($dstentaiton_path, $imagename);
            $inputdata["image"] = $imagename;
        }

         $edit=$product->update($inputdata);
         if($edit)
         {
            Alert::toast('Edit Successfuly', 'Edit Successfuly');

            return to_route("products.index", $product->id);

         }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(File::exists(public_path("productimages/$product->image"))){
                           File::delete(public_path("productimages/$product->image"));
                       }
                    //    dump($product);
                  $dd= $product->delete();
                  if($dd)
                  {
                    Alert::warning('Warning ', 'You will delete product');

                    return to_route("products.index");

                  }
                   return to_route("products.index");
    }

    private function  deleteImage(Product $product){
        if(File::exists(public_path("productimages/$product->image"))){
            File::delete(public_path("productimages/$product->image"));
        }
    }
}
