@extends('layouts.backend')

@section('content')
    <div class="main-content">
        @include('includes.validator')
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Gallery</h2>
                            <button class="au-btn au-btn-icon au-btn--blue " data-toggle="modal" data-target="#largeModal">
                                <i class="zmdi zmdi-plus"></i>Ajouter une image</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            @foreach($gallery as $image)
            <div class="col-md-4">
                <!-- DATA TABLE -->
                    <div class="card" style="width: 22rem;">
                        <img src="{{URL::to($image->image)}}" class="card-img-top" alt="..." style="width: 22rem; height: 20rem">
                        <div class="card-body">
                            <button class="btn btn-primary"><i class="fa fa-eye"></i></button>
                            <button class="btn btn-danger pull-right"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                <!-- END DATA TABLE -->
            </div>
            @endforeach
        </div>
    </div>


    <!-- modal large -->
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{url('/gallery/save-image')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Ajouter une nouvelle image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Nouvelle image</h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Image</label>
                                    <input id="title" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" >
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

