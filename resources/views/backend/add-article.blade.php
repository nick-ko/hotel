@extends('layouts.backend')

@section('content')

    <div class="main-content">
        @include('includes.validator')
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Ajouter un nouveau article</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <form method="post" action="{{url('/dashboard/save-article')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="photo">Image</label>
                        <input type="file" name="image" id="photo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="categorie">Categorie</label>
                        <select name="categorie" id="categorie" class="form-control">
                            <option value="">Selectionner la categorie</option>
                            <option value="technologie">Technologie</option>
                            <option value="technologie">Economie</option>
                        </select>
                    </div>
                    <label for="">Contenue</label>
                    <textarea id="summernote" name="contenue"></textarea>
                    <br>
                    <button class="btn btn-outline-primary pull-right" type="submit">Valider</button>
                </div>
                <div class="col-md-1"></div>
            </div>
        </form>
    </div>
@endsection
