@extends('layouts.Frontend')

@section('Frontend')
@include('components.success')
<!-- =========================================================================
                              banner part start
==================================================================================== -->
<section id="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 slider">
                {{-- @foreach (App\Models\banner::all() as $banners)
                 <a href="{{$banners->banner_link}}">
                    <img class="w-100 img-fluid" src="{{asset('uploads/banner')}}/{{$banners->banner_preview}}" alt="">
                 </a>
                @endforeach --}}
                <img class="w-100 img-fluid" src="{{asset('Frontend/assets/image/banner/BlueandPurple GradientLaptop SaleBanner.jpg')}}" alt="">
            </div>
            <div class="col-lg-4  JSSSLKD">
                <img class="w-100 img-fluid" src="{{asset('Frontend/assets/image/banner/2.jpg')}}" alt="">
            </div>
        </div>


    </div>

</section>
<!-- =========================================================================
                            banner part end
==================================================================================== -->
<!-- =========================================================================
                          quick sell part  start
==================================================================================== -->
 @include('components.category')
<!-- =========================================================================
                          quick sell part  end
==================================================================================== -->
<!-- =========================================================================
                           mixin it part start
==================================================================================== -->
<section id="mixinpart">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto mixinpart">
                <div class="mixin-head d-flex" style="justify-content: space-between;">
                    <h3>Popular products</h3>
                    <ul class="nav nav-pills mb-3 class-manu" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="camera" data-bs-toggle="pill"
                                data-bs-target="#camera-text" type="button" role="tab" aria-controls="camera-text"
                                aria-selected="true">Desktop</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="laptop" data-bs-toggle="pill" data-bs-target="#laptop-text"
                                type="button" role="tab" aria-controls="laptop-text"
                                aria-selected="false">Laptops</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tablets" data-bs-toggle="pill" data-bs-target="#tablets-text"
                                type="button" role="tab" aria-controls="tablets-text"
                                aria-selected="false">Monitors</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="mouse" data-bs-toggle="pill" data-bs-target="#mouse-text"
                                type="button" role="tab" aria-controls="mouse-text"
                                aria-selected="false">Accessories</button>
                        </li>
                    </ul>
                </div>
                <div class="tab-content class-inner" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="camera-text" role="tabpanel" aria-labelledby="camera">
                        <ul class="d-flex flex-wrap">
                            @foreach (App\Models\Product::where('category_id',
                            2)->where('subcategory_id',2)->latest('created_at')->take(10)->get() as $Pdesktop )
                            <li class="ul-li">
                                <div class="card">
                                    <a onclick="wishlist.call(this)" data-item-id="{{$Pdesktop->id}} "
                                        data-csrf-token="{{ csrf_token() }}">
                                        <i class="icon bi bi-heart"></i>
                                    </a>
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
                                        <x-ratings :productId="$Pdesktop->id" />
                                    </div>
                                    <div class="hd">
                                        <div class="hidden-text d-flex" style="justify-content: space-between;">
                                            <div class="h-t1">
                                                <a href="{{route('add.cart', $Pdesktop->id)}}" class="d-flex" style="justify-content: space-between;"><p><i class="bi bi-cart3"></i></p></a>
                                            </div>
                                            <div class="h-t2">
                                                <a href="{{route('product.Details',$Pdesktop->slug)}}"> <i
                                                        class="bi bi-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            @endforeach



                        </ul>
                    </div>

                    <div class="tab-pane fade " id="laptop-text" role="tabpanel" aria-labelledby="laptop">
                        <ul class="d-flex flex-wrap">
                            @foreach (App\Models\Product::where('category_id', 4)->where('subcategory_id',
                            2)->latest('created_at')->take(10)->get()
                            as $pLaptops)
                            <li class="ul-li">
                                <div class="card">
                                    <a href=""> <i class="icon bi bi-heart"></i></a>
                                    <div class="img-part">
                                        <a href="{{route('product.Details',$pLaptops->slug)}}"><img
                                                src="{{asset('uploads/product/preview')}}/{{($pLaptops->Product_preview)}}"
                                                class="w-100 img-fluid" alt=""></a>
                                    </div>
                                    <div class="card-text">
                                        <a href="">{{$pLaptops->product_name}}</a>
                                        <div class="ppp d-flex justify-content-between">
                                            <p>Tk {{$pLaptops->after_discount}}</p>
                                            <del>Tk {{$pLaptops->product_price}}</del>
                                        </div>
                                        <x-ratings :productId="$pLaptops->id" />
                                    </div>
                                    <div class="hd">
                                        <div class="hidden-text d-flex" style="justify-content: space-between;">
                                            <div class="h-t1">
                                                <a href="{{route('add.cart',$pLaptops->id)}}" class="d-flex" style="justify-content: space-between;"><p><i class="bi bi-cart3"></i></p> </a>
                                            </div>
                                            <div class="h-t2">
                                                <a href="{{route('product.Details',$pLaptops->slug)}}"> <i
                                                        class="bi bi-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="tab-pane fade" id="tablets-text" role="tabpanel" aria-labelledby="tablets">
                        <ul class="d-flex flex-wrap">
                            @foreach (App\Models\Product::where('category_id', 1)->where('subcategory_id',
                            2)->latest('created_at')->take(10)->get()
                            as $pMonitors)
                            <li class="ul-li">
                                <div class="card">
                                    <a href=""> <i class="icon bi bi-heart"></i></a>
                                    <div class="img-part">
                                        <a href="{{route('product.Details',$pMonitors->slug)}}"><img
                                                src="{{asset('uploads/product/preview')}}/{{($pMonitors->Product_preview)}}"
                                                class="w-100 img-fluid" alt=""></a>
                                    </div>
                                    <div class="card-text">
                                        <a href="">{{$pMonitors->product_name}}</a>
                                        <div class="ppp d-flex justify-content-between">
                                            <p>Tk {{$pMonitors->after_discount}}</p>
                                            <del>Tk {{$pMonitors->product_price}}</del>
                                        </div>
                                        <x-ratings :productId="$pMonitors->id" />
                                    </div>
                                    <div class="hd">
                                        <div class="hidden-text d-flex" style="justify-content: space-between;">
                                            <div class="h-t1">
                                                <a href="{{route('add.cart',$pMonitors->id)}}" class="d-flex" style="justify-content: space-between;"><p><i class="bi bi-cart3"></i></p> </a>
                                            </div>
                                            <div class="h-t2">
                                                <a href="{{route('product.Details',$pMonitors->slug)}}"> <i
                                                        class="bi bi-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="mouse-text" role="tabpanel" aria-labelledby="mouse">
                        <ul class="d-flex flex-wrap">
                            <ul class="d-flex flex-wrap">
                                @foreach (App\Models\Product::where('category_id', 5)->latest('created_at')->take(10)->get()
                                as $pAccessories)
                                <li class="ul-li">
                                    <div class="card">
                                        <a href=""> <i class="icon bi bi-heart"></i></a>
                                        <div class="img-part">
                                            <a href="{{route('product.Details',$pAccessories->slug)}}"><img
                                                    src="{{asset('uploads/product/preview')}}/{{($pAccessories->Product_preview)}}"
                                                    class="w-100 img-fluid" alt=""></a>
                                        </div>
                                        <div class="card-text">
                                            <a href="">{{$pAccessories->product_name}}</a>
                                            <div class="ppp d-flex justify-content-between">
                                                <p>Tk {{$pAccessories->after_discount}}</p>
                                                <del>Tk {{$pAccessories->product_price}}</del>
                                            </div>
                                            <x-ratings :productId="$pAccessories->id" />
                                        </div>
                                        <div class="hd">
                                            <div class="hidden-text d-flex" style="justify-content: space-between;">
                                                <div class="h-t1">
                                                    <a href="{{route('add.cart',$pAccessories->id)}}" class="d-flex"
                                                        style="justify-content: space-between;"><p><i class="bi bi-cart3"></i></p> </a>
                                                </div>
                                                <div class="h-t2">
                                                    <a href="{{route('product.Details',$pAccessories->slug)}}"> <i
                                                            class="bi bi-eye"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
                           mixin it part end
==================================================================================== -->

<!-- =========================================================================
                            news part end
==================================================================================== -->

<!-- =========================================================================
                            news part end
==================================================================================== -->

<!-- =========================================================================
                           qualification part start
==================================================================================== -->
<!-- =========================================================================
                           qualification part end
==================================================================================== -->
<!-- =========================================================================
                           latest event part end
==================================================================================== -->
<section id="clints-review">
    <div class="container">
        <div class="row mb-3  ">
            <div class="sdkldjd d-flex justify-content-between">
                <h2>Latest Product</h2>
                <a href="{{route('Shop.page')}}">View All</a>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-12 d-flex kjuh">
                @foreach (App\Models\Product::latest('created_at')->get() as $lProduct)
                <div class="card">
                    <a href=""> <i class="icon bi bi-heart"></i></a>
                    <div class="img-part">
                        <a href="{{route('product.Details',$lProduct->slug)}}"><img
                                src="{{asset('uploads/product/preview')}}/{{($lProduct->Product_preview)}}"
                                class="w-100 img-fluid" alt=""></a>
                    </div>
                    <div class="card-text">
                        <a href="">{{$lProduct->product_name}}</a>
                        <div class="ppp d-flex justify-content-between">
                            <p>Tk {{$lProduct->after_discount}}</p>
                            <del>Tk {{$lProduct->product_price}}</del>
                        </div>
                        <x-ratings :productId="$lProduct->id" />
                    </div>
                    <div class="hd">
                        <div class="hidden-text d-flex" style="justify-content: space-between;">
                            <div class="h-t1">
                                <a href="{{route('add.cart',$lProduct->id)}}" class="d-flex" style="justify-content: space-between;"><p><i class="bi bi-cart3"></i></p> </a>
                            </div>
                            <div class="h-t2">
                                <a href="{{route('product.Details',$lProduct->slug)}}"> <i class="bi bi-eye"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
<!-- =========================================================================
                           latest event part end
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
<!-- =========================================================================
                            resent  part end
==================================================================================== -->

<section id="latest">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 header">
                <ul class="d-flex" style="justify-content: space-between;">
                    <li>
                        <h5>Recent View</h5>
                    </li>
                </ul>
            </div>
        </div>

        <div class="content-main d-flex flex-wrap">
            @foreach ($all_recent_product as $rProduct)
            <div class="card">
                <a href=""> <i class="icon bi bi-heart"></i></a>
                <div class="img-part">
                    <a href="{{route('product.Details',$rProduct->slug)}}"><img
                            src="{{asset('uploads/product/preview')}}/{{($rProduct->Product_preview)}}"
                            class="w-100 img-fluid" alt=""></a>
                </div>
                <div class="card-text">
                    <a href="">{{$rProduct->product_name}}</a>
                    <div class="ppp d-flex justify-content-between">
                        <p>Tk {{$rProduct->after_discount}}</p>
                        <del>Tk {{$rProduct->product_price}}</del>
                    </div>
                    <x-ratings :productId="$rProduct->id" />
                </div>
                <div class="hd">
                    <div class="hidden-text d-flex" style="justify-content: space-between;">
                        <div class="h-t1">
                            <a href="{{route('add.cart',$rProduct->id)}}" class="d-flex" style="justify-content: space-between;"><p><i class="bi bi-cart3"></i></p> </a>
                        </div>
                        <div class="h-t2">
                            <a href="{{route('product.Details',$rProduct->slug)}}"> <i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            @endforeach
        </div>


    </div>
</section>
<!-- =========================================================================
                            resent part end
==================================================================================== -->
@endsection
@section('FrontendJs')
@endsection
