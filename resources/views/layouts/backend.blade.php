<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Royal Hotel |Dashboard</title>
    <link rel="icon" href="{{URL::to('front/image/logo.jpg')}}" type="image/png">

    <!-- Fontfaces CSS-->
    <link href="{{asset('back/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('back/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('back/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('back/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('back/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('back/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('back/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('back/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('back/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('back/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('back/css/theme.css')}}" rel="stylesheet" media="all">
    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <!-- include fullcalendar css/js -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

    <script src='{{asset('back/calendar/dhtmlxscheduler.js?v=5.2.1')}}' type="text/javascript" charset="utf-8"></script>
    <script src='{{asset('back/calendar/ext/dhtmlxscheduler_timeline.js?v=5.2.1')}}' type="text/javascript" charset="utf-8"></script>

    <link rel='stylesheet' type='text/css' href='{{asset('back/calendar/dhtmlxscheduler_material.css?v=5.2.1')}}'>

</head>

<body class="animsition" >
<div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="index.html">
                        <img src="images/icon/logo.png" alt="CoolAdmin" />
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="index.html">Dashboard 1</a>
                            </li>
                            <li>
                                <a href="index2.html">Dashboard 2</a>
                            </li>
                            <li>
                                <a href="index3.html">Dashboard 3</a>
                            </li>
                            <li>
                                <a href="index4.html">Dashboard 4</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="chart.html">
                            <i class="fas fa-chart-bar"></i>Charts</a>
                    </li>
                    <li>
                        <a href="table.html">
                            <i class="fas fa-table"></i>Tables</a>
                    </li>
                    <li>
                        <a href="form.html">
                            <i class="far fa-check-square"></i>Forms</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-calendar-alt"></i>Calendar</a>
                    </li>
                    <li>
                        <a href="map.html">
                            <i class="fas fa-map-marker-alt"></i>Maps</a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-copy"></i>Pages</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="login.html">Login</a>
                            </li>
                            <li>
                                <a href="register.html">Register</a>
                            </li>
                            <li>
                                <a href="forget-pass.html">Forget Password</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-desktop"></i>UI Elements</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="button.html">Button</a>
                            </li>
                            <li>
                                <a href="badge.html">Badges</a>
                            </li>
                            <li>
                                <a href="tab.html">Tabs</a>
                            </li>
                            <li>
                                <a href="card.html">Cards</a>
                            </li>
                            <li>
                                <a href="alert.html">Alerts</a>
                            </li>
                            <li>
                                <a href="progress-bar.html">Progress Bars</a>
                            </li>
                            <li>
                                <a href="modal.html">Modals</a>
                            </li>
                            <li>
                                <a href="switch.html">Switchs</a>
                            </li>
                            <li>
                                <a href="grid.html">Grids</a>
                            </li>
                            <li>
                                <a href="fontawesome.html">Fontawesome Icon</a>
                            </li>
                            <li>
                                <a href="typo.html">Typography</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
       @include('includes.backSidebar')
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->
        @include('includes.backHeader')
        <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        @yield('content')
        <!-- END MAIN CONTENT-->


        <!-- END PAGE CONTAINER-->
    </div>

</div>

<!-- Jquery JS-->
<script src="{{asset('back/vendor/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap JS-->
<script src="{{asset('back/vendor/bootstrap-4.1/popper.min.js')}}"></script>
<script src="{{asset('back/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
<!-- Vendor JS       -->
<script src="{{asset('back/vendor/slick/slick.min.js')}}">
</script>
<script src="{{asset('back/vendor/wow/wow.min.js')}}"></script>
<script src="{{asset('back/vendor/animsition/animsition.min.js')}}"></script>
<script src="{{asset('back/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
</script>
<script src="{{asset('back/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('back/vendor/chartjs/Chart.bundle.min.js')}}"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>


<!-- Main JS-->
<script src="{{asset('back/js/main.js')}}"></script>
<script src="{{asset('back/vendor/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('back/vendor/dataTables/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );

    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
</body>

</html>
<!-- end document-->

