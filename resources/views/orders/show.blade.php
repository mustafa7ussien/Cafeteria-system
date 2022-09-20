@extends("layouts.app")
@section('content')
    @can('isAdmin')
        <h1 class="my-5" style="font-size:40px;font-weight:bold;">All Orders</h1>
        @elsecan('isUser')
        <h1 class="my-5" style="font-size:40px;font-weight:bold;">My Orders</h1>
        @endcan
    <form action="" class="my-4">
        <input class="me-5" style="width:200px ;padding:10px"type="date" value="{{$order[0]->created_at->format('Y-m-d')}}" name="from">
        <input class="me-5" type="date" style="width:200px; padding:10px" value="{{$order[count($order)-1]->created_at->format('Y-m-d')}}" name="to">
    </form>
    <table class="table table-striped" style="border: 3px solid #DDD">
        <thead >
            <tr style="border-radius:10px;">
              <th  scope="col">#</th>
              <th scope="col">Order Date</th>
              <th scope="col">Status</th>
              <th scope="col">Amount</th>
              <th scope="col">action</th>
            </tr>
          </thead>
          <tbody>

            @can('isAdmin')
            @foreach ($order as $ord)

            <tr  class="order {{$ord->id}}" style="cursor: pointer">
                <td>{{$ord->id}}</td>
                <td>{{$ord->created_at->format('Y-m-d')}}</td>
                <td>{{$ord->status}}</td>
                <td>{{$ord->price}}</td>

                <td>
                @if ($ord->status == "processing")
                <form action="{{route("orders.destroy", $ord->id,$ord->user_id )}}" method="POST">
                    @csrf
                    @method("delete")
                    <input type="submit" class="btn btn-outline-danger" name="delete" value="delete">
                </form>
                    @endif
                </td>
            </tr>
        @endforeach
        @elsecan('isUser')
        @foreach ($order as $ord)
            @if($ord->user_id == Auth::user()->id)
            <tr class="order {{$ord->id}}" style="cursor: pointer">
                <td>{{$ord->id}}</td>
                <td>{{$ord->created_at->format('Y-m-d')}}</td>
                <td>{{$ord->status}}</td>
                <td>{{$ord->price}}</td>

                <td>
                @if ($ord->status == "processing")
                <form action="{{route("orders.destroy", $ord->id,$ord->user_id )}}" method="POST">
                    @csrf
                    @method("delete")
                    <input type="submit" class="btn btn-outline-danger" name="delete" value="delete">
                </form>
                    @endif
                </td>
            </tr>
            @endif
            @endforeach
        @endcan
          </tbody>
        </table>
        @foreach ($order as $item)

        <div class="product {{$item->id}} container" style="padding:20px;display:none;font-size:28px;background-color:#DDD;border-radius: 10px">
            <div class="row" style="background-color:#DDD;text-align: center">
                <div style="color:#605D86"  class="col">Type</div>
                <div style="color:#605D86"  class="col">Quantity</div>
                <div style="color:#605D86"  class="col">Image</div>
            </div>
            <hr>
                @foreach ($item->product as $pro)
                    <div class="row text-center" style="color:#605D86;margin-top:10px">
                        <div style="color:#605D86" class="col">{{$pro->name}}</div>
                        <div style="color:#605D86" class="col">{{$pro->pivot->amount}}</div>
                        <div class="col"><img src="{{asset("productimages/".$pro->image)}}" style="width:60px;height:60px;"></div>
                    </div>
            @endforeach
          </div>
        @endforeach
        <script >
            let orders = document.querySelectorAll(".order");

            orders.forEach(order => {
                order.onclick = function(){
                    let products = document.querySelectorAll(".product");
                    products.forEach(product=>{
                        product.style.display= "none";
                        if (product.classList[1] == order.classList[1])
                            product.style.display= "grid";
                    })
                }
            });
        </script>
    @can('isAdmin')
    <?php
        $total = 0;
        foreach($order as $item)
            $total+=$item->price;
        ?>
        @elsecan('isUser')
        <?php
        $total = 0;
        foreach($order as $item)
        if ($item->user_id == Auth::user()->id)
            $total+=$item->price;
        ?>
    @endcan
<div class="total" style="display:flex;justify-content:end;align-items:center">

    <h2 style="margin-top:20px;">
        Total EGP {{$total}}
    </h2>
</div>

@endsection
