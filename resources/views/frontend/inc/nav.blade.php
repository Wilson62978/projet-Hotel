{{-- <header class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
    <div class="container">
      <a class="navbar-brand me-3 me-xl-4" href="{{ route('home') }}">
        <img class="d-block" src="{{ asset('assets/img/logo/guesthousecica.jpgs') }}" width="116" alt="">Guest house CICA
      </a>
      <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="btn btn-sm text-primary d-none d-lg-block order-lg-3" href="#signin-modal" data-bs-toggle="modal">
        <i class="fi-user me-2"></i>Se connecter / S'inscrire
      </a>
      <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
        <ul class="navbar-nav navbar-nav-scroll" style="max-height: 35rem;">
          <li class="nav-item">
            <a href="{{ route('chambres.all') }}" class="nav-link">Chambres</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Restaurants</a>
          </li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Réunions & Evénements</a>
            <ul class="dropdown-menu">
              @foreach (h_evenements() as $h_item)
                <li><a class="dropdown-item" href="{{route("cotations.view",["slug"=>$h_item->slug])}}">{{$h_item->titre}}</a></li>
              @endforeach
              <li><a class="dropdown-item" href="{{route("cotations.create")}}">Autre</a></li>
            </ul>
          </li>

          <li class="nav-item d-lg-none"><a class="nav-link" href="#signin-modal" data-bs-toggle="modal"><i class="fi-user me-2"></i>Se connecter / S'inscrire</a></li>
        </ul>
      </div>
    </div>
</header> --}}

<header class="main_header_area">
  <div class="header_top">
      <div class="container">
          <div class="header_top_inner">
              <div class="pull-left">
                  <a href="#"><i class="fa fa-phone"></i>+229 57292029</a>
                  <a href="#"><i class="fa fa-envelope-o"></i>guesthousecica@gmail.com</a>
              </div>
              <div class="pull-right">
                  <ul class="header_social">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
  <div class="header_menu">
      <nav class="navbar navbar-default">
          <div class="container">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="{{ route('home') }}">
                      {{-- <img src="{{asset('assets/img/logo.png')}}" alt="">
                      <img src="{{asset('assets/img/logo-sticky.png')}}" alt=""> --}}
                      Guest house CICA
                  </a>
              </div>

              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                      <li><a href="{{ route('home') }}">Accueil</a></li>
                      <li><a href="{{ route('chambres.all') }}">chambre</a></li>
                      <li><a href="">Événements</a></li>
                      <li><a href="">Contacte</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                      <li class="book_btn">
                          <a class="book_now_btn" href="#">Réserver maintenant</a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
  </div>
</header>