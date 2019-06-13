@extends('layouts.backend')

@section('content')
    <div class="main-content">
        @include('includes.validator')
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Evenements</h2>
                            <button class="au-btn au-btn-icon au-btn--blue " data-toggle="modal" data-target="#largeModal">
                                <i class="zmdi zmdi-plus"></i>Ajouter</button>
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
                            <th>Titre</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Categorie</th>
                            <th>Photo</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $e )
                            <tr class="tr-shadow">
                                <td>{{$e->event_title}}</td>
                                <td>{{$e->event_date}}</td>
                                <td>{{$e->event_desc}}</td>
                                <td>{{$e->event_category}}</td>
                                <td><img src="{{URL::to($e->event_image)}}" alt="" style="width:90px; height: 50px;"></td>
                                <td>
                                    <div class="table-data-feature">
                                        <a href="{{URL::to('dashboard/edit-category/'.$e->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Editer">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <a href="{{URL::to('dashboard/delete-category/'.$e->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Supprimer">
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


    <!-- modal large -->
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{url('/dashboard/add-event')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Ajouter un evenement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Nouveaux evenement</h3>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="title" class="control-label mb-1">Titre</label>
                            <input id="title" name="event_title" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                        </div>
                        <div class="form-group">
                            <label for="title" class="control-label mb-1">Categorie</label>
                            <input id="title" name="event_category" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                        </div>
                        <div class="form-group">
                            <label for="title" class="control-label mb-1">Categorie</label>
                            <select name="event_type" id="" class="form-control">
                                <option value="">Selctionnez le type</option>
                                <option value="conference">Conference</option>
                                <option value="social">Evenement</option>
                                <option value="autre">Autres</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title" class="control-label mb-1">Date</label>
                            <input id="title" name="event_date" type="date" class="form-control" aria-required="true" aria-invalid="false" >
                        </div>
                        <div class="form-group">
                            <label for="desc" class="control-label mb-1">Description</label>
                            <textarea name="event_desc" id="desc" cols="10" rows="3" type="text" class="form-control" aria-required="true" aria-invalid="false"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image" class="control-label mb-1">Image</label>
                            <input id="image" name="event_image" type="file" class="form-control" aria-required="true" aria-invalid="false" >
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
