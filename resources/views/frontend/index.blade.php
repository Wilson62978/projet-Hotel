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

<div class="container-xxl py-3">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">NOS CHAMBRES</h6>
            <h1 class="mb-5">Explorez nos <span class="text-primary text-uppercase">CHAMBRES</span></h1>
        </div>
        <div class="row g-4">
            @foreach ($chambres as $chambre)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="room-item shadow rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="{{ asset($chambre->thumbnail_img) }}" alt="">
                            <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">{{ number_format($chambre->price, 0, '', ' ') }} XOF/Semaine</small>
                        </div>
                        <div class="p-4 mt-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="mb-0">{{$chambre->name}}</h5>
                            </div>
                            <div class="d-flex mb-3">
                                <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>1 Lit</small>
                                <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i>1 Salle de bain</small>
                                <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                            </div>
                            <p class="text-body mb-3 text-truncate-3">{{ $chambre->description }}</p>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-sm btn-primary rounded py-2 px-4" href="{{ route('chambres.first', ['slug' => $chambre->slug]) }}">Voir plus</a>
                                <a class="btn btn-sm btn-dark rounded py-2 px-4" href="{{ route('chambres.first', ['slug' => $chambre->slug]) }}">Réserver</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="container-xxl py-3 px-0 wow" data-wow-delay="0.1s">
    <div class="row g-0">
        
        <div class="col-md-6 bg-dark d-flex align-items-center">
            <div class="p-3">
                <h6 class="section-title text-start text-white text-uppercase mb-3">VIE DE LUXE</h6>
                <h1 class="text-white mb-4">Réunions et Evénements</h1>
                <p class="text-white mb-4">Pour tous types d'événements, notre équipe experte saura vous accompagner dans la réalisation de votre projet à travers des espaces idéalement conçus, équipés de technologies de pointe.</p>
                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3">Demande de cotation</a>
            </div>
        </div>
        <div class="col-lg-6" style="min-height: 350px;">
            <div class="position-relative h-100 wow zoomIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: zoomIn;">
                <img class="position-absolute img-fluid w-100 h-100 " src="{{ asset('assets/img/FETE01.png') }}" style="object-fit: cover;" alt="">
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-3">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6" style="min-height: 350px;">
                <div class="position-relative h-100 wow zoomIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: zoomIn;">
                    <img class="position-absolute img-fluid w-100 h-100 rounded" src="{{ asset('assets/img/381c25ce-3e92-4c56-9255-317b07641c7e.jpg') }}" style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <h1 class="mb-4">Restauration</h1>
                <p class="mb-4">
                    Découvrez de nouvelles saveurs appétissantes et testez le riche patrimoine culinaire de l'Afrique. Le restaurant et le bar servent des spécialités régionales à base d'ingrédients locaux pour revisiter la cuisine traditionnelle africaine.
                </p>
                <a class="btn btn-primary py-3 px-5 mt-2" href="">Demande de cotation</a>
            </div>
        </div>
    </div>
</div>
    
@endsection

