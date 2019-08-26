@extends('layouts.backend')

@section('content')
    <div class="main-content">
        @include('includes.validator')
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Chambres</h2>
                            <button class="au-btn au-btn-icon au-btn--blue " data-toggle="modal" data-target="#largeModal">
                                <i class="zmdi zmdi-plus"></i>Ajouter</button>
                            <a href="{{route('taskroom')}}" class="au-btn au-btn-icon au-btn--blue ">
                                Etat des chambres</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- DATA TABLE -->
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2" id="#myTable">
                <thead>
                <tr>
                    <th>Numero</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Categorie</th>
                    <th>Superfice</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rooms as $room )
                    <tr class="tr-shadow">
                        <td>{{$room->room_code}}</td>
                        <td>{{$room->room_name}}</td>
                        <td>{{$room->room_price}} FCFA</td>
                        <?php
                        $category=DB::table('categories')
                            ->where('id', $room->room_category)
                            ->first();
                        ?>
                        <td>{{$category->category_title}}</td>
                        <td>{{$room->room_size}}  m²</td>
                        <td><img src="{{URL::to($room->room_image)}}" alt="" style="height: 60px; width: 80px"></td>
                        <td>
                            <div class="table-data-feature">
                                <a href="{{URL::to('dashboard/disponibility-room/'.$room->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="@if(($room->disponibility_room) == 0)Disponible @else Indisponible @endif">
                                    @if(($room->disponibility_room) == 0)
                                        <i class="zmdi zmdi-thumb-up" style="color: #32C425"></i>
                                    @else
                                        <i class="zmdi zmdi-thumb-down" style="color: #F22625"></i>
                                    @endif
                                </a>
                                <a href="{{URL::to('dashboard/edit-room/'.$room->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Editer">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                                <a href="{{URL::to('dashboard/delete-room/'.$room->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Supprimer">
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
            <form action="{{url('/dashboard/add-room')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Ajouter une chambre</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Nouvelle chambre</h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Nom</label>
                                    <input id="title" name="room_name" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                </div>
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Code</label>
                                    <input id="title" name="room_code" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                </div>
                                <div class="form-group">
                                    <label for="price" class="control-label mb-1">Prix</label>
                                    <input id="price" name="room_price" type="number" class="form-control" aria-required="true" aria-invalid="false" >
                                </div>
                                <div class="form-group">
                                    <label for="size" class="control-label mb-1">Superficie</label>
                                    <input id="size" name="room_size" type="number" class="form-control" aria-required="true" aria-invalid="false" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="photo" class="control-label mb-1">Description</label>
                                    <textarea id="photo" name="room_description" cols="10" rows="4" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="photo" class="control-label mb-1">Photo</label>
                                    <input id="photo" name="room_photo" type="file" class="form-control" aria-required="true" aria-invalid="false" >
                                </div>
                                <div class="form-group">
                                    <label for="photo" class="control-label mb-1">Photo</label>
                                    <input id="photo" name="room_image" type="file" class="form-control" aria-required="true" aria-invalid="false" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="category" class="control-label mb-1">Categorie</label>
                                    <select name="room_category" id="category" class="form-control" aria-required="true" aria-invalid="false">
                                        <option value="">Selectionnez la categorie </option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_title}}</option>
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

