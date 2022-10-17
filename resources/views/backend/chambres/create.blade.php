@extends('backend.layout.app')

@section('content')
<div class="titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">Ajouter un produit</h5>
</div>

<div class="">
    <form class="form form-horizontal mar-top" action="{{route('products.store')}}" method="POST" enctype="multipart/form-data" id="product_form">
        <div class="row gutters-5">
            <div class="col-lg-8">
                @csrf
                @foreach ($categories as $categorie)
                    <input type="hidden" name="product_categories[]" value="{{ $categorie }}">
                @endforeach
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Détails de la fiche</h5>
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
                            <label class="col-md-3 fw-600 col-from-label">Marque <span class="text-danger">*</span> </label>
                            <div class="col-md-8">
                                <select class="form-control @error("brands") is-invalid @enderror selectpicker" name="brands" data-selected="{{ old("brands") }}" title="Sélectionnez une marque" data-live-search="true" required>
                                    @foreach ( $brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error("brands")
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first("brands") }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 fw-600 col-from-label">Quantité minimale d'achat <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="number" class="form-control @error('min_qty') is-invalid @enderror" name="min_qty" value="{{ old('min_qty') ? old('min_qty') : 1 }}" min="1" required>
                                @error('min_qty')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('min_qty') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 fw-600 col-from-label">Tags <span class="text-secondary">Facultatif</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control tag-input" name="tags" value="{{ old('tags') ? old('tags') : " " }}" placeholder="Tapez et appuyez sur entrée pour ajouter un tag">
                                <small class="text-muted">Quels mots un client utiliserait-il pour chercher votre produit ?</small>
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
                                <small class="text-muted">Cette image est ce que les acheteurs verront en premier dans les résultats de leur recherche. Utilisez une image de tailles 300x300.</small>
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
                                <small class="text-muted">Ajoutez-en le plus possible, afin que les acheteurs puissent bien voir tous les détails. Utilisez jusqu'à dix photos pour mettre en avant les principales qualités de votre article.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" >
                        <h5 class="mb-0 h6">Stock et prix</h5>
                        <div id="variant">
                            @if ($attributes->isNotEmpty())
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="mb-0 mr-3 ml-0 fw-600">Ajouter des variations</label>
                                    <label class="switch switch-success mb-0">
                                        <input type="checkbox" name="is_variant" onchange="createVariant(this)" @if (old("is_variant") !== null) checked @endif>
                                        <span></span>
                                    </label>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="no_product_variant" @if (old('is_variant') !== null) style="display:none;" @endif>
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
                            <div class="form-group row">
                                <label class="col-md-3 fw-600 col-from-label">SKU</label>
                                <div class="col-md-8">
                                    <input type="test" placeholder="SKU" name="sku" value="{{ old('sku') }}" class="form-control @error('sku') is-invalid @enderror">
                                    @error('sku')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('sku') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @if ($attributes->isNotEmpty())
                            <div class="has_product_variant" @if (old('is_variant') === null) style="display:none;" @endif>
                                <div class="alert alert-info">
                                    Ajoutez les options disponibles, de taille et de couleur par exemple. Les acheteurs pourront choisir parmi ces options lors de leur commande.
                                </div>
                                <div class="customer_choice_options">
                                    @if (old('product_options') !== null && !empty(old('product_options')))
                                        @foreach (old('product_options') as $key => $product_option)
                                            <div class="form-group row gutters-10" id="{{ $key }}">
                                                <div class="col-xxl-3 col-xl-4 col-md-5 attr-names">
                                                    <select class="form-control selectpicker" name="product_options[]" onchange="getOptionValues(this)" data-live-search="true" data-selected="{{ $product_option }}" title="Sélectionnez une option">
                                                        @foreach ($attributes as $attribute)
                                                            <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('product_options.'.$product_option))
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $errors->first('product_options.'.$product_option) }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col attr-values">
                                                    <select class="form-control selectpicker  @if ($errors->has('product_option_'.$product_option.'_values')) is-invalid @endif" name="product_option_{{ $product_option }}_values[]" multiple data-live-search="true" onchange="updateSku()" title="Sélectionnez une option">
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->id == $product_option)
                                                                @foreach($attribute->attributeValues as   $attributeValue)
                                                                    <option value="{{ $attributeValue->id }}" @if(!empty(old("product_option_".$product_option."_values")) && in_array($attributeValue->id, old("product_option_".$product_option."_values"))) selected @endif>{{ $attributeValue->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('product_option_'.$product_option.'_values'))
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $errors->first('product_option_'.$product_option.'_values') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                @if ($key == 0)
                                                    <div class="col-auto">
                                                        <button type="button" class="btn btn-icon btn-soft-secondary"
                                                            onclick="addNewOption()">
                                                            <i class="la-plus las opacity-70"></i>
                                                        </button>
                                                    </div>
                                                @else
                                                    <div class="col-auto">
                                                        <button type="button" data-toggle="remove-parent" class="btn btn-icon p-0"
                                                            data-parent=".row" onclick="removeOption('{{ $key }}')">
                                                            <i class="la-2x la-trash las opacity-70"></i>
                                                        </button>
                                                    </div>
                                                @endif
                                            </div>
                                        
                                        @endforeach
                                    @else
                                        <div class="form-group row gutters-10">
                                            <div class="col-xxl-3 col-xl-4 col-md-5 attr-names">
                                                <select class="form-control selectpicker @error('product_options') is-invalid @enderror" name="product_options[]" onchange="getOptionValues(this)" data-live-search="true" title="Sélectionnez une option">
                                                    @foreach ($attributes as $attribute)
                                                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('product_options')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $errors->first('product_options') }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            
                                            <div class="col attr-values">
                                                <div class="form-control">
                                                    <span>Sélectionnez une option</span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button type="button" class="btn btn-icon btn-soft-secondary" onclick="addNewOption(this)">
                                                    <i class=" la-plus las opacity-70"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                    <input type="hidden" name="variant_option_id" value="" id="variant_option_id">
                                </div>

                                <div class="sku_combination" id="sku_combination">
                                    @if (old('product_options') !== null && !empty(old('product_options')))
                                        @include('backend.product.products.sku_combinations', ['combinations' => old('combinations')])
                                    @endif
                                </div>
                            </div>
                        @endif
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


                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Livraison</h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            Donnez des informations réalistes et claires pour les acheteurs concernant l'expédition, en indiquant un délai de traitement le plus exact possible.
                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-md-3 fw-600 col-from-label">Description <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <textarea class="text-editor @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Avertir sur la quantité en stock</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="fw-600 control-label">
                                Quantité
                            </label>
                            <input type="number" name="low_stock_quantity" value="{{ (old('low_stock_quantity') !== null) ? old('low_stock_quantity') : 1 }}" min="0" step="1" class="form-control @error('low_stock_quantity') is-invalid @enderror">
                            @error('low_stock_quantity')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('low_stock_quantity') }}</strong>
                                </span>
                            @enderror 
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">
                            État de visibilité du produit
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-6 fw-600 col-from-label">Afficher en cas de rupture de stock</label>
                            <div class="col-md-6">
                                <label class="switch switch-success mb-0">
                                    <input type="checkbox" name="stock_visibility" @if (old('stock_visibility')) checked @endif>
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Rebais</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="fw-600 control-label" for="start_date">Plage de dates de rebais</label>
                            <input type="text" class="form-control date-range @error('date_range') is-invalid @enderror" name="date_range" value="{{ old('date_range') }}"  placeholder="Sélectionner la date" data-time-picker="true" data-format="DD-MM-Y HH:mm:ss" data-separator=" to " autocomplete="off">
                            @error('date_range')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('date_range') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="fw-600 col-from-label">Rabais <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" lang="fr" min="0" step="0.01" placeholder="Rebais" name="discount" value="{{ old('discount') ? old('discount') : 0 }}" class="form-control form-left @error('discount') is-invalid @enderror" required>
                                <div class="input-group-append">
                                    <span class="input-group-text form-right">%</span>
                                </div>
                                @error('discount')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('discount') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                @include('backend.product.products.product_characteristics', ['attributes' => $attributes])

            </div>
            <div class="col-12">
                <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    {{-- <div class="btn-group mr-2" role="group" aria-label="First group">
                        <button type="submit" name="button" value="draft" class="btn btn-warning">{{ ('Save As Draft') }}</button>
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="Third group">
                        <button type="submit" name="button" value="unpublish" class="btn btn-primary">{{ ('Save & Unpublish') }}</button>
                    </div> --}}
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
        $(document).ready(function() {
            if ($('.customer_choice_options').find('.attr-names').find('.selectpicker').val() !== '') {
                $('.customer_choice_options').find('.attr-names').find('.selectpicker').siblings(
                    '.dropdown-toggle').addClass("disabled");
            }
        });

        function getOptionValues(e) {
            $('#variant_option_id').val('')
            $('#variant_option_id').val($(e).val())
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                data: $('#product_form').serialize(),
                url: '{{ route('product.option.values') }}',
                success: function(data) {
                    if (data.status) {
                        $(e).closest('.row').find('.attr-values').html(data.view);
                        AFRI.plugins.bootstrapSelect();
                    }else{
                        $(e).closest('.row').find('.attr-values').html(data.view);
                        AFRI.plugins.bootstrapSelect();
                        AFRI.plugins.notify('danger', "Quelque chose s'est mal passé lors du traitement des données. Veuilez réessayer");
                    }
                }
            });
        }

        function addNewOption(e) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                data: $('#product_form').serialize(),
                url: '{{ route('product.attribute') }}',
                success: function(data) {
                    if (data.status == -1) {
                        AFRI.plugins.notify('warning', 'Assurez vous que les champs de l\'attribut ne soient pas vide afin d\'ajouter un nouveau');
                    } else if (data.status) {
                        $('.customer_choice_options').find('.attr-names').find('.selectpicker').siblings(
                            '.dropdown-toggle').addClass("disabled");
                        $('.customer_choice_options').append(data.view);
                        AFRI.plugins.bootstrapSelect();
                    } else {
                        AFRI.plugins.notify('info', 'No more arrtribute found.');
                    }
                }
            });
        }

        function removeOption(id){
            $('#'+id).remove();
            updateSku();
        }

        function updateSku() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: '{{ route('product.combination') }}',
                data: $('#product_form').serialize(),
                success: function(data) {
                    $('#sku_combination').html(data.view);
                    setTimeout(() => {
                        AFRI.uploader.previewGenerate();
                        AFRI.plugins.fooTable();
                    }, 500);
                }
            });
        }

        function createVariant(el) {
            $(".has_product_variant").hide();
            $(".no_product_variant").hide();
            if ($(el).is(':checked')) {
                $(".has_product_variant").show();
            } else {
                $(".no_product_variant").show();
            }
        }
    </script>
@endsection


