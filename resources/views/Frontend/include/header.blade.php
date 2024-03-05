<style>
    .sdddffg {
        font-family: monospace;
        font-size: 3em;
        animation: color-change 1s infinite;
    }
.accordion-button:not(.collapsed) {
     color: #000;
    background-color: transparent;
    box-shadow: none;
}
.accordion-button:focus{
    border-color: none !important;
}
.accordion-button,.accordion-body {
    padding: 5px 0px;
}

    @keyframes color-change {
        0% {
            color: red;
        }

        50% {
            color: blue;
        }

        100% {
            color: red;
        }
    }

    .navbar-menu a {
        display: block;
        padding: 5px 2px !important;
    }
   .resnav a{
       color: #000;
   }

#message-container {
    display: none;
    position: fixed;
    top: 70px;
    left: 50%;
    transform: translate(-50%);
    width: 20%;
    padding: 10px;
    border-radius: 5px;
    text-align: center;
}

</style>
<header>
    <div class="header">
        <div class="container">
            <div class="h-ptop d-flex" style="justify-content: space-between;">
                <p class="mt-0">Need help? Call us: +8801678012455</p>
                <ul class="d-flex">
                    <li><a href="" class="mt-0">Best Deal</a></li>
                    <li><a href="{{route('career.index')}}" class="mt-0 sdddffg">Career With Us</a></li>
                    <li><a href="" class="mt-0"><i class="bi bi-car-front"></i>Track your order</a></li>
                </ul>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container sdsdsa">
                <div class="row">
                    <div class="logo sdfsdfs col-lg-3 col-md-2 col-5">
                        <a href="{{route('Front.index')}}"><img class="w-full img-fluid"
                                src="{{asset('Frontend/assets/image/header/Untitled-1-removebg-preview(3).png')}}"
                                alt=""></a>
                    </div>
                    <div class="form-controll sdfsdfswe col-xl-5 col-lg-5 col-md-7 col-7">
                        <input type="text" id="search_input" value="{{@$_GET['q']}}" name="search"
                            placeholder="Search Prudcts...">
                        <button class="btn" id="search_btn">Search</button>
                    </div>

                    {{-- {{ Auth::guard('customer')->user()->name }} --}}
                    <div class="col-lg-4 col-xl-4 col-12 col-md-5 h-b-l text-white ">
                        <ul class="d-flex ms-auto">
                            @auth('customer')
                            <div class="sign-in">
                                <li type="button" class="btn line sign"><a href="{{route('customer.profile')}}"><i
                                            class="bi bi-person"></i> {{ Auth::guard('customer')->user()->name }}</a>
                                </li>
                            </div>
                            @else
                            <div class="sign-in">
                                <li type="button" class="btn line sign" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><a><i class="bi bi-person"></i>sign in</a></li>


                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content form_body">
                                            <ul class="nav nav-pills mb-5 text-black" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="pills-home-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-home" type="button"
                                                        role="tab" aria-controls="pills-home" aria-selected="true">sign
                                                        in</button>
                                                </li>
                                                <li class="nav-item ms-auto" role="presentation">
                                                    <button class="nav-link" id="pills-profile-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-profile"
                                                        type="button" role="tab" aria-controls="pills-profile"
                                                        aria-selected="false">sign up</button>
                                                </li>

                                            </ul>
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active " id="pills-home" role="tabpanel"
                                                    aria-labelledby="pills-home-tab">

                                                    @if($errors->any())
                                                    <div class="alert alert-danger">
                                                        {{ implode(', ', $errors->all()) }}
                                                    </div>
                                                    @endif
                                                    <form method="POST" action="{{route('customer.login')}}">
                                                        @csrf
                                                        <div class="mb-4">
                                                            <label for="exampleInputEmail1" class="form-label"> email
                                                                address *</label>
                                                            <input type="email" class="form-control" id="email"
                                                                name="email" aria-describedby="emailHelp" required>

                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputPassword1"
                                                                class="form-label">Password*</label>
                                                            <input type="password" name="password" class="form-control"
                                                                required>
                                                        </div>
                                                        <div class="mb-4 form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">Remember
                                                                me</label>
                                                            <a href="#">Lost your password?</a>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary button_in">Sign
                                                            in</button>
                                                    </form>
                                                    <div class="text-center social">
                                                        <p>Sign in with social account</p>
                                                        <a href="#"><i class="fab fa-google"></i></a>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                                    aria-labelledby="pills-profile-tab">
                                                    @if($errors->any())
                                                    <div class="alert alert-danger">
                                                        {{ implode(', ', $errors->all()) }}
                                                    </div>
                                                    @endif
                                                    <form name="InsertSubForm" id="InsertSubForm" method="POST"
                                                        action="{{route('customer.input')}}">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="Name" class="form-label">Name</label>
                                                            <input type="text" name="username" class="form-control"
                                                                id="username" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Your
                                                                Email
                                                                address</label>
                                                            <input type="email" name="email" class="form-control"
                                                                id="email" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="exampleInputPassword1"
                                                                class="form-label">Password*</label>
                                                            <div class="input-group">
                                                                <input type="password" class="form-control"
                                                                    id="passwodfd" name="password" value="ssllddf"
                                                                    required>
                                                                <button type="button" class="btn btn-outline-secondary"
                                                                    id="password-toggle"
                                                                    onclick="togglePasswordVisibility()">Show
                                                                    Password</button>
                                                            </div>
                                                        </div>

                                                        {{-- <div class="mb-3">
                                                            <label for="exampleInputPassword2"
                                                                class="form-label">Confirm Password*</label>
                                                            <div class="input-group">
                                                                <input type="password" class="form-control"
                                                                    id="exampleInputPassword2" name="confirm_password"
                                                                    required>
                                                                <button type="button" class="btn btn-outline-secondary"
                                                                    id="showConfirmPassword">Show</button>
                                                            </div>
                                                        </div> --}}

                                                        <div class="mb-3 para">
                                                            <span>Your personal data will be used to support your
                                                                experience
                                                                throughout this website, to manage access to your
                                                                account,
                                                                and for other purposes described in our <a
                                                                    href="#">privacy
                                                                    policy.</a></span>

                                                        </div>
                                                        <div class="mb-3 form-check">
                                                            <input type="checkbox" class="form-check-input" id="check"
                                                                name="check" required>
                                                            <label class="form-check-label">I agree to the <a>privacy
                                                                    policy</a></label>
                                                        </div>
                                                        <button type="submit" onclick="subinsert()"
                                                            class="btn btn-primary" id="submitButton">Sign up</button>
                                                    </form>
                                                    <div class="text-center social">
                                                        <p>Sign in with social account</p>
                                                        <a href="#"><i class="fab fa-google"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endauth
                            @auth('customer')

                            <li><a href="{{route('wishlist.show')}}"><i class="bi bi-heart"></i>
                              <p id="wishCount">{{App\Models\wishlist::where('customer_id', Auth::guard('customer')->id())->count()
                            }}</p> Wishlist
                            </a></li>
                            @else
                               <li><a href=""><i class="bi bi-heart"></i>
                                 <p>0</p> Wishlist
                               </a></li>
                            @endauth
                            <li data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                aria-controls="offcanvasRight"><a href="#"><i class="bi bi-cart3"></i>
                                    @php
                                    $ip = $_SERVER['REMOTE_ADDR'];

                                    $findBylogin = App\Models\Cart::where('customer_id', Auth::guard('customer')->id());
                                    $findbyIp = App\Models\Cart::where('customer_id', $ip);
                                    $findcont;
                                    if ($findBylogin->count() > 0) {
                                    $findcont =$findBylogin;
                                    }elseif ($findbyIp->count()>0) {
                                    $findcont = $findbyIp;
                                    }
                                    else {
                                    $findcont = '';
                                    }

                                    @endphp
                                    <p id="countfind">
                                        {{-- {{$findcont == 0? '0' : $findcont->count()}} --}}
                                        @if ($findcont != '')
                                        {{$findcont->count()}}
                                        @else
                                        {{0}}
                                        @endif
                                    </p> Cart
                                </a>
                            </li>
                        </ul>


                        <div class="offcanvas offcanvas-end main_cart text-black" tabindex="-1" id="offcanvasRight"
                            aria-labelledby="offcanvasRightLabel">
                            <div class="offcanvas-header shop">
                                <h5 id="offcanvasRightLabel">SHOPPING CART</h5>
                                <button type="button" data-bs-dismiss="offcanvas" aria-label="Close">close <i
                                        class="fas fa-long-arrow-alt-right"></i></button>
                            </div>@if ($findcont != '')
                            <div class="offcanvas-body">
                                @php
                                $subtotal=0;
                                @endphp
                                @foreach ($findcont->get() as $cartproduct)
                                <div id="remove{{ $cartproduct->id }}" class="row cart_row d-flex">
                                    <div class="cart_text">
                                        <h5>{{$cartproduct->relation_product->product_name}}</h5>
                                        <p>{{$cartproduct->quantity}} x
                                            <span>{{$cartproduct->relation_product->after_discount}}</span> =
                                            <span>{{ $cartproduct->quantity*$cartproduct->relation_product->after_discount}}
                                                Tk</span></p>
                                    </div>

                                    <div class="cart_images">
                                        <i onclick="remove.call(this)" data-item-id="{{$cartproduct->id}} "
                                            data-csrf-token="{{ csrf_token() }}" class="fas fa-times"></i>

                                        <img src="{{asset('uploads/product/preview')}}/{{($cartproduct->relation_product->Product_preview)}}"
                                            class="img-fluid w-100" alt="product-1">
                                    </div>
                                </div>
                                @php
                                $subtotal += $cartproduct->relation_product->after_discount*$cartproduct->quantity;
                                @endphp
                                @endforeach
                                <div class="row cart_row_1 d-flex">

                                    <div class="total">
                                        <h5>Subtotal: </h5>
                                    </div>
                                    <div class="total_price">

                                        <p>Tk {{$subtotal}}</p>
                                    </div>
                                </div>
                                @php
                                session([
                                'sub_total'=> $subtotal,
                                'customer_id'=> $cartproduct->customer_id
                                ])
                                @endphp
                                <div class="row">
                                    <div class="col-lg-12 p-0">
                                        <div class="cart_button">
                                            @if ($findcont->count() > 0)
                                            <a href="{{route('Cart.index')}}" class="btn btn-rounded">View Cart</a>
                                            <a href="{{route('check.Out')}}" class="btn btn-rounded">checkout</a>
                                            @else
                                            <a class="btn btn-rounded">Add Product To Cart</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else

                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div id="message-container"></div>
    <nav id="navbar" class="navbar navigation   navbar-expand-md main-manu navigation">

        <div class="container px-0">
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="bi bi-distribute-vertical"></i>
            </button>
            <div class=" navbar-nav ms-0 collapse pera kopal  navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-menu navbar-nav ms-0   mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('Front.index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="" href="{{route('Shop.page')}}">Shop</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="" href="{{route('Desktop')}}">Desktop</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="" href="{{route('Laptop')}}">Laptop</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="" href="{{route('Accessories.All')}}">Accessories</i></a>
                        <ul>
                            <li><a href="{{route('Accessories.Motherboard')}}">MotherBoard</a></li>
                            <li><a href="{{route('Accessories.Webcam')}}">Webcam</a></li>
                            <li><a href="{{route('Accessories.Ram')}}">Ram</a></li>
                            <li><a href="{{route('Accessories.Harddisk')}}">Hard Disk</a></li>
                            <li><a href="{{route('Accessories.Pad')}}">Pads</a></li>
                            <li><a href="{{route('Accessories.Monitor')}}">Monitor</a></li>
                            <li><a href="{{route('Accessories.Multiplug')}}">Multiplug</a></li>
                            <li><a href="{{route('Accessories.Pendrive')}}">Pendrive</a></li>
                            <li><a href="{{route('Accessories.Mouse')}}">Mouse</a></li>
                            <li><a href="{{route('Accessories.PSU')}}">Power Supply</a></li>
                            <li><a href="{{route('Accessories.SSD')}}">SSD</a></li>
                            <li><a href="{{route('Accessories.Processor')}}">Processor</a></li>
                            <li><a href="{{route('Accessories.Keyboard')}}">Keyboard</a></li>
                            <li><a href="{{route('Accessories.Cooler')}}">Cooler</a></li>
                            <li><a href="{{route('Accessories.Casing')}}">Casing</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('printer')}}">Printer</a>
                    </li>
                    <li class="nav-item">
                        <a class="" href="{{route('Scanner')}}">Scanner</a>
                    </li>
                    <li class="nav-item">
                        <a class="" href="{{route('Router')}}">Router</a>
                    </li>
                    <li class="nav-item">
                        <a class="">Components</a>
                        <ul>
                            <li><a href="{{route('Sound.System')}}">Sound System</a></li>
                            <li><a href="{{route('Head.phone')}}">Head Phone</a></li>
                            <li><a href="{{route('DockingStation')}}">Docking Station</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="" href="">Mobiles</a>
                        <ul>
                            <li><a href="{{route('Tablets')}}">Tablet</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="" href="">Others</a>
                        <ul>
                            <li><a href="{{route('Server')}}">Server & Storage</a></li>
                            <li><a href="{{route('Projector')}}">Projector</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="" href="{{route('About.us')}}">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="" href="{{route('ContuctUs.page')}}">Contuct Us</a>
                    </li>

                </ul>
            </div>

        </div>

    </nav>
    <div class="min-search mt-2 mx-1">
        <input type="text" id="search_input1" value="{{@$_GET['q']}}" name="search" placeholder="Search Prudcts...">
        <button class="btn" id="search_btn1">Search</button>
    </div>

    <div class="resnav">
        <div class="buttll d-flex">
            <div class="logo min-logo mt-2" style="width:70%;">
                <a href="{{route('Front.index')}}"><img class="w-full img-fluid"
                        src="{{asset('Frontend/assets/image/header/Untitled-1-removebg-preview(3).png')}}" alt=""></a>
            </div>
            <div class="ms-auto">
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i
                        class="bi bi-distribute-vertical"></i></button>
            </div>
        </div>

        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
            aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Select Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                Desktop
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul>
                                    <li class="nav-item">
                                        <a class="" href="{{route('Desktop')}}">Desktop</i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                Laptop
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                               <ul>
                                    <li class="nav-item">
                                        <a class="" href="{{route('Laptop')}}">Laptop</i></a>
                                    </li>
                               </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                Accessories
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul>
                                    <li><a href="{{route('Accessories.Motherboard')}}">MotherBoard</a></li>
                                    <li><a href="{{route('Accessories.Webcam')}}">Webcam</a></li>
                                    <li><a href="{{route('Accessories.Ram')}}">Ram</a></li>
                                    <li><a href="{{route('Accessories.Harddisk')}}">Hard Disk</a></li>
                                    <li><a href="{{route('Accessories.Pad')}}">Pads</a></li>
                                    <li><a href="{{route('Accessories.Monitor')}}">Monitor</a></li>
                                    <li><a href="{{route('Accessories.Multiplug')}}">Multiplug</a></li>
                                    <li><a href="{{route('Accessories.Pendrive')}}">Pendrive</a></li>
                                    <li><a href="{{route('Accessories.Mouse')}}">Mouse</a></li>
                                    <li><a href="{{route('Accessories.PSU')}}">Power Supply</a></li>
                                    <li><a href="{{route('Accessories.SSD')}}">SSD</a></li>
                                    <li><a href="{{route('Accessories.Processor')}}">Processor</a></li>
                                    <li><a href="{{route('Accessories.Keyboard')}}">Keyboard</a></li>
                                    <li><a href="{{route('Accessories.Cooler')}}">Cooler</a></li>
                                    <li><a href="{{route('Accessories.Casing')}}">Casing</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseFour" aria-expanded="false"
                                aria-controls="flush-collapseFour">
                                Printer
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul>
                                    <li>
                                    <a href="{{route('printer')}}">Printer</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseFive" aria-expanded="false"
                                aria-controls="flush-collapseFive">
                                Scanner
                            </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul>
                                    <li class="nav-item">
                                        <a class="" href="{{route('Scanner')}}">Scanner</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseSix" aria-expanded="false"
                                aria-controls="flush-collapseSix">
                                Router
                            </button>
                        </h2>
                        <div id="flush-collapseSix" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                               <ul>
                                    <li class="nav-item">
                                        <a class="" href="{{route('Router')}}">Router</a>
                                    </li>
                               </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<style>
    @media (max-width: 991.98px) {
        .navbar-menu ul {
            width: 100px !important;
        }

        .navbar-menu li {
            margin: 0px 0px !important;
        }

        .navbar-menu a {
            display: block;
            padding: 10px 0px !important;
            width: 100%;
        }

        .navbar-menu ul>li>ul {
            left: 0 !important;
            z-index: 99999;
            top: 30px !important;
        }

        .navbar-menu ul {
            z-index: 9999;
            width: 100% !important;
        }

    }

    @media (min-width: 992px) and (max-width: 1350.98px) {
        .navbar-menu li {
            margin: 0px 5px !important;
        }

        .navbar-menu li:nth-child(5) ul>li>ul,
        .navbar-menu li:nth-child(6) ul>li>ul,
        .navbar-menu li:nth-child(7) ul>li>ul,
        .navbar-menu li:nth-child(8) ul>li>ul,
        .navbar-menu li:nth-child(9) ul>li>ul {
            left: -100%;
        }
    }

    :root {
        /*
    Snagged from Material Design
    https://material.io/design/color/the-color-system.html
*/
        --blue-gray-50: #ECEFF1;
        --blue-gray-100: #CFD8DC;
        --blue-gray-200: #B0BEC5;
        --blue-gray-300: #90A4AE;
        --blue-gray-400: #78909C;
        --blue-gray-500: #607D8B;
        --blue-gray-600: #546E7A;
        --blue-gray-700: #455A64;
        --blue-gray-800: #37474F;
        --blue-gray-900: #263238;

        --transition-timing: 0.3s;
        --transition-timing-function: linear;
    }

    /* All */
    .navbar-menu a {
        display: block;
        padding: 10px 20px;
    }

    .navbar-menu ul a {
        padding: 3px 20px;
    }

    /* Top-level */
    .navbar>.navbar-menu>li>a {
        display: inline-block;
        background: transparent;
        transition: all linear .3s;
        font-weight: 700;
    }

    .navbar>.navbar-menu>li>a:hover,
    .navbar>.navbar-menu>li>a:focus {
        background: #1c2b34;
        color: rgb(120, 4, 4);
    }

    .navbar-menu {
        display: flex;
        justify-content: space-between;
    }

    .navbar-menu,
    .navbar-menu ul {
        margin: 0;
        padding: 0px;
        list-style: none;
        z-index: 999;
    }

    /* Nested */
    .navbar-menu ul {
        position: absolute;
        left: 0;
        top: 100%;
        visibility: hidden;
        opacity: 0;
        width: 200px;
        display: block;
        transition: all linear .3s;
        background: #d0d0d0;
    }

    .navbar-menu ul a {
        transition: all linear 0.3s;
        font-weight: 600;
    }

    .navbar-menu ul a:hover,
    .navbar-menu ul a:focus {
        background: var(--blue-gray-100);
        color: var(--blue-gray-900);
    }

    .navbar-menu ul>li>ul {
        left: 100%;
        top: 0;
    }

    .navbar-menu li:nth-child(7) ul>li>ul {
        left: -100%;
    }

    .navbar-menu li {
        position: relative;
        margin: 0px 10px;
    }

    /*
HACK: Prevents box shadow from child dropdowns
from overlapping its parent dropdown
*/
    .navbar-menu li.has-children>a {
        position: relative;
    }

    .navbar-menu li.has-children>a:after {
        position: absolute;
        content: '';
        top: 0;
        right: 0;
        height: 100%;
        width: 1rem;
        background: inherit;
        z-index: 99;
    }

    /* ENDHACK */

    .navbar-menu li:hover>ul,
    .navbar-menu li:focus-within>ul

    /* IE11+ only */
        {
        display: block;
        visibility: visible;
        opacity: 1;

    }

</style>
<script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById("passwodfd");
        var passwordToggle = document.getElementById("password-toggle");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            passwordToggle.textContent = "Hide Password";
        } else {
            passwordField.type = "password";
            passwordToggle.textContent = "Show Password";
        }
    }

</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function subinsert() {
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        var email = $('#email').val();
        if ($('#username').val() == '') {
            Swal.fire('Plase Enter Username');
            return false;
        }
        else if (!email.match(emailPattern)) {
            Swal.fire('Invalid Email Format');
            return false;
        } else if ($('#password').val() == '') {
            Swal.fire('Plase Enter Password');
            return false;
        }
        if ($('#password').val() < 8) {
            Swal.fire('Password must be at least 8 characters long');
            return false;
        } else if (!$('#check').is(':checked')) {
            Swal.fire('Please Check the Box');
            return false;
        } else {
            return true;
        }
    }

</script>
<script>
    function remove() {
        var itemId = $(this).data('item-id');
        var csrfToken = $(this).data('csrf-token');
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        $.ajax({
            url: "{{ route('Delete.cart')}}",
            type: 'DELETE',
            data: {
                'cart_id': itemId,
                '_token': csrfToken,
            },
            success: function (data) {
                location.reload();
            },
            error: function (xhr, status, error) {
                alert('Failed to remove the item: ' + error);
            }
        });
    }

</script>
