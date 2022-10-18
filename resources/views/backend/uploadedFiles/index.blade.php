@extends('backend.layouts.app')

@section('content')
<div class="titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3">Tous les fichiers</h1>
		</div>
		<div class="col-md-6 text-md-right">
			<a href="{{ route('uploaded-files.create') }}" class="btn btn-primary">
				<span>Ajouter un fichier</span>
			</a>
		</div>
	</div>
</div>

<div class="card">
    <form id="sort_uploads" action="">
        <div class="card-header row gutters-5">
            <div class="col-md-3">
                <h5 class="my-2 h6">Tous les fichiers</h5>
            </div>
            <div class="col-md-3 ml-auto mr-0 my-2">
                <select class="form-control form-control-xs selectpicker" name="sort" onchange="sort_uploads()">
                    <option value="newest" @if($sort_by === 'newest') selected @endif>Trier par le plus récent</option>
                    <option value="oldest" @if($sort_by === 'oldest') selected @endif>Trier par le plus ancien</option>
                    <option value="smallest" @if($sort_by === 'smallest') selected @endif>Trier par le plus petit</option>
                    <option value="largest" @if($sort_by === 'largest') selected @endif>Trier par le plus grand</option>
                </select>
            </div>
            <div class="col-md-3 my-2">
                <input type="text" class="form-control form-control-xs" name="search" placeholder="Rechercher un fichier" value="{{ $search }}">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Recherche</button>
            </div>
        </div>
    </form>
    <div class="card-body">
    	<div class="row gutters-5">
    		@foreach($allUploads as $file)
    			<div class="col-auto w-140px w-lg-220px">
    				<div class="file-box">
    					<div class="dropdown-file" >
    						<a class="dropdown-link" data-toggle="dropdown">
    							<i class="la la-ellipsis-v"></i>
    						</a>
    						<div class="dropdown-menu dropdown-menu-right">
    							<a href="javascript:void(0)" class="dropdown-item" onclick="detailsInfo(this)" data-id="{{ $file->id }}">
    								<i class="las la-info-circle mr-2"></i>
    								<span>Détails</span>
    							</a>
    							<a href="{{ asset(Storage::url($file->file_name)) }}" target="_blank" download="{{ $file->file_original_name}}.{{ $file->file_extension }}" class="dropdown-item">
    								<i class="la la-download mr-2"></i>
    								<span>Télécharger</span>
    							</a>
    							<a href="javascript:void(0)" class="dropdown-item" onclick="copyUrl(this)" data-url="{{ asset(Storage::url($file->file_name)) }}">
    								<i class="las la-clipboard mr-2"></i>
    								<span>Copier le lien</span>
    							</a>
                                <form action="javascript:void(0)" method="post" class="d-inline confirm-delete" data-action="{{ route('uploaded-files.destroy', $file->id ) }}" data-target="#delete-modal">
                                    @csrf
                                    <button class="dropdown-item confirm-alert">
                                        <i class="las la-trash mr-2"></i>
    								    <span>Supprimer</span>
                                    </button>
                                </form>
    						</div>
    					</div>
    					<div class="card card-file uploader-select c-default" title="{{ $file->file_original_name }}.{{ $file->file_extension }}">
    						<div class="card-file-thumb">
    							@if($file->file_type == 'image')
    								<img src="{{ asset(Storage::url($file->file_name)) }}" class="img-fit mx-auto">
    							@elseif($file->type == 'video')
    								<i class="las la-file-video"></i>
    							@else
    								<i class="las la-file"></i>
    							@endif
    						</div>
    						<div class="card-body">
    							<h6 class="d-flex">
    								<span class="text-truncate title">{{ $file->file_original_name }}</span>
    								<span class="ext">.{{ $file->file_extension }}</span>
    							</h6>
                                <p>{{ formatBytes($file->file_size) }}</p>
    						</div>
    					</div>
    				</div>
    			</div>
    		@endforeach
    	</div>
		<div class="pagination mt-3">
			{{ $allUploads->links() }}
		</div>
    </div>
</div>
@endsection
@section('modal')
<div id="delete-modal" class="modal fade">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6">Confirmer la suppression</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mt-1">Êtes-vous sûr de vouloir supprimer ce fichier?</p>
                <button type="button" class="btn btn-secondary mt-2" data-dismiss="modal">Annuler</button>
                <form action="" method="post" id="delete-link" class="d-inline">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-primary mt-2 comfirm-link">
                        <span>Supprimer</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="info-modal" class="modal fade">
	<div class="modal-dialog modal-dialog-right">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title h6">Détails du Fichier</h5>
				<button type="button" class="close" data-dismiss="modal">
				</button>
			</div>
			<div class="modal-body c-scrollbar-light position-relative" id="info-modal-content">
				<div class="c-preloader text-center absolute-center">
                    <i class="las la-spinner la-spin la-3x opacity-70"></i>
                </div>
			</div>
		</div>
	</div>
</div>

@endsection
@section('script')
	<script type="text/javascript">
		function detailsInfo(e){
            $('#info-modal-content').html('<div class="c-preloader text-center absolute-center"><i class="las la-spinner la-spin la-3x opacity-70"></i></div>');
			var id = $(e).data('id')
            $('#info-modal').modal('show');
			$.post('{{ route('uploaded-files.info') }}', {_token: AFRI.data.csrf, id:id}, function(data){
                $('#info-modal-content').html(data);
			});
		}
		function copyUrl(e) {
			var url = $(e).data('url');
			var $temp = $("<input>");
		    $("body").append($temp);
		    $temp.val(url).select();
		    try {
			    document.execCommand("copy");
			    AFRI.plugins.notify('success', 'Le lien a été copié');
			} catch (err) {
			    AFRI.plugins.notify('danger', 'Impossible de copier le lien');
			}
		    $temp.remove();
		}
        function sort_uploads(el){
            $('#sort_uploads').submit();
        }
	</script>
@endsection