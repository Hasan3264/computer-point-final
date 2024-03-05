@extends('layouts.dashboard')
@section('home1')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Add Coupon</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                            <tr>
                                <th>sl</th>
                                <th>Coupon</th>
                                <th>Discount</th>
                                <th>Type</th>
                                <th>Validity</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($couponall as $key => $coupons)
                                
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td> {{ $coupons->coupon }}</td>
                                <td> {{ $coupons->discount }}</td>
                                <td> {{ $coupons->discount_type }}</td>
                                <td> {{ $coupons->validity }}</td>
                                <td></td>
                            </tr>
                            @endforeach
                
                    </table>
                </div>
            </div>
        </div>
       <div class="col-lg-4">
           <div class="card">
               <div class="card-header">
                    <h3>add coupon</h3>
               </div>
               <div class="card-body">
                       <form action="{{route('add.coupon')}}" method="POST">
                           @csrf
                          <div class="form-group">
                            <label for="" class="form-control">coupon name</label>
                            <input type="text" class="form-control" name="coupon">
                          </div>
                          <div class="form-group">
                            <label for="" class="form-control">Discount</label>
                            <input type="text" class="form-control" name="discount">
                          </div>
                          <div class="form-group">
                            <label for="" class="form-control">Discount Type</label>
                            <select name="discount_type" class="form-control">
                                <option value="">select</option>
                                <option value="%">%</option>
                                <option value="amount">Solid Amount</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="" class="form-control">Validity</label>
                            <input type="date" class="form-control" name="validity">
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add</button>
                          </div>
                       </form>
               </div>
           </div>
       </div>
    </div>
</div>
@endsection
