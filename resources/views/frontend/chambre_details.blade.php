@extends('frontend.layouts.app')

@section('content')


<section class="container mt-5 mb-lg-5 mb-4 pt-5 pb-lg-5">
    <nav class="mb-3 pt-md-3" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Acceuil</a></li>
        <li class="breadcrumb-item"><a href="{{ route('chambres.all') }}">Chambre</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $chambre->name }}</li>
      </ol>
    </nav>
    <div class="row gy-5 pt-lg-2">
      <div class="col-lg-7">
        <div class="d-flex flex-column">
          <div class="order-lg-1 order-2">
            <div class="tns-carousel-wrapper">
                <div class="tns-slides-count text-light"><i class="fi-image fs-lg me-2"></i>
                    <div class="ps-1"><span class="tns-current-slide fs-5 fw-bold"></span><span class="fs-5 fw-bold">/</span><span class="tns-total-slides fs-5 fw-bold"></span></div>
                </div>
                <div class="tns-carousel-inner" data-carousel-options="{&quot;navAsThumbnails&quot;: true, &quot;navContainer&quot;: &quot;#thumbnails&quot;, &quot;gutter&quot;: 12, &quot;responsive&quot;: {&quot;0&quot;:{&quot;controls&quot;: false},&quot;500&quot;:{&quot;controls&quot;: true}}}">
                    @foreach($chambre->photos as $photo)
                        <div><img class="rounded-3" src="{{ asset($photo->fille_name) }}" alt="Image"></div>
                    @endforeach
                </div>
            </div>
            <!-- Thumbnails nav-->
            <ul class="tns-thumbnails mb-4" id="thumbnails">
                @foreach($chambre->photos as $photo)
                <li class="tns-thumbnail"><img src="{{ asset($photo->fille_name) }}" alt="Thumbnail"></li>
                @endforeach
            </ul>
          </div>
          <!-- Page title + Features-->
          <div class="order-lg-2 order-1">
            <h1 class="h4 mb-2">{{ $chambre->name }}</h1>
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

      <aside class="col-lg-5">
        <div class="sticky-top">
          <div class="card border-0 bg-secondary mb-4">
            <div class="card-body">
              <h5>Équipements</h5>
              <ul class="list-unstyled row row-cols-md-2 row-cols-1 gy-2 mb-0 text-nowrap">
                <li class="col"><i class="fi-wifi mt-n1 me-2 fs-lg align-middle"></i>WiFi</li>
                <li class="col"><i class="fi-thermometer mt-n1 me-2 fs-lg align-middle"></i>Heating</li>
                <li class="col"><i class="fi-dish mt-n1 me-2 fs-lg align-middle"></i>Dishwasher</li>
                <li class="col"><i class="fi-parking mt-n1 me-2 fs-lg align-middle"></i>Parking place</li>
                <li class="col"><i class="fi-snowflake mt-n1 me-2 fs-lg align-middle"></i>Air conditioning</li>
                <li class="col"><i class="fi-iron mt-n1 me-2 fs-lg align-middle"></i>Iron</li>
                <li class="col"><i class="fi-tv mt-n1 me-2 fs-lg align-middle"></i>TV</li>
                <li class="col"><i class="fi-laundry mt-n1 me-2 fs-lg align-middle"></i>Laundry</li>
                <li class="col"><i class="fi-cctv mt-n1 me-2 fs-lg align-middle"></i>Security cameras</li>
                <li class="col"><i class="fi-no-smoke mt-n1 me-2 fs-lg align-middle"></i>No smocking</li>
              </ul>
              <div class="collapse" id="seeMoreAmenities">
                <ul class="list-unstyled row row-cols-md-2 row-cols-1 gy-2 pt-2 mb-0 text-nowrap">
                  <li class="col"><i class="fi-double-bed mt-n1 me-2 fs-lg align-middle"></i>Double bed</li>
                  <li class="col"><i class="fi-bed mt-n1 me-2 fs-lg align-middle"></i>Single bed</li>
                </ul>
              </div><a class="collapse-label collapsed d-inline-block mt-3" href="#seeMoreAmenities" data-bs-toggle="collapse" data-bs-label-collapsed="Voir plus" data-bs-label-expanded="Show less" role="button" aria-expanded="false" aria-controls="seeMoreAmenities"></a>
            </div>
          </div>

          <form action="{{ route('chambre.checkout', ['id'=> $chambre->id]) }}" method="post">
            @csrf
            <input type="hidden" name="chambre_id" value="{{ $chambre->id }}">

            <div class="card card-body border-0 shadow-sm p-4 mb-4" id="basic-info">
                <h2 class="h4 mb-4"><i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>Informations de réservation</h2>
                <div class="mb-3">
                    <label class="form-label">Date de départ <span class="text-danger">*</span></label>
                    <div class="input-group input-group-lg">
                    <input class="form-control date-picker rounded pe-5" name="date_start" type="text" id="pr-birth-date" placeholder="Choisissez une date" data-datepicker-options="{&quot;altInput&quot;: true, &quot;altFormat&quot;: &quot;F j, Y&quot;, &quot;dateFormat&quot;: &quot;Y-m-d&quot;}">
                    <i class="fi-calendar text-muted position-absolute top-50 end-0 translate-middle-y me-3"></i>
                    </div>
                </div>

                <div class="">
                    <label class="form-label">Semaine <span class="text-danger">*</span></label>
                    <input class="form-control" type="number" name="total_week" min="1" placeholder="Entrer le nombre de semaines">
                </div>

            </div>
            <button class="btn btn-lg btn-primary w-100 mb-3">Réserver</button>
          </form>
        </div>
      </aside>
    </div>
  </section>

  @endsection