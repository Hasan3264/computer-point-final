@extends('layouts.Frontend')
@section('FrontendCss')
<style>
    .accordion-item:first-of-type .accordion-button,
    .accordion-item:last-of-type .accordion-button.collapsed,
    .accordion-button:not(.collapsed) {
        background-color: #3f3f3f4a;
    }

    .accordion-item:first-of-type .accordion-button h4 {
        color: #fff;
    }

    .container {
        font-family: "Poppins", sans-serif;
    }

    .customer_review_form input {
        line-height: 30px;
        margin-top: 10px;
        padding: 0px 10px;
    }

    .customer_review_form .your_ratings button {
        background: none;
        border: none;
    }

    .customer_review_form .your_ratings button i {
        font-weight: 100;
    }

    .setsfy {
        display: none;
    }

</style>
@endsection

@section('Frontend')
@include('components.success')
<section id="product-dtails">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="slider-f  d-flex" id="slider-for">
                    @foreach ( App\Models\thumbnails::where('product_id', $findId->id)->get() as $thambnails)
                    <div class="img-part">
                        <img class="img-fluid w-100"
                            src="{{asset('/uploads/product/thumbnails')}}/{{$thambnails->thumbnail}}" alt="">
                    </div>
                    @endforeach
                </div>
                <div class="slider-b d-flex slider-nav">
                    @foreach ( App\Models\thumbnails::where('product_id', $findId->id)->get() as $thambnails)
                    <div class="img-part">
                        <img src="{{asset('/uploads/product/thumbnails')}}/{{$thambnails->thumbnail}}"
                            class="img-fluid w-100" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-7">
                <div class="product-details">
                    <h5>{{$findId->product_name}}</h5>
                    <ff class="ff">{{ $findId->after_discount}} Tk </ff>
                    <del class="ff"> {{ $findId->product_price}} Tk</del>
                    <p class=" my-4">{!! $findId->short_des!!}</p>

                    <div class="review d-flex">
                        @if (totalReviews($findId->id) == 0 && total_star($findId->id) == 0)
                        <ul class="d-flex iconcolor">
                            @for ($i = 0; $i < 5; $i++) <li><a><i class="far fa-star"></i></a></li>
                                @endfor
                        </ul>
                        <p>0 review</p>
                        @else

                        @php
                        $avgStar=round($total_star / $totalReviews,1);
                        @endphp
                        <x-star-rating :avgStar="$avgStar" :totalReviews="$totalReviews" />
                        <p class="mb-0">({{ $totalReviews }} review{{ $totalReviews != 1 ? 's' : '' }})</p>
                        @endif



                    </div>
                    <div class="stock">
                        @foreach (App\Models\Inventory::where('product_id', $findId->id)->get() as $findInventory)
                        @endforeach
                        @if (!empty($findInventory))
                        <p>Availability:
                            @if ($findInventory->quantity > 0)
                            <span>In Stock</span>
                            @else
                            <span class="text-danger">Stock Out</span>
                            @endif
                        </p>
                    </div>
                    <tik class="tik py-2">Hurry up! only {{$findInventory->quantity}} product left in stock!</tik>
                    @endif
                    <div>
                        <p calss="py-2">Sometimes Price and Availability Can't Be Updated</p>
                        <h6>Call Us Before Order:- 01678012455, 01678012457</h6>
                    </div>
                </div>
                <div class="order-details">
                    <div class="quantity d-flex">
                        <h5>Quantity:</h5>
                        <form action="{{route('add.cart',$findId->id)}}" method="GET">
                            @csrf
                            <div class="quantity_input">
                                <button type="button" class="input_number_decrement">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <input class="input_number" name="quantity" type="text" value="1">
                                <button type="button" class="input_number_increment">
                                    <i class="fal fa-plus"></i>
                                </button>
                            </div>

                    </div>

                    <div class="order-l d-flex">
                        <button type="submit" class="btn"><img
                                src="{{asset('Frontend/assets/image/product dtails/Frame 6.png ')}}"
                                class="w-100 img-fluid" alt=""></button>
                        </form>
                        @php
                        $customerId = '';

                        if (auth('customer')->check()) {
                        // If customer is authenticated, use customer's ID
                        $customerId = auth('customer')->id();
                        } else {
                        // If not authenticated, use remote IP address
                        $customerId = $_SERVER['REMOTE_ADDR'];
                        }

                        session([
                        'sub_total' => $findId->after_discount,
                        'customer_id' => $customerId,
                        'product_id' => $findId->id,
                        'after_discount' => $findId->after_discount,
                        ]);
                        @endphp

                        <div class="btn"><a href="{{route('check.Out')}}"><img
                                    src="{{asset('Frontend/assets/image/product dtails/Frame 137.png')}}"
                                    class="w-100 img-fluid" alt=""></a></div>
                        <div class="btn"><img src="{{asset('Frontend/assets/image/product dtails/Frame 138.png')}}"
                                class="w-100 img-fluid" alt=""></div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12  mt-5">
                <div class="img-part-bottom">
                    <a class="" id="toggleButton1"> <img
                            src="{{asset('Frontend/assets/image/product dtails/Frame 149.png')}}" alt=""></a>
                    <a id="toggleButton2"> <img src="{{asset('Frontend/assets/image/product dtails/Frame 148.png')}}"
                            alt=""></a>
                </div>

            </div>
            <div class="accordion mt-3" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h4>Product Description</h4>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {!!$findId->long_des !!}
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h4>Give Review</h4>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @auth('customer')
                            @if (App\Models\OrderProduct::where('user_id',
                            Auth::guard('customer')->id())->where('product_id', $findId->id)->exists())
                            @if (App\Models\OrderProduct::where('user_id',
                            Auth::guard('customer')->id())->where('product_id',
                            $findId->id)->whereNull('review')->exists())

                            <div class="customer_review_form">
                                <h4 class="reviews_tab_title">Add a review</h4>
                                <div id="form-message-warning" class="mb-4"></div>
                                <form method="POST" id="reviewForm" class="reviewForm" name="reviewForm">
                                    @csrf
                                    <div class="form_item">
                                        <input type="text" readonly id="name" name="name"
                                            value="{{Auth::guard('customer')->user()->name}}" placeholder="Your name*">
                                    </div>
                                    <div class="form_item">
                                        <input type="email" readonly id="email" name="email"
                                            value="{{Auth::guard('customer')->user()->email}}"
                                            placeholder="Your Email*">
                                    </div>
                                    <div class="your_ratings mt-3">
                                        <h5 class="mt-2">Your Ratings:</h5>
                                        <button type="button" class="star" value="1"><i id="st1"
                                                class="fas fa-star  review"></i></button>
                                        <button type="button" class="star" value="2"><i id="st2"
                                                class="fas fa-star review"></i></button>
                                        <button type="button" class="star" value="3"><i id="st3"
                                                class="fas fa-star review"></i></button>
                                        <button type="button" class="star" value="4"><i id="st4"
                                                class="fas fa-star review"></i></button>
                                        <button type="button" class="star" value="5"><i id="st5"
                                                class="fas fa-star review"></i></button>
                                    </div>
                                    <input type="hidden" name="star" id="star">
                                    <p> <span id="givenRatings">0</span> Out Of 5</p>
                                    <p class="setsfy">If You Are Not Satisfy with Our Product You Can Contuct Us
                                        Directly 016**********</p>
                                    <input type="hidden" name="product_id" value="{{  $findId->id }}">
                                    <div class="form_item my-4">
                                        <textarea required id="review" name="review"
                                            placeholder="Your Review"></textarea>
                                    </div>
                                    <button onclick="validateForm()" disabled type="button" id="btnhid"
                                        class="btn btn-dark">Submit Now</button>
                                </form>
                            </div>
                            @else
                            <span> <a href="#">View your Review</a>
                            </span>
                            @endif
                            @else
                            <span> Plase Bay This Product Then Give a Sweetable review <br>
                                Thanks</span>
                            @endif
                            @else
                            <span>Please log in To Give Review </span>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-8 mx-auto">
                <div id="component1" class="component text-center">
                    <!-- Content for Component 1 -->
                    <h2 class="my-3">Product Description: </h2>
                    {!!$findId->long_des!!}

                </div>
                <div id="component2" class="component">
                    <!-- Content for Component 2 -->
                    <p>No Review</p>
                </div>
            </div> --}}
        </div>

        <div class="row">
            <div class="col-lg-12  mt-5">
                <div class="customer-review">
                    <h5>Customer reviews</h5>
                    @if (App\Models\OrderProduct::where('product_id', $findId->id)->whereNotNull('review')->get()->count() > 0)
                    @foreach (App\Models\OrderProduct::where('product_id', $findId->id)->whereNotNull('review')->get()
                    as $review)
                    <div class="div my-2">
                        {{$review->relation_customer->name}} <br>
                        {{$review->review}}
                        <ul class="d-flex dsdf">
                            @for ($i = 1; $i <= 5; $i++) @if ($i <=$review->star)
                                <li><a><i class="fas fa-star"></i></a></li>
                                @else
                                <li><a><i class="far fa-star"></i></a></li>
                                @endif
                                @endfor
                        </ul>
                    </div>
                    @endforeach
                    @else
                      <p>No reviews yet</p>
                    @endif



                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
                     product dtals part end
==================================================================================== -->
<!-- =========================================================================
                     related part start
==================================================================================== -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="related-product">
                    <div class="related-header">
                        <img src="./assets/image/product dtails/Related product.png" alt="">
                    </div>
                    <ul class="d-flex flex-wrap sdfdsdsf">
                        @foreach (App\Models\product::where('category_id',
                        $findId->category_id)->where('subcategory_id', $findId->subcategory_id)->get() as $rltProduct)
                        @if (!empty($rltProduct))
                        <li class="ul-li">
                            <div class="card">
                                <a href=""> <i class="icon bi bi-heart"></i></a>
                                <div class="img-part">
                                    <a href="{{route('product.Details',$rltProduct->slug)}}"><img
                                            src="{{asset('uploads/product/preview')}}/{{$rltProduct->Product_preview}}"
                                            class="w-100 img-fluid" alt=""></a>
                                </div>
                                <div class="card-text">
                                    <a href="productdetails.html">{{$rltProduct->product_name}}</a>
                                    <div class="ppp d-flex justify-content-between">
                                        <p>Tk {{$rltProduct->after_discount}}</p>
                                        <del>Tk {{$rltProduct->product_price}}</del>
                                    </div>
                                    @php
                                    $totalReRlt =totalReviews($rltProduct->id);
                                    $totalStrRlt =total_star($rltProduct->id);

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
                            <a href="{{route('add.cart',$rltProduct->id)}}" class="d-flex"
                                style="justify-content: space-between;">
                                <p><i class="bi bi-cart3"></i></p>
                            </a>
                        </div>
                        <div class="h-t2">
                            <a href="{{route('product.Details',$rltProduct->slug)}}"> <i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            </li>
            @else
            <h2>No Related Product</h2>
            @endif
            @endforeach
            </ul>
        </div>
    </div>
    </div>
    </div>
</section>

<!-- =========================================================================
                    related part end
==================================================================================== -->

<!-- =========================================================================
                      news part end
==================================================================================== -->
@endsection

@section('FrontendJs')
<script>
    (function () {
        window.inputNumber = function (el) {
            var min = el.attr("min") || false;
            var max = el.attr("max") || false;

            var els = {};

            els.dec = el.prev();
            els.inc = el.next();

            el.each(function () {
                init($(this));
            });

            function init(el) {
                els.dec.on("click", decrement);
                els.inc.on("click", increment);


                function decrement() {
                    var value = el[0].value;
                    if (value > 1) {
                        value--;
                        if (!min || value >= min) {
                            el[0].value = value;
                        }
                    }
                }


                function increment() {
                    var value = el[0].value;
                    value++;
                    if (!max || value <= max) {
                        el[0].value = value++;
                    }
                }
            }
        };
    })();
    inputNumber($(".input_number"));
    inputNumber($(".input_number_2"));

</script>



<script>
    $('#st1').click(function () {
        $(".review").css("font-weight", "100");
        $("#st1").css("font-weight", "900");

    });
    $("#st2").click(function () {
        $(".review").css("font-weight", "100");
        $("#st1, #st2").css("font-weight", "900");

    });
    $("#st3").click(function () {
        $(".review").css("font-weight", "100")
        $("#st1, #st2, #st3").css("font-weight", "900");

    });
    $("#st4").click(function () {
        $(".review").css("font-weight", "100");
        $("#st1, #st2, #st3, #st4").css("font-weight", "900");

    });
    $("#st5").click(function () {
        $(".review").css("font-weight", "100");
        $("#st1, #st2, #st3, #st4, #st5").css("font-weight", "900");
    });


    //click star

    //star

    $('.star').click(function () {
        let star = $(this).attr('value');
        $('#star').attr('value', star);
        $('#givenRatings').html(star);
        $('.setsfy').css('display', star < 4 ? 'block' : 'none');
        $('#btnhid').removeAttr('disabled');
    });

</script>
{{-- https://www.youtube.com/watch?v=O0N22wJu2sk --}}
<script>
    function validateForm() {
        // Reset previous alerts
        $('.alert').remove();

        // Validate each field
        var name = $('#name').val();
        var email = $('#email').val();
        var star = $('#star').val();
        var review = $('#review').val();
        if (name === '') {
            showAlert('Name is required', 'danger');
            return;
        }

        if (email === '') {
            showAlert('Email is required', 'danger');
            return;
        }
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showAlert('Please enter a valid email address', 'danger');
            return;
        }
        if (star === '') {
            showAlert('Stars is required', 'danger');
            return;
            // alert(star);
        }
        if (review === '') {
            showAlert('Review is required', 'danger');
            return;
        }
        submitForm();
    }

    function showAlert(message, type) {
        var alertError = '<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' + message +
            '</div>';
        $('.reviewForm').prepend(alertError);
    }

    function submitForm() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var value = $('#reviewForm').serialize();
        $.ajax({
            url: "{{route('insert.review')}}",
            type: 'POST',
            data: value,
            success: function (data) {
                if (data['success']) {
                    showAlert('Massage Send', 'success');
                    $("#reviewForm")[0].reset();
                } else {
                    showAlert('Something Was Wrong', 'warning');
                }
            }
        });
    }

</script>
@endsection
