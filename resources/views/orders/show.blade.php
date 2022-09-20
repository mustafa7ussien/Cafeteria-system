@extends("layouts.master")
@section('content')

    <h1 class="my-5" style="font-size:40px;font-weight:bold;">My Orders</h1>

    <form action="" class="my-4">
        <input class="me-5" style="width:200px ;padding:10px"type="date" value="{{$order[0]->created_at->format('Y-m-d')}}" name="from">
        <input class="me-5" type="date" style="width:200px; padding:10px" value="{{$order[count($order)-1]->created_at->format('Y-m-d')}}" name="to">
    </form>
    <table class="table table-striped" style="border: 3px solid #DDD">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Order Date</th>
              <th scope="col">Status</th>
              <th scope="col">Amount</th>
              <th scope="col">action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($order as $ord)

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
        @endforeach
          </tbody>
        </table>
        @foreach ($order as $item)
          <div class="product {{$item->id}}" style="margin-bottom:20px;padding:20px;display:none;font-size:28px;background-color:#DDD">
            <h2>Products</h2>
              @foreach ($item->product as $pro)
                  <span style="color:#605D86;background-color:#DDD">{{$pro->name}}</span>
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
                            product.style.display= "block";
                    })
                }
            });
        </script>
    <?php
        $total = 0;
        foreach($order as $item)
        $total+=$item->price;
    ?>
<div class="total" style="display:flex;justify-content:end;align-items:center">

    <h2 style>
        Total EGP {{$total}}
    </h2>
</div>

@endsection
