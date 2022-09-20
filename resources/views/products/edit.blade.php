@extends("layouts.master")

@section("content")


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1> Edit Product </h1>
    <form  action="{{route("products.update",$product->id)}}" method="POST" enctype="multipart/form-data">

        @csrf
         @method("put")
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text"  name="name" value="{{$product->name}}"
                   class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Product Price</label>
            <input type="number"  name='price'  value="{{$product->price}}" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Product Image</label>
            <input type="file" name="image" value="{{$product->image}}"  class="form-control" >
        </div>
        {{-- <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
