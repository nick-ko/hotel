@extends('layouts.backend')

@section('content')
    <div class="main-content">
        @include('includes.validator')
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1"></h2>
                                    <button class="au-btn au-btn-icon au-btn--blue " data-toggle="modal" data-target="#largeModal">
                                        <i class="zmdi zmdi-plus"></i>Modifier</button>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3">Profile</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <h5 class="text-sm-center mt-2 mb-1">{{$user->name}}</h5>
                                    <div class="location text-sm-center">
                                         {{$user->email}} <br>
                                        {{$user->role}}
                                    </div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-twitter pr-1"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-linkedin pr-1"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-pinterest pr-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal large -->
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Modification</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Modifier vos informations</h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Nom</label>
                                    <input id="title" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                </div>
                                <div class="form-group">
                                    <label for="price" class="control-label mb-1">Email</label>
                                    <input id="price" name="price" type="number" class="form-control" aria-required="true" aria-invalid="false" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="photo" class="control-label mb-1">Ancien Mot de passe</label>
                                    <input id="photo" name="mdp" type="password" class="form-control" aria-required="true" aria-invalid="false" >
                                </div>
                                <div class="form-group">
                                    <label for="photo" class="control-label mb-1">Nouveau Mot de passe</label>
                                    <input id="photo" name="new-mdp" type="password" class="form-control" aria-required="true" aria-invalid="false" >
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
