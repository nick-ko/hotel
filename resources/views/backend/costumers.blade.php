@extends('layouts.backend')

@section('content')
    <div class="main-content">
        @include('includes.validator')
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Clients</h2>
                            <a href="{{url('/download')}}" class="au-btn au-btn-icon au-btn--blue ">
                                <i class="zmdi zmdi-download"></i>Telecharger excel</a>
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
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Dernier reservation</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($costumers as $costumer )
                            <tr class="tr-shadow">
                                <td>{{$costumer->name}}</td>
                                <td>{{$costumer->email}}</td>
                                <td>{{$costumer->contact}}</td>
                                <td>{{$costumer->last_visite}}</td>
                                <td>
                                    <div class="table-data-feature">
                                        <a href="{{URL::to('dashboard/delete-costumer/'.$costumer->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Supprimer">
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
            <form method="post" action="{{ url('/dashboard/add-users') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Ajouter un gerant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Nouveau utilisateur</h3>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="name" class=" col-form-label text-md-right">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class=" col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class=" col-form-label text-md-right">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image" class="control-label mb-1">Role</label>
                            <select name="role" id="" class="form-control">
                                <option value="">Assigner un role</option>
                                <option value="admin">Administrateur</option>
                                <option value="gerant(e)">Gerant</option>
                            </select>
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
