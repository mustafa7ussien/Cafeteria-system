@extends("layouts.master")


@section("content")
    <h1> All Users</h1>
    <table class="table" >
        <thead>
        <tr>
            <th>User Name</th>
            <th>Room</th>
            <th>Image</th>
            <th>EXT</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->room_no}}</td>
                <td><img style="border-radius:50%; height:80px; width:80px" src="{{asset("userimages/".$user->image)}}" alt="user image" width="15%" height="15%"> </td>
                <td><a href="" class="btn btn-info">{{$user->ext}}  </a></td>
                <td><a href="{{route("users.edit", $user->id)}}" class="btn btn-warning">Edit  </a></td>
                <td>
                   <form action="{{route("users.destroy", $user->id)}}" method="POST">
                     @csrf
                     @method("delete")
                    <input type="submit"  class="btn btn-danger" value="Delete">
                  </form>
                
                </td>

            </tr>

        @endforeach
        </tbody>
    </table>
    <a href="{{route("users.create")}}" class="btn btn-success"> Create new User  </a>
@endsection
