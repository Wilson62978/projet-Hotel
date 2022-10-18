@extends('backend.layouts.app')

@section('content')
<div class="titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">Ajouter une chambres</h5>
</div>

<div class="">
    <form class="form form-horizontal mar-top" action="{{route('chambre.store')}}" method="POST" enctype="multipart/form-data" id="product_form">
        <div class="row gutters-5">
            <div class="col-lg-8">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Détails de la chambre</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 fw-600 col-from-label">Titre <span class="text-danger">*</span> </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nom" value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 fw-600 col-from-label">Prix <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="number" step="0.01" min="0" placeholder="Prix" name="price" value="{{ old('price')}}" class="form-control @error('price') is-invalid @enderror">
                                @error('price')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 fw-600 col-from-label">Quantité <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="number" lang="fr" min="0" name="stock" value="{{ old('stock') }}" step="1" placeholder="Quantité en stock" class="form-control @error('stock') is-invalid @enderror">
                                @error('stock')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('stock') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Images</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 fw-600 col-form-label" for="signinSrEmail">Image principale <span class="text-secondary">(300x300)</span> <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <div class="input-group" data-toggle="afriuploader" data-type="image" data-mu>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium form-left">Parcourir</div>
                                    </div>
                                    <div class="form-control file-amount form-right @error('thumbnail_img') is-invalid @enderror">Sélectionnez un fichier</div>
                                    <input type="hidden" name="thumbnail_img" class="selected-files" value="{{ old('thumbnail_img') }}" required>
                                    @error('thumbnail_img')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('thumbnail_img') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="file-preview box sm">
                                </div>
                                <small class="text-muted">Cette image est ce que les visiteurs verront en premier dans les résultats de leur recherche. Utilisez une image de tailles 300x300.</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 fw-600 col-form-label" for="signinSrEmail">Photos <span class="text-secondary">(600x600)</span> <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <div class="input-group" data-toggle="afriuploader" data-type="image" data-multiple="true">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium form-left">Parcourir</div>
                                    </div>
                                    <div class="form-control file-amount form-right @error('photos') is-invalid @enderror">Sélectionnez un fichier</div>
                                    <input type="hidden" name="photos" class="selected-files" value="{{ old('photos') }}" required>
                                    @error('photos')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('photos') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="file-preview box sm">
                                </div>
                                <small class="text-muted">Ajoutez-en le plus possible, afin que les visiteurs puissent bien voir tous les détails. Utilisez jusqu'à dix photos pour mettre en avant les principales qualités de votre chambre.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Description</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 fw-600 col-from-label">Description <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <textarea class="text-editor @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Niveau de la chambre</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="fw-600 control-label">Niveau de la chambre <span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" data-selected ="{{ old("room_level") }}" name="room_level" title="Sélectionnez une option">
                                <option value="1">Premier étage</option>
                                <option value="2">Deuxième étage</option>
                            </select>
                            @error('room_level')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('room_level') }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group" role="group" aria-label="Second group">
                        <button type="submit" name="button" value="publish" class="btn btn-success">Publier</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection


