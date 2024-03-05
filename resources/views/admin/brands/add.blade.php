@extends('layouts.dashboard')
@section('home1')
<div class="container">
    <div class="row">
        @include('components.success')
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Add Brands</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                            <tr>
                                <th>sl</th>
                                <th>Brands</th>
                            </tr>
                            @foreach ($brands as $key => $brand)

                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td> {{ $brand->name }}</td>
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
                       <form action="{{route('add.brand')}}" method="POST">
                           @csrf
                          <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name">
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
