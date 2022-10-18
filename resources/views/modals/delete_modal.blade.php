<div id="delete-modal" class="modal fade">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6">Confirmer la suppression</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mt-1">Êtes-vous sûr de vouloir supprimer ceci?</p>
                <button type="button" class="btn btn-secondary mt-2" data-dismiss="modal">Annuler</button>
                <form action="" method="post" id="delete-link" class="d-inline">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-primary mt-2">
                        <span>Supprimer</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
