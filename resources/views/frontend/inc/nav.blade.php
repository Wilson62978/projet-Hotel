<header class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
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
</header>