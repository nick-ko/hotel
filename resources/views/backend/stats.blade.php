@extends('layouts.backend')

@section('content')
    <div class="main-content">

        <div class="row">
            <div class="col-lg-6">
                <div class="au-card recent-report">
                    <div class="au-card-inner">
                        <h3 class="title-2">Reservation</h3>
                        <div class="chart-info">

                        </div>
                        <div class="recent-report__chart">
                            {!! $chart->html() !!}
                        </div>
                        <span class="text-center">somme total des reservation :{{ $total}} FCFA</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="au-card chart-percent-card">
                    <div class="au-card-inner">
                        <h3 class="title-2">chambres</h3>
                        <div class="row no-gutters">
                            <div class="col-xl-6">
                                <div class="chart-note-wrap">

                                </div>
                            </div>
                            <div class="recent-report__chart">
                                {!!$pie->html() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Historique des reservations</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-striped" id="#myTable">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>adulte</th>
                            <th>enfant</th>
                            <th>Duree sejour</th>
                            <th>chambre reservé</th>
                            <th>Total</th>
                            <th>status</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($booking as $b)
                            <tr>
                                <?php
                                $room=DB::table('rooms')
                                    ->where('id', $b->book_room)
                                    ->first();
                                ?>
                                <td>{{$b->text}}</td>
                                <td>{{$b->book_email}}</td>
                                <td>{{$b->adult_number}}</td>
                                <td>{{$b->child_number}}</td>
                                <td>{{$b->start_date}} au {{$b->end_date}}</td>
                                <td>{{$room->room_name}}-{{$room->room_code}}</td>
                                <td>{{$b->booking_total}} FCFA</td>
                                <td>
                                    @if(($b->book_status) == 0)
                                        <a href="{{URL::to('/dashboard/confirm-book/'.$b->id)}}" class="btn btn-primary btn-sm item" data-toggle="tooltip" data-placement="top" title="En Attente"><i class="fa fa-check"></i></a>
                                    @else
                                        <button  class="btn btn-success btn-sm item" data-toggle="tooltip" data-placement="top" title="Comfirmer"><i class="fa fa-check"></i></button>
                                    @endif
                                </td>
                                <td>
                                    <div class="table-data-feature">
                                        <a href="{{URL::to('/dashboard/reservation/detail/'.$b->id)}}" class="item" data-toggle="tooltip"   data-placement="top" title="Detail">
                                            <i class="zmdi zmdi-eye"></i>
                                        </a>
                                        <a href="{{URL::to('dashboard/delete-book/'.$b->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                            <i class="zmdi zmdi-delete"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="spacer"></tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->
            </div>

        </div>
    </div>

    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
    {!! $pie->script() !!}

@endsection
