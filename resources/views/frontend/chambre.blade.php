@extends('frontend.layouts.app')

@section('content')

<div class="container-fluid page-header mt-5 mb-5 p-0" style="background-image: url({{asset('assets/img/carousel-1.jpg')}});">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center pb-5">
            <br><br>
            <h1 class="display-3 text-white mb-3 animated slideInDown">Chambres</h1>
        </div>
    </div>
</div>

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
                    <img class="img-fluid" src="{{ asset(Storage::url($chambre->thumbnail_img)) }}" alt="">
                    <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">{{ number_format($chambre->price,0,""," ") }} XOF/Semaine</small>
                </div>
                <div class="p-4 mt-2">
                    <div class="mb-3">
                        @if (stristr($chambre->name,'premier') != false)
                            <span class="h5 mb-0 fs-12 text-uppercase">{{explode('premier', $chambre->name)[0]}}</span>
                            <span class="mb-0 ">1 <sup>er</sup> étage</span>
                        @elseif (stristr($chambre->name,'deuxième ') != false)
                            <span class="h5 mb-0 text-uppercase">{{explode('deuxième', $chambre->name)[0]}}</span>
                            <span class="mb-0 ">2 <sup>eme</sup> étage</span>
                        @else
                            <span class="h5 mb-0 fs-12 text-uppercase">{{ $chambre->name }}</span>
                        @endif
                    </div>
                    <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>Lits</small>
                        <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i>Salles de bain</small>
                        <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                    </div>
                    <p class="text-body mb-3 text-truncate-3">{!! $chambre->description !!}</p>
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

@endsection