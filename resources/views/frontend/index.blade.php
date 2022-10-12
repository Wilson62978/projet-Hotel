@extends('frontend.layouts.app')

@section('content')
    
<div class="container-fluid p-0 mb-5">
<div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="w-100" src="{{asset('assets/img/04.png')}}" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3" >
                    <h6 class="display-3 text-white mb-4 animated slideInDown">Bienvenue dans le monde des affaires en Afrique</h6>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="w-100" src="{{asset('assets/img/03.png')}}" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3">
                    <h6 class="display-3 text-white mb-4 animated slideInDown">Bienvenue dans le monde des affaires en Afrique</h6>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6" style="min-height: 350px;">
                <div class="position-relative h-100 wow zoomIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: zoomIn;">
                    <img class="position-absolute img-fluid w-100 h-100 rounded" src="{{ asset('assets/img/06.png') }}" style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <h6 class="section-title text-start text-primary text-uppercase">Qui sommes-nous</h6>
                <h1 class="mb-4">Bienvenue à <span class="text-primary text-uppercase">Guest house CICA</span></h1>
                <p class="mb-4">
                    Un hôtel idyllique à Cotonou, au Bénin, Situé au bord de la von du cité GLELE à 100mettre de la voie pavé qui mène à la plage Togbin. Guest House Cica se dévoile à travers un immeuble éminent, bénéficiant de 20 chambres dont des suites avec un paysage sensationnel. Ses chambres bénéficient d'un panorama somptueux, vous procurant une sensation de joie, le tout dans un confort absolu. Nos chambres sont composées chacune d'un lit confortable et équipées d'une salle de bain d'une superficie d'au-moins de 2,5m². Vous disposez d'une chambre d'un minimum de 13,5m² équipée d'un bureau, d'une télé plasma, d'un placard, d'une connexion Wi-Fi et d'un téléphone.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">Our Rooms</h6>
            <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Rooms</span></h1>
        </div>
        <div class="row g-4">
            @foreach ($chambres as $chambre)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="room-item shadow rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="{{ asset($chambre->thumbnail_img) }}" alt="">
                            <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">$100/Night</small>
                        </div>
                        <div class="p-4 mt-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="mb-0">{{$chambre->name}}</h5>
                            </div>
                            <div class="d-flex mb-3">
                                <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                            </div>
                            <p class="text-body mb-3 text-truncate-3">{{ $chambre->description }}</p>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-sm btn-primary rounded py-2 px-4" href="#">View Detail</a>
                                <a class="btn btn-sm btn-dark rounded py-2 px-4" href="#">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <h6 class="section-title text-center text-primary text-uppercase">Nos Chambres</h6>
            <h1 class="mb-5">Explorez nos 
                <span class="text-primary text-uppercase">chambres</span>
            </h1>
        </div>
        <div class="row g-4">
            @foreach ($chambres as $chambre)
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="row room-item m-0">
                        <div class="col-md-5 col-lg-12 col-xl-5 p-0" style="min-height: 300px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100" src="{{ asset($chambre->thumbnail_img) }}" alt="" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-12 col-xl-7 h-100 px-0">
                            <div class="p-4">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <small class="bg-primary text-white rounded py-1 px-3">{{ number_format($chambre->price, 0, '', ' ') }} XOF</small>
                                    <div class="ps-2">  
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                    </div>
                                </div>
                                <h5 class="mb-3">{{ $chambre->description }}</h5>
                                <div class="d-flex mb-3">
                                    <small class="border-end me-3 pe-3">
                                        <i class="fa fa-bed text-primary me-2"></i>
                                        <font>3 Lits</font>
                                    </small>
                                    <small class="border-end me-3 pe-3">
                                        <i class="fa fa-bath text-primary me-2"></i>
                                        <font>2 Salle de bain</font>
                                    </small>
                                    <small>
                                        <i class="fa fa-wifi text-primary me-2"></i>
                                        <font>Le Wifi</font>
                                    </small>
                                </div>
                                <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                            </div>
                            <div class="d-flex justify-content-between border-top mt-auto p-4">
                                <a class="btn btn-sm btn-primary rounded py-2 px-4" href="">Voir le détail</a>
                                <a class="btn btn-sm btn-dark rounded py-2 px-4" href="">Réservez maintenant</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


    <section class="container pb-5 mb-lg-4">
        <div class="d-flex align-items-center justify-content-between mb-4 pb-2">
        <h2 class="h3 mb-0">Hébergements</h2>
        <a class="btn btn-link fw-normal ms-sm-3 p-0" href="{{route('chambres.all')}}">Voir plus<i class="fi-arrow-long-right ms-2"></i></a>
        </div>
        <div class="tns-carousel-wrapper tns-controls-outside-xxl tns-nav-outside mb-xxl-2">
        <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;gutter&quot;: 24, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1,&quot;nav&quot;:true},&quot;500&quot;:{&quot;items&quot;:2}}}">
            @foreach ($chambres as $chambre)
                <div>
                    <div class="position-relative">
                        <div class="position-relative mb-3">
                        <img class="rounded-3" src="{{ asset($chambre->thumbnail_img) }}" alt="{{$chambre->name}}">
                        </div>
                        <h3 class="mb-2 fs-lg">
                            <a class="nav-link stretched-link" href="{{ route('chambres.first', ['slug' => $chambre->slug]) }}">{{$chambre->name}}</a>
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
            @endforeach
        </div>
        </div>
    </section>

    <section class="container mb-5 pb-2 pb-lg-4">
        <div class="row align-items-center">
            <div class="col-md-7 mb-md-0 mb-3">
                <img class="position-relative rounded-3 zindex-5" src="{{ asset('assets/img/FETE01.png') }}" alt="Article image">
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="from-start delay-2">
                  <h3 class="h4 mb-2">Réunions et Evénements</h3>
                  <p class="mb-md-4 mb-3 fs-sm text-justify">
                    Pour tous types d'événements, notre équipe experte saura vous accompagner dans la réalisation de votre projet à travers des espaces idéalement conçus, équipés de technologies de pointe.
                  </p>
                </div>
                <div class="btn-group btn-group-lg scale-up delay-3">
                    <a class="btn btn-primary" href="">
                        Demande de cotation
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="container mb-5 pb-2 pb-lg-4">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-5 mb-3">
                <div class="from-start delay-2">
                  <h3 class="h4 mb-2">Restauration</h3>
                  <p class="mb-md-4 mb-3 fs-sm text-justify">
                    Découvrez de nouvelles saveurs appétissantes et testez le riche patrimoine culinaire de l'Afrique. Le restaurant et le bar servent des spécialités régionales à base d'ingrédients locaux pour revisiter la cuisine traditionnelle africaine.
                  </p>
                </div>
                <div class="btn-group btn-group-lg scale-up delay-3">
                    <a class="btn btn-primary" href="">
                        Demande de cotation
                    </a>
                </div>
            </div>
            <div class="col-md-7 mb-md-0 mb-3">
                <img class="position-relative rounded-3 zindex-5" src="{{ asset('assets/img/real-estate/recent/04.jpg') }}" alt="Article image">
            </div>
        </div>
    </section>


    
@endsection

