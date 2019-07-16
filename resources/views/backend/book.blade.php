@extends('layouts.backend')

@section('content')
    <div class="main-content">
        @include('includes.validator')
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Réservations</h2>
                            <a href="{{url('/downloadExcel')}}" class="au-btn au-btn-icon au-btn--blue ">
                                <i class="zmdi zmdi-download"></i>Telecharger excel</a>
                            @if((Auth::user()->role) != 'admin')
                                <button class="au-btn au-btn-icon au-btn--blue " data-toggle="modal" data-target="#largeModal">
                                    <i class="zmdi zmdi-plus"></i>Faire une reservation</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <table class="table table-striped" id="#myTable">
            <thead>
              <tr>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>adulte</th>
                  <th>enfant</th>
                  <th>Duree sejour</th>
                  <th>chambre reservé</th>
                  <th>pays</th>
                  <th>Total</th>
                  <th>status</th>
                  <th>action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($books as $b)
                <tr>
                    <?php
                    $code_room=DB::table('rooms')
                        ->where('room_name', $b->book_room)
                        ->first();
                    ?>
                    <td>{{$b->book_name}}</td>
                    <td>{{$b->book_email}}</td>
                    <td>{{$b->adult_number}}</td>
                    <td>{{$b->child_number}}</td>
                    <td>{{$b->book_from}} au {{$b->book_to}}</td>
                    <td>{{$b->book_room}}-{{$code_room->room_code}}</td>
                    <td>{{$b->pays}}</td>
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
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{url('/dashboard/backend-booking')}}" method="post">
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
                                    <label for="price" class="control-label mb-1">Date d'arriver</label>
                                    <div class='input-group date' id='datetimepicker11'>
                                        <input type='date' name="book_from" class="form-control" placeholder="Date d'arriver"/>
                                        <span class="input-group-addon">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="adult" class="control-label mb-1">Adulte</label>
                                    <select class="form-control" id="adult" name="adult_number">
                                        <option data-display="Adulte">Adulte</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">+3</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="price" class="control-label mb-1">Date de depart</label>
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='date' name="book_to" class="form-control" placeholder="Date de depart"/>
                                        <span class="input-group-addon">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="child" class="control-label mb-1">Enfant</label>
                                    <select class="form-control" id="child" name="child_number">
                                        <option data-display="Enfant">Enfant</option>
                                        <option value="0">0</option>
                                        <option value="2">1</option>
                                        <option value="3">+2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Continuer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection

