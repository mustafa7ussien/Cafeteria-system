@extends("layouts.master")


@section("content")
    <h1> All categories</h1> 
           {{-- @dump($categories) --}}
   <table class="table" >
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>View</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td><a href="" class="btn btn-primary"> category details </a></td>

            </tr>

        @endforeach
        </tbody>
    </table>
    <a href="{{route("categories.create")}}" class="btn btn-success"> Create new category  </a>
@endsection
