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
            <table class="table aiz-table  table-responsive mb-0">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom(s)</th>
                        <th>Numéro de téléphone</th>
                        <th>Evenement</th>
                        <th>Email</th>
                        <th>Participants</th>
                      
                        <th>Hebergement</th>
                        <th class="text-right">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cotations as $key => $cotation)
                        <tr>
                            <td>{{ $cotation->nom }}</td>
                            <td>{{ $cotation->prenom }}</td>
                            <td >{{$cotation->telephone}}</td>
                            <td >{{$cotation->evenement}}</td>
                            <td >{{$cotation->email}}</td>
                            <td >{{$cotation->nombreParticipant}}</td>
                            <td >{{$cotation->hergement ? "Oui":"Non"}}</td>
                         
                            
                            <td >
                                {{-- <label class="switch switch-success mb-0">
                                    <input onchange="update_status(this)" value="{{ route('demandes.update', ["demande"=> $cotation->id]) }}" type="checkbox" @if ($cotations->status ==1) checked @endif>
                                    <span class="slider round"></span>
                                </label> --}}
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
                AIZ.plugins.notify('success', 'Country status updated successfully');
            }
            else{
                AIZ.plugins.notify('danger', 'Something went wrong');
            }
        });
    }
</script>
   
@endsection
