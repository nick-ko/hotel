@extends('layouts.front')
@section('content')
    <header class="header_area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html"><img src="{{URL::to('front/image/Logo.png')}}" alt=""></a>
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
                        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Area =================-->

    <section class="breadcrumb_area">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="page-cover text-center">
                <h2 class="page-cover-tittle">Chambres & Suites</h2>
                <ol class="breadcrumb">
                    <li><a href="{{route('home')}}">Acceuil</a></li>
                    <li class="active">chambres</li>
                </ol>
            </div>
        </div>
    </section>
    <br>
    <!--================ Accomodation Area  =================-->
    <!--================Booking Tabel Area =================-->
    <section class="hotel_booking_area">
        <div class="container">
            <div class="row hotel_booking_table">
                <div class="col-md-3">
                    <h2>Chercher<br> une chambre</h2>
                </div>
                <div class="col-md-9">
                    <div class="boking_table">
                        <form action="{{url('/searching')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="book_tabel_item">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <select class="wide" name="search_category">
                                                    <option data-display="Category">Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->category_title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="book_tabel_item">
                                        <div class="input-group">
                                            <select class="wide" name="search_price">
                                                <option data-display="Prix">Prix</option>
                                                <option value="0,25000">0 - 25000 FCFA</option>
                                                <option value="25000,50000">25000 - 50000 FCFA</option>
                                                <option value="50000,100000">50000 - 100000 FCFA</option>
                                                <option value="100000,200000">100000 - 200000 FCFA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="book_tabel_item">
                                        <button type="submit" class="book_now_btn button_hover" href="#"><i class="fa fa-search-plus"></i> Rechercher</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Booking Tabel Area  =================-->
    <!--================ Accomodation Area  =================-->
    <section class="accomodation_area section_gap">
        <div class="container">
            @if(count($results)>0)
                <div class="section_title text-center">
                    <h2 class="title_color">Nos Chambres et Suites</h2>
                    <p>Vous y vivrez l'accueil d'une tres grande maison,expression d'un art de vivre a l'ivoirienne fait pour vous.</p>
                </div>
                <div class="row accomodation_two">
                    @foreach($results as $r)
                        <div class="card mb-3" style="width: 1100px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{URL::to($r->room_image)}}" class="card-img" alt="..." style="height: 250px">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{URL::to($r->room_photo)}}" class="card-img" alt="..." style="height: 250px">
                                            </div>
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
                                        <h5 class="card-title">{{$r->room_name}}</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">Superficie: {{$r->room_size}} m²</li>
                                                    <li class="list-group-item">Prix: {{$r->room_price}} FCFA / nuit</li>
                                                    <?php
                                                    $category=DB::table('categories')
                                                        ->where('id', $r->room_category)
                                                        ->first();
                                                    ?>
                                                    <li class="list-group-item">Categorie: {{$category->category_title}} </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                    {{$r->room_description}}
                                                </p>
                                            </div>
                                        </div>
                                        <button data-toggle="modal" data-target="#largeModal" class="btn btn-outline-warning pull-right" style="cursor: pointer">Réserver</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- modal large -->
                          @include('includes.bookmodal')
                       <!-- end modal large -->
                    @endforeach
                </div>
            @else
                <div class="section_title text-center">
                    <h2 class="title_color">Aucune Chambre trouvée</h2>
                    <p style="text-align: center">Veuillez Effectuer une autre recherche</p>
                </div>
            @endif

        </div>
    </section>
    <!--================ Accomodation Area  =================-->

@endsection

