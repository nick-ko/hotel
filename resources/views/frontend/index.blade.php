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
                        <li class="nav-item active" ><a class="nav-link" href="{{ route('home') }}">Acceuil</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">A propos</a></li>
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

    <!--================Banner Area =================-->
    <section class="banner_area">
        <div class="booking_table d_flex align-items-center">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{URL::to('front/image/bg3.jpg')}}" alt="First slide" style="height:899px;" >
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{URL::to('front/image/bg2.jpg')}}" alt="Second slide" style="height:899px;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{URL::to('front/image/bg1.jpg')}}" alt="Third slide" style="height:899px;">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="hotel_booking_area position">
            <div class="container">
                <form action="{{url('/dashboard/booking')}}" method="post">
                    @csrf
                   <div class="hotel_booking_table">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-10">
                        <div class="boking_table">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="book_tabel_item">
                                        <div class="form-group">
                                            <div class='form-group date' id='datetimepicker11'>
                                                <label for="">Date d'arriver</label>
                                                <input type='date' name="book_from" class="form-control" placeholder="Date d'arriver" style="background-color: #04091e;border-color: grey" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class='form-group date' id='datetimepicker1'>
                                                <label for="">Date de depart</label>
                                                <input type='date' name="book_to" class="form-control" placeholder="Date de depart" style="background-color: #04091e;border-color: grey" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="book_tabel_item">
                                        <div class="form-group">
                                            <label for="">Nombre d'adulte</label>
                                            <select class="form-control" name="adult_number" style="background-color: #04091e;border-color: grey" required>
                                                <option data-display="Adulte">Adulte</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">+3</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nombre d'enfant</label>
                                            <select class="form-control" name="child_number" style="background-color: #04091e;border-color: grey" required="Selectioner le nombre d'enfant">
                                                <option data-display="Enfant">Enfant</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="3">+2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="book_tabel_item">
                                        <div class="form-group">
                                            <label for="">Type</label>
                                            <select class="form-control" name="book_room" type="text" style="background-color: #04091e;border-color: grey">
                                                <option data-display="Type de chambre" >Type de chambre</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->category_title}}">{{$category->category_title}}</option>
                                                @endforeach
                                            </select>
                                            <br>
                                        </div>
                                        <button type="submit" class="book_now_btn button_hover" style="cursor: pointer">Reservation</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
    <!--================Banner Area =================-->

    <!--================ Accomodation Area  =================-->
    <section class="accomodation_area section_gap">
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">Chambres & Suites</h2>
                <p>A Royal hotel le luxe et le confort sont au rendez-vous pour vous faire vivre une experience unique au monde</p>
            </div>
            <div class="row mb_30">
                @foreach($categories as $category)
                <div class="col-lg-3 col-sm-6">
                    <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <img src="{{URL::to($category->category_image)}}" alt="">
                            <a href="{{URL::to('room-details/'.$category->id)}}" class="btn theme_btn button_hover"> Details</a>
                        </div>
                        <?php
                        $max_price=DB::table('rooms')
                            ->where('room_category', $category->id)
                            ->max('room_price');
                        ?>
                        <h4 class="sec_h4">{{$category->category_title}}</h4>
                        <p>prix maximum : {{$max_price}} FCFA / nuit</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-6 d_flex align-items-center">
                    <div class="about_content ">
                        <h2 class="title title_color">Pourquoi Choisir <br> Bushman Hotel Café ?</h2>
                        <p>
                        <h5>Un sejour inoubliable</h5>
                        Raffinement au savoir vivre ivoirien,l'élégence d'un decor Belle Epoque,
                        des chambres et suites au confort absolu.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="img-fluid" src="{{URL::to('front/image/home_1.jpg')}}" alt="img">
                </div>
            </div>
        </div>
    </section>
    <!--================ Accomodation Area  =================-->

@endsection
