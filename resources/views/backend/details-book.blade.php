@extends('layouts.backend')

@section('content')
    <div class="main-content">
        @include('includes.validator')
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
@endsection


