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
</head>

<body class="animsition" >
<div class="page-wrapper">


    <!-- PAGE CONTAINER-->
    <div class="page-container">

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="overview-wrap">
                                <h2 class="title-1">Details Réservations</h2>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title mb-3">{{$booking->text}}</strong>
                                    <a href="{{url('dashboard/reservation/export-pdf/'.$booking->id)}}" class="pull-right" style="color: black"><i class="fa fa-file-pdf  fa-2x"></i></a>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div><strong>Nom:&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                                                    &nbsp; &nbsp; &nbsp;</strong>{{$booking->text}}</div>
                                            <div><strong>Email:&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                                                    &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;</strong>{{$booking->book_email}}</div>
                                            <div><strong>Contact:&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                                                    &nbsp; &nbsp; &nbsp;&nbsp; </strong>{{$booking->book_contact}}</div>
                                            <div><strong>Pays d'origine:&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;</strong>{{$booking->pays}}</div>
                                            <div><strong>Motif du voyage:&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</strong>{{$booking->motif}}</div>
                                            <div><strong>Nombre d'adulte :&nbsp; &nbsp; &nbsp;</strong> {{$booking->adult_number}}</div>
                                            <div><strong>Nombre d'enfant :&nbsp; &nbsp; &nbsp;</strong> {{$booking->child_number}}</div>

                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            $room=DB::table('rooms')
                                                ->where('id', $booking->book_room)
                                                ->first();

                                            $presta=DB::table('presta_histos')
                                                ->where('book_id', $booking->id)
                                                ->get();
                                            ?>
                                            <div><strong>Date reservation :&nbsp; &nbsp; &nbsp;
                                                </strong> {{$booking->booking_date}}
                                            </div>
                                            <div><strong>Chambre réservé : &nbsp; &nbsp;
                                                </strong> {{$room->room_name}}- {{$room->room_code}}
                                            </div>
                                            <div><strong>Debut Sejour:&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                                                    &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                                                </strong>{{$booking->start_date}}
                                            </div>
                                            <div><strong>Fin Sejour:&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                                                    &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                                                </strong>{{$booking->end_date}}
                                            </div>
                                            <div><strong>Prix Chambre:&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                                                    &nbsp; &nbsp; &nbsp;&nbsp;
                                                </strong>{{$booking->booking_price}} FCFA
                                            </div>
                                            <div><strong>Prestation :   </strong><br>
                                                @if(count($presta)>0)
                                                    @foreach($presta as $p)
                                                        <i class="fa fa-calendar"></i>
                                                        {{$p->created_at}} &nbsp; -{{$p->prestation}} : {{$p->price}} FCFA <br>
                                                    @endforeach
                                                @else
                                                    &nbsp; &nbsp; &nbsp;Aucune prestation demandé
                                                @endif
                                            </div>
                                            <br>
                                            <div><strong>Total Prestation :&nbsp; &nbsp; &nbsp;&nbsp;
                                                    &nbsp; &nbsp;
                                                </strong> {{$booking->booking_total - $booking->booking_price}} FCFA
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mx-auto d-block">
                                        <h5 class="text-sm-center mt-2 mb-1">Montant Total du sejour:</h5>
                                        <div class="location text-sm-center">
                                            <i class="fa fa-calculator"></i> &nbsp; &nbsp;<strong>{{$booking->booking_total}} FCFA</strong> </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    <!-- END MAIN CONTENT-->


        <!-- END PAGE CONTAINER-->
    </div>

</div>

<!-- Jquery JS-->
<script src="{{asset('back/vendor/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap JS-->
<script src="{{asset('back/vendor/bootstrap-4.1/popper.min.js')}}"></script>
<script src="{{asset('back/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>


<!-- Main JS-->
<script src="{{asset('back/js/main.js')}}"></script>
</body>

</html>
<!-- end document-->


