@extends('backend.layouts.app')

@section('content')
    <div class="titlebar text-left mt-2 mb-3">
        <div class="align-items-center">
            <h1 class="h3">Les Reservations</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
          
          
        </div>
        <div class="card-body">
            <table class="table aiz-table mb-0 footable footable-1 breakpoint breakpoint-lg ">
                <thead>
                    <tr class="footable-header">
                        <th class="footable-first-visible">Nom</th>
                        <th >Prénom(s)</th>
                        <th >Chambre</th>
                        <th data-breakpoints="lg">Numéro de téléphone</th>
                        <th data-breakpoints="lg">Email</th>
                        <th >Montant TTC</th>
                        <th >Tva</th>
                        <th >Statut</th>
                        <th data-breakpoints="lg" >Date d'arrivée</th>
                        <th data-breakpoints="lg" >Date de depart</th>
                        <th data-breakpoints="lg" >Date de reservation</th>
                        <th data-breakpoints="lg">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $key => $reservation)
                        <tr>
                            <td class="footable-first-visible"> {{ $reservation->nom }}</td>
                            <td>{{ $reservation->prenom }}</td>
                            <td class="footable-last-visible" >{{$reservation->nom_chambre}} <br> (Etage N°{{$reservation->niveau_chambre}})</td>
                            <td >{{$reservation->numero}}</td>
                            <td >{{$reservation->email}}</td>
                            <td >{{ number_format($reservation->montant, 0, '', ' ') }} FCFA</td>
                            <td  >{{ number_format($reservation->tva, 0, '', ' ') }} FCFA</td>
                            <td>
                                @if ($reservation->status ==true)
                                    <span class="badge badge-inline badge-success">Acceptée</span>
                                @endif
                                @if ($reservation->status ===0)
                                    <span class="badge badge-inline badge-primary">Traitée</span>
                                @endif
                                @if ($reservation->status ===null)
                                    <span class="badge badge-inline badge-danger">new</span>
                                @endif                             
                            </td>
                            <td > {{ date("d-m-Y",strtotime($reservation->dateDebut)) }} </td>
                            <td > {{ date("d-m-Y",strtotime($reservation->dateFin)) }}  </td>
                            <td > {{ date("d-m-Y",strtotime($reservation->created_at)) }}  </td>
                         
                            
                            <td  >
                                <div class="d-flex">
                                    <span class="">
                                        @if ($reservation->status ===null)
                                            <span class="badge badge-inline badge-danger mt-0 pt-0">new</span>
                                        @endif
                                        @if ($reservation->status !==null)
                                            <span class="badge badge-inline badge-primary m-0 ">Traitée</span>
                                        @endif
                                    </span>
                                    <span class="mx-2">
                                        <label class="switch switch-success " >
                                            <input onchange="update_status(this)" value="{{ route('reservations.update', ["reservation"=> $reservation->id]) }}" type="checkbox" @if ($reservation->status ==1) disabled checked @endif>
                                            <span class="slider round"></span>
                                        </label> 
                                    </span>
                                  
                                    <span >
                                        @if ($reservation->status ===null)
                                            <span class="badge badge-inline badge-primary">Traitée</span>
                                        @endif
                                        @if ($reservation->status !==null)
                                            <span class="badge badge-inline badge-success">Acceptée</span>
                                        @endif
                                    </span>
                                </div>
                              
                                
                            
                            </td>
                        
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <div class="pull-right">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script >
    
    function update_status(el){ 
       

        if(el.checked){
            var status = 1;
        }
        else{
            var status = 0;
        }
        $.post(el.value, {_token:'{{csrf_token()}}',_method:'PUT' , status:status}, function(data){
            if(data == 1){
                setInterval(() => {
                            location.reload();
                        }, 5000);
            }
            else{
                AIZ.plugins.notify('danger', 'Something went wrong');
            }
        });
    }
</script>
   
@endsection
