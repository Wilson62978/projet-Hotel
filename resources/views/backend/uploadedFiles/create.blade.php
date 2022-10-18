@extends('backend.layouts.app')

@section('content')
<div class="titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3">Télécharger un fichier</h1>
		</div>
		<div class="col-md-6 text-md-right">
			<a href="{{ route('uploaded-files.index') }}" class="btn btn-link text-reset">
				<i class="las la-angle-left"></i>
				<span>Retour aux fichiers téléchargés</span>
			</a>
		</div>
	</div>
</div>
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">Faites glisser et déposez vos fichiers</h5>
    </div>
    <div class="card-body">
    	<div id="upload-files" class="h-420px" style="min-height: 65vh">
    		
    	</div>
    </div>
</div>
@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function() {
			AFRI.plugins.afriUppy();
		});
	</script>
@endsection