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

    <h1> Add new User </h1>
    <form style="border: 1px solid #DDD"  action="{{route("users.store")}}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="mb-3">
            <label class="form-label">User Name</label>
            <input style="background-color: lightgray;" type="text"  name="name" value=""
                   class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input style="background-color: lightgray;" type="email"  name='email'  value="" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input style="background-color: lightgray;" type="password"  name='password'  value="" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input style="background-color: lightgray;" type="password"  name='password_confirmation'  value="" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Room NO.</label>
            <input style="background-color: lightgray;" type="number"  name='room_no'  value="" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">EXT.</label>
            <input style="background-color: lightgray;" type="number"  name='ext'  value="" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Profile Picture</label>
            <input type="file" name="image" value=""  class="form-control" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
