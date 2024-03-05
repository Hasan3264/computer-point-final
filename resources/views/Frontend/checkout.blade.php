@extends('layouts.Frontend')
@section('FrontendCss')
<style>
    .container {
        font-family: "Poppins", sans-serif;
    }

    .header .header-bottom .form-controll button {
        top: 25px;
    }

    .ffdfd {
        color: #fff;
        font-weight: 400;
        font-size: 14px;
        font-family: "Poppins", sans-serif;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -ms-border-radius: 5px;
        -o-border-radius: 5px;
        width: 130px;
        line-height: 36px;
        background-color: #EDA415;
    }

</style>

@endsection
@section('Frontend')



<!-- checkout-section - start
================================================== -->


<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 mb-4">
                <div class="card shadow-0 border">
                    <div class="p-4">
                        <form action="{{route('order.insert')}}" method="POST">
                            @csrf
                            @if($errors->any())
                            <div class="alert alert-danger">
                                {{ implode(', ', $errors->all()) }}
                            </div>
                            @endif
                            <h5 class="card-title mb-3">Checkout</h5>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <p class="mb-0">First name</p>
                                    <div class="form-outline">
                                        <input type="text" id="typeText" name="name" placeholder="Type here"
                                            class="form-control" />
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <p class="mb-0">Phone</p>
                                    <div class="form-outline">
                                        <input type="tel" name="phone" id="typePhone" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <p class="mb-0">Email</p>
                                    <div class="form-outline">
                                        <input type="email" name="email" id="typeEmail" placeholder="example@gmail.com"
                                            class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <div class="row">
                                <div class="col-sm-8 mb-3">
                                    <p class="mb-0">Address</p>
                                    <div class="form-outline">
                                        <input type="text" id="typeText" name="address" placeholder="Type here"
                                            class="form-control" />
                                    </div>
                                </div>

                                <div class="col-sm-4 mb-3">
                                    <p class="mb-0">City</p>
                                    <select class="form-select" name="district">
                                        <option value="">Add City</option>
                                        @foreach ($districts as $district)
                                        <option value="{{$district->id}}">{{$district->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <p class="mb-0">Message to seller</p>
                                <div class="form-outline">
                                    <textarea class="form-control" name="notes" id="textAreaExample1"
                                        rows="2"></textarea>
                                </div>
                            </div>

                    </div>
                </div>
                <!-- Checkout -->
            </div>



            <div class="col-xl-4 col-lg-4">

                <h6 class="mb-3">Summary:</h6>
                <div class="d-flex justify-content-between">
                    <p class="mb-2">Total price:</p>
                    <p class="mb-2 fw-bold">Tk <span id="total_sub">{{ session('sub_total') }}</span> Only</p>
                    <input type="hidden" name="sub_total" value="{{ session('sub_total') }}">
                </div>
                {{-- <div class="d-flex justify-content-between">
                        <p class="mb-2">Discount:</p>
                        <p class="mb-2 text-danger">- $60.00</p>
                    </div> --}}
                <tr class="shipping">
                    <p>Delivery Charge:-</p>
                    <p data-title="Shipping">
                        <input type="hidden" name="discount" value="{{ session('discount') }}">
                        <input type="hidden" name="customer_id" value="{{ session('customer_id') }}">
                        <input type="hidden" name="product_id" value="{{ session('product_id') }}">
                        <input type="hidden" name="after_discount" value="{{ session('after_discount') }}">
                        {{-- <input type="hidden" name="sub_total" value="{{ $sub_total  }}"> --}}
                        <input type="radio" class="delevary_charge" name="charge" value="50">Dhaka +50Tk
                        <br />
                        <input type="radio" class="delevary_charge" name="charge" value="100">Out side Dhaka +100Tk
                    </p>
                </tr>
                <hr />
                <div class="d-flex justify-content-between">
                    <p class="mb-2">Sub Total price: </p>
                    <p class="mb-2 fw-bold"> Tk<span id="total_amount"></span> Only</p>
                </div>
                <div id="payment" class="woocommerce-checkout-payment py-3 mt-5">
                    <ul class="wc_payment_methods payment_methods methods">
                        <li class="wc_payment_method payment_method_cheque mb-2">
                            <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method"
                                value="Cash" checked='checked' data-order_button_text="" />
                            <!--grop add span for radio button style-->
                            <span class='grop-woo-radio-style'></span>
                            <!--custom change-->
                            <label for="payment_method_cheque">Cash On Delivery</label>
                        </li>
                        <li class="wc_payment_method payment_method_paypal mb-2">
                            <input id="payment_method_ssl" type="radio" class="input-radio" name="payment_method"
                                value="bkash" data-order_button_text="Proceed to SSL Commerz" />
                            <!--grop add span for radio button style-->
                            <span class='grop-woo-radio-style'></span>
                            <!--custom change-->
                            <label for="payment_method_ssl">Bkash</label>
                        </li>
                    </ul>
                    <div class="form-row place-order">
                        <input type="submit" class="btn ffdfd" name="" id="place_order" value="Place order" />

                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- checkout-section - end
================================================== -->
@endsection
@section('FrontendJs')
<script>
    $('.delevary_charge').click(function () {
        var charge = $(this).val();
        var total_sub = $('#total_sub').html();
        var Total_main = (parseInt(total_sub)) + (parseInt(charge));
        $('#total_amount').html(Total_main);
    });

</script>

@endsection
