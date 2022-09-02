@extends('layouts.app')

@section('content')
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
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div style="background-color: rgb(52, 13, 88)" class="card-header">{{ __('Dashboard') }}</div>

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
              <div class="container">
                <div class="row">
                  <!-- orders-panel -->
                  <div class="col-md-4">
                    <form action="">
                      <div class="orders-panel">
                        <!-- choosen-items -->
                        <div class="choosen-items">
                          <ul class="list-unstyled">
                            <!-- item-info -->
                            <!-- <li>
                              <div class="item-info">
                                <h5>Tea</h5>
                                <div class="item-counter">
                                  <span>1</span>
                                  <i class="add">+</i>
                                  <i class="sub">-</i>
                                </div>
                                <div class="price">
                                  <span>EGP <span>25</span></span>
                                  <i class="remove">X</i>
                                </div>
                                <input type="text" name="tea" value="25" hidden />
                                <span class="itemPrice hidden">25</span>
                              </div>
                            </li> -->
                            <!-- item-info -->
                            <!-- <li>
                              <div class="item-info">
                                <h5>Tea</h5>
                                <div class="item-counter">
                                  <span>1</span>
                                  <i class="add">+</i>
                                  <i class="sub">-</i>
                                </div>
                                <div class="price">
                                  <span>EGP <span>10</span></span>
                                  <i class="remove">X</i>
                                </div>
                                <input type="text" name="tea" value="10" hidden />
                                <span class="itemPrice hidden">10</span>
                              </div>
                            </li> -->
                          </ul>
                        </div>
                        <!-- ./choosen-items -->
                        <!-- items-notes -->
                        <div class="items-notes">
                          <label>Notes</label>
                          <textarea name="notes"></textarea>
                        </div>
                        <!-- ./items-notes -->
                        <!-- room -->
                        <div class="room">
                          <label>Room</label>
                          <select>
                            <option value="CompoBox">CompoBox</option>
                            <option value="test1">test1</option>
                            <option value="test2">test2</option>
                          </select>
                        </div>
                        <!-- ./room -->
                        <!-- total-price -->
                        <div class="total-price">
                          <span>EGP <span>0</span></span>
                          <input type="text" name="amount" value="" hidden />
                        </div>
                        <!-- ./total-price -->
                        <!-- confirm -->
                        <div class="confirm">
                          <button type="submit" class="btn btn-success">
                            confirm
                          </button>
                        </div>
                        <!-- confirm -->
                      </div>
                    </form>
                  </div>
                  <!-- ./orders-panel -->

                  <!-- all-products -->
                  <div class="col-md-8">
                    <div class="all-products">
                      <!-- latest-orders -->
                      <div class="latest-orders">
                        <h3>Latest Orders</h3>
                        <div class="row">
                          <!-- each-order -->
                          <div class="col-sm-3">
                            <div class="each-order">
                              <img
                                src="https://via.placeholder.com/100"
                                class="w-100"
                                width="100"
                                height="100"
                                alt=""
                              />
                              <h5>tea</h5>
                              <input type="text" name="tea" hidden />
                            </div>
                          </div>
                          <!-- each-order -->
                          <div class="col-sm-3">
                            <div class="each-order">
                              <img
                                src="https://via.placeholder.com/100"
                                class="w-100"
                                width="100"
                                height="100"
                                alt=""
                              />
                              <h5>cofee</h5>
                              <input type="text" name="cofee" hidden />
                            </div>
                          </div>
                          <!-- each-order -->
                          <div class="col-sm-3">
                            <div class="each-order">
                              <img
                                src="https://via.placeholder.com/100"
                                class="w-100"
                                width="100"
                                height="100"
                                alt=""
                              />
                              <h5>cofee</h5>
                              <input type="text" name="cofee" hidden />
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- latest-orders -->
                      <!-- products -->
                      <div class="products">
                        <h3>Products</h3>
                        <div class="row">
                          <!-- each-order -->
                          <div class="col-sm-3">
                            <div class="each-order">
                              <img
                                src="https://via.placeholder.com/100"
                                class="w-100"
                                width="100"
                                height="100"
                                alt=""
                              />
                              <h5>tea</h5>
                              <input type="text" name="tea" value="5" hidden />
                              <span>5 LE</span>
                            </div>
                          </div>
                          <!-- each-order -->
                          <div class="col-sm-3">
                            <div class="each-order">
                              <img
                                src="https://via.placeholder.com/100"
                                class="w-100"
                                width="100"
                                height="100"
                                alt=""
                              />
                              <h5>coffee</h5>
                              <input type="text" name="coffee" value="5" hidden />
                              <span>5 LE</span>
                            </div>
                          </div>
                          <!-- each-order -->
                          <div class="col-sm-3">
                            <div class="each-order">
                              <img
                                src="https://via.placeholder.com/100"
                                class="w-100"
                                width="100"
                                height="100"
                                alt=""
                              />
                              <h5>nescafe</h5>
                              <input type="text" name="nescafe" value="10" hidden />
                              <span>10 LE</span>
                            </div>
                          </div>
                          <!-- each-order -->
                          <div class="col-sm-3">
                            <div class="each-order">
                              <img
                                src="https://via.placeholder.com/100"
                                class="w-100"
                                width="100"
                                height="100"
                                alt=""
                              />
                              <h5>tea</h5>
                              <input type="text" name="tea" value="15" hidden />
                              <span>15 LE</span>
                            </div>
                          </div>
                          <!-- each-order -->
                          <div class="col-sm-3">
                            <div class="each-order">
                              <img
                                src="https://via.placeholder.com/100"
                                class="w-100"
                                width="100"
                                height="100"
                                alt=""
                              />
                              <h5>tea</h5>
                              <input type="text" name="tea" value="5" hidden />
                              <span>5 LE</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- products -->
                    </div>
                    <!-- ./all-products -->
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

    <script src="{{asset('assets/js/jquery-3.3.1.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/modules/02_users.js')}}"></script>

</body>
</html>
@endsection

