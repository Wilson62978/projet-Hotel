@extends('backend.layouts.app')

@section('content')
    <div class="titlebar text-left mt-2 mb-3">
        <div class="align-items-center">
            <h1 class="h3">Liste des réductions</h1>
        </div>
    </div>
    <div class="row">

        <div class="card col-md-7">
            <div class="card-header">
                <a href="{{ route("reductions.create") }}" class="mb-0 h6 btn btn-primary">  Ajouter</a>
                <div class="pull-right clearfix">
                    <form class="" id="sort_flash_deals" action="" method="GET">
                        <div class="box-inline pad-rgt pull-left">
                            <div class="" style="min-width: 200px;">
                                <input type="text" class="form-control" id="search" name="search"
                                    @isset($sort_search) value="{{ $sort_search }}" @endisset
                                    placeholder="{{ 'Type name & Enter' }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <table class="table aiz-table mb-0">
                    <thead>
                        <tr>
                            <th>Duree Minimum</th>
                            <th>Pourcentage de reduction</th>
                            <th class="text-right">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reductions as $key => $reduction)
                            <tr>
                                
                                <td>{{ $reduction->duree }} jours</td>
                                <td>{{ $reduction->pourcentage }}%</td>
                                <td class="text-right">
                                    <form class="" action="{{route("reductions.destroy",["reduction"=>$reduction->id]) }}" method="post">
                                        @csrf
                                            <a class="btn btn-soft-success btn-icon btn-circle btn-sm " href="{{route("reductions.edit",["reduction"=>$reduction->id]) }}" title="Voir">
                                                <i class="las la-pen"></i>
                                            </a>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-soft-danger btn-icon btn-circle btn-sm "
                                                data-href="" title="Supprimer">
                                                <i class="las la-user-slash"></i>
                                            </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="pull-right">
                    </div>
                </div>
            </div>
        </div>
    
        <div class="card col-md-4  ml-auto">
            <div class="text-center pt-4">
              
                    <h1 class="h4 fw-600">
                        Ajouter une reduction
                    </h1>
          
            </div>
    
            <div class="px-3 py-3 py-lg-4">
                <div class="">
                    <form class="form-default" role="form" action='{{route("reductions.store") }}' method="POST">
                        @csrf
    
                        <div class="form-group">
                            <label for="duree">Duree Minimum</label>
                            <input type="number" class="form-control{{ $errors->has('duree') ? ' is-invalid' : '' }}" value="{{  old('duree') }}" name="duree" id="duree" autocomplete="off">
                            @if ($errors->has('duree'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('duree') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="pourcentage">Pourcentage de reduction</label>
                            <input type="number" class="form-control{{ $errors->has('pourcentage') ? ' is-invalid' : '' }}" value="{{  old('pourcentage') }}"  name="pourcentage" id="pourcentage" autocomplete="off">
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
   


@endsection
