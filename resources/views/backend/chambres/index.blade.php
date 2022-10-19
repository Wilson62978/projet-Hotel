@extends('backend.layouts.app')

@section('content')

<div class="titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3">Toutes les chambres</h1>
		</div>
        <div class="col-md-6 text-md-right">
            <a href="{{ route('chambre.create') }}" class="btn btn-primary">
                <span>Ajouter une chambre</span>
            </a>
        </div>
	</div>
</div>
<br>

<div class="card">
	<form class="" id="sort_products" action="" method="GET">
		<div class="card-header row gutters-5">
			<div class="col text-center text-md-left">
				<h5 class="mb-md-0 h6">Toutes les chambres</h5>
			</div>

			<div class="col-md-2 ml-auto">
				<select class="form-control form-control-sm selectpicker mb-2 mb-md-0" name="type" id="type" onchange="sort_products()">
					<option value="">Trier par</option>
			        <option value="rating,desc" @isset($col_name , $query) @if($col_name == 'rating' && $query == 'desc') selected @endif @endisset>Rating High > Low</option>
			        <option value="rating,asc" @isset($col_name , $query) @if($col_name == 'rating' && $query == 'asc') selected @endif @endisset>Rating Low > High</option>
			        <option value="num_of_sale,desc"@isset($col_name , $query) @if($col_name == 'num_of_sale' && $query == 'desc') selected @endif @endisset>Num of Sale High > Low</option>
			        <option value="num_of_sale,asc"@isset($col_name , $query) @if($col_name == 'num_of_sale' && $query == 'asc') selected @endif @endisset>Num of Sale Low > High</option>
				</select>
			</div>
			<div class="col-md-2">
				<div class="form-group mb-0">
					<input type="text" class="form-control form-control-sm" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="Type & Enter">
				</div>
			</div>
		</div>
	</form>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th class="w-40px">#</th>
                    <th >Nom</th>
                    <th data-breakpoints="md">Info</th>
                    <th data-breakpoints="md">Publié</th>
                    <th data-breakpoints="md" class="text-right">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($chambres as $key => $chambre)
                    <tr>
                        <td>{{ ($key+1) + ($chambres->currentPage() - 1)*$chambres->perPage() }}</td>

                        <td>
                            <a href="{{ route('chambres.first', ['slug' => $chambre->slug]) }}" target="_blank" class="text-reset d-block">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset(Storage::url($chambre->thumbnail_img)) }}" 
                                        alt="{{ $chambre->name }}" 
                                        class="size-60px img-fluid size-xxl-80px mr-2" 
                                        onerror="this.onerror=null;this.src='{{ asset('admin_assets/assets/img/placeholder.jpg') }}';" 
                                    />
                                    <span class="flex-grow-1 minw-0">
                                        <div class=" text-truncate-2 fs-12">
                                            {{ $chambre->name }}
                                        </div>
                                    </span>
                                </div>
                            </a>
                        </td>

                        <td>
                            <div>
                                <div>
                                    <span>Niveau étage</span>: 
                                    <span class="rating rating-sm my-2">
                                        @if ($chambre->niveau_chambre == 1)
                                            <span class="fw-600">
                                                1 <sup>er</sup> étage
                                            </span>
                                        @else
                                            <span class="fw-600">
                                                2 <sup>eme</sup> étage
                                            </span>
                                        @endif
                                    </span>
                                </div>
                                <div>
                                    <span>Etat</span>:
                                    @if ($chambre->quantity > 0)
                                        <span class="fw-600 badge badge-inline badge-success">
                                            Disponible
                                        </span>
                                    @else
                                        <span class="fw-600 badge badge-inline badge-danger">
                                            Indisponible
                                        </span>
                                    @endif
                                <div>
                                    <span>Prix</span>:
                                    <span class="fw-600">
                                        {{ number_format($chambre->price) }} FCFA
                                    </span>
                                </div>
                            </div>
                        </td>

                        <td>
                            <label class="switch switch-success mb-0">
                                <input onchange="update_published(this)" value="{{ $chambre->id }}" type="checkbox"
                                    @if ($chambre->published == 1) checked @endif>
                                <span class="slider round"></span>
                            </label>
                        </td>

                        <td class="text-right">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                href="{{ route('chambres.first', ['slug' => $chambre->slug]) }}" title="Voir" target="_blank">
                                <i class="las la-eye"></i>
                            </a>
                            <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="{{ route('chambre.edit', ['chambre' => $chambre->id]) }}" title="Modifier">
                                <i class="las la-edit"></i>
                            </a>
                            <form action="" method="post" class="d-inline confirm-delete" data-action="{{ route('chambre.destroy', $chambre->id) }}">
                                @csrf
                                <button class="btn btn-soft-danger btn-icon btn-circle btn-sm" title="Supprimer">
                                    <i class="las la-trash"></i>
                                </button>
                            </form>
                        </td>
                  	</tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $chambres->appends(request()->input())->links() }}
        </div>
    </div>
</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection


@section('script')
    <script type="text/javascript">
        function sort_products(el){
            $('#sort_products').submit();
        }

        function update_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('chambre.published') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data.status){
                    setInterval(() => {
                            location.reload();
                        }, 5000);
                }
                else{
                    AFRI.plugins.notify('danger', 'Quelque chose s\'est mal passé lors du traitement des données');
                }
            });
        }
    </script>
@endsection
