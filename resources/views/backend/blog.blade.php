@extends('layouts.backend')

@section('content')
    <div class="main-content">
        @include('includes.validator')
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Blog</h2>
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
                            <th>Photo</th>
                            <th>Categorie</th>
                            <th>Statut</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($article as $post )
                            <tr class="tr-shadow">
                                <td>{{$post->title}}</td>
                                <td><img src="{{URL::to($post->image)}}" alt="" style="width:90px; height: 50px;"></td>
                                <td>{{$post->categorie}}</td>
                                <td class="table-data-feature">
                                    @if($post->status == 0)
                                        <a href="{{URL::to('dashboard/edit-category/'.$post->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Article publié">
                                            <i class="zmdi zmdi-thumb-up"></i>
                                        </a>
                                    @else
                                        <a href="{{URL::to('dashboard/edit-category/'.$post->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Non publié">
                                            <i class="zmdi zmdi-thumb-down"></i>
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <div class="table-data-feature">
                                        <a href="{{URL::to('dashboard/edit-category/'.$post->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Editer">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <a href="{{URL::to('dashboard/delete-category/'.$post->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Supprimer">
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

@endsection
