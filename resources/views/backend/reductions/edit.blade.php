@extends('backend.layouts.app')

@section('content')
    <div class="h-100 bg-cover bg-center py-5 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xxl-4 col-xl-5 col-lg-8 col-md-8 mx-auto">
                    <div class="card">
                        <div class="text-center pt-4">
                            @if (isset($reduction))
                                <h1 class="h4 fw-600">
                                    Modifier une reduction
                                </h1>
                            @else
                                <h1 class="h4 fw-600">
                                    Ajouter une reduction
                                </h1>
                            @endif
                        </div>

                        <div class="px-3 py-3 py-lg-4">
                            <div class="">
                                <form class="form-default" role="form" action='{{isset($reduction)? route('reductions.update',["reduction"=>$reduction->id]) :route("reductions.store") }}' method="POST">
                                    @csrf

                                    @if (isset($reduction))
                                        <input type="hidden" name="_method" value="PUT">
                                    @endif
                                    <div class="form-group">
                                        <label for="duree">Duree Minimum</label>
                                        <input type="number" class="form-control{{ $errors->has('duree') ? ' is-invalid' : '' }}" value="{{  $reduction->duree ?? old('duree') }}" name="duree" id="duree" autocomplete="off">
                                        @if ($errors->has('duree'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('duree') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="pourcentage">Pourcentage de reduction</label>
                                        <input type="number" class="form-control{{ $errors->has('pourcentage') ? ' is-invalid' : '' }}" value="{{  $reduction->pourcentage ?? old('pourcentage') }}"  name="pourcentage" id="pourcentage" autocomplete="off">
                                        @if ($errors->has('pourcentage'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('pourcentage') }}</strong>
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