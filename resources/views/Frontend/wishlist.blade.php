@extends('layouts.Frontend')
@section('FrontendCss')
    <style>
        .cart-wrap {
            padding: 40px 0;
            font-family: 'Open Sans', sans-serif;
        }

        .main-heading {
            font-size: 19px;
            margin-bottom: 20px;
        }

        .table-wishlist table {
            width: 100%;
        }

        .table-wishlist thead {
            border-bottom: 1px solid #e5e5e5;
            margin-bottom: 5px;
        }

        .table-wishlist thead tr th {
            padding: 8px 0 18px;
            color: #484848;
            font-size: 15px;
            font-weight: 400;
        }

        .table-wishlist tr td {
            padding: 25px 0;
            vertical-align: middle;
        }

        .table-wishlist tr td .img-product {
            width: 72px;
            float: left;
            margin-left: 8px;
            margin-right: 31px;
            line-height: 63px;
        }

        .table-wishlist tr td .img-product img {
            width: 100%;
        }

        .table-wishlist tr td .name-product {
            font-size: 15px;
            color: #484848;
            padding-top: 8px;
            line-height: 24px;
            width: 50%;
        }

        .table-wishlist tr td.price {
            font-weight: 600;
        }

        .table-wishlist tr td .quanlity {
            position: relative;
        }

        .total {
            font-size: 24px;
            font-weight: 600;
            color: #8660e9;
        }

        .display-flex {
            display: flex;
        }

        .align-center {
            align-items: center;
        }

        .round-black-btn {
            border-radius: 25px;
            background: #212529;
            color: #fff;
            padding: 5px 20px;
            display: inline-block;
            border: solid 2px #212529;
            transition: all 0.5s ease-in-out 0s;
            cursor: pointer;
            font-size: 14px;
        }

        .round-black-btn:hover,
        .round-black-btn:focus {
            background: transparent;
            color: #212529;
            text-decoration: none;
        }

        .mb-10 {
            margin-bottom: 10px !important;
        }

        .mt-30 {
            margin-top: 30px !important;
        }

        .d-block {
            display: block;
        }

        .custom-form label {
            font-size: 14px;
            line-height: 14px;
        }

        .pretty.p-default {
            margin-bottom: 15px;
        }

        .pretty input:checked~.state.p-primary-o label:before,
        .pretty.p-toggle .state.p-primary-o label:before {
            border-color: #8660e9;
        }

        .pretty.p-default:not(.p-fill) input:checked~.state.p-primary-o label:after {
            background-color: #8660e9 !important;
        }

        .main-heading.border-b {
            border-bottom: solid 1px #ededed;
            padding-bottom: 15px;
            margin-bottom: 20px !important;
        }

        .custom-form .pretty .state label {
            padding-left: 6px;
        }

        .custom-form .pretty .state label:before {
            top: 1px;
        }

        .custom-form .pretty .state label:after {
            top: 1px;
        }

        .custom-form .form-control {
            font-size: 14px;
            height: 38px;
        }

        .custom-form .form-control:focus {
            box-shadow: none;
        }

        .custom-form textarea.form-control {
            height: auto;
        }

        .mt-40 {
            margin-top: 40px !important;
        }

        .in-box {
            font-size: 12px;
            text-align: center;
            border-radius: 25px;
            padding: 4px 15px;
            display: inline-block;
            color: #fff;
        }

        .in-stock-box {
            background: #00bbff;
        }

        .Out-stock-box {
            background: #f73636;
        }

        .trash-icon {
            font-size: 20px;
            color: #212529;
        }
    </style>
@endsection
@section('Frontend')
    <div class="container ">
        <div class="cart-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-heading mb-10">My wishlist</div>
                        <div class="table-wishlist">
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                <thead>
                                    <tr>
                                        <th width="45%">Product Name</th>
                                        <th width="15%">Unit Price</th>
                                        <th width="15%">Stock Status</th>
                                        <th width="15%"></th>
                                        <th width="10%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getwishs as $wish)
                                        <tr id="tr_{{ $wish->id }}">
                                            <td width="45%">
                                                <div class="display-flex align-center">
                                                    <div class="img-product">
                                                        <img src="{{ asset('/uploads/product/preview') }}/{{ $wish->rel_to_product->Product_preview }}"
                                                            alt="" class="mCS_img_loaded">
                                                    </div>
                                                    <div class="name-product">
                                                        {{ $wish->rel_to_product->product_name }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="15%" class="price">{{ $wish->rel_to_product->after_discount }}
                                            </td>
                                            <td width="15%">
                                                @php
                                                    $avl = App\Models\Inventory::where('product_id', $wish->product_id)
                                                        ->pluck('quantity')
                                                        ->first();
                                                @endphp

                                                @if ($avl > 0)
                                                    <span class="in-stock-box in-box">In Stock</span>
                                                @else
                                                    <span class="Out-stock-box in-box">Stock Out</span>
                                                @endif
                                            </td>
                                            <td width="15%">
                                                <button class="round-black-btn small-btn" onclick="removewish.call(this)"
                                                    data-product-id="{{ $wish->product_id }}"

                                                    data-wish-id="{{ $wish->id }}"

                                                    data-csrf-token="{{ csrf_token() }}"
                                                    @if ($avl <= 0) disabled @endif>
                                                    Add to Cart
                                                </button>

                                            </td>
                                            <td width="10%" class="text-center"><a href="#" class="trash-icon"><i
                                                        class="far fa-trash-alt"></i></a></td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('FrontendJs')
    <script>
        function removewish() {
            var productId = $(this).data('product-id');
            var csrfToken = $(this).data('csrf-token');
             var wishId = $(this).data('wish-id');
            // Make an AJAX request
            $.ajax({
                url: "{{ route('add.cartFromWish') }}",
                type: 'POST',
                data: {
                    'Pro_id': productId,
                    'wish_id': wishId,
                    '_token': csrfToken,
                },
                success: function (response) {
                    showMessage(response.success, response.message);
                    $('#' + response['tr']).slideUp("slow");
                    $('#countfind').text(response.count);
                },
                error: function (error) {
                    // Handle errors
                    console.error(error);
                    // You may want to show an error message
                }
            });
        }
    </script>
@endsection
