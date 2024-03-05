@php
  $pageTitle="Order Successfull";
@endphp
@extends('layouts.Frontend')
@section('Frontend')
<div class="container">
    <div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3 col-lg-12">
            <br><br>
            <h2 style="color:#0fad00">Success</h2>
            <img src="{{asset('Frontend/assets/image/news/order.gif')}}" alt="">
            <h2 style="color:#0fad00; margin-top:10px;">Your Order Placed Successfully</h2>
            <p style="font-size:20px;color:#5C5C5C; margin-top:10px;">Thank you for Being With Us</p>
           <a href="{{route('Invoice.Index',$get_order->id)}}" class="btn btn-success">View Invoice</a>
        </div>
    </div>
</div>
@endsection
