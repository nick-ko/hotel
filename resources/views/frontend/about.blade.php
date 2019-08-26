@extends('layouts.front')
@section('content')
    <header class="header_area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{route('home')}}"><img src="{{URL::to('front/image/logo.jpg')}}" alt="" style="height: 80px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item "><a class="nav-link" href="{{ route('home') }}">Acceuil</a></li>
                        <li class="nav-item active"><a class="nav-link" href="{{ route('about') }}">A propos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('service') }}">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('room') }}">Chambres & suites</a></li>
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
                <h2 class="page-cover-tittle">Qui somme nous ?</h2>
                <ol class="breadcrumb">
                    <li><a href="{{route('home')}}">Acceuil</a></li>
                    <li class="active">a propos</li>
                </ol>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->
    <!--================ About History Area  =================-->
    <section class="about_history_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d_flex align-items-center">
                    <div class="about_content ">
                        <h2 class="title title_color">Bienvenue <br> dans le confort de <br> Bushman hôtel café </h2>
                        <p>
                            Le meilleur hébergement de l’Afrique de l’ouest avec des services et des installations de renommée internationale.
                            Découvrez la convivialité et l’hospitalité ouest africaine avec des services et un confort haut de gamme.
                            Que vous voyagiez pour des affaires ou pour le loisir, Notre hôtel garantissent votre confort, votre sécurité et s’assure de votre bien-être pendant tout votre séjour.
                        </p>

                    </div>
                </div>
                <div class="col-md-6">
                    <img class="img-fluid" src="{{URL::to('front/image/about.jpg')}}" alt="img">
                </div>
            </div>
        </div>
    </section>
    <!--================ About History Area  =================-->
@endsection
