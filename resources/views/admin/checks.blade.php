@extends('layouts.master')

@section('welcome')
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>cafetria</title>
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('assets/css/styles.css')}}"/>
  </head>

  <body>
    <main class="checks">
        <section class="main-padding">
          <div class="container">
            <h1>Checks</h1>
             {{-- @foreach($orders1->product as $product)
             @dump($product)
             @endforeach --}}

          
      
         
            

           
            <form action="">
              <div class="row">
                <div class="col-sm-6">
                  <div class="from-group">
                    <label for="start">Start date:</label>
                    <input type="date" class="form-control end" value="{{$orders[0]->created_at->format('Y-m-d')}}" name="end" />
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="end">end date:</label>
                    <input type="date" class="form-control end" name="end" value="{{$orders[count($orders)-1]->created_at->format('Y-m-d')}}" />
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="select-user from-group">
                    <select name="users" class="form-control">
                      <option value="user">all users</option>
                      @foreach($orders as $order)
                     
                     
                      <option value="{{$order->user?$order->user->name:""}}"> {{$order->user?$order->user->name:""}}</option>
                      @endforeach
                      
                    </select>
                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <button type="submit" class="btn btn-success">filter</button>
                              </div>
              </div>
            </form>
            <!-- ./date-picker -->
          </div>
        </section>
  
        <section class="main-padding">
          <div class="container">
            <!-- user-checks -->
            <div class="user-checks">
              <!-- ! table one  -->
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Total Amount</th>
                  </tr>
                </thead>
                <tbody>
                 
                 
                  <!-- * first user -->
                  @foreach($orders as $order)


                  {{-- @foreach ($products as $product)
                  @if($order->author_id==$product->id)

                  {{$product}}

                  @endif
                  @endforeach --}}
                  

                
                  
                  
                  <tr class="user">
                    <td>
                      <i class="fa fa-plus-square"></i>
                      <span>{{$order->user?$order->user->name:""}}</span>
                      
                      

                    </td>
                    <td>{{$order->price}}</td>
                  </tr>
                  <tr>
                    <!-- ! table two  -->
                    <td colspan="2">
                      <table class="table">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">order date</th>
                            <th scope="col">Amount</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="user-data">
                            <td>
                              <i class="fa fa-plus-square"></i>
                              <span>
                                {{$order->created_at}}
                              </span>
                            </td>
                            <td>
                              <span>{{$order->price}}</span>
                              EGP
                            </td>
                          </tr>
                          <tr>
                            <!-- ! table three -->
                            <td colspan="2">
                              <div class="row">
                                <!-- each-item -->
                                
                                {{-- @if($order->author_id==$product->id) --}}
              
                                
              
                                {{-- @endif --}}
                                @foreach($orders1->product as $product)
                                
                                         
                                         
                             
                                
                                
                                <div class="col-sm-3">
                                  <div class="each-order">
                                    <img
                                      src="{{asset("productimages/".$product->image)}}"
                                      class="w-100"
                                      width="100"
                                      height="100"
                                      alt="product image"
                                    />
                                    <h5></h5>
                                  
                                    <span style="background-color: #605D86">{{$product->price}} LE</span>
                                    <span>{{$product->name}}</span>
                                    
                                  </div>
                                </div>
                                @endforeach

                               
                                <!-- each-item -->
                               
                                <!-- each-item -->
                              
                                <!-- each-item -->
                            
                              </div>
                            </td>
                            <!-- ! ./table three -->
                          </tr>
                         
                        </tbody>
                      </table>
                    </td>
                    <!-- ! ./table two  -->
                  </tr>

                  @endforeach
  
                  <!-- * second user -->
               
                  <!-- * third user -->
                </tbody>
              </table>
              <!-- ! ./table one  -->
            </div>
          </div>
          <!-- ./user-checks -->
        </section>
      </main>

      <script src="{{asset('assets/js/jquery-3.3.1.js')}}"></script>
      <script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('assets/js/popper.min.js')}}"></script>
      <script src="{{asset('assets/js/modules/09_checks.js')}}"></script>
  </body>
</html>

    
@endsection