<form  wire:submit.prevent="submit" method="post">
    @csrf
    <input type="hidden" wire:model.defer="chambre_id" value="">
    <div class="card card-body border-0 shadow-sm p-4 mb-4" id="basic-info">
        <h2 class="h4 mb-4"><i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>Informations de réservation</h2>
        <div class="mb-3">
            <label class="form-label">Date d'arrivée <span class="text-danger">*</span></label>
            <input type="date" class="form-control  {{ $errors->has('date_start') ? ' is-invalid' : ''}}" wire:model.defer="date_start" >
            @if ($errors->has('date_start'))
              <span class="invalid-feedback" role="alert">
                  {{ $errors->first('date_start') }}
              </span>
            @endif 
        </div>

        <div class="">
            <label class="form-label">Semaine <span class="text-danger">*</span></label>
            <input wire:model.defer="total_week" class="form-control  {{ $errors->has('total_week') ? ' is-invalid' : ''}}" type="number" min="1" placeholder="Entrer le nombre de semaines">
            @if ($errors->has('total_week'))
                <span class="invalid-feedback" role="alert">
                    {{ $errors->first('total_week') }}
                </span>
            @endif   
        </div>
    </div>
    <button type="submit" class="btn btn-lg btn-primary w-100 mb-3">Réserver</button>
</form>