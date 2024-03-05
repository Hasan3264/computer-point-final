@extends('layouts.Frontend')
@section('FrontendCss')
<style>
    .sdlldf {
        margin-top: 50px;
        border-radius: 10px;
        padding: 20px;
        background-color: #e5e5e5;
    }

    .sdlldf h5 {
        color: #000000;
        font-weight: 600;
        font-size: 25px;
        font-family: "Poppins", sans-serif;
        margin-bottom: 20px;
    }

    .sdlldf p {
        color: #303030;
        font-weight: 400;
        font-size: 18px;
        font-family: "Poppins", sans-serif;
        margin-bottom: 20px;
        text-align: justify;
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
<div class="container ">
    <div class="row  sdlldf">
        <section class="account_section section_space">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 account_menu">
                        <div class="nav account_menu_list flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <button class="nav-link text-start active w-100" id="v-pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                                aria-selected="true">Terms and Conditions</button>
                            <button class="nav-link text-start w-100" id="v-pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-profile" type="button" role="tab"
                                aria-controls="v-pills-profile" aria-selected="false">Refund Policy</button>
                            <button class="nav-link text-start w-100" id="v-pills-messages-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-messages" type="button" role="tab"
                                aria-controls="v-pills-messages" aria-selected="false">Privacy policy <br> Payment
                                policy</button>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content bg-light p-3" id="v-pills-tabContent">
                            <div class="tab-pane fade show active text-center" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
                                <h5>Terms and Conditions</h5>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab">
                                <h5 class="text-center">Refund Policy</h5>
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                aria-labelledby="v-pills-messages-tab">
                                <h5 class="text-center pb-3">Privacy Policy</h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
</div>

</div>
@endsection
