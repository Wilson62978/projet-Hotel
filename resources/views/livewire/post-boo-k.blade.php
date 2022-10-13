<form  wire:submit.prevent="submit" method="post">
    @csrf

    <input type="hidden" wire:model="chambre_id" value="">
    <div class="card card-body border-0 shadow-sm p-4 mb-4" id="basic-info">
        <h2 class="h4 mb-4"><i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>Informations de réservation</h2>
        <div class="mb-3">
            <label class="form-label">Date d'arrivée <span class="text-danger">*</span></label>
            <div class="input-group input-group-lg">
            <input class="form-control date-picker rounded pe-5 {{ $errors->has('date_start') ? ' is-invalid' : ''}}"  type="text" id="pr-birth-date" placeholder="Choisissez une date"  wire:model="date_start"  data-datepicker-options="{&quot;altInput&quot;: true, &quot;altFormat&quot;: &quot;F j, Y&quot;, &quot;dateFormat&quot;: &quot;Y-m-d&quot;}">
            <i class="fi-calendar text-muted position-absolute top-50 end-0 translate-middle-y me-3"></i>
            </div>
            @if ($errors->has('date_start'))
            <span class="invalid-feedback" role="alert">
                {{ $errors->first('date_start') }}
            </span>
        @endif 
        </div>

        <div class="">
            <label class="form-label">Semaine <span class="text-danger">*</span></label>
            <input wire:model="total_week" class="form-control  {{ $errors->has('total_week') ? ' is-invalid' : ''}}" type="number" min="1" placeholder="Entrer le nombre de semaines">
            @if ($errors->has('total_week'))
                <span class="invalid-feedback" role="alert">
                    {{ $errors->first('total_week') }}
                </span>
            @endif   
        </div>
    </div>
    <button type="submit" class="btn btn-lg btn-primary w-100 mb-3">Réserver</button>
</form>





{{-- <form wire:submit.prevent="submit"  method="post">
    @csrf
    <input type="hidden" wire:model="chambre_id" value="">
  <div class="bg-light mb-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="border-bottom text-center text-dark p-3 pt-4 mb-3">
      
      <span class="align-middle fs-1 lh-sm fw-bold">{{ number_format($chambre->price, 0, '', ' ') }} FCFA</span>
      <span class="align-bottom fs-6 lh-lg"><br> par semaines</span>
    </div>
    <div class="row g-3 p-4 pt-2">
      <div class="col-12">
        <div class="date" id="date3" data-target-input="nearest">
            Date d'arrivée
        </div>
      </div>
      <div class="col-12">
        <div class="date" id="date4" data-target-input="nearest">
          <input type="date"  wire:model="date_start"  class="form-control datetimepicker-input {{ $errors->has('date_start') ? ' is-invalid' : ''}}" placeholder="Check out" data-target="#date4" data-toggle="datetimepicker" />
            @if ($errors->has('date_start'))
                <span class="invalid-feedback" role="alert">
                    {{ $errors->first('date_start') }}
                </span>
            @endif   
        </div>
      </div>
      <div class="col-12">
        <div>
          Nombre de semaines
        </div>
      </div>
      <div class="col-12">
        <input type="number"  wire:model="total_week" class="form-control  {{ $errors->has('total_week') ? ' is-invalid' : ''}}" placeholder="" />
        @if ($errors->has('total_week'))
            <span class="invalid-feedback" role="alert">
                {{ $errors->first('total_week') }}
            </span>
        @endif   
      </div>
      <div class="col-12">
      <br><br>
      </div>
      <div class="col-12">
        <button type="submit"class="btn btn-primary py-3 w-100">Reserver</button>
      </div>
    </div>
  </div>
</form> --}}