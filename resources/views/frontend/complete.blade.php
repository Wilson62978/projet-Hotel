@extends('frontend.layouts.app')

@section('content')
<div class="container pb-5 mb-sm-4 mt-5">
    <div class="pt-5">
      <div class="card py-3 mt-sm-3">
        <div class="card-body text-center">
          <h2 class="h4 pb-3">Merci pour votre réservation!</h2>
          <p class="fs-sm mb-2">
            Nous vous remercions de votre réservation!
            Vous recevrez par mail votre lettre de confirmation de réservation ainsi qu'un lien sécurisé pour votre paiement.</p>
          <p class="fs-sm">You will be receiving an email shortly with confirmation of your order. <u>Vous pouvez maintenant :</u>
        </p>
        <a class="btn btn-primary mt-3" href="{{ route('home') }}">
            <i class="ci-location"></i>&nbsp;Retour à l'accueil</a>
        </div>
      </div>
    </div>
  </div>
@endsection