{{-- <div class="row gx-0">
    <div class="col-lg-3 bg-dark d-none d-lg-block">
        <a href="index.html" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
            <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
        </a>
    </div>
    <div class="col-lg-9">
        <div class="row gx-0 bg-white d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                    <i class="fa fa-envelope text-primary me-2"></i>
                    <p class="mb-0">info@example.com</p>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-2">
                    <i class="fa fa-phone-alt text-primary me-2"></i>
                    <p class="mb-0">+012 345 6789</p>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="d-inline-flex align-items-center py-2">
                    <a class="me-3" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="me-3" href=""><i class="fab fa-twitter"></i></a>
                    <a class="me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="me-3" href=""><i class="fab fa-instagram"></i></a>
                    <a class="" href=""><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg fixed-top bg-dark navbar-dark p-3 p-lg-0">
            <a href="index.html" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Home</a>
                        <div class="dropdown-menu fade-up rounded-0 m-0">
                            <a href="home-1.html" class="dropdown-item">Home 1</a>
                            <a href="home-2.html" class="dropdown-item">Home 2</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">About</a>
                        <div class="dropdown-menu fade-down rounded-0 m-0">
                            <a href="about-1.html" class="dropdown-item">About 1</a>
                            <a href="about-2.html" class="dropdown-item">About 2</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Rooms</a>
                        <div class="dropdown-menu fade-up rounded-0 m-0">
                            <a href="room-grid.html" class="dropdown-item">Room Grid</a>
                            <a href="room-list.html" class="dropdown-item">Room List</a>
                            <a href="room-detail.html" class="dropdown-item">Room Detail</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                        <div class="dropdown-menu fade-down rounded-0 m-0">
                            <a href="service-1.html" class="dropdown-item">Service 1</a>
                            <a href="service-2.html" class="dropdown-item">Service 2</a>
                            <a href="service-detail.html" class="dropdown-item">Service Detail</a>
                            <a href="blog-grid.html" class="dropdown-item">Blog Grid</a>
                            <a href="blog-list.html" class="dropdown-item">Blog List</a>
                            <a href="blog-detail.html" class="dropdown-item">Blog Detail</a>
                            <a href="faq.html" class="dropdown-item">FAQs</a>
                            <a href="gallery.html" class="dropdown-item">Gallery</a>
                            <a href="contact.html" class="dropdown-item">Contact Us</a>
                            <a href="booking-1.html" class="dropdown-item">Booking 1</a>
                            <a href="booking-2.html" class="dropdown-item">Booking 2</a>
                            <a href="team.html" class="dropdown-item">Our Team</a>
                            <a href="testimonial-1.html" class="dropdown-item">Testimonial 1</a>
                            <a href="testimonial-2.html" class="dropdown-item">Testimonial 2</a>
                            <a href="404.html" class="dropdown-item">404</a>
                        </div>
                    </div>
                    <a href="element.html" class="nav-item nav-link">Elements</a>
                </div>
            </div>
        </nav>
    </div>
</div> --}}

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