@extends('layouts.backend')

@section('content')
    <div class="main-content">
        @include('includes.validator')
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Prestation</h2>
                            <button class="au-btn au-btn-icon au-btn--blue " data-toggle="modal" data-target="#largeModal">
                                <i class="zmdi zmdi-plus"></i>Ajouter
                            </button>
                            <button class="au-btn au-btn-icon au-btn--blue " data-toggle="modal" data-target="#largeModal2">
                                Faire une prestation
                            </button>
                            <a href="{{route('histo-prestation')}}" class="au-btn au-btn-icon au-btn--blue ">
                                prestation effectuer
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- DATA TABLE -->
        <br>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2" id="#myTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prix</th>
                </tr>
                </thead>
                <tbody>
                @foreach($presta as $p )
                    <tr class="tr-shadow">
                        <td>{{$p->id}}</td>
                        <td>{{$p->title}}</td>
                        <td>{{$p->price}} FCFA</td>
                        <td>
                            <div class="table-data-feature">
                                <a href="{{URL::to('dashboard/edit-room/'.$p->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Editer">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                                <a href="{{URL::to('dashboard/delete-room/'.$p->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Supprimer">
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



    <!-- modal large -->
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{url('/dashboard/add-presta')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Ajouter une prestation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Nouvelle prestation</h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price" class="control-label mb-1">Titre</label>
                                    <input id="price" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price" class="control-label mb-1">Prix</label>
                                    <input id="price" name="price" type="number" class="form-control" aria-required="true" aria-invalid="false" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end modal large -->

    <!-- modal large -->
    <div class="modal fade" id="largeModal2" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{url('/dashboard/do-presta')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Effectuer une prestation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Prestation</h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="room" class="control-label mb-1">Chambre</label>
                                    <select name="room" id="room" class="form-control" aria-required="true" aria-invalid="false">
                                        <option value="">Selectionnez la chambre </option>
                                           @foreach($rooms as $r)
                                            <option value="{{$r->id}}">
                                                {{$r->room_name}}-{{$r->room_code}}
                                            </option>
                                           @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="presta" class="control-label mb-1">Prestations</label>
                                    <select name="presta" id="presta" class="form-control" aria-required="true" aria-invalid="false">
                                        <option value="">Selectionnez la prestation </option>
                                        @foreach($presta as $p)
                                            <option value="{{$p->price}}">{{$p->title}} -- {{$p->price}} FCFA</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end modal large -->

@endsection

