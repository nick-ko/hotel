<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('front/image/favicon.png')}}" type="image/png">
    <title>Royal Hotel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('front/vendors/linericon/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/vendors/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet" href="{{asset('front/vendors/owl-carousel/owl.carousel.min.css')}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('front/css/lightgallery.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    {!! Charts::styles() !!}
</head>
<body>
<!--================Header Area =================-->


@yield('content')

<!--================ footer   =================-->
@include('includes.frontFooter')


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('front/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('front/js/popper.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('front/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('front/js/mail-script.js')}}"></script>
<script src="{{asset('front/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('front/js/mail-script.js')}}"></script>
<script src="{{asset('front/js/stellar.js')}}"></script>
<script src="{{asset('front/vendors/lightbox/simpleLightbox.min.js')}}"></script>
<script src="{{asset('front/js/custom.js')}}"></script>
<script src="{{asset('front/vendors/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('front/vendors/isotope/isotope-min.js')}}"></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="{{asset('front/js/gmaps.min.js')}}"></script>
<!-- contact js -->
<script src="{{asset('front/js/jquery.form.js')}}"></script>
<script src="{{asset('front/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('front/js/contact.js')}}"></script>
<script src="{{asset('front/js/lightgallery.js')}}"></script>
<script src="{{asset('front/js/lightgallery.min.js')}}"></script>
<script src="{{asset('front/js/lg-thumbnail.min.js')}}"></script>
<script src="{{asset('front/js/lg-fullscreen.min.js')}}"></script>
<script src="{{asset('front/js/custom.js')}}"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script>
    // To style only selects with the my-select class
    $('.my-select').selectpicker();
</script>


<script>

        lightGallery(document.getElementById('animated-thumbnials'), {
            thumbnail:true,
            animateThumb: false,
            showThumbByDefault: false
        });


</script>

</body>
</html>
