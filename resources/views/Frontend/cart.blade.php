@extends('layouts.Frontend')
@section('Frontend')
<section id="card">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 table-part">
                <table class="table">
                    @if (session('update'))
                    <h2 class="alert alert-success">Updated Successfully</h2>
                    @endif
                    @if (session('error'))
                    <h2 class="alert alert-danger">{{session('error')}}</h2>
                    @endif
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $sub_total=0;
                        @endphp
                        @foreach ($carts as $cart)
                        <tr id="tr_{{$cart->id}}">
                            <td class="d-flex">
                                <div class="img-part" style="width: 100px; margin-right:10px">
                                    <img class="w-100 img-fluid"
                                        src="{{ asset('/uploads/product/preview')}}/{{ $cart->relation_product->Product_preview }}"
                                        alt="">
                                </div>
                                <div class="text-part" style="width: 200px">
                                    <h5><a
                                            href="{{route('product.Details',$cart->relation_product->slug)}}">{{ $cart->relation_product->product_name }}</a>
                                    </h5>
                                </div>
                            </td>
                            <td>
                                <h6>{{ $cart->relation_product->after_discount }}</h6>
                            </td>
                            <td class="text-center sus">

                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    <div class="quantity_input">
                                        <button type="button" class="input_number_decrement dec">
                                            <i data-price={{ $cart->relation_product->after_discount }}
                                                class="fa fa-minus"></i>
                                        </button>
                                        <input class="input_number" type="text" name="quantity[{{ $cart->id }}]"
                                            value="{{ $cart->quantity }}">
                                        <button type="button" class="input_number_increment inc">
                                            <i data-price={{ $cart->relation_product->after_discount }}
                                                class="fa fa-plus"></i>
                                        </button>
                                    </div>

                            </td>
                            <td class="sus dfd">
                                <h5 class=" ">{{ $cart->relation_product->after_discount*$cart->quantity }}</h5>
                            </td>
                            <td class="text-end ">
                                @php
                                $qnt = App\Models\Inventory::where('product_id',$cart->product_id)->first();
                                @endphp
                                <h6 id="stock"> {{$qnt->quantity <= 0? 'Stock Out':'Stock In'}} </h6>
                            </td>
                            <td class=" text-center dfd">
                                <a class="deleteRecord cursor-pointer text-danger" data-id="{{ $cart->id }}"
                                    data-csrf-token="{{ csrf_token() }}"><i class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                        @php
                        $sub_total += $cart->relation_product->after_discount*$cart->quantity
                        @endphp
                        @endforeach

                    </tbody>
                </table>

                <div class="imgpart d-flex">
                    <button disabled id="update" type="submit" class="btn btn-primary">Update Cart</button>
                </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="side-cart">
                    <div class="img-header">
                        <img src="{{asset('Frontend/assets/image/cart/Frame 158.png')}}" class="w-100 img-fluid" alt="">
                    </div>
                    <div class="side-cart-main">
                        <div class="Subtotal d-flex" style="justify-content: space-between;">
                            <h6>Subtotal</h6>
                            <h6 id="subtotal">Tk {{$sub_total}}</h6>
                        </div>
                        <div class="first-form">
                            {{-- <form action="{{ route('coupne.Check') }}" method="GET">
                                <div class="coupon_form form_item mb-0">
                                    <input type="text" name="coupon" placeholder="Coupon Code..." value="{{@$_GET['coupon']}}">
                                    <button type="submit" class="btn btn_dark">Apply</button>
                                </div>
                            </form> --}}
                        </div>
                        @php
                        session([
                            'sub_total'=> $sub_total,
                            'customer_id'=> $cart->customer_id
                        ])
                       @endphp
                        <div class="img-bottom">
                            <a href="{{route('check.Out')}}"><img src="{{asset('Frontend/assets/image/cart/Frame 163.png')}}"
                                    class="w-100 img-fluid" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('FrontendJs')
<script>
    let quantity_input = document.querySelectorAll('.sus');
    let arr = Array.from(quantity_input);
    arr.map(item => {
        item.addEventListener('click', function (e) {
            if (e.target.className == 'fa fa-plus') {
                e.target.parentElement.previousElementSibling.value++
                let quantity = e.target.parentElement.previousElementSibling.value
                let price = e.target.dataset.price;
                item.nextElementSibling.innerHTML = price * quantity
            }
            if (e.target.className == 'fa fa-minus') {
                if (e.target.parentElement.nextElementSibling.value > 1) {
                    e.target.parentElement.nextElementSibling.value--
                    let quantity = e.target.parentElement.nextElementSibling.value
                    let price = e.target.dataset.price;
                    item.nextElementSibling.innerHTML = price * quantity
                }
            }
        });
    });

</script>

<script>
    const incButtons = document.querySelectorAll('.inc');
    const decButtons = document.querySelectorAll('.dec');
    const updateButton = document.getElementById('update');

    incButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            updateButton.removeAttribute('disabled');
        });
    });

    decButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            updateButton.removeAttribute('disabled');
        });
    });

</script>
<script>
    $('.deleteRecord').click(function () {
        var el = $(this);
        var del_id = el.data("id");
        var csrfToken = $(this).data('csrf-token');
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        $.ajax({
            url: "{{route('Delete.cart')}}",
            type: 'DELETE',
            data: {
                'cart_id': del_id,
                '_token': csrfToken,
            },
            success: function (data) {
                $('#' + data['tr']).slideUp("slow");
            }
        });
    });

</script>
@endsection
