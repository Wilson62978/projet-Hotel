@extends('frontend.layouts.app')

@section('content')
<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
      <div class="order-lg-2  mb-lg-0 pt-lg-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
            <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('home') }}"><i class="ci-home"></i>Acceuil</a></li>
            <li class="breadcrumb-item text-nowrap active" aria-current="page">Devenir membre</li>
          </ol>
        </nav>
      </div>
      <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
        <h1 class="h3 text-light mb-0">Devenir membre</h1>
      </div>
    </div>
</div>
<div class="container mt-6 mb-md-4 py-5">
   
        <div class="row justify-content-center pb-sm-2">
            <div class="col-lg-12 col-xl-12">
          
            
         

            <div class="card card-body col-8 m-auto border-0 shadow-sm shadow-lg shadow-md p-4 mb-4 mt-4 row" id="basic-info">
                <h4 class="text-center">Votre demande a été enregistrée avec succes</h4>
               
                <p class="alert alert-success">
                    Merci  de nous avoir fait confiance! Votre demande sera traitée minutieusement dans un bref delai.
                </p>
            </div>
           
            </div>
        </div>
  
</div>
    
@endsection