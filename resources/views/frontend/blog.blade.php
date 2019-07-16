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
                        <li class="nav-item"><a class="nav-link" href="{{ route('room') }}">Chambres & suites</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('event') }}">Evenements</a></li>
                        <li class="nav-item active"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
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
                <h2 class="page-cover-tittle">Blog</h2>
                <ol class="breadcrumb">
                    <li><a href="home">Acceuil</a></li>
                    <li class="active">Blog</li>
                </ol>
            </div>
        </div>
    </section>

    <!--================Blog Area =================-->
    <section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">
                        @if(count($articles)>0)
                        @foreach($articles as $post)
                           <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <div class="post_tag">
                                        <a href="#">{{$post->categorie}}</a>
                                    </div>
                                    <ul class="blog_meta list_style">
                                        <li><a href="#">Royal Hotel<i class="lnr lnr-user"></i></a></li>
                                        <li><a href="#">{{$post->created_at}}<i class="lnr lnr-calendar-full"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img src="{{url($post->image)}}" alt="">
                                    <div class="blog_details">
                                        <a href="{{url('/blog/article/'.$post->id)}}"><h2>{{$post->title}}</h2></a>
                                        <a href="{{url('/blog/article/'.$post->id)}}" class="view_btn button_hover">Lire l'article</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                         @endforeach
                            <nav class="blog-pagination justify-content-center d-flex">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Previous">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-left"></span>
		                                    </span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a href="" class="page-link">01</a></li>
                                    <li class="page-item "><a href="" class="page-link">02</a></li>
                                    <li class="page-item"><a href="" class="page-link">03</a></li>
                                    <li class="page-item"><a href="" class="page-link">04</a></li>
                                    <li class="page-item"><a href="" class="page-link">09</a></li>
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Next">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-right"></span>
		                                    </span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            @else
                            <p class="text-center">Aucun article trouvée</p>
                        @endif

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="{{url('/blog/article/search')}}" method="post">
                                @csrf
                            <div class="input-group">
                                <input type="text" name="post" class="form-control" placeholder="Chercher un article">
                                <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="lnr lnr-magnifier" style="cursor: pointer"></i></button>
                                </span>
                            </div><!-- /input-group -->
                            </form>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget author_widget">
                            <img class="author_img rounded-circle" src="image/blog/author.png" alt="">
                            <h4>Royal Hotel</h4>
                            <p>Un sejour inoubliable</p>
                            <div class="social_icon">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-github"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </div>
                            <p>Raffinement au savoir vivre ivoirien,l'élégence d'un decor Belle Epoque, des chambres et suites au confort absolu.</p>
                            <div class="br"></div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

@endsection
