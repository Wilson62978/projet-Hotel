@extends('frontend.layouts.app')

@section('content')

<section class="main_slider_area">
    <div id="main_slider" class="rev_slider" data-version="5.3.1.6">
        <ul>
            <li data-index="rs-1587" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="{{asset('assets/img/home-slider/slider-1.jpg')}}"  data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                <img src="{{asset('assets/img/home-slider/slider-1.jpg')}}"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                <div class="slider_text_box">
                    <div class="tp-caption tp-resizeme first_text" 
                    id="slide-1586-layer-1" 
                    data-x="['left','left','left','15','0']" data-hoffset="['0','0','0','0']" 
                    data-y="['top','top','top','top']" data-voffset="['290','290','290','220','130']" 
                    data-fontsize="['55','55','55','40','25']"
                    data-lineheight="['59','59','59','50','35']"
                    data-width="['550','550','550','550','300']"
                    data-height="none"
                    data-whitespace="normal"
                    data-type="text" 
                    data-responsive_offset="on" 
                    data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                    data-textAlign="['left','left','left','left']">Vacances de qualité assurées </div>
                    
                    <div class="tp-caption tp-resizeme slider_button" 
                        id="slide-1588-layer-3" 
                        data-x="['left','left','left','15','0']" data-hoffset="['0','0','0','0']" 
                        data-y="['top','top','top','top']" data-voffset="['525','525','525','425','330']" 
                        data-fontsize="['14','14','14','14']"
                        data-lineheight="['46','46','46','46']"
                        data-width="none"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-type="text" 
                        data-responsive_offset="on" 
                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
                        <a class="slider_btn" href="#">Réserver maintenant</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
    
{{-- <div class="container-fluid p-0 mb-5" >
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100 img-fluid" src="{{asset('assets/img/04.png')}}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" >
                        <h6 class="display-6 text-white mb-4 animated slideInDown">Welcone to business in Africa</h6>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{asset('assets/img/03.png')}}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3">
                        <h6 class="display-6 text-white mb-4 animated slideInDown">Welcone to business in Africa</h6>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon visually-hidden" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon visually-hidden" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
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

<section class="introduction_area" style="margin-top: 60px;">
    <div class="container">
        <div class="row introduction_inner">
            <div class="col-md-7">
                <div class="introduction_left_text">
                    <div class="intro_title">
                        <h2><span>Bienvenue à</span> GUEST HOUSE CICA</h2>
                    </div>
                    <h4>QUI SOMMES-NOUS?</h4>
                    <p>
                        Situé à Cotonou, au Bénin, l'hôtel Guest House Cica vous accueille dans un cadre idyllique au bord de la ville de Glele, à seulement 100 mètres de la plage de Togbin. Notre établissement propose 20 chambres, dont des suites offrant une vue sensationnelle. Chaque chambre est équipée d'un lit confortable, d'une salle de bain d'au moins 2,5 m², et comprend un espace d'au moins 13,5 m² avec un bureau, une télévision à écran plasma, un placard, une connexion Wi-Fi et un téléphone.
                    </p>
                    <a class="about_btn_b" href="#">En savoir plus</a>
                </div>
            </div>
            <div class="col-md-5">
                <div class="introduction_img">
                    <img src="{{ asset('assets/img/06.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <section class="container mb-5 pb-2 pb-lg-4">
    <div class="row align-items-center">
        <div class="col-md-6 mb-md-0 mb-3">
            <img class="position-relative rounded-3 zindex-5" src="{{ asset('assets/img/06.png') }}" alt="Article image">
        </div>
        <div class="col-lg-6">
            <h6 class="section-title text-start text-primary text-uppercase">Qui sommes-nous</h6>
            <h1 class="mb-4">Bienvenue à <span class="text-primary text-uppercase">Guest house CICA</span></h1>
            <p class="mb-4">
                Un hôtel idyllique à Cotonou, au Bénin, Situé au bord de la von du cité GLELE à 100mettre de la voie pavé qui mène à la plage Togbin. Guest House Cica se dévoile à travers un immeuble éminent, bénéficiant de 20 chambres dont des suites avec un paysage sensationnel. Ses chambres bénéficient d'un panorama somptueux, vous procurant une sensation de joie, le tout dans un confort absolu. Nos chambres sont composées chacune d'un lit confortable et équipées d'une salle de bain d'une superficie d'au-moins de 2,5m². Vous disposez d'une chambre d'un minimum de 13,5m² équipée d'un bureau, d'une télé plasma, d'un placard, d'une connexion Wi-Fi et d'un téléphone.
            </p>
        </div>
    </div>
</section> --}}

<section class="explor_room_area">
    <div class="container">
        <div class="explor_title row m0">
            <div class="pull-left">
                <div class="left_ex_title">
                    <h2>Explorer nos <span>CHAMBRES</span></h2>
                    <p>CHOISISSEZ LA CHAMBRE EN FONCTION DU BUDGET</p>
                </div>
            </div>
            <div class="pull-right">
                <a class="about_btn_b" href="{{ route('chambres.all') }}">Voir toutes les chambres</a>
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

{{-- <div class="container mb-5 pb-lg-3 pb-md-3">
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
                        <div class="mb-3">
                            @if (stristr($chambre->name,'premier') != false)
                                <span class="h5 mb-0 fs-12 text-uppercase">{{explode('premier', $chambre->name)[0]}}</span>
                                <span class="mb-0 ">1 <sup>er</sup> étage</span>
                            @elseif (stristr($chambre->name,'deuxième ') != false)
                                <span class="h5 mb-0 text-uppercase">{{explode('deuxième', $chambre->name)[0]}}</span>
                                <span class="mb-0 ">2 <sup>eme</sup> étage</span>
                            @endif
                        </div>
                        <div class="d-flex mb-3">
                            <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>Lit</small>
                            <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i>Salle de bain</small>
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
</div> --}}

<section class="our_service_area">
    <div class="container">
        <div class="row our_service_inner">
            <div class="col-md-3 col-sm-6">
                <div class="our_service_first">
                    <h3>NOS SERVICES</h3>
                    <p>quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam.</p>
                    <a class="all_s_btn" href="#">view all services</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="our_service_item">
                    <i class="flaticon-wifi"></i>
                    <h4>WIFI GRATUIT</h4>
                    <p>Incidunt ut labore et dolore magnam aliquam quaerat volup tatem. Utad minima.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="our_service_item">
                    <i class="flaticon-toaster"></i>
                    <h4>RESTAURANT</h4>
                    <p>Incidunt ut labore et dolore magnam aliquam quaerat volup tatem. Utad minima.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="our_service_item">
                    <i class="flaticon-shield"></i>
                    <h4>SÉCURITÉ GRATUIT</h4>
                    <p>Incidunt ut labore et dolore magnam aliquam quaerat volup tatem. Utad minima.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="our_resort_gallery_area">
    <div class="middle_title">
        <h2>Galerie de nos <span>chambres</span></h2>
    </div>
</section>
<div class="resort_gallery_inner imageGallery1">
    <div class="resort_gallery owl-carousel">
        <div class="item">
            <img src="{{asset('assets/img/gallery/ddji.jpg')}}" alt="">
            <div class="resort_g_hover">
                <div class="resort_hover_inner">
                    <a class="light" href="{{asset('assets/img/gallery/ddji.jpg')}}"><i class="fa fa-expand" aria-hidden="true"></i></a> 
                    <h5>Nos chambres</h5>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="{{asset('assets/img/gallery/sdggddg.jpg')}}" alt="">
            <div class="resort_g_hover">
                <div class="resort_hover_inner">
                    <a class="light" href="{{asset('assets/img/gallery/sdggddg.jpg')}}"><i class="fa fa-expand" aria-hidden="true"></i></a> 
                    <h5>Nos chambres</h5>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="{{asset('assets/img/gallery/72.jpg')}}" alt="">
            <div class="resort_g_hover">
                <div class="resort_hover_inner">
                    <a class="light" href="{{asset('assets/img/gallery/72.jpg')}}"><i class="fa fa-expand" aria-hidden="true"></i></a> 
                    <h5>Nos chambres</h5>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="{{asset('assets/img/gallery/81.jpg')}}" alt="">
            <div class="resort_g_hover">
                <div class="resort_hover_inner">
                    <a class="light" href="{{asset('assets/img/gallery/81.jpg')}}"><i class="fa fa-expand" aria-hidden="true"></i></a> 
                    <h5>Nos chambres</h5>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="{{asset('assets/img/gallery/46.jpg')}}" alt="">
            <div class="resort_g_hover">
                <div class="resort_hover_inner">
                    <a class="light" href="{{asset('assets/img/gallery/46.jpg')}}"><i class="fa fa-expand" aria-hidden="true"></i></a> 
                    <h5>Nos chambres</h5>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="container-xxl py-3 px-0 wow" data-wow-delay="0.1s">
    <div class="row g-0">
        <div class="col-md-6 bg-dark d-flex align-items-center">
            <div class="p-3">
                <h6 class="section-title text-start text-white text-uppercase mb-3">VIE DE LUXE</h6>
                <h1 class="text-white mb-4">Réunions et Evénements</h1>
                <p class="text-white mb-4">Pour tous types d'événements, notre équipe experte saura vous accompagner dans la réalisation de votre projet à travers des espaces idéalement conçus, équipés de technologies de pointe.</p>
                <a href="{{route("cotations.create")}}" class="btn btn-primary py-md-3 px-md-5 me-3">Demande de cotation</a>
            </div>
        </div>
        <div class="col-lg-6" style="min-height: 350px;">
            <div class="position-relative h-100 wow zoomIn" data-wow-delay="0.1s">
                <img class="position-absolute img-fluid w-100 h-100 " src="{{ asset('assets/img/FETE01.png') }}" style="object-fit: cover;" alt="">
            </div>
        </div>
    </div>
</div> --}}

{{-- <section class="container mb-5 pb-2 pb-lg-4">
    <div class="row align-items-center">
        <div class="col-md-6 mb-md-0 mb-3 wow zoomIn" data-wow-delay="0.1s">
            <img class="position-relative zindex-5" src="{{ asset('assets/img/381c25ce-3e92-4c56-9255-317b07641c7e.jpg') }}" alt="Article image">
        </div>
        <div class="col-lg-6">
            <h1 class="mb-4">Restauration</h1>
            <p class="mb-4">
                Découvrez de nouvelles saveurs appétissantes et testez le riche patrimoine culinaire de l'Afrique. Le restaurant et le bar servent des spécialités régionales à base d'ingrédients locaux pour revisiter la cuisine traditionnelle africaine.
            </p>
            <a class="btn btn-primary py-3 px-5 mt-2" href="{{route("cotations.create")}}">Demande de cotation</a>
        </div>
    </div>
</section> --}}
    
@endsection

