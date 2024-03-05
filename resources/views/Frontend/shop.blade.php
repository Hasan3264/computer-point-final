@extends('layouts.Frontend')
@section('FrontendCss')
@include('components.commonCss')
@endsection
@section('Frontend')

<!-- =========================================================================
                          quick sell part  start
==================================================================================== -->
@include('components.category')
<!-- =========================================================================
                          quick sell part end
==================================================================================== -->
<!-- =========================================================================
                             shop main part  start
==================================================================================== -->
@php
$isempty = $product->isEmpty();
@endphp
@if ( $isempty != 1)
<section id="shop-main">
    <div class="container">
        <div class="row">
            <div class="shop-product">
                <ul class="d-flex flex-wrap">
                    @foreach ($product as $Pdesktop)
                    <li class="ul-li">
                        <div class="card">
                            <a href=""> <i class="icon bi bi-heart"></i></a>
                            <div class="img-part">
                                <a href="{{route('product.Details',$Pdesktop->slug)}}"><img
                                        src="{{asset('uploads/product/preview')}}/{{$Pdesktop->Product_preview}}"
                                        class="w-100 img-fluid" alt=""></a>
                            </div>
                            <div class="card-text">
                                <a href="">{{$Pdesktop->product_name}}</a>
                                <div class="ppp d-flex justify-content-between">
                                    <p>Tk {{$Pdesktop->after_discount}}</p>
                                    <del>Tk {{$Pdesktop->product_price}}</del>
                                </div>
                                @php
                                $totalReRlt =totalReviews($Pdesktop->id);
                                $totalStrRlt =total_star($Pdesktop->id);
                                @endphp
                                @if ($totalReRlt == 0 && $totalStrRlt == 0)
                                <ul class="d-flex iconcolor">
                                    @for ($i = 0; $i < 5; $i++) <li><a><i class="far fa-star"></i></a>
                    </li>
                    @endfor
                </ul>
                @else
                @php
                $avgStarOnrlt=round($totalStrRlt / $totalReRlt,1);
                @endphp
                <x-star-rating :avgStar="$avgStarOnrlt" :totalReviews="$totalReRlt" />
                @endif
            </div>
            <div class="hd">
                <div class="hidden-text d-flex" style="justify-content: space-between;">
                    <div class="h-t1">
                        <a href="{{route('add.cart', $Pdesktop->id)}}" class="d-flex"
                            style="justify-content: space-between;">
                            <p><i class="bi bi-cart3"></i></p>
                        </a>
                    </div>
                    <div class="h-t2">
                        <a href="{{route('product.Details',$Pdesktop->slug)}}"> <i class="bi bi-eye"></i></a>
                    </div>
                </div>
            </div>

        </div>
        </li>
        @endforeach
        </ul>


    </div>
    <div class="shoing d-flex justify-content-between mt-5 flex-wrap">
        <span> Showing {{ $product->firstItem() }} to {{ $product->lastItem() }} of {{ $product->total() }}
            products</span>
        <span>{{ $product->appends([
    'q' => request('q'),
    'category_id' => request('category_id'),
    'subcategory_id' => request('subcategory_id'),
    'min' => request('min'),
    'max' => request('max')
])->links() }}
        </span>


    </div>
    </div>
    </div>
    </div>
</section>
@else
<section class="page_404">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="col-sm-10 col-sm-offset-1  text-center">
                    <div class="four_zero_four_bg">
                        <h1 class="text-center ">404</h1>


                    </div>

                    <div class="contant_box_404">
                        <h3 class="h2">
                            Your Product Not Found
                        </h3>

                        <p>The Product you are looking is not avaible!</p>

                        <a href="{{route('Front.index')}}" class="link_404">Go to Home</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endif




<!-- =========================================================================
                             shop main part end
==================================================================================== -->
<!-- =========================================================================
                             mixin it part end
==================================================================================== -->

<!-- =========================================================================
                           logos review event part end
==================================================================================== -->
<section id="logos">
    <div class="container">
        <div class="com-logo d-flex">
            <img src="{{asset('Frontend/assets/image/logos/asus.png')}}" alt="">
            <img src="{{asset('Frontend/assets/image/logos/canon.png')}}" alt="">
            <img src="{{asset('Frontend/assets/image/logos/dell.png')}}" alt="">
            <img src="{{asset('Frontend/assets/image/logos/fantech.png')}}" alt="">
            <img src="{{asset('Frontend/assets/image/logos/gigabyte.png')}}" alt="">
            <img src="{{asset('Frontend/assets/image/logos/samsung.png')}}" alt="">
            <img src="{{asset('Frontend/assets/image/logos/tplink.png')}}" alt="">
            <img src="{{asset('Frontend/assets/image/logos/A4Tech-logo.png')}}" alt="">
        </div>
    </div>
</section>

<!-- =========================================================================
                           logos review event part end
==================================================================================== -->
@endsection
@section('FrontendJs')
<script>
    jQuery(document).ready(function ($) {
        $('.counUp').counterUp({
            delay: 5,
            time: 1000
        });
    });

</script>
<script>
    $('.ght').click(function () {
        $('.jkg').toggleClass('jkgxc')
        $('.shop-product').toggleClass('klij')
    });


    $(document).ready(function () {
        $('.js-example-basic-single').select2();
    });

</script>
<script>
    $('#search_minmax').click(function () {
        var search_input = $('#search_input').val();
        var min = $('#min').val();
        var max = $('#max').val();

        // Fetch previous search data
        var previousSearch = {
            !!json_encode($previousSearch) !!
        };

        // Merge previous search with current search
        var searchData = Object.assign({}, previousSearch, {
            q: search_input,
            min: min,
            max: max
        });

        // Remove empty or undefined parameters
        Object.keys(searchData).forEach(function (key) {
            if (searchData[key] === '' || searchData[key] === 'undefined') {
                delete searchData[key];
            }
        });

        // Construct the link with merged search parameters
        var link = "{{ route('Shop.page') }}" + "?" + $.param(searchData);

        // Redirect to the constructed link
        window.location.href = link;
    });

</script>

@endsection
