@extends("layouts.app")
@section('content')

    <h1 class="my-5" style="font-size:40px;font-weight:bold;">My Orders</h1>

    <form action="" class="my-4">
        <input class="me-5" style="width:200px  ;padding:10px"type="date" value="{{$order[0]->created_at.date("Y.m.d")}}" name="from">
        <input class="me-5" type="date" style="width:200px; padding:10px" name="to">
        <input type="submit" style="width:200px; padding:10px;background-color:#B4FEE7;color:#603F8B;" name="search">
    </form>
    @foreach ($order as $ord)
        @dump($ord->created_at.date("Y.m.d"))
    @endforeach

@endsection
