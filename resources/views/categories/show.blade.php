
@extends("layouts.app")

@section("content")
<h1> {{$category->name}} Info </h1> 



 <div class="card" style="width: 50%; margin:auto;">

    <div class="card-body">
        <h2 class="card-title"> {{$category->name}}</h2>
        <p class="card-text">Created_at: {{$category->created_at}}</p>
        <p class="card-text">Updated_at: {{$category->updated_at}}</p>

        <a href="{{route("categories.index")}}" class="btn btn-primary">Back to all categories</a>
    </div>
</div>
    <div mt-5>
            <h1> All Product Type of  {{$category->name}}</h1>

            @foreach($category->product as $p)
                <h1> <a href="{{route("products.show", $p->id)}}"> {{$p->name}} </a></li></h1> 
        @endforeach

    </div>

@endsection
