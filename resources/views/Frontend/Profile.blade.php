@extends('layouts.Frontend')
@section('FrontendCss')
    <style>
        .card-header {
            background-color: #003F62;
        }

        h3 {
            color: #EDA415;
            font-weight: 500;
            font-size: 30px;
            font-family: "Poppins", sans-serif;
        }

        .name p,.sssldkjf p{
            color: #242424;
            font-weight: 400;
            font-size: 20px;
            font-family: "Poppins", sans-serif;
            text-transform: capitalize;
        }
        .name p{
            margin-left: 50px;
        }

        .card-body label {
            color: #242424;
            font-weight: 400;
            font-size: 20px;
            font-family: "Poppins", sans-serif;
            text-transform: capitalize;
        }

        .card-body input, {
            color: #242424;
            font-weight: 300;
            font-size: 18px;
            font-family: "Poppins", sans-serif;
            text-transform: capitalize;
        }

        .logout a {
            color: #f80505;
            font-weight: 400;
            font-size: 20px;
            font-family: "Poppins", sans-serif;
            text-transform: capitalize;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #EDA415;
        }

        .nav-link {
            color: #003F62;
            font-family: "Poppins", sans-serif;
        }
    </style>
@endsection
@section('Frontend')
    @include('components.success')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 py-5 d-flex justify-content-between">
                <div class="name">
                    <h3>Welcome</h3>
                    <p>{{ Auth::guard('customer')->user()->name }}</p>
                </div>
                <div class="photo">

                </div>
                <div>
                    <div class="logout">
                        <a href="{{ route('customer.logout') }}">LogOut</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 account_menu">
                <div class="nav account_menu_list flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <button class="nav-link text-start active w-100" id="v-pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                        aria-selected="true">Profile</button>
                    <button class="nav-link text-start w-100" id="v-pills-messages-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages"
                        aria-selected="false">Order Details</button>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="tab-content bg-light p-3" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card h-auto">
                                    <div class="card-header">
                                        <h3>User Name</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('customer.Update')}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="" class="form-label">name</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ Auth::guard('customer')->user()->name }}">
                                                @error('name')
                                                    <p class="alert alert-danger">Name Not Valid</p>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card h-auto">
                                <div class="card-header">
                                     <h3>User Address</h3>
                                 </div>

                                 <div class="card-body">
                                      <form action="{{route('customer.Update')}}" method="POST">
                                          @csrf
                                          <div class="form-group">
                                              <label for="" class="form-label">Update Address</label>
                                              <textarea name="address" id="" cols="30" rows="">{{ Auth::guard('customer')->user()->address}}</textarea>
                                               @if (session('profile_photo'))
                                                <strong class="text-danger pt-3">{{session('profile_photo')}}</strong>
                                               @endif
                                          </div>
                                         <div class="form-group mt-2">
                                             <button type="submit" class="btn btn-primary">Update</button>
                                         </div>
                                      </form>
                                 </div>
                                </div>
                             </div>
                            <div class="col-lg-6 mt-2">
                                <div class="card h-auto">
                                    <div class="card-header">
                                        <h3>User Password</h3>
                                    </div>

                                    <div class="card-body">
                                        <form action="{{route('customer.Update')}}" method="POST">
                                            @csrf
                                            @if (session('updated_pass'))
                                                <strong class="text-danger pt-3">{{ session('updated_pass') }}</strong>
                                            @endif
                                            <div class="form-group">
                                                <label for="" class="form-label">Current Password</label>
                                                <input type="password" class="form-control" name="old_password">
                                                @if (session('OldError'))
                                                    <strong class="text-danger pt-3">{{ session('OldError') }}</strong>
                                                @endif
                                                @error('old_password')
                                                    <strong class="text-danger pt-3">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="form-label">New Password</label>
                                                <input type="password" class="form-control" name="password">
                                                @if (session('exiest_pass'))
                                                    <strong class="text-danger pt-3">{{ session('exiest_pass') }}</strong>
                                                @endif
                                                @error('password')
                                                    <strong class="text-danger pt-3">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control" name="password_confirmation">
                                                @error('password_confirmation')
                                                    <strong class="text-danger pt-3">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                        aria-labelledby="v-pills-messages-tab">
                        @php
                          $orderProductFind = App\Models\OrderProduct::where('user_id',Auth::guard('customer')->user()->id)->get();
                          $orderFind = App\Models\Order::where('user_id',Auth::guard('customer')->user()->id)->first();
                        @endphp
                        <div class="order d-flex justify-content-between">
                            @if ($orderFind != null)
                            <p class="btn btn-dark">{{$orderFind->position}}</p>
                            <a href="{{route('Order.Cancel',$orderFind->id)}}" class="btn btn-warning">Cancle Order</a>
                            @else

                            @endif

                        </div>
                        @if ($orderProductFind->count() > 0)
                        @foreach ($orderProductFind as $order)
                        <div class="header mt-3 d-flex">
                            <div class="img" style="width: 200px">
                               <a href="{{route('product.Details',$order->relation_product->slug)}}"><img class="img-fluid w-100"  src="{{asset('/uploads/product/preview')}}/{{ $order->relation_product->Product_preview}}" alt=""></a>
                            </div>
                            <div class="div sssldkjf align-self-center ms-3">
                                  <p>{{$order->relation_product->product_name}}</p>
                                  <p>Product Price: {{$order->price}} Tk</p>
                                  <p>X</p>
                                  <p>Quentity: {{$order->quentity}}</p>
                                  <p>Sub:  {{$order->price*$order->quentity}} Tk</p>
                            </div>
                        </div>
                        @endforeach
                         @else
                         <p>Not found</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
