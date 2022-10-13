@extends('frontend.layouts.app')

@section('content')

<div class="container-fluid page-header mt-5 mb-5 p-0" style="background-image: url({{asset('assets/img/carousel-1.jpg')}});">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center pb-5">
            <br><br>
            <h1 class="display-5 text-white mb-3 animated slideInDown">{{ $chambre->name }}</h1>
        </div>
    </div>
</div>

<div class="container mt-5 mb-lg-5 mb-4 pb-lg-5">
    <div class="row g-5">

        <div class="col-lg-7">
            <div class="d-flex flex-column">
                <div class="order-lg-1 order-2">
                    <div class="tns-carousel-wrapper">
                        <div class="tns-slides-count text-light">
                            <i class="fi-image fs-lg me-2"></i>
                            <div class="ps-1">
                                <span class="tns-current-slide fs-5 fw-bold"></span>
                                <span class="fs-5 fw-bold">/</span>
                                <span class="tns-total-slides fs-5 fw-bold"></span>
                            </div>
                        </div>
                        <div class="tns-carousel-inner" data-carousel-options="{&quot;navAsThumbnails&quot;: true, &quot;navContainer&quot;: &quot;#thumbnails&quot;, &quot;gutter&quot;: 12, &quot;responsive&quot;: {&quot;0&quot;:{&quot;controls&quot;: false},&quot;500&quot;:{&quot;controls&quot;: true}}}">
                            @foreach($chambre->photos as $photo)
                                <div><img class="rounded-3" src="{{ asset($photo->fille_name) }}" alt="Image"></div>
                            @endforeach
                        </div>
                    </div>
                    <ul class="tns-thumbnails mb-4" id="thumbnails">
                        @foreach($chambre->photos as $photo)
                            <li class="tns-thumbnail"><img src="{{ asset($photo->fille_name) }}" alt="Thumbnail"></li>
                        @endforeach
                    </ul>
                </div>
                
                <div class="order-lg-2 order-1">
                    <div class="d-flex align-items-center mb-4">
                        <h2 class="mb-0">{{ $chambre->name }}</h2>
                    </div>


                    <div class="h5 justify-content-between align-items-center">
                        <span class="fs-base fw-normal text-body text-center">Prix à partir de:</span>
                        <span class="fs-4">
                            {{ number_format($chambre->price, 0, '', ' ') }} FCFA
                        </span>
                    </div>
                </div>
            </div>

            <div class="pb-4">
                <h2 class="h4 mt-2">Description</h2>
                <p class="opacity-70 mb-1">{{ $chambre->description }}</p>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card border-0 bg-light wow fadeInUp mb-4" data-wow-delay="0.1s mb-4">
                <div class="card-body">
                    <h5>Équipements</h5>
                    <ul class="list-unstyled row row-cols-md-2 row-cols-1 gy-2 mb-0 text-nowrap">
                    <li class="col">Non fumeur</li>
                    <li class="col">Climatiseur</li>
                    <li class="col">Mini bar</li>
                    <li class="col">Coffre Fort</li>
                    <li class="col">Douche</li>
                    <li class="col">Seche Cheveux</li>
                    <li class="col">Baignoire</li>
                    <li class="col">Télévision à écran plat</li>
                    <li class="col">Accessible aux personnes a mobilité réduite</li>
                    </ul>
                    <a class="collapse-label collapsed d-inline-block mt-3" href="#seeMoreAmenities" data-bs-toggle="collapse" data-bs-label-collapsed="Voir plus" data-bs-label-expanded="Show less" role="button" aria-expanded="false" aria-controls="seeMoreAmenities"></a>
                </div>
            </div>
            
            @livewire('post-boo-k', ['chambre' => $chambre])
        </div>
    </div>
</div>

@endsection