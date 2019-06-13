@extends('layouts.backend')

@section('content')

    <div class="main-content">
        @include('includes.validator')
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Contenu page A propos</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <form method="post">
            @csrf
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="form-group">
                        <input type="file" class="form-control">
                    </div>
                    <textarea id="summernote" name="editordata"></textarea>
                    <br>
                    <button class="btn btn-outline-primary" type="submit">Modifier</button>
                </div>
                <div class="col-md-1"></div>

            </div>
        </form>
    </div>
@endsection
