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

    <!--================Breadcrumb Area =================-->
    <section class="breadcrumb_area">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="page-cover text-center">
                <h2 class="page-cover-tittle">Reservation</h2>
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
            <div class="section_title text-center">
                <h2 class="title_color"> Reservation </h2>
                <p style="font-size: 16px">
                    Du <span style="font-weight: bold">{{$booking_from}} </span>Au <span style="font-weight: bold">{{$booking_to}}</span>
                    soit {{$days}} jour(s) - {{$adult_number}} Adulte(s) - {{$child_number}} enfant(s)
                </p>
                <a href="{{route('home')}}" class="btn btn-outline-warning">Modifier</a>
            </div>
            <h5>&nbsp;&nbsp;&nbsp;{{count($rooms)}} Chambre(s) trouvée(s)</h5>
            @foreach($rooms as $r)
                <div class="card mb-3" style="max-width: 1040px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                </ol>
                                <div class="carousel-inner " id="animated-thumbnials">
                                    <a class="carousel-item active" href="{{URL::to($r->room_image)}}">
                                        <img src="{{URL::to($r->room_image)}}" class="card-img" alt="..." style="height: 250px">
                                    </a>

                                    <a class="carousel-item" href="{{URL::to($r->room_photo)}}">
                                        <img src="{{URL::to($r->room_photo)}}" class="card-img" alt="..." style="height: 250px">
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
                                <div style="display: inline">
                                    <h5 class="card-title" >{{$r->room_name}}
                                        <span class="pull-right">Disponible: {{$r->room_number}}</span>
                                    </h5>
                                </div>

                                <div class="row">
                                    <div class="col-md-7">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Superficie: {{$r->room_size}} m²</li>
                                            <li class="list-group-item">Prix: {{$r->room_price}} FCFA / nuit</li>
                                            <h4>&nbsp;&nbsp;&nbsp;Montant total du séjour : {{($r->room_price) * $days * $adult_number}} FCFA </h4>
                                        </ul>
                                    </div>
                                    <div class="col-md-5">
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
                <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <form action="{{url('/dashboard/save-booking')}}" method="post">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="largeModalLabel">RESERVATION</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Réserver votre chambre</h3>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title" class="control-label mb-1">Votre Nom</label>
                                                <input id="title" name="book_name" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                                <input id="title" name="book_room" type="hidden" value="{{$r->room_name}}" >
                                                <input id="title" name="book_from" type="hidden" value="{{$book_from}}" >
                                                <input id="title" name="book_to" type="hidden" value="{{$book_to}}" >
                                                <input id="title" name="adult_number" type="hidden" value="{{$adult_number}}" >
                                                <input id="title" name="days" type="hidden" value="{{$days}}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="price" class="control-label mb-1">Votre Prenom</label>
                                                <input id="price" name="book_lname" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                                <input id="price" name="child_number" type="hidden" value="{{$child_number}}" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="price" class="control-label mb-1">Votre Email</label>
                                                <input id="price" name="book_email" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                                <input id="title" name="room_number" type="hidden" value="{{$r->room_number}}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="price" class="control-label mb-1">Votre Contact</label>
                                                <input id="price" name="book_contact" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                                <input id="title" name="booking_price" type="hidden" value="{{($r->room_price) * $days * $adult_number}}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Autres Services</h3>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="resto"> Restaurant :&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input id="resto" name="book_service[]" type="checkbox"   value="restaurant" ></label>
                                                <p>15 000FCFA le service journaliere</p>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="parking"> Parking :&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input id="parking" name="book_service[]" type="checkbox" checked  value="parking"></label>
                                                <p>Gratuit</p>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="sport"> Salle de sport :&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input id="sport" name="book_service[]" type="checkbox"  value="sport"></label>
                                                <p>5 000FCFA pour avoir acces a la salle</p>
                                            </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Confirmer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end modal large -->
            @endforeach
        </div>

    </section>

@endsection
