@extends('layouts.backend')

@section('content')
    <div class="main-content">
        @include('includes.validator')
        <div class="section__content section__content--p30">
            <div class="container-fluid">

            </div>
        </div>

        <!-- DATA TABLE -->
        <br>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2" id="#myTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Chambre</th>
                    <th>Client</th>
                    <th>Prestation</th>
                    <th>Prix</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($histo as $h )
                    <tr class="tr-shadow">
                        <td>{{$h->id}}</td>
                        <?php
                        $room=DB::table('rooms')
                            ->where('id', $h->room)
                            ->first();
                        ?>
                        <td>{{$room->room_code}} - {{$room->room_name}}</td>
                        <td>{{$h->room_owner}}</td>
                        <td>{{$h->prestation}}</td>
                        <td>{{$h->price}} FCFA</td>
                        <td>{{$h->created_at}}</td>
                        <td>
                            <div class="table-data-feature">
                                <a href="{{URL::to('dashboard/edit-room/'.$h->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Supprimer">
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

@endsection


