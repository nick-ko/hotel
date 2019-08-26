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
                        <li class="nav-item"><a class="nav-link" href="{{ route('room') }}">Chambres & suites</a></li>
                        <li class="nav-item active"><a class="nav-link" href="{{ route('event') }}">Evenements</a></li>
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
                <h2 class="page-cover-tittle">Evenements</h2>
                <ol class="breadcrumb">
                    <li><a href="{{route('home')}}">Acceuil</a></li>
                    <li class="active">Evenements</li>
                </ol>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->
    <!--================Blog Categorie Area =================-->
    <section class="blog_categorie_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="{{URL::to('front/image/blog/cat-post/cat-post-3.jpg')}}" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="{{url('/event-type/evenement')}}"><h5>Social Event</h5></a>
                                <div class="border_line"></div>
                                <p>Mariage - Bapteme - Ceremonie</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="{{URL::to('front/image/blog/cat-post/cat-post-2.jpg')}}" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="{{url('/event-type/conference')}}"><h5>Conference</h5></a>
                                <div class="border_line"></div>
                                <p>Politique - Informatique - Medecine </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="{{URL::to('front/image/blog/cat-post/cat-post-1.jpg')}}" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="{{url('/event-type/autre')}}"><h5>Autres</h5></a>
                                <div class="border_line"></div>
                                <p>Art - Mode  </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Categorie Area =================-->

    <!--================Blog Area =================-->
    <section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">
                        @foreach($events as $e)
                           <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <div class="post_tag">
                                        <a href="#">{{$e->event_category}}</a>
                                    </div>
                                    <ul class="blog_meta list_style">
                                        <li><a href="#">Royal hotel<i class="lnr lnr-user"></i></a></li>
                                        <li><a href="#">{{$e->event_date}}<i class="lnr lnr-calendar-full"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img src="{{URL::to($e->event_image)}}" alt="" style="width: 500px; height: 300px;">
                                    <div class="blog_details">
                                        <a href="#"><h2>{{$e->event_title}}</h2></a>
                                        <p> {{$e->event_desc}}.</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @endforeach

                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">

                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="{{url('/searching-event')}}" method="post">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control"  name="event_category" placeholder="Rechercher" required>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit" style="cursor: pointer"><i class="lnr lnr-magnifier"></i></button>
                                    </span>
                                </div><!-- /input-group -->
                            </form>
                            <div class="br"></div>
                        </aside>

                        <aside class="single-sidebar-widget tag_cloud_widget">
                            <h4 class="widget_title">Tags</h4>
                            <ul class="list_style">
                                <li><a href="#">Technology</a></li>
                                <li><a href="#">Architecture</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Lifestyle</a></li>
                                <li><a href="#">Art</a></li>
                                <li><a href="#">Adventure</a></li>
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Adventure</a></li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
@endsection
