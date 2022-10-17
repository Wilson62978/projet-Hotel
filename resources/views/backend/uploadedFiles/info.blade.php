<div>
	<div class="form-group">
		<label>Nom du fichier</label>
		<input type="text" class="form-control" value="{{ $file->file_original_name }}" disabled>
	</div>
	<div class="form-group">
		<label>Type du fichier</label>
		<input type="text" class="form-control" value="{{ $file->file_type }}" disabled>
	</div>
	<div class="form-group">
		<label>Taille du fichier</label>
		<input type="text" class="form-control" value="{{ formatBytes($file->file_size) }}" disabled>
	</div>
	<div class="form-group">
		<label>Téléchargé le</label>
		<input type="text" class="form-control" value="{{ $file->created_at }}" disabled>
	</div>
	<div class="form-group text-center">
		<a class="btn btn-secondary" href="{{ asset(Storage::url($file->file_name)) }}" target="_blank" download="{{ $file->file_original_name}}.{{ $file->file_extension }}">Télécharger</a>
	</div>
</div>