@extends("layouts.app")

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

    <h1> Add new Product </h1>
    <form  action="{{route("products.store")}}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text"  name="name" value="{{old("name")}}"
                   class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Product Price</label>
            <input type="number"  name='price'  value="{{old("price")}}" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Product Image</label>
            <input type="file" name="image" value="{{old("image")}}"  class="form-control" >
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
