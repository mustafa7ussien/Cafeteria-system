@extends('layouts.app')

@section('title')
Welcome To Our Cafeteria
@endsection

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="text-center">
            <h1>WELCOME TO OUR Cafeteria</h1>
            <div class="card-body">
                <h5 class="mb-4">Login to Continue</h5>
                <a class="btn btn-info mx-2 text-light fw-bold shadow-sm" href="{{ route('login') }}">Login</a>
            </div>
            <div class="card-body">
                <h5 class="mb-4">Register</h5>
                <a class="btn btn-info mx-2 text-light fw-bold shadow-sm" href="{{ route('register') }}">Register</a>
            </div>
        </div>
    </div>
</div>
@endsection