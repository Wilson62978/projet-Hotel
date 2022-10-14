<section class="pt-4 pt-lg-5">
    <form wire:submit.prevent="submit" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $chambre->id }}">
        <input type="hidden" name="date_start" value="{{ $date_start }}">
        <input type="hidden" name="date_end" value="{{ $date_end }}">
        <input type="hidden" name="total_week" value="{{ $total_week }}">
        <div class="container">
            <div class="row g-4 g-xl-5 mt-5">
                <div class="col-xl-8">
                      <div class="card border shadow-sm mb-3 ">
                        <div class="card-header border-bottom">
                            <h5 class="mb-0 cardt-title">Vos informations</h5>
                        </div>

                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Nom <span class="text-danger">*</span></label>
                                <input class="form-control  {{ $errors->has('nom') ? 'is-invalid' : '' }} " type="text" wire:model.defer="nom"  name="nom" min="1" placeholder="Nom">
                                @if ($errors->has('nom'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('nom') }}
                                    </span>
                                @endif  
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Prénom <span class="text-danger">*</span></label>
                                <input class="form-control {{ $errors->has('prenom') ? 'is-invalid' : '' }} " type="text" wire:model.defer="prenom" name="prenom" min="1" placeholder="Prénom">
                                @if ($errors->has('prenom'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('prenom') }}
                                    </span>
                                @endif  
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" wire:model.defer="email"  name="email" min="1" placeholder="Email">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif  
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Numéro de téléphone <span class="text-danger">*</span></label>
                                <input class="form-control {{ $errors->has('numero') ? 'is-invalid' : '' }}" type="text" wire:model.defer="numero" name="numero" min="1" placeholder="Numéro de téléphone">
                                @if ($errors->has('numero'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('numero') }}
                                    </span>
                                @endif  
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nationalité <span class="text-danger">*</span></label>
                                <select class="form-select {{ $errors->has('nationalite_id') ? 'is-invalid' : '' }}"  wire:model.defer="nationalite_id"  id="nationalite_id" name="nationalite_id" >
                                    <option >votre nationalité </option>
                                    @foreach ($nationalites as $nationalite)
                                        <option value="{{ $nationalite->id }}"  
                                            @if (old('nationalite_id') == $nationalite->id ) selected 
                                            @endif
                                        >
                                        {{ $nationalite->titre }}
                                        </option>
                                    @endforeach
                                </select> 
                                @if ($errors->has('nationalite_id'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('nationalite_id') }}
                                    </span>
                                @endif 
                            </div>
                        </div>
                    </div>

                    <div class="card border mb-3 shadow-sm">
                        <!-- Card header -->
                        <div class="card-header border-bottom d-sm-flex justify-content-between align-items-center">
                            <h5 class="mb-2 mb-sm-0">Votre méthode de paiement</h5>
                            <ul class="list-inline my-0">
                                <li class="list-inline-item"> <a href="#"><img src="assets/images/element/visa.svg" class="h-30px" alt=""></a></li>
                                <li class="list-inline-item"> <a href="#"><img src="assets/images/element/mastercard.svg" class="h-30px" alt=""></a></li>
                                <li class="list-inline-item"> <a href="#"><img src="assets/images/element/expresscard.svg" class="h-30px" alt=""></a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="row g-4">
                                <div class="col-12">
                                    <label class="form-label">Numéro de carte <span class="text-danger">*</span></label>
                                    <div class="position-relative form-control-bg-light">
                                        <input type="text" class="form-control  {{ $errors->has('numeroCarte') ? 'is-invalid' : '' }} "  wire:model.defer="numeroCarte"  name="numeroCarte" maxlength="18" placeholder="XXXX XXXX XXXX XXXX">
                                        <img src="assets/images/element/visa.svg" class="w-30px position-absolute top-50 end-0 translate-middle-y me-2 d-none d-sm-block" alt="">
                                        @if ($errors->has('numeroCarte'))
                                            <span class="invalid-feedback" role="alert">
                                                {{ $errors->first('numeroCarte') }}
                                            </span>
                                        @endif 
                                    </div>	
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Date d'expiration <span class="text-danger">*</span></label>
                                    <div class="input-group {{ $errors->has('card_month') || $errors->has('card_year') ? 'is-invalid' : '' }}">
                                        <input type="text"  wire:model.defer="card_month"   name="card_month" class="form-control" maxlength="2" placeholder="MM">
                                        <input type="text"  wire:model.defer="card_year"  name="card_year" class="form-control" maxlength="4" placeholder="AAAA">
                                    </div>
                                    @if ($errors->has('card_month') || $errors->has('card_year'))
                                        <span class="invalid-feedback" role="alert">
                                            Date d'expiration invalide
                                        </span>
                                    @endif 
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">CVV / CVC <span class="text-danger">*</span></label>
                                    <input type="text" name="cvvCvc" wire:model.defer="cvvCvc" class=" {{ $errors->has('cvvCvc') ? 'is-invalid' : '' }} form-control" maxlength="3" placeholder="XXX">
                                    @if ($errors->has('cvvCvc'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('cvvCvc') }}
                                    </span>
                                @endif 
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Nom du titulaire de la carte <span class="text-danger">*</span></label>
                                    <div class="form-control-bg-light">
                                        <input type="text"  wire:model.defer="nomTitulaire"  name="nomTitulaire" class="form-control  {{ $errors->has('nomTitulaire') ? 'is-invalid' : '' }}" aria-label="Nom du titulaire de la carte">
                                        @if ($errors->has('nomTitulaire'))
                                            <span class="invalid-feedback" role="alert">
                                                {{ $errors->first('nomTitulaire') }}
                                            </span>
                                        @endif 
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>

                  
                </div>

                <aside class="col-xl-4">
                    <div class="row g-4 mb-3">
                        <div class="col-md-6 col-xl-12">
                            <div class="card  rounded-2 mb-3">
                                <div class="card-header ">
                                    <h5 class="card-title mb-0">Votre réservation</h5>
                                </div>

                                <div class="card-body ">
                                    <p>{{ $chambre->name }}</p>
                                    <ul class="list-group list-group-borderless">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-normal mb-0">Date de départ:</span>
                                            <span class="fs-5">{{ $date_start }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-normal mb-0">Date de fin:</span>
                                            <span class="fs-5">{{ $date_end }}</span>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-normal mb-0">Prix:</span>
                                            <span class="fs-5">{{ number_format($price, 0, '', ' ') }} FCFA</span>
                                        </li>
                                        @if ($pourcentage!==0)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span class="h6 fw-normal mb-0">Réduction:</span>
                                                <span class="fs-5">{{ number_format($reduction, 0, '', ' ') }} FCFA</span>
                                            </li>
                                           
                                        @endif
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-normal mb-0">TVA:</span>
                                            <span class="fs-5">{{ number_format($tva, 0, '', ' ') }} FCFA</span>
                                        </li>

                                       
                                    </ul>
                                </div>

                                <div class="card-footer  ">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="h5 fw-normal mb-0">Sous-total(TTC)</span>
                                        <span class="h5 fw-normal mb-0">{{ number_format($price_ttc, 0, '', ' ') }} FCFA</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    <div class="col-12">
                        <button class="btn btn-primary w-100 mb-0">Réserver</button>
                    </div>	
                </aside>
            </div>
        </div>
    </form>
</section>