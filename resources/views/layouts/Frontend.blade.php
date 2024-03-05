<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="https://computerpoint.com.bd/">
    <meta name="keywords" content="Computer Point">
    <meta name="keywords"
        content="computer point, computer in bd, computerpoint, Laptop shop in Bangladesh, Laptop shop in bd, computer shop in Bangladesh, PC shop in Bangladesh, computer shop in BD, Gaming PC shop in Bangladesh, PC accessories shop in Bangladesh, best computer shop in Bangladesh, Gadget shop in bd, Gadget Shop in Bangladesh, Online Shop in BD, online computer shop in bd, computer accessories online shop in Bangladesh, computer parts shop in bd, Laptop in Bangladesh, Notebook, Laptop, Desktop, Brand PC, computer, computer store Bangladesh, laptop store Bangladesh, gaming, desktop, monitor, Star Tech, computer accessories, Desktop accessories, Laptop accessories, Laptop Online Store in BD, adata, apacer, apple, asus, bangladesh, baseus, belkin, benq, best, boya, brother, cable, camera, canon, GPU, graphics card">
    <title> {{ $pageTitle }}</title>
    <link rel="icon" href="https://i.ibb.co/6JYFDVc/CPoint-logo-ai.jpg" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('Frontend/assets/image/logos/CPoint logo.ai.jpg') }}" type="image/png">
    <meta name="google-site-verification" content="krdKIAlnNIcST3Weh7aBWzfFuex3eLuHtnR9zT_HI-4" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/responsive.css') }}">
    @yield('FrontendCss')
</head>

<body data-bs-spy="scroll" data-bs-target="#navber">

    @include('Frontend.include.header')

    <main>
        @yield('Frontend')
    </main>

    @include('Frontend.include.Footer')


    <script src=" {{ asset('Frontend/assets/js/jquery-1.12.4.min.js') }}"></script>
    <script src=" {{ asset('Frontend/assets/js/slick.min.js') }}"></script>
    <script src=" {{ asset('Frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src=" {{ asset('Frontend/assets/js/jquery.nicescroll.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://kit.fontawesome.com/583a2364d2.js" crossorigin="anonymous"></script>
    <script src="{{ asset('Frontend/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('Frontend/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('Frontend/assets/js/venobox.min.js') }}"></script>
    <script src="{{ asset('Frontend/assets/js/script.js') }}"></script>
    <script>
        $('#search_btn').click(function () {
            var search_input = $('#search_input').val();
            var link = "{{ route('Shop.page') }}" + "?q=" + search_input;
            window.location.href = link;
        });
        $('#search_btn1').click(function () {
            var search_input = $('#search_input1').val();
            var link = "{{ route('Shop.page') }}" + "?q=" + search_input;
            window.location.href = link;
        });

    </script>
    <script>
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
        $(document).ready(function () {
            $('.example-basic-single').select2();
        });

    </script>
    <script>
        function findByCat() {
            var search_input = $('#search_input').val();
            var category_id = $(this).data('item-id');
            var subcategory_id = $(this).data('subitem-id');
            var link = "{{ route('Shop.page') }}" + "?q=" + search_input + "&category_id=" + category_id +
                "&subcategory_id=" + subcategory_id;
            window.location.href = link;
        }

    </script>
    <script>
        jQuery(document).ready(function ($) {
            $('.counUp').counterUp({
                delay: 5,
                time: 1000
            });
        });

    </script>

    <script>
        // Hide button
        $('.hide').click(function () {
            $('.btn-body').fadeOut();
        });

        // show button
        $('.show').click(function () {
            $('.btn-body').fadeIn();

        });

    </script>
    <script>
        function wishlist() {
            event.preventDefault(); // Prevent the default behavior of the anchor element
            var itemId = $(this).data('item-id');
            var csrfToken = $(this).data('csrf-token');

            // Perform your Ajax request to add the product to the wishlist
            $.ajax({
                url: "{{ route('addwishlist.cart') }}",
                type: 'post',
                data: {
                    'product_id': itemId,
                    '_token': csrfToken,
                },
                success: function (response) {
                    showMessage(response.success, response.message);
                    if (response.count !== undefined) {
                        $('#wishCount').text(response.count);
                    }
                },
                error: function (error) {
                    // Handle the error response
                    console.error(error);
                }
            });
        }

        function showMessage(success, message) {
            // Set the message text
            $('#message-container').text(message);

            // Set the background color based on success
            var bgColor = success ? '#ccffcc' : '#ffcccc';
            $('#message-container').css({
                'background-color': bgColor,
                'color': success ? '#006400' : '#8b0000' // Set text color based on success
            });

            // Set the position of the message container to top

            // Fade in the message container
            $('#message-container').fadeIn();

            // After a delay, fade out the message container
            setTimeout(function () {
                $('#message-container').fadeOut();
            }, 1000); // Adjust the duration (in milliseconds) as needed
        }

    </script>
    @yield('FrontendJs')
</body>

</html>
