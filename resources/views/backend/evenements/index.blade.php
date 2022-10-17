@extends('backend.layouts.app')

@section('content')
    <div class="titlebar text-left mt-2 mb-3">
        <div class="align-items-center">
            <h1 class="h3">Liste des évenements</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <a href="{{ route("evenements.create") }}" class="mb-0 h6 btn btn-primary">  Ajouter</a>
            <div class="pull-right clearfix">
                <form class="" id="sort_flash_deals" action="" method="GET">
                    <div class="box-inline pad-rgt pull-left">
                        <div class="" style="min-width: 200px;">
                            <input type="text" class="form-control" id="search" name="search"
                                @isset($sort_search) value="{{ $sort_search }}" @endisset
                                placeholder="{{ 'Type name & Enter' }}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Titre</th>
                        <th>Description</th>
                      
                        <th>Status</th>
                        <th class="text-right">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($evenements as $key => $evenement)
                        <tr>
                            <td >
                                <img src="{{ asset(Storage::url($evenement->image)) }}" alt="..." class="image-fluid rounded" width="80" height="60">
                            </td>
                            <td>{{ $evenement->titre }}</td>
                            <td>{{ $evenement->description }}</td>
                         
                            
                                <td >
                                    <label class="switch switch-success mb-0">
                                        <input onchange="update_status(this)" value="{{ route('evenements.update', ["evenement"=> $evenement->id]) }}" type="checkbox" @if ($evenement->status ==1) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                            
                            <td class="text-right">
                                <form class="" action="{{route("evenements.destroy",["evenement"=>$evenement->id]) }}" method="post">
                                    @csrf
                                        <a class="btn btn-soft-success btn-icon btn-circle btn-sm " href="{{route("evenements.edit",["evenement"=>$evenement->id]) }}" title="Modifier">
                                            <i class="las la-pen"></i>
                                        </a>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-soft-danger btn-icon btn-circle btn-sm "
                                            data-href="" title="Supprimer">
                                            <i class="las la-user-slash"></i>
                                        </button>
                                </form>
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
