@extends('frontend.layouts.app')

@section('content')



        <!-- Page Header Start -->
        <div class="container-fluid page-header mt-5 mb-5 p-0" style="background-image: url({{asset('assets/img/carousel-1.jpg')}});">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <br><br>
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Chambres</h1>
                    
                </div>
            </div>
        </div>
        <!-- Page Header End -->


    


        <!-- Room Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Nos chambres</h6>
                    <h1 class="mb-5">Explorer nos <span class="text-primary text-uppercase">chambres</span></h1>
                </div>
                <div class="row g-4">
                    @foreach ($chambres as $chambre)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="{{ asset($chambre->thumbnail_img) }}" alt="">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">{{ number_format($chambre->price,0,""," ") }} XOF/Semaine</small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <a href="{{ route('chambres.first', ['slug' => $chambre->slug]) }}"><h5 class="mb-0">{{$chambre->name}}</h5></a>
                                </div>
                                <div class="d-flex mb-3">
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>3 lits</small>
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i>2 salles de bain</small>
                                    <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                                </div>
                                <p class="text-body mb-3 text-truncate-3">{{ $chambre->description }}</p>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-primary rounded py-2 px-4" href="{{ route('chambres.first', ['slug' => $chambre->slug]) }}">Voir Plus</a>
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="{{ route('chambres.first', ['slug' => $chambre->slug]) }}">Reserver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
        <!-- Room End -->


      >





{{-- <div class="position-relative py-210">
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
</section> --}}
@endsection