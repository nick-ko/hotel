@extends('layouts.backend')

@section('content')
    <div class="main-content">
        @include('includes.validator')
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section_title text-center">
                            <h2 class="title_color"> Reservation </h2>
                            <p style="font-size: 16px">
                                Du <span style="font-weight: bold">{{$booking_from}} </span>Au <span style="font-weight: bold">{{$booking_to}}</span>
                                soit {{$days}} jour(s) - {{$adult_number}} Adulte(s) - {{$child_number}} enfant(s)
                            </p>
                            <a href="{{route('home')}}" class="btn btn-outline-warning">Modifier</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h5>&nbsp;&nbsp;&nbsp;{{count($rooms)}} Chambre(s) trouvée(s)</h5>
        <table class="table table-striped" id="#myTable">
            <thead>
            <tr>
                <th>code</th>
                <th>Nom chambre</th>
                <th>Prix</th>
                <th>Montant Total Séjour</th>
                <th>Disponible</th>
                <th>Photo</th>
                <th>action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rooms as $r)
                <tr>
                    <td>{{$r->room_code}}</td>
                    <td>{{$r->room_name}}</td>
                    <td>{{$r->room_price}} FCFA / nuit</td>
                    <td>{{($r->room_price) * $days * $adult_number}} FCFA </td>
                    <td>{{$r->room_number}}</td>
                    <td>
                        <img src="{{URL::to($r->room_photo)}}" class="card-img" alt="..." style="height: 50px;width: 70px">
                    </td>
                    <td>
                        <button data-toggle="modal" data-target="#largeModal" class="btn btn-outline-warning" style="cursor: pointer">Réserver</button>
                    </td>
                </tr>
                <tr class="spacer"></tr>
                <!-- modal large -->
                <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <form action="{{url('/dashboard/backend-save-booking')}}" method="post">
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
                                                <label for="title" class="control-label mb-1">Votre Nom</label>
                                                <input id="title" name="book_name" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                                <input id="title" name="book_room" type="hidden" value="{{$r->room_name}}" >
                                                <input id="title" name="book_from" type="hidden" value="{{$book_from}}" >
                                                <input id="title" name="book_to" type="hidden" value="{{$book_to}}" >
                                                <input id="title" name="adult_number" type="hidden" value="{{$adult_number}}" >
                                                <input id="title" name="days" type="hidden" value="{{$days}}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="price" class="control-label mb-1">Votre Prenom</label>
                                                <input id="price" name="book_lname" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                                <input id="price" name="child_number" type="hidden" value="{{$child_number}}" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="price" class="control-label mb-1">Votre Email</label>
                                                <input id="price" name="book_email" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                                <input id="title" name="room_number" type="hidden" value="{{$r->room_number}}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="price" class="control-label mb-1">Votre Contact</label>
                                                <input id="price" name="book_contact" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                                <input id="title" name="booking_price" type="hidden" value="{{($r->room_price) * $days * $adult_number}}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Autres Services</h3>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="resto"> Restaurant :&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input id="resto" name="book_service[]" type="checkbox"   value="restaurant" ></label>
                                                    <p>15 000FCFA le service journaliere</p>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="parking"> Parking :&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input id="parking" name="book_service[]" type="checkbox" checked  value="parking"></label>
                                                    <p>Gratuit</p>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="sport"> Salle de sport :&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input id="sport" name="book_service[]" type="checkbox"  value="sport"></label>
                                                    <p>5 000FCFA pour avoir acces a la salle</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Confirmer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end modal large -->
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

