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


<h1> Edit User </h1>
    <form action="{{route("users.update",$user->id)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method("put")
        <div class="mb-3">
            <label class="form-label">User Name</label>
            <input type="text" name="name" value="{{$user->name}}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name='email' value="{{$user->email}}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Room NO.</label>
            <input type="number" name='room_no' value="{{$user->room_no}}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">EXT.</label>
            <input type="number" name='ext' value="{{$user->ext}}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Profile Picture</label>
            <input type="file" name="image" value="{{$user->image}}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @endsection