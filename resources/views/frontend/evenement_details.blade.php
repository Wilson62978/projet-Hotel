@extends('frontend.layouts.app')

@section('content')


<section class="container mt-5 mb-lg-5 mb-4 pt-5 pb-lg-5">
    <nav class="mb-3 pt-md-3" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
        <li class="breadcrumb-item"><a href="{{ route('cotations.create') }}">Evenement</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $evenement->titre }}</li>
      </ol>
    </nav>
    <div class="gy-5 pt-lg-2 row">
      <div class="col-md-7">
        <div class="d-flex flex-column">
          <div class="order-lg-1 order-2">
            <div class="tns-carousel-wrapper">
                <div class="tns-slides-count text-light"><i class="fi-image fs-lg me-2"></i>
                    <div class="ps-1"><span class="tns-current-slide fs-5 fw-bold"></span><span class="fs-5 fw-bold">/</span><span class="tns-total-slides fs-5 fw-bold"></span></div>
                </div>
                <div class="tns-carousel-inner" data-carousel-options="{&quot;navAsThumbnails&quot;: true, &quot;navContainer&quot;: &quot;#thumbnails&quot;, &quot;gutter&quot;: 12, &quot;responsive&quot;: {&quot;0&quot;:{&quot;controls&quot;: false},&quot;500&quot;:{&quot;controls&quot;: true}}}">
                    <div><img class="rounded-3" src="{{ asset('assets/img/real-estate/single/09.jpg') }}" alt="Image"></div>
                    <div><img class="rounded-3" src="{{ asset('assets/img/real-estate/single/10.jpg') }}" alt="Image"></div>
                    <div><img class="rounded-3" src="{{ asset('assets/img/real-estate/single/11.jpg') }}" alt="Image"></div>
                    <div><img class="rounded-3" src="{{ asset('assets/img/real-estate/single/12.jpg') }}" alt="Image"></div>
                </div>
            </div>
            <!-- Thumbnails nav-->
            <ul class="tns-thumbnails mb-4" id="thumbnails">
              <li class="tns-thumbnail"><img src="{{ asset('assets/img/real-estate/single/th09.jpg') }}" alt="Thumbnail"></li>
              <li class="tns-thumbnail"><img src="{{ asset('assets/img/real-estate/single/th10.jpg') }}" alt="Thumbnail"></li>
              <li class="tns-thumbnail"><img src="{{ asset('assets/img/real-estate/single/th11.jpg') }}" alt="Thumbnail"></li>
              <li class="tns-thumbnail"><img src="{{ asset('assets/img/real-estate/single/th12.jpg') }}" alt="Thumbnail"></li>
            </ul>
          </div>
          {{-- <!-- Page title + Features-->
          <div class="order-lg-2 order-1">
            <h1 class="h4 mb-2">{{ $evenement->titre }}</h1>

            <div class="h5 justify-content-between align-items-center">
                <span class="fs-base fw-normal text-body text-center">Prix à partir de:</span>
                <span class="fs-4">
                  1 000 FCFA
                </span>
            </div>
          </div>  --}}
       </div>
        <div class="pb-4">
            <br>
            <br>
        </div>

      </div>

      <div class="col-md-5">
        <div class="sticky-top">
          <div class="card border-0 bg-secondary mb-4">
            <div class="card-body">
              <div class="order-lg-2 order-1">
                <h1 class="h4 mb-2">{{ $evenement->titre }}</h1>
                @if ($evenement->prix!==null)
                    <div class="h5 justify-content-between align-items-center">
                      <span class="fs-base fw-normal text-body text-center">Prix à partir de:</span>
                      <span class="fs-4">
                          {{ number_format($evenement->prix, 0, '', ' ') }} FCFA
                      </span>
                    </div>
                @endif
              
              </div>
             <p>
              {{$evenement->description}}
             </p>
              
            </div>
          </div>
          <form action="{{ route('cotations.create') }}" method="get">
  
            <input type="hidden" name="type" value="{{ $evenement->slug }}">
            <button class="btn btn-lg btn-primary w-100 mb-3">Faire une demande</button>
          </form>
        </div>
      </div>
    </div>
  </section>


@endsection