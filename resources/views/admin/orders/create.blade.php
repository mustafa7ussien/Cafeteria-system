@extends("layouts.app")

@section("content")

<form action="{{route("sorder.store")}}" method="POST" name="user_id" class="d-flex flex-row-reverse" style="user-select:none;margin-top:30px;gap:40px;flex:1 2 auto">
    @csrf
        <div class="user-product" style="width:50%">

            <h3>Add to user</h3>
            <select class="form-select form-select-lg mb-3" name="userid" aria-label=".form-select-lg example">
                <option selected>Select User</option>
            @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach

            </select>

            <div class="products">
            <hr style="border:none;height:4px;background-color:rgb(0, 0, 0)">
            <h3>Products</h3>
            <div class="d-flex flex-row" style="gap:40px">
                @foreach ($products as $product)
              <!-- each-order -->

              

                    <div class="each-product">
                        <img
                        src="{{asset("productimages/".$product->image)}}"
                        class="w-100"
                        width="100"
                        height="100"
                        alt=""
                        />
                        <h5>{{$product->name}}</h5>
                        <span>{{$product->price}}</span>
                    </div>

                    @endforeach
                </div>
        </div>
    </div>
<div class="order "style="width:50%;border:2px solid #DDD; padding:20px">
    <div class="amounts" style="font-size: 20px"></div>
<textarea style ="margin-top:20px;"name="notes"  cols="60" rows="6" placeholder="Write Your Notes Here"></textarea>
<h4>Room</h4>
<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="room_no">
    <option selected>Select Room</option>
        @foreach ($users as $user)
            <option value="{{$user->room_no}}">{{$user->room_no}}</option>
        @endforeach
</select>
        <hr>
<div class="total d-flex flex-row"style="align-items:center;justify-content:flex-end;gap:10px;font-size:20px" >
    <span>EGP </span>
    <input type="text" value="0" name="price" class="cost"readonly style="border: none;outline:none;">
</div>
<input type="submit" value="Confirm" style="font-size:20px">
</div>

</form>
<script src="{{asset('assets/js/modules/AdminCreate.js')}}"></script>
@endsection
