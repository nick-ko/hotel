@extends('layouts.backend')

@section('content')

    <div class="main-content">
        @include('includes.validator')
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Contenu de la page d'acceuil</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <form method="post" action="{{url('/dashboard/save-home')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="">Titre</label>
                        <input type="text" name="title" class="form-control" value="{{$content->title}}">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" value="{{$content->description}}">{{$content->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control" value="{{$content->image}}">
                    </div>
                    <textarea id="summernote" name="editordata" >{!! $content->content !!}</textarea>
                    <br>
                    <button class="btn btn-outline-primary" type="submit">Modifier</button>
                </div>
                <div class="col-md-1"></div>

            </div>
        </form>
    </div>
@endsection
