@extends('layouts.app')

@section('welcome')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cafetria</title>
    <style>
        td,th
        {
            width: 10rem;
        }
      
    </style>
</head>
<body>
    <form method="GET" >
        <input style="background-color: lightgrey" type="text" name="keyword" value="" placeholder="Enter a Keyword">
    
        <button type="submit"> search</button>
    
    </form>
    
    <br> <br>
    
    <h3 class="fst-italic"> Orders</h3>
    
    <br><br>
    
    <table class="table" >
 <thead>
    <tr style="width: 100%">
        <th>User Name</th>
       
        <th> Status</th>
        <th>Notes</th>
        <th>price</th>
        <th>Date</th>
        {{-- <th>Room<th> --}}
        <th>Quantity</th>
        <th> Name Products </th>
        <th> image </th>
        <th>Remove</th>
    </tr>
  <thead>
    <tbody>
    @if (!empty($sorders) )
       
    @foreach ($sorders as  $sorder)
    <tr>
        <td>{{$sorder->name}}</td>
         {{-- <td>{{$sorder->room}}</td> --}}
        <td>{{$sorder->status}}</td>
        <td>{{$sorder->notes}}</td>
        <td>{{$sorder->price}}</td>
        <td>{{$sorder->created_at}}</td>
        {{-- <td>{{$sorder->room}}</td> --}}
        
        <td>  @foreach ($shows as $a ) {{$a->quantity}} @endforeach </td>
        <td> 
            @foreach ($shows as $a )
            {{$a->name}}
            @endforeach
        </td>
        <td> 
            @foreach ($shows as $a )
            <img src="{{asset("productimages/".$a->image)}}" width="15%" height="15%">
            @endforeach
        </td>
       
    
        <td>
            <form method="POST" action="{{route('destroy',$sorder->id)}}">
                @csrf
                @method("delete")
    
                <input type="submit" class="btn btn-danger" value="Remove">
    
    
            </form>
        </td>
    </tr>
        
    @endforeach
    
    @endif
    <tbody>
    
    
    </table>
   
</body>
</html>
@endsection

