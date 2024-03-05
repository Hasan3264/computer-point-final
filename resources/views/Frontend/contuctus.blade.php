@extends('layouts.Frontend')
@section('FrontendCss')
<style>
    form label {
        color: #3A3A3A;
        font-weight: 500;
        font-size: 20px;
        font-family: "Poppins", sans-serif;
        margin-top: 20px;
    }

    .one {
        margin-top: 9px;
    }

    .text span {
        display: block;
        color: #3A3A3A;
        font-weight: 500;
        font-size: 30px;
        font-family: "Poppins", sans-serif;
        margin-top: 20px;
    }

    h2 {
        color: #3A3A3A;
        font-weight: 700;
        font-size: 40px;
        font-family: "Poppins", sans-serif;
        margin-top: 20px;
        margin-bottom: 40px;
    }

    p,span {
        color: #151515;
        font-weight: 400;
        font-size: 18px;
        font-family: "Poppins", sans-serif;
        /* margin-top: 20px;
        margin-bottom: 40px; */
    }

</style>
@endsection
@section('Frontend')
<div class="container mx-auto">
    @include('components.success')

    <div class="row justify-content-center">
        <div class="col-md-6 text-center mt-5">
            <h2 class="heading-section">Contact Us</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="wrapper">
                <div class="row no-gutters mb-5">
                    <div class="col-md-7">
                        <div class="contact-wrap w-100 p-md-5 p-4">
                            <div id="form-message-warning" class="mb-4"></div>
                            <form method="POST" id="contactForm" name="contactForm" class="contactForm" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="label" for="name">Full Name</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="label" for="name">Full Name</label>
                                            <input type="email" class="form-control" name="email" id="name3" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="label" for="subject">Subject</label>
                                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="label" for="#">Message</label>
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <div class="form-group">
                                            <button type="button" onclick="validateForm()" class="btn btn-primary">Send Message</button>
                                            <div class="submitting"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5 d-flex mt-9">

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14607.7520244341!2d90.38196208349551!3d23.74959002300149!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b9351f281355%3A0x3987524f014a1a48!2sComputer%20Point%20BD!5e0!3m2!1sen!2sbd!4v1698216825127!5m2!1sen!2sbd"
                            width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="dbox w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-map-marker"></span>
                        </div>
                        <div class="text">
                            <span>Address:</span>
                            <p id="myaddresh">
                                #1 Dhanmondi R/A, Road # 10 ALTA PLAZA 3rd Floor
                                Dhaka-1205, Bangladesh
                            </p>
                            <dd class="btn btn-success mt-3" id="xcxcx" onclick="copyContent()">Copy!</dd>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dbox w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-phone"></span>
                        </div>
                        <div class="text">
                            <span>Phone:</span>
                            <p class="one">02-58156444</p>
                            <p class="one">02-58153918</p>
                            <p class="one">+8801678012456</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dbox w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-paper-plane"></span>
                        </div>
                        <div class="text">
                            <span>Email:</span>
                            <p class="one"> computerpoint@rocketmail.com </p>

                            <p class="one"> help.cpoint@rocketmail.com</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="dbox w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-whatsapp"></span>
                        </div>
                        <div class="text mt-2">
                            <a href="https://api.whatsapp.com/send?phone=+8801678012455&text=Hi I Have A Query"
                                target="_blank"><img
                                    src="{{asset('Frontend/assets/image/footer/WhatsAppButtonGreenLarge.svg')}}"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection

@section('FrontendJs')
<script>
    const copyContent = async () => {
        try {
            let text = document.getElementById('myaddresh').innerHTML;
            let buttonElement = document.getElementById('xcxcx');
            await navigator.clipboard.writeText(text);
            buttonElement.innerHTML = "copyed";
        } catch (err) {
            console.error('Failed to copy: ', err);
        }
    }
    // $('#one').dblclick(async function () {
    //     try {
    //         let text = document.getElementById('one').innerHTML;
    //         await navigator.clipboard.writeText(text);
    //         alert('copied')
    //     } catch (err) {
    //         console.error('Failed to copy: ', err);
    //     }
    // });

    $(document).on('dblclick', '.one', async function () {
        try {
            let text = $(this).text();
            await navigator.clipboard.writeText(text);
            alert('Copied')
        } catch (err) {
            console.error('Failed to copy: ', err);
        }
    });

</script>
<script>

</script>


<script>

function validateForm() {
    // Reset previous alerts
    $('.alert').remove();

    // Validate each field
    var name = $('#name').val();
    var email = $('#name3').val();
    var subject = $('#subject').val();
    var message = $('#message').val();

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
    if (subject === '') {
        showAlert('Subject is required', 'danger');
        return;
    }
     if (message === '') {
        showAlert('Massage is required', 'danger');
        return;
    }
    submitForm();
}

function showAlert(message, type) {
    var alert = '<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' + message +
                '</div>';

    $('.contactForm').prepend(alert);
}

function submitForm() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var value = $('#contactForm').serialize();
            $.ajax({
                url: "{{route('contact.insert')}}",
                type: 'POST',
                data: value,
                success: function (data) {
                    if(data['success']){
                        showAlert('Massage Send', 'success');
                        $("#contactForm")[0].reset();
                    }else{
                        showAlert('Something Was Wrong', 'warning');
                    }
                }
            });
        }

</script>
@endsection
