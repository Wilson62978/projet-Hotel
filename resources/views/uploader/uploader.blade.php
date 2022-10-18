<div class="modal fade" id="UploaderModal" data-backdrop="static" role="dialog" aria-hidden="true" >
	<div class="modal-dialog modal-adaptive" role="document">
		<div class="modal-content h-100">
			<div class="modal-header pb-0 bg-light">
				<div class="uppy-modal-nav">
					<ul class="nav nav-tabs border-0">
						<li class="nav-item">
							<a class="nav-link active font-weight-medium text-dark" data-toggle="tab" href="#select-file">Choisir un fichier</a>
						</li>
						<li class="nav-item">
							<a class="nav-link font-weight-medium text-dark" data-toggle="tab" href="#upload-new">Télécharger un nouveau</a>
						</li>
					</ul>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"></span>
				</button>
			</div>
			<div class="modal-body">
				<div class="tab-content h-100">
					<div class="tab-pane active h-100" id="select-file">
						<div class="uploader-filter pt-1 pb-3 border-bottom mb-4">
							<div class="row align-items-center gutters-5 gutters-md-10 position-relative">
								<div class="col-xl-2 col-md-3 col-5">
									<div class="">
										<select class="form-control form-control-xs " name="uploader-sort">
											<option value="newest" selected>Trier par le plus récent</option>
											<option value="oldest">Trier par le plus ancien</option>
											<option value="smallest">Trier par le plus petit</option>
											<option value="largest">Trier par le plus grand</option>
										</select>
									</div>
								</div>
								<div class="col-md-3 col-5">
									<div class="custom-control custom-radio">
										<input type="checkbox" class="custom-control-input" name="show-selected" id="show-selected" name="stylishRadio">
										<label class="custom-control-label" for="show-selected">
										    Sélectionné uniquement
										</label>
									</div>
								</div>
								<div class="col-md-4 col-xl-3 ml-auto mr-0 col-2 position-static">
									<div class="uploader-search text-right">
										<input type="text" class="form-control form-control-xs" name="uploader-search" placeholder="Rechercher un fichier">
										<i class="search-icon d-md-none"><span></span></i>
									</div>
								</div>
							</div>
						</div>
                        
						<div class="uploader-all clearfix c-scrollbar-light">
							<div class="align-items-center d-flex h-100 justify-content-center w-100">
								<div class="text-center">
									<h3>Aucun fichier trouvé</h3>
								</div>
							</div>
						</div>
					</div>

					<div class="tab-pane h-100" id="upload-new">
						<div id="upload-files" class="h-100">
                            
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer justify-content-between bg-light">
				<div class="flex-grow-1 overflow-hidden d-flex">
					<div class="">
						<div class="uploader-selected">0 fichier sélectionné</div>
						<button type="button" class="btn-link btn btn-sm p-0 uploader-selected-clear">Effacé</button>
					</div>
					<div class="mb-0 ml-3">
						<button type="button" class="btn btn-sm btn-primary" id="uploader_prev_btn">Précédent</button>
						<button type="button" class="btn btn-sm btn-primary" id="uploader_next_btn">Suivant</button>
					</div>
				</div>
				<button type="button" class="btn btn-sm btn-primary" data-toggle="UploaderAddSelected">Ajouter un fichier</button>
			</div>
		</div>
	</div>
</div>
