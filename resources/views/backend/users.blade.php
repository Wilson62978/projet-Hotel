@extends('backend.layouts.app')

@section('content')
      <!-- ========== table components start ========== -->
      <section class="table-components">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2>Utilisateurs</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="{{route("admin")}}">Accueil</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Utilisateurs
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

          <!-- ========== tables-wrapper start ========== -->
          <div class="tables-wrapper">
            <div class="row">
              <div class="col-lg-12">
                <div class="card-style mb-30">
                  <h6 class="mb-10">La liste des utilisateurs</h6>
                  <p class="text-sm mb-20">
                   
                  </p>
                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th><h6>Nom et prénoms</h6></th>
                          <th><h6>Profession</h6></th>
                          <th><h6>Numéro</h6></th>
                          <th><h6>statut</h6></th>
                          <th><h6>Action</h6></th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <tbody>

                        @foreach ([1,2,5,6,4] as $item)
                            <tr>
                                <td class="min-width">
                                    <div class="lead">
                                    
                                    
                                    <div class="lead-text">
                                        <p>Courtney Henry</p>
                                    </div>
                                    </div>
                                </td>
                                <td class="min-width">
                                    <p><a href="#0">yourmail@gmail.com</a></p>
                                </td>
                                <td class="min-width">
                                    <p>(+229)555 3343523</p>
                                </td>
                                <td class="min-width">
                                    <span class="status-btn success-btn">Done</span>
                                </td>
                                <td>
                                    <div class="action">
                                    <a class="text-primary">
                                        <i class="lni lni-eye"></i>
                                    </a>
                                    <a class="text-success mx-2">
                                        <i class="lni lni-check-box"></i>
                                    </a>
                                    <a class="text-danger">
                                        <i class="lni lni-trash-can"></i>
                                    </a>
                                    </div>
                                </td>
                            </tr> 
                        @endforeach  
                           
                        
                      </tbody>
                    </table>
                    <!-- end table -->
                  </div>
                </div>
                <!-- end card -->
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->

           
            <!-- end row -->
          </div>
          <!-- ========== tables-wrapper end ========== -->
        </div>
        <!-- end container -->
      </section>
      <!-- ========== table components end ========== -->

@endsection