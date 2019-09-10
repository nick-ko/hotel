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
    <title>Royal Hotel | Dashboard</title>
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
                                <h2 class="title-1" style="text-align: center">Facture</h2>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">

                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6" style="text-align: right;">
                                            <div><strong>Nom:&nbsp; </strong>{{$booking->text}}</div>
                                            <div><strong>Email:&nbsp; </strong>{{$booking->book_email}}</div>
                                            <div><strong>Contact:&nbsp; </strong>{{$booking->book_contact}}</div>

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
                                            <div><strong>Chambre réservé : &nbsp; &nbsp;
                                                </strong> {{$room->room_name}}- {{$room->room_code}}
                                            </div>
                                            <div><strong>Date reservation :&nbsp; &nbsp; &nbsp;
                                                </strong> {{$booking->booking_date}}
                                            </div>
                                            <div>
                                                <strong>Nombre d'adulte :&nbsp; &nbsp; &nbsp;</strong> {{$booking->adult_number}}
                                            </div>
                                            <div>
                                                <strong>Nombre d'enfant :&nbsp; &nbsp; &nbsp;</strong> {{$booking->child_number}}
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
                                                        {{$p->created_at}} &nbsp; - {{$p->prestation}} : {{$p->price}} FCFA <br>
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
                                        <h3 class="text-sm-center mt-2 mb-1">Montant Total du sejour: &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                                            &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;<strong>{{$booking->booking_total}} FCFA</strong> </h3>
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
<p style="text-align: center">Merci d'avoir passer votre séjour dans notre hotel, nous esperons vous revoir trés bientôt.</p>
</body>

</html>
<!-- end document-->


