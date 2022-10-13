@extends('frontend.layouts.app')

@section('content')
    <section class="pt-4 pt-lg-5">
        <form action="{{ route('booknow') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $chambre->id }}">
            <input type="hidden" name="date_start" value="{{ $date_start }}">
            <input type="hidden" name="date_end" value="{{ $date_end }}">
            <input type="hidden" name="total_week" value="{{ $total_week }}">
            <div class="container">
                <div class="row g-4 g-xl-5 mt-5">
                    <div class="col-xl-8">
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
                                            <input type="text" class="form-control" name="card_number" maxlength="14" placeholder="XXXX XXXX XXXX XXXX">
                                            <img src="assets/images/element/visa.svg" class="w-30px position-absolute top-50 end-0 translate-middle-y me-2 d-none d-sm-block" alt="">
                                        </div>	
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Date d'expiration <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" name="card_months" class="form-control" maxlength="2" placeholder="MM">
                                            <input type="text" name="card_year" class="form-control" maxlength="4" placeholder="AA">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">CVV / CVC <span class="text-danger">*</span></label>
                                        <input type="text" name="card_cvv" class="form-control" maxlength="3" placeholder="XXX">
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Nom du titulaire de la carte <span class="text-danger">*</span></label>
                                        <div class="form-control-bg-light">
                                            <input type="text" name="card_holder_name" class="form-control" aria-label="Nom du titulaire de la carte">
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border shadow-sm">
                            <div class="card-header border-bottom">
                                <h5 class="mb-0 cardt-title">Vos informations</h5>
                            </div>

                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Nom <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="last_name" min="1" placeholder="Nom">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Prénom <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="frist_name" min="1" placeholder="Prénom">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="email" min="1" placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Numéro de téléphone <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="" min="1" placeholder="Numéro de téléphone">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nationalité <span class="text-danger">*</span></label>
                                    <select class="form-select {{ $errors->has('nationalite_id') ? 'is-invalid' : '' }}" id="nationalite_id" name="nationalite_id" >
                                        <option >Selectionnez l'évenement</option>
                                        {{-- @foreach ($evenements as $evenement)
                                            <option value="{{ $evenement->id }}"  
                                                @if (old('evenement_id') == $evenement->id || $type == $evenement->slug  ) selected 
                                                @endif
                                            >
                                            {{ $evenement->titre }}
                                            </option>
                                        @endforeach --}}
                                    </select> 
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
@endsection