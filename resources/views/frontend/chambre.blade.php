@extends('frontend.layouts.app')

@section('content')

{{-- <div class="container-fluid page-header mt-5 mb-5 p-0" style="background-image: url({{asset('assets/img/carousel-1.jpg')}});">
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
</div> --}}

<style>
    .intro_title h2 {
        font-size: 30px;
    }
    .text-truncate{
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
    }

    .text-truncate-2 {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }
    .text-truncate-3 {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }
    /* .explor_item .explor_text .explor_footer .pull-left h3 span {
        color: #a0a0a0;
        font-size: 14px;
    } */
    /* .explor_item .explor_text .explor_footer .pull-left h3 {
        font-size: 15px;
        font-family: "Montserrat", sans-serif;
        font-weight: bold;
        color: #242424;
        letter-spacing: .60px;
        padding-top: 10px;
    } */
</style>




{{-- <section class="banner_area">
    <div class="container">
        <div class="banner_inner_content">
            <h3>Nos chambres</h3>
            <ul>
                <li class="active"><a href="{{ route('home') }}">Accueil</a></li>
                <li><a href="{{ route('chambres.all') }}">Chambres</a></li>
            </ul>
        </div>
    </div>
</section> --}}

<section class="banner_area">
    <div class="container">
        <div class="banner_inner_content">
            <h3>Nos chambres</h3>
            <ul>
                <li class="active"><a href="{{ route('home') }}">Accueil</a></li>
                <li><a href="{{ route('chambres.all') }}">Chambres</a></li>
            </ul>
        </div>
    </div>
</section>

<section class="explor_room_area">
    <div class="container">
        <div class="explor_title row m0">
            <div class="pull-left">
                <div class="left_ex_title">
                    <h2>Explorer nos <span>CHAMBRES</span></h2>
                    <p>CHOISISSEZ LA CHAMBRE EN FONCTION DU BUDGET</p>
                </div>
            </div>
        </div>
        <div class="row explor_room_item_inner">
            @foreach ($chambres as $chambre)
                <div class="col-md-4 col-sm-6">
                    <div class="explor_item">
                        <a href="{{ route('chambres.first', ['slug' => $chambre->slug]) }}" class="room_image">
                            <img src="{{ asset(Storage::url($chambre->thumbnail_img)) }}" alt="">
                        </a>
                        <div class="explor_text">
                            <a href="{{ route('chambres.first', ['slug' => $chambre->slug]) }}">
                                <h4 class="text-truncate" style="margin-bottom: 15px;">{{ $chambre->name }}</h4>
                            </a>
                            
                            <div class="d-flex" style="margin-bottom: 10px;">
                                <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2" style="color: #ffb606; font-size: 20px; margin-right: 5px"></i><span style="font-weight: 600px; color:black; font-size: 15px; margin-right: 5px">Lit</span></small>
                                <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2" style="color: #ffb606; font-size: 20px; margin-right: 5px"></i><span style="font-weight: 600px; color:black; font-size: 15px; margin-right: 5px">Salle de bain</span></small>
                                <small><i class="fa fa-wifi text-primary me-2" style="color: #ffb606; font-size: 20px; margin-right: 5px"></i> <span style="font-weight: 600px; color:black; font-size: 15px">Wifi</span></small>
                            </div>

                            <p class="text-body mb-3 text-truncate-3" style="margin-bottom: 15px;">{{ $chambre->description }}</p>

                            <div class="explor_footer">
                                <div class="pull-left">
                                    <h3>{{ number_format($chambre->price, 0, '', ' ') }} XOF<span>/ Nuit</span></h3>
                                </div>
                                <div class="pull-right">
                                    <a class="book_now_btn" href="{{ route('chambres.first', ['slug' => $chambre->slug]) }}">Voir plus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection