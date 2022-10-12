@extends('frontend.layouts.app')

@section('content')


<div class="position-relative py-210">
    <div class="background">
        <div class="background-image jarallax" data-jarallax="" data-speed="0.8" style="z-index: 0;"><div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; z-index: -100; clip-path: polygon(0px 0px, 100% 0px, 100% 100%, 0px 100%);"><img class="jarallax-img" loading="lazy" src="assets/img/contact-hero-1920x900.jpg" alt="" style="object-fit: cover; object-position: 50% 50%; max-width: none; position: absolute; top: 0px; left: 0px; width: 1348px; height: 419.6px; overflow: hidden; pointer-events: none; transform-style: preserve-3d; backface-visibility: hidden; will-change: transform, opacity; margin-top: -0.8px; transform: translate3d(0px, -24.4px, 0px);"></div></div>
        <div class="background-color" style="--background-color: #000; opacity: .25;"></div>
    </div>
</div>


<section class="py-6 bg-gray-100 mt-5">
    <div class="container">
        <div class="text-center pb-lg-4">
            <h2 class="mt-5">Chambres</h2>
            <h5 class="">Des hébergements modernes à Cotonou</h5>
            <p class="">Les chambres du Azalaï Hôtel Cotonou sont modernes et spacieuses offrent une magnifique vue sur la ville. Elles bénéficient d'un accès internet haut débit. Les 200 chambres et suites allient subtilement le confort moderne au design traditionnel africain et béninois.</p>
        </div>
        <div class="row">
            @foreach ($chambres as $chambre)
                <div class="col-lg-4 col-12 mb-4 hover-animate">
                    <div class="card shadow-sm card-hover border-0 h-100">
                        <a href="{{ route('chambres.first', ['slug' => $chambre->slug]) }}" class="" >
                            <img class="card-img-top" src="{{ asset($chambre->thumbnail_img) }}" alt="{{ $chambre->name }}">
                        </a>
                        <div class="card-body px-2 pt-2">
                            <h3 class="h6 mb-2 fs-base">
                                <a class="nav-link stretched-link" href="{{ route('chambres.first', ['slug' => $chambre->slug]) }}">
                                    {{ $chambre->name }}
                                </a>
                            </h3>

                            <p class="mb-2 fs-sm text-truncate text-muted">
                                {{ $chambre->description }}
                            </p>
                            <div class="d-flex align-items-center">
								<h5 class="fw-normal text-success mb-0 me-1">{{ number_format($chambre->price, 0, '', ' ') }} FCFA</h5>
								<span class="mb-0 me-2">/semaine</span>
							</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection