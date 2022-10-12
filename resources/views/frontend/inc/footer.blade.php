 <!-- Footer Start -->
 <div class="container-fluid pt-5 bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s">
  <div class="container pb-5">
      <div class="row g-5">
          <div class="col-md-6 col-lg-4">
              <div class="bg-primary rounded p-4">
                    <a href="index-2.html"><h4 class="text-white text-uppercase mb-3">Guest house CICA</h4></a>
                    <p class="text-white mb-0">
                        Bienvenue dans le monde des affaires en Afrique
                    </p>
                    <P>
                        Guest house CICA pour vous servir!
                    </P>
              </div>
          </div>
          <div class="col-md-6 col-lg-3">
       
              <h6 class="section-title text-start text-primary text-uppercase mb-4">Contact</h6>
              {{-- <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p> --}}
              <p class="mb-2"><a class="nav-link p-0 fw-normal text-light text-nowrap" href="tel:+22957292029"><i class="fa fa-phone-alt me-3"></i>+229 57292029</p>
              <p class="mb-2"><a class="nav-link p-0 fw-normal text-light text-nowrap" href="tel:+22960224949"><i class="fa fa-phone-alt me-3"></i>+229 60224949</p>
              <p class="mb-2"><a class="nav-link p-0 fw-normal text-light text-nowrap" href="mailto:guesthousecica@gmail.com"><i class="fa fa-envelope me-3"></i>guesthousecica@gmail.com</p>
              <div class="d-flex pt-2">
                  <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-twitter"></i></a>
                  <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-facebook-f"></i></a>
                  <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-youtube"></i></a>
                  <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-linkedin-in"></i></a>
              </div>
          </div>
          <div class="col-lg-5 col-md-12">
              <div class="row gy-5 g-4">
                  <div class="col-md-6">
                      <h6 class="section-title text-start text-primary text-uppercase mb-4">Menu</h6>
                      <a class="btn btn-link" href="{{ route('home') }}">Accueil</a>
                      <a class="btn btn-link" href="{{ route('chambres.all') }}">Chambres</a>
                      <a class="btn btn-link" href="{{route("cotations.create")}}">Evenements</a>
                      
                      
                  </div>
                  <div class="col-md-6">
                      <h6 class="section-title text-start text-primary text-uppercase mb-4">Restez connecté</h6>
                      <div class=" ">
                        <h3 class="h4 text-light"></h3>
                        <form class="form-group form-group-light rounded-pill" >
                          <div class="input-group input-group-sm"><span class="input-group-text text-muted"><i class="fa fa-envelope"></i></span>
                            <input class="form-control" type="email" placeholder="Votre email">
                          </div>
                          <button class="btn mt-2 btn-primary btn-sm rounded-pill" type="button">Souscrire</button>
                        </form>
                      </div>
                        @foreach (h_evenements() as $h_item)
                            <a class="btn btn-link" href="{{route("cotations.view",["slug"=>$h_item->slug])}}">{{$h_item->titre}}</a>
                        @endforeach
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="container">
      <div class="copyright">
          <div class="row">
              <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                  &copy; <a class="border-bottom" href="{{ route('home') }}">Guest house CICA</a>, Tous droit reservées. 
    
   
                  
              </div>
              <div class="col-md-6 text-center text-md-end">
                  <div class="footer-menu">
                      <a href="#">Accueil</a>
                      <a href="#">Chambre</a>
                      
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- Footer End -->