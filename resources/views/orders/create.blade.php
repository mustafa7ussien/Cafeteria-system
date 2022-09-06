@extends('layouts.app')

@section('content')
<?php
    use App\Models\Order;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cafetria</title>
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}" />
     <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('assets/css/styles.css')}}" />
</head>
<style>
    #formContainer{
      width: 272px;
      border: 1px solid;
      border-radius: 4pc;
      margin: 41px;
      padding: 20px;
    }
    .productContent{
            width: 330px;
            border: 2px solid black;
            border-radius: 5px;
            padding: 25px;
        }
        .product-count {
	margin-top: 15px;
}
.product-count .qtyminus,
.product-count .qtyplus {
	width: 34px;
    height: 34px;
    background: #212529;
    text-align: center;
    font-size: 19px;
    line-height: 36px;
    color: #fff;
    cursor: pointer;
}
.product-count .qtyminus {
	border-radius: 3px 0 0 3px;
}
.product-count .qtyplus {
	border-radius: 0 3px 3px 0;
}
.product-count .qty {
	width: 60px;
	text-align: center;
}


.counterContainer {
    justify-content: center;
    align-items: center;
    display: flex;
    height: 100%;
    text-align: center;
}
#confirmBtn{
  margin: 16px;
  width: 201px;
}

#totalCost{
  font-size: x-large;
  text-align: center;
}
</style>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div style="background-color: rgb(106, 112, 150);" class="card-header">Cafeteria</div>

                    {{-- <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}

                        <div>

                        </div>
                    </div> --}}
                    <div>


          <main>
            <section class="main-padding">
            <!-- form of product -->
              <div class="container">
                <div class="row">
            <div id="formContainer">
                <form action="{{route('orders.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="chocienOrder">
                      <h5 id ="order">Order</h5>
                      <button onclick="refresh();" class="btn"><i class="fa fa-refresh"></i></button>
                      <!-- <div name="Drink" id="orderorder"></div> -->
                      <input type="hidden" name="Order" value="" id="orderorder">

                </div>
                <div class="product-count">
                        <label for="size">Number of cup</label>
                        <div onclick="Mydecrement()" class="qtyminus">-</div>
                        <input type="text" name="numOfDrink" value="1" class="qty" id="myInput">
                        <div onclick="Myincrement()" class="qtyplus">+</div>
                    </div>

                <div>
                <label for="Name">Notes</label>
                <textarea id="txtarea" name="notes" rows="4" cols="30"></textarea>
                </div>
                <div>
                <label for="Inputselect">Room</label>
                <select class="form-control" name="room">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                </select>
                </div>
                <button type="submit" class="btn btn-info" id="confirmBtn">Confirm</button>
                <div id="totalCost">
                      Total
                    </div>
                    <input type="hidden" name="price" value="" id="priceprice">
                </div>
                </form>

                  <!-- all-products -->
                  <div class="col-md-8">
                    <div class="all-products">
                      <h3>Latest Orders</h3>
                      <?php
                        $order = new Order();
                        $order = $order->all();

                        //for print latest order
                        $ordersLength =count($order);
                        foreach ($order as $p => $v) {
                          if (++$p == $ordersLength) {
                            echo "
                              <table class='table'>
                              <tr>
                              <td>
                              <div class='card' style='width: 18rem;'>
                              <div class='card-body'>
                                <h6 class='card-title'>ID : {$v->id}</h6>
                                <h6 class='card-title'>Order : <br>{$v->Order}</h6>
                                <h5 class='card-title'>Total Price : {$v->price}</h5>
                              </div>
                              </div>
                              </td>

                              </tr>
                              </table>
                              ";
                          }
                        }
                        //for loop for print all orders
                        // foreach ($order as $p) {
                        //     // dump($p);
                        //     echo "
                        //       <table class='table'>
                        //       <tr>
                        //       <td>
                        //       <div class='card' style='width: 18rem;'>
                        //       <div class='card-body'>
                        //         <h6 class='card-title'>ID : {$p->id}</h6>
                        //         <h6 class='card-title'>Order : <br>{$p->Order}</h6>
                        //         <h5 class='card-title'>Total Price : {$p->price}</h5>
                        //       </div>
                        //       </div>
                        //       </td>

                        //       </tr>
                        //       </table>
                        //       ";
                        //       }

                      ?>
                      <!-- latest-orders -->
                      <!-- products -->
                      <div class="products">
                        <h3>Products</h3>
                        <div class="row">
                          <!-- each-order -->
                          @foreach ($products as $product)

                          {{-- @dump($product->image) --}}
                          <div class="col-sm-3">
                              <div class="each-order"  onclick="changeDouble2( `{{$product->name}}`.toLowerCase() , {{$product->price}})">
                                <img
                                src="{{asset("productimages/".$product->image)}}"
                                class="w-100"
                                width="100"
                                height="100"
                                alt=""
                                />
                                <h5>{{$product->name}}</h5>
                                <input type="text" name="tea" value="5" hidden />
                                <span>{{$product->price}}</span>
                                </div>
                        </div>
                        </div>
                        @endforeach
                          <!-- each-order -->

                          <!-- each-order -->
                      <!-- products -->
                    </div>
                    <!-- ./all-products -->
                    </div>
            </div>
                  <!-- end form of product -->


                  </div>
                </div>
                <!-- ./row -->
              </div>
              <!-- ./container -->
            </section>
          </main>

                    </div>



                </div>

            </div>
        </div>
    </div>

    <?php
        $amounts;
    forEach($products as $product){
        $amounts["$product->name"] = 0;
    }
    // dump($amounts);
    ?>
    <script>
  var inputVal = document.getElementById("myInput").value;

  function Mydecrement() {
    inputVal =inputVal-1;
    document.getElementById("myInput").value = inputVal;
  }
  function Myincrement() {
    inputVal =parseInt(inputVal)+1;
    // parseInt(inputVal);
    document.getElementById("myInput").value = inputVal;
  }

  var drinkSelector = document.getElementById("DrinkType");
  function changeToTea(){
    const text = 'Tea';
    const $select = document.getElementById("DrinkType");
    const $options = Array.from($select.options);
    const optionToSelect = $options.find(item => item.text ===text);
    optionToSelect.selected = true;
  }
  function changeToCoffee(){
    const text = 'Coffee';
    const $select = document.getElementById("DrinkType");
    const $options = Array.from($select.options);
    const optionToSelect = $options.find(item => item.text ===text);
    optionToSelect.selected = true;
  }
  function changeToNescafe(){
    const text = 'Nescafe';
    const $select = document.getElementById("DrinkType");
    const $options = Array.from($select.options);
    const optionToSelect = $options.find(item => item.text ===text);
    optionToSelect.selected = true;
  }

  function refresh(){
      const element = document.getElementById("div1");
      element.remove();
  }

  var total=0;
  function changeDouble2(name , price){

    const newDiv = document.createElement("div");
    // and give it some content
    const newContent = document.createTextNode(inputVal +" "+ name +"--"+" EGP : "+(price * inputVal)+"   ");
    total +=(price * inputVal);
    // add the text node to the newly created div
    newDiv.appendChild(newContent);
    // add the newly created element and its content into the DOM
    const currentDiv = document.getElementById("div1");
  
        //create Button to delete
        // var _button = document.createElement("button");
        // _button.data = "hi";
        // _button.innerHTML = 'click me';
        // _button.onclick = function()
        // {
        //   const element = document.getElementById("div1");
        //   element.remove();
        // }

        // newDiv.appendChild(_button);
    //end of create link
    document.getElementById("order").insertBefore(newDiv, currentDiv);
    //to sent to database
    document.getElementById("orderorder").value += (inputVal +" "+ name +"--"+" EGP : "+(price * inputVal)+"<br>");
    // document.getElementById("orderContent").innerHtml = currentDiv.value;
    // alert(total);

    document.getElementById("priceprice").value = total;
    document.getElementById("totalCost").innerHTML ="Total Price : "+" "+total;
  }




</script>
</body>
</html>
@endsection

