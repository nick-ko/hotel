@extends('layouts.front')
@section('content')
    <header class="header_area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html"><img src="{{URL::to('front/image/logo.jpg')}}" alt="" style="height: 80px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Acceuil</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">A propos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('service') }}">Services</a></li>
                        <li class="nav-item active"><a class="nav-link" href="{{ route('room') }}">Chambres & suites</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('event') }}">Evenements</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('gallery') }}">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Area =================-->

    <!--================Breadcrumb Area =================-->
    <section class="breadcrumb_area">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="page-cover text-center">
                <h2 class="page-cover-tittle">{{$category->category_title}}</h2>
                <ol class="breadcrumb">
                    <li><a href="{{route('home')}}">Acceuil</a></li>
                    <li class="active">details</li>
                </ol>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->
    <!--================ About History Area  =================-->
    <section class="about_history_area section_gap">
        <div class="container">
            @foreach($details as $d)
                <div class="card mb-3" style="max-width: 1040px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                </ol>
                                <div class="carousel-inner" id="animated-thumbnials">
                                    <a class="carousel-item active" href="{{URL::to($d->room_image)}}">
                                        <img src="{{URL::to($d->room_image)}}" class="card-img" alt="..." style="height: 250px">
                                    </a>

                                    <a class="carousel-item" href="{{URL::to($d->room_photo)}}">
                                        <img src="{{URL::to($d->room_photo)}}" class="card-img" alt="..." style="height: 250px">
                                    </a>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$d->room_name}}</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Superficie: {{$d->room_size}} m²</li>
                                            <li class="list-group-item">Prix: {{$d->room_price}} FCFA / nuit</li>
                                            <li class="list-group-item">Categorie: {{$category->category_title}}</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            {{$d->room_description}}
                                        </p>
                                    </div>
                                </div>
                                <button data-toggle="modal" data-target="#largeModal" class="btn btn-outline-warning pull-right" style="cursor: pointer">Réserver</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- modal large -->
    @include('includes.bookmodal')
    <!-- end modal large -->
@endsection
