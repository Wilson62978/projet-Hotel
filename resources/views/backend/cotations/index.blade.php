@extends('backend.layouts.app')

@section('content')
    <div class="titlebar text-left mt-2 mb-3">
        <div class="align-items-center">
            <h1 class="h3">Les demandes de cotations</h1>
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
                        <th data-breakpoints="lg">Numéro de téléphone</th>
                        <th >Evenement</th>
                        <th data-breakpoints="lg">Email</th>
                        <th data-breakpoints="lg">Participants</th>

                      
                        <th >Hebergement</th>
                        <th >Statut</th>

                        <th data-breakpoints="lg" >Commentaire</th>
                        <th data-breakpoints="lg">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cotations as $key => $cotation)
                        <tr>
                            <td class="footable-first-visible"> {{ $cotation->nom }}</td>
                            <td>{{ $cotation->prenom }}</td>
                            <td >{{$cotation->telephone}}</td>
                            <td class="footable-last-visible" >{{$cotation->evenement}}</td>
                            <td >{{$cotation->email}}</td>
                            <td >{{$cotation->nombreParticipant}}</td>
                            <td  >{{$cotation->hergement ? "Oui":"Non"}}</td>
                            <td>
                                @if ($cotation->status ==true)
                                    <span class="badge badge-inline badge-success">Acceptée</span>
                                @endif
                                @if ($cotation->status ===0)
                                    <span class="badge badge-inline badge-primary">Traitée</span>
                                @endif
                                @if ($cotation->status ===null)
                                    <span class="badge badge-inline badge-danger">new</span>
                                @endif                             
                            </td>
                            <td  > <p>{{$cotation->commentaire}}</p></td>
                         
                            
                            <td  >
                                <div class="d-flex">
                                    <span class="">
                                        @if ($cotation->status ===null)
                                            <span class="badge badge-inline badge-danger mt-0 pt-0">new</span>
                                        @endif
                                        @if ($cotation->status !==null)
                                            <span class="badge badge-inline badge-primary m-0 ">Traitée</span>
                                        @endif
                                    </span>
                                    <span class="mx-2">
                                        <label class="switch switch-success " >
                                            <input onchange="update_status(this)" value="{{ route('demandes.update', ["demande"=> $cotation->id]) }}" type="checkbox" @if ($cotation->status ==1) disabled checked @endif>
                                            <span class="slider round"></span>
                                        </label> 
                                    </span>
                                  
                                    <span >
                                        @if ($cotation->status ===null)
                                            <span class="badge badge-inline badge-primary">Traitée</span>
                                        @endif
                                        @if ($cotation->status !==null)
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
