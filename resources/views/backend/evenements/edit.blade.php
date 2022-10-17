@extends('backend.layouts.app')

@section('content')
    <div class="h-100 bg-cover bg-center py-5 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 mx-auto">
                    <div class="card">
                        <div class="text-center pt-4">
                            <h1 class="h4 fw-600">
                                Ajout d'un évenement
                            </h1>
                        </div>

                        <div class="px-3 py-3 py-lg-4">
                            <div class="">
                                <form class="form-default" role="form" enctype="multipart/form-data" action='{{isset($evenement)? route('evenements.update',["evenement"=>$evenement->id]) :route("evenements.store") }}' method="POST">
                                    @csrf

                                    @if (isset($evenement))
                                        <input type="hidden" name="_method" value="PUT">
                                    @endif
                               
                                    <div class="form-group">
                                        <label for="titre">Titre</label>
                                        <input type="text" class="form-control{{ $errors->has('titre') ? ' is-invalid' : '' }}" value="{{  $evenement->titre ?? old('titre') }}"  name="titre" id="titre" autocomplete="off">
                                        @if ($errors->has('titre'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('titre') }}</strong>
                                            </span>
                                        @endif
                                    </div>


                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"   name="image" id="image" >
                                        @if ($errors->has('image'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>


                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" autocomplete="off">{{  $evenement->description ?? old('description') }}</textarea>
                                        
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                   
                                    <div class="">
                                        <button type="submit" class="btn btn-primary btn-block fw-600">{{  ('Soumettre') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection