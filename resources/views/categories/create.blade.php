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

    <h1> Add new Category </h1>
    <form  action="{{route("categories.store")}}" method="POST" enctype="multipart/form-data">
        

        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text"  name="name" value="{{old("name")}}"
                   class="form-control" >
        </div>
       

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

