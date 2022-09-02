@extends("layouts.app")


@section("content")
    <h1> All Products</h1>
    <table class="table" >
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Category</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td><img src="{{asset("productimages/".$product->image)}}" alt="product image" width="15%" height="15%"> </td>
                <td><a href="{{$product->category_id?route("categories.show",$product->category_id):''}}">
                 {{$product->category?$product->category->name:""}} </a></td>

                <td><a href="" class="btn btn-info">Avaliable  </a></td>
                <td><a href="{{route("products.edit", $product->id)}}" class="btn btn-warning">Edit  </a></td>
                <td>
                   <form action="{{route("products.destroy", $product->id)}}" method="POST">
                     @csrf
                     @method("delete")
                    <input type="submit"  class="btn btn-danger" value="Delete">
                  </form>
                
                </td>

            </tr>

        @endforeach
        </tbody>
    </table>
    <a href="{{route("products.create")}}" class="btn btn-success"> Create new Product  </a>
@endsection
