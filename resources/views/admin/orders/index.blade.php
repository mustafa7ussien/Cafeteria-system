@extends("layouts.master")


@section("content")
   
<h1>show orders</h1>  
@foreach ($orders->product as $order)
@dump($order1)
@endforeach

@endsection
