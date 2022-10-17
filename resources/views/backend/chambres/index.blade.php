@extends('backend.layout.app')

@section('content')

<div class="titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3">Tous les produits</h1>
		</div>
        @if($type != 'Seller')
    		<div class="col-md-6 text-md-right">
    			<a href="{{ route('add.product') }}" class="btn btn-primary">
    				<span>Ajouter un produit</span>
    			</a>
    		</div>
        @endif
	</div>
</div>
<br>

<div class="card">
	<form class="" id="sort_products" action="" method="GET">
		<div class="card-header row gutters-5">
			<div class="col text-center text-md-left">
				<h5 class="mb-md-0 h6">Tous les produits</h5>
			</div>
			{{-- @if($type == 'Seller')
			<div class="col-md-2 ml-auto">
				<select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" id="user_id" name="user_id" onchange="sort_products()">
					<option value="">{{ translate('All Sellers') }}</option>
		            @foreach (App\Seller::all() as $key => $seller)
		                @if ($seller->user != null && $seller->user->shop != null)
		                    <option value="{{ $seller->user->id }}" @if ($seller->user->id == $seller_id) selected @endif>{{ $seller->user->shop->name }} ({{ $seller->user->name }})</option>
		                @endif
		            @endforeach
				</select>
			</div>
			@endif --}}
			{{-- @if($type == 'All')
			<div class="col-md-2 ml-auto">
				<select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" id="user_id" name="user_id" onchange="sort_products()">
					<option value="">{{ translate('All Sellers') }}</option>
		            @foreach (App\User::where('user_type', '=', 'admin')->orWhere('user_type', '=', 'seller')->get() as $key => $seller)
                		<option value="{{ $seller->id }}" @if ($seller->id == $seller_id) selected @endif>{{ $seller->name }}</option>
		            @endforeach
				</select>
			</div>
			@endif --}}
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
                    <th class="col-xl-2">Nom</th>
                    <th data-breakpoints="md">Info</th>
                    <th data-breakpoints="md" width="20%">Catégories</th>
                    <th data-breakpoints="md">Marque</th>
                    <th data-breakpoints="md">Publié</th>
                    <th data-breakpoints="md" class="text-right">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $key => $product)
                    <tr>
                        <td>{{ ($key+1) + ($products->currentPage() - 1)*$products->perPage() }}</td>

                        <td>
                            <a href="{{ route('products.show', ['product' => $product->slug]) }}" target="_blank" class="text-reset d-block">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset(Storage::url($product->thumbnail_img)) }}" alt="{{ $product->name }}" class="size-60px size-xxl-80px mr-2" onerror="this.onerror=null;this.src='{{ asset('assets/img/placeholder.jpg') }}';" />
                                    <span class="flex-grow-1 minw-0">
                                        <div class=" text-truncate-2 fs-12">
                                            {{ $product->name }}
                                        </div>
                                    </span>
                                </div>
                            </a>
                        </td>

                        <td>
                            <div>
                                <div>
                                    <span>Evaluation</span>: 
                                    <span class="rating rating-sm my-2">
                                        {{ renderStarRating($product->rating) }}
                                    </span>
                                </div>
                                <div>
                                    <span>Total vendu</span>: 
                                    <span class="fw-600">
                                        {{ $product->num_of_sale }}
                                    </span>
                                <div>
                                    <span>Prix</span>:
                                    @if ($product->highest_price != $product->lowest_price)
                                        <span class="fw-600">
                                            {{ format_price($product->lowest_price) }} - {{ format_price($product->highest_price) }} FCFA
                                        </span>
                                    @else
                                        <span class="fw-600">
                                            {{ format_price($product->lowest_price) }} FCFA
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </td>

                        <td>
                            @foreach ($product->categories as $category)
                                <span
                                    class="badge badge-inline badge-md bg-soft-dark mb-1">{{ $category->name }}</span>
                            @endforeach
                        </td>

                        <td>
                            @if ($product->brand !== null)
                                <div class="h-50px w-100px d-flex align-items-center justify-content-center">
                                    <img src="{{ asset(Storage::url($product->brand->logo)) }}"
                                        alt="{{ $product->brand->name }}" class="mw-100 mh-100"
                                        onerror="this.onerror=null;this.src='{{ asset('/assets/img/placeholder.jpg') }}';" 
                                    />
                                </div>
                            @else
                                <span>-</span>
                            @endif
                        </td>

                        <td>
                            <label class="switch switch-success mb-0">
                                <input onchange="update_published(this)" value="{{ $product->id }}" type="checkbox"
                                    @if ($product->published == 1) checked @endif>
                                <span class="slider round"></span>
                            </label>
                        </td>

                        <td class="text-right">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                href="{{ route('products.show', ['product' => $product->id]) }}" title="Voir">
                                <i class="las la-eye"></i>
                            </a>
                            <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="{{ route('products.edit', ['product' => $product->id]) }}" title="Modifier">
                                <i class="las la-edit"></i>
                            </a>
                            <form action="" method="post" class="d-inline confirm-delete" data-action="{{ route('products.destroy', $product->id) }}">
                                @csrf
                                <button class="btn btn-soft-danger btn-icon btn-circle btn-sm" title="Supprimer">
                                    <i class="las la-trash"></i>
                                </button>
                            </form>
                        </td>

                        {{-- <td>{{ $product->num_of_sale }} </td>
                        <td>
                            @php
                                $qty = 0;
                                if($product->variant_product){
                                    foreach ($product->stocks as $key => $stock) {
                                        $qty += $stock->qty;
                                    }
                                }
                                else{
                                    $qty = $product->current_stock;
                                }
                                echo $qty;
                            @endphp
                        </td>
                        <td>{{ number_format($product->unit_price,2) }}</td>
                        <td>
							<label class="aiz-switch aiz-switch-success mb-0">
                              <input onchange="update_todays_deal(this)" value="{{ $product->id }}" type="checkbox" <?php if($product->todays_deal == 1) echo "checked";?> >
                              <span class="slider round"></span>
							</label>
						</td>
                        <td>{{ $product->rating }}</td>
                        <td>
							<label class="aiz-switch aiz-switch-success mb-0">
                              <input onchange="update_published(this)" value="{{ $product->id }}" type="checkbox" <?php if($product->published == 1) echo "checked";?> >
                              <span class="slider round"></span>
							</label>
						</td>
                      	<td>
							<label class="aiz-switch aiz-switch-success mb-0">
	                            <input onchange="update_featured(this)" value="{{ $product->id }}" type="checkbox" <?php if($product->featured == 1) echo "checked";?> >
	                            <span class="slider round"></span>
							</label>
						</td>
						<td class="text-right">
							@if ($type == 'Seller')
		                      <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('products.seller.edit', ['id'=>$product->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
		                          <i class="las la-edit"></i>
		                      </a>
							@else
								<a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('products.admin.edit', ['id'=>$product->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
								   <i class="las la-edit"></i>
							   </a>
							@endif
							<a class="btn btn-soft-success btn-icon btn-circle btn-sm" href="{{route('products.duplicate', ['id'=>$product->id, 'type'=>$type]  )}}" title="{{ translate('Duplicate') }}">
							   <i class="las la-copy"></i>
						   </a>
                           <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('products.destroy', $product->id)}}" title="{{ translate('Delete') }}">
                              <i class="las la-trash"></i>
                           </a>
                        </td> --}}
                  	</tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $products->appends(request()->input())->links() }}
        </div>
    </div>
</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection


@section('script')
    <script type="text/javascript">

        $(document).ready(function(){
            //$('#container').removeClass('mainnav-lg').addClass('mainnav-sm');
        });

        function sort_products(el){
            $('#sort_products').submit();
        }

    </script>
@endsection
