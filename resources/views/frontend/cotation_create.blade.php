@extends('frontend.layouts.app')

@section('content')
<div class="container-fluid page-header mt-5 mb-5 p-0" style="background-image: url({{asset('assets/img/meetings-and-events-3.jpg')}});">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center pb-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Réunions et Evénements</h1>
        </div>
    </div>
</div>
<div class="container mt-6 mb-md-4">
    @if(Session::has('success'))
        <div class="row justify-content-center pb-sm-2">
            <div class="col-lg-12 col-xl-12">
                <div class="card card-body col-8 m-auto border-0 shadow-sm shadow-lg shadow-md p-4 mb-4 mt-4 row" id="basic-info">
                    <h4 class="text-center">Votre demande a été enregistrée avec succes</h4>
                    <p class="alert alert-success">
                        Merci  de nous avoir fait confiance! Votre demande sera traitée minutieusement dans un bref delai.
                    </p>
                </div>
            </div>
        </div>
    @else
        <form action="{{route("cotations.store")}}" method="post">
            @csrf
            <div class="row justify-content-center pb-sm-2">
                <div class="col-lg-12 col-xl-12">
                <h1 class="h2 text-center pb-4 mb-3">Réunions et Evénements</h1>
                <h5>Remplissez le formulaire pour plus d'informations</h5>
                <div>
                    <p>
                        Envoyez-nous un appel d'offres !
                    </p>
                    <p>
                        Qu'il s'agisse d'une célébration de mariage romantique ou d'un 
                        événement d'entreprise réussi, laissez notre équipe de professionnels faire de votre événement un moment inoubliable. 
                        Pour les demandes de réunion et de mariage  et de plus amples informations, veuillez 
                        remplir notre formulaire de demande de proposition ci-dessous.
                    </p>
                </div>
                <div class="card card-body border-0 shadow-sm shadow-lg shadow-md p-4 mb-4 row" id="basic-info">
                    <div class="row">
                        <div class="mb-3 col-md-4 ">
                            <label class="form-label" for="nom">Nom <span class="text-danger">*</span></label>
                            <input class="form-control rounded {{ $errors->has('nom') ? ' is-invalid' : ''}}" type="text" id="nom" name="nom"  value="{{old("nom")}}" >
                            @if ($errors->has('nom'))
                                <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('nom') }}
                                </span>
                            @endif       
                        </div>
                        <div class="mb-3 col-md-4 ">
                            <label class="form-label" for="prenom">Prénom(s) <span class="text-danger">*</span></label>
                            <input class="form-control rounded {{ $errors->has('prenom') ? ' is-invalid' : ''}}" type="text" name="prenom" id="prenom"  value="{{old("prenom")}}" >
                            @if ($errors->has('prenom'))
                                <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('prenom') }}
                                </span>
                            @endif       
                        </div>
            
                        <div class="mb-3 col-md-4 ">
                            <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                            <input class="form-control rounded {{ $errors->has('email') ? ' is-invalid' : ''}}" type="email" name="email" id="email"  value="{{old("email")}}" >
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif       
                        </div>
                        <div class="mb-3 col-md-4 ">
                            <label class="form-label" for="telephone">Numéro de téléphone <span class="text-danger">*</span></label>
                            <input class="form-control rounded {{ $errors->has('telephone') ? ' is-invalid' : ''}}" type="phone" id="telephone" name="telephone"  value="{{old("telephone")}}" >
                            @if ($errors->has('telephone'))
                                <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('telephone') }}
                                </span>
                            @endif       
                        </div>
            
            
                        <div class="mb-3 col-md-4 ">
                            <label class="form-label" for="evenement_id">Type d'évenement </label>
                            <select class="form-select {{ $errors->has('evenement_id') ? 'is-invalid' : '' }}" id="evenement_id" name="evenement_id" >
                                <option >Selectionnez l'évenement</option>
                                @foreach ($evenements as $evenement)
                                    <option value="{{ $evenement->id }}"  
                                        @if (old('evenement_id') == $evenement->id || $type == $evenement->slug  ) selected 
                                        @endif
                                    >
                                    {{ $evenement->titre }}
                                    </option>
                                @endforeach
                            </select> 
                            @if ($errors->has('evenement_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('evenement_id') }}</strong>
                                </span>
                            @endif
                        </div>
            
                        <div class="mb-3 col-md-4 ">
                            <label class="form-label" for="dateDebut">Date de debut <span class="text-danger">*</span></label>
                            <input class="form-control rounded {{ $errors->has('dateDebut') ? ' is-invalid' : ''}}" type="date" id="dateDebut"  name="dateDebut" value="{{old("dateDebut")}}" >
                            @if ($errors->has('dateDebut'))
                                <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('dateDebut') }}
                                </span>
                            @endif       
                        </div>

                        <div class="mb-3 col-md-4 ">
                            <label class="form-label" for="nombreParticipant">nombre de participants<span class="text-danger">*</span></label>
                            <input class="form-control rounded {{ $errors->has('nombreParticipant') ? ' is-invalid' : ''}}" type="number" id="nombreParticipant"  name="nombreParticipant" value="{{old("nombreParticipant")}}" >
                            @if ($errors->has('nombreParticipant'))
                                <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('nombreParticipant') }}
                                </span>
                            @endif       
                        </div>
            
                        <div class="mb-3 col-md-4 ">
                            <label class="form-label" for="hebergement">Hebergement :<span class="text-danger"></span></label>
                            <div class="ml-2 form-check form-check-inline">
                                <input type="checkbox" id="hebergement" value="1" class="form-check-input" name="hebergement"  @if(old("hebergement1"))
                                    checked
                                @endif>
                                <label class="form-label"class="form-check-label" for="hebergement1">Oui</label>
                            </div>
                        </div>
            
                        <div class="mb-3 col-md-12 ">
                            <label class="form-label" for="commentaire">Commentaire <span class="text-danger"></span></label>
                            <textarea class="form-control rounded {{ $errors->has('commentaire') ? ' is-invalid' : ''}}" name="commentaire"  id="commentaire"  >{{old("commentaire")}}</textarea>
                            @if ($errors->has('commentaire'))
                                <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('commentaire') }}
                                </span>
                            @endif       
                        </div>

                        <div class="d-flex flex-column flex-sm-row">
                            <button type="submit" class="btn btn-primary btn-lg r ms-sm-auto" >Continuer
                                <i class="fi-chevron-right fs-sm ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </form>
    @endif
</div>
    
@endsection