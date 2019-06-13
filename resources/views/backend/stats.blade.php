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
                    <table class="table table-data2" id="#myTable">
                        <thead>
                        <tr>
                            <th>Date reservation</th>
                            <th>Duree sejour</th>
                            <th>Nom</th>
                            <th>
                                Chambre</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($booking as $b)
                            <tr class="tr-shadow">
                                <td>{{$b->booking_date}}</td>
                                <td>du {{$b->book_from}} au {{$b->book_to}}</td>
                                <td>{{$b->book_name}}  {{$b->book_lname}}</td>
                                <td>{{$b->book_room}}</td>
                                <td>
                                    <div class="table-data-feature">
                                        <a href="{{URL::to('dashboard/edit-user/')}}" class="item" data-toggle="tooltip" data-placement="top" title="Editer">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <a href="{{URL::to('dashboard/delete-user/')}}" class="item" data-toggle="tooltip" data-placement="top" title="Supprimer">
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
