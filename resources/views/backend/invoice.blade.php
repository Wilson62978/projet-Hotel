@extends('backend.layouts.app')

@section('content')

    <!-- ========== section start ========== -->
    <section>
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap mb-30">
                  <h2 class="mr-40">Information</h2>
                 
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="{{route("admin")}}"></a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Information
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->

          <!-- Invoice Wrapper Start -->
          <div class="invoice-wrapper">
            <div class="row">
              <div class="col-12">
                <div class="invoice-card card-style mb-30">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                          <div class="section-title">
                            <h1 class="mb-20" _msthash="2228395" _msttexthash="4041947"> Nous avons un plan d’abonnement mensuel et annuel </h1>
                            <p class="text-sm" _msthash="2194842" _msttexthash="10996375"> Nous avons des plans et des prix qui correspondent parfaitement à votre entreprise. Faites de votre site client un succès avec nos produits. </p>
                          </div>
                        </div>
                    </div>
                    <div class="text-center">
                      <h5 class="text-sm">RESEAU AFRICAIN DES CADRES POUR</h5>
                      <h5 class="text-sm">  LE DEVELOPPEMENT ECONOMIQUE ET SOCIAL</h5>
                      <h5 class="text-sm">(RACDES-AFRIAU) </h5>
                      <p class="text-sm"> Littoral/Cotonou, 13ème Arrondissement, Agla Zone B, Carré 3433, Maison AYIKPA</p>
                      <p class="text-sm">04 BP 1127 Cotonou, Tel : (229) 97 64 35 32, e-mail: racdesafrique@gmail.com </p>
                    </div>
                  <div class="invoice-address">
                    <div class="address-item">
                      <h5 class="text-bold">Membre</h5>
                      <h1>{{ $user->name }} {{ $user->username }}</h1>
                      <p class="text-sm">
                        3891 Ranchview Dr. Richardson, California 62639
                      </p>
                      <p class="text-sm">
                        <span class="text-medium">Email:</span>
                        admin@example.com
                      </p>
                    </div>
                   
                  </div>
                  <div class="table-responsive">
                    <table class="invoice-table table">
                      <thead>
                        <tr>
                          <th class="service">
                            <h6 class="text-sm text-medium">Information</h6>
                          </th>
                          
                          <th class="amount">
                            <h6 class="text-sm text-medium">Valeur</h6>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <p class="text-sm text-bold">Nom et prenoms</p>
                          </td>
                          
                          
                          <td>
                            <p class="text-sm">DOSSOU Toyigbe Maxime</p>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <p class="text-sm text-bold">Contact</p>
                          </td>
                          
                          
                          <td>
                            <p class="text-sm">+229 90 58 14 36</p>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <p class="text-sm text-bold">Profession</p>
                          </td>
                          
                          
                          <td>
                            <p class="text-sm">Medecin</p>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <p class="text-sm text-bold">Sexe</p>
                          </td>
                          
                          
                          <td>
                            <p class="text-sm">Homme</p>
                          </td>
                        </tr>
                       
                        
                      </tbody>
                    </table>
                  </div>

                  <div class="invoice-action">
                    <ul
                      class="
                        d-flex
                        flex-wrap
                        align-items-center
                        justify-content-center
                      "
                    >
                      <li class="m-2">
                        <a
                          href="#0"
                          class="main-btn primary-btn-outline btn-hover"
                        >
                          Accepter
                        </a>
                      </li>
                      <li class="m-2">
                        <a href="#0" class="main-btn primary-btn btn-hover">
                          Rejeter
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- End Card -->
              </div>
              <!-- ENd Col -->
            </div>
            <!-- End Row -->
          </div>
          <!-- Invoice Wrapper End -->
        </div>
        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->
@endsection