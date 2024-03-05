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
        margin-bottom: 10px;
    }

    .sdlldf h2 {
        color: #303030;
        font-weight: 600;
        font-size: 21px;
        font-family: "Poppins", sans-serif;
        margin-bottom: 10px;
    }

    .sdlldf p {
        color: #303030;
        font-weight: 400;
        font-size: 17px;
        font-family: "Poppins", sans-serif;
        margin-bottom: 10px;
        text-align: justify;
    }

    /* Apply some basic styles to the form */
    .sdlldf form {
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: none;
    }

    /* Style form groups */
    .sdlldf .form-group {
        margin-bottom: 20px;
    }

    /* Style labels */
    .sdlldf label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    /* Style input fields */
    .sdlldf input[type="text"],
    .sdlldf input[type="email"],
    .sdlldf input[type="file"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    /* Style submit button */
    .sdlldf .btn {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    /* Add some hover effect to the button */
    .sdlldf .btn:hover {
        background-color: #45a049;
    }

</style>
@endsection
@section('Frontend')
<div class="container ">
    <div class="row  sdlldf">
        <div class="col">
            <h5>Computer Point</h5>
            @if (App\Models\creear::latest()->get()->count() > 0)
            @foreach (App\Models\creear::latest()->get() as $career)
            <div class="duv p-4 mb-1" style="background-color: #e5e5e579; border: 1px solid #000;">
                <h5>
                    {{$career->designation}}
                </h5>
                <p>
                    {!! $career->job_details !!}
                </p>
                <p>
                    Salary: {{ $career->salary}}
                </p>
                <p>
                    Aplicatin last Date: {{ $career->last_date}}
                </p>
                <p>
                    Vacancy: {{ $career->vacancy  }}
                </p>
                <a class="btn btn-info" id="buttonToggle">Apply Now</a>
                <form action="{{route('Applicaton.insert')}}" method="POST" id="toggleContent" name="contactForm"
                    class="contactForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" id="name" required name="name">
                    </div>
                    <input type="hidden" name="vacancyId" value="{{$career->id}}">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" id="email1" required name="email">
                    </div>
                    <div class="form-group">
                        <label for="">Expected Salary</label>
                        <input type="number" id="salary" required name="salary">
                    </div>
                    <div class="form-group">
                        <label for="">Cv</label>
                        <input type="file" required name="file" id="file" accept=".pdf">
                        <p> *Pdf Only</p>
                    </div>
                    <button onclick="validateForm()" type="button" class="btn">Submit</button>
                    {{-- <button type="submit" class="btn">Submit</button> --}}
                </form>
            </div>

            @endforeach
            @else
            <p>We Dont Have Any Vacancy Now But Keep Eye On
            </p>
            @endif

        </div>
    </div>

</div>
@endsection
@section('FrontendJs')
<script>
    document.getElementById("buttonToggle").addEventListener("click", function () {
        var form = document.getElementById("toggleContent");
        form.style.display = (form.style.display === "none" || form.style.display === "") ? "block" : "none";
    });



    function validateForm() {
        // Reset previous alerts
        $('.alert').remove();

        // Validate each field
        var name = $('#name').val();
        var email = $('#email1').val();
        var Salary = $('#salary').val();
        var file = $('#file').val();

        if (name === '') {
            showAlert('Name is required', 'danger');
            return;
        }
        if (email === '') {
            showAlert('Email is required', 'danger');
            return;
        }
        if (Salary === '') {
            showAlert('Salary is required', 'danger');
            return;
        }
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showAlert('Please enter a valid email address', 'danger');
            return;
        }

        if (file === '') {
            showAlert('Pdf is required', 'danger');
            return;
        }
        if (!file.toLowerCase().endsWith('.pdf')) {
            showAlert('Please select a PDF file', 'danger');
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
        var formData = new FormData($('#toggleContent')[0]);

        $.ajax({
            url: "{{ route('Applicaton.insert') }}",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            cache: false, // Set to false to prevent jQuery from caching the upload request
            success: function (data) {
                // handle success
                if (data.success) {
                    showAlert(data.success, 'success');
                    $("#toggleContent")[0].reset();
                } else {
                    showAlert('Something Went Wrong', 'warning');
                }
            },
            error: function (xhr, status, error) {
                // handle error
                showAlert('Error: ' + error, 'danger');
            }
        });
    }

</script>

@endsection
