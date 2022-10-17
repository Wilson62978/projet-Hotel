@extends('backend.layouts.appDemo')

@section('content')
    <div class="titlebar text-left mt-2 mb-3">
        <div class="align-items-center">
            <h1 class="h3">Demande d'adhésion</h1>
        </div>
    </div>

    <div class="card">
        <form id="sort_uploads" action="">
          
            <div class="card-header row gutters-5">
                <div class="col-md-3">
                    <h5 class="mb-0 h6">Information de l'utilisateur</h5>
                </div>
                <div class="col-md-3 ml-auto mr-0">
                    @if ($member->status !== 'Accepté')
                        <select class="form-control form-control-xs selectpicker" name="status" id="status"
                            data-selected="{{ $member->status_id }}">
                            @foreach ($status as $statut)
                                <option value="{{ $statut->id }}" @if($statut->value === 'Rejeté') onclick="add_new_address()" @endif>{{ $statut->value }}</option>
                            @endforeach
                        </select>
                        
                    @else
                        <input type="text" class="form-control" value="{{ $member->status }}" disabled>
                    @endif
                </div>
                <input type="hidden" name="member_id" value="{{ $member->id }}">
            </div>
        </form>


        <div class="card-body">
           
            <fieldset disabled="disabled">
                <p class="text-uppercase text-sm"> Information personnelle</p>
                <div class="  rounded-3 p-2 mb-2" style="background-color: #f7f8fa;">
                    <div class="d-flex align-items-center"><img class="rounded" src="{{Storage::url($member->img_file)}}" width="90" alt="Susan Gardner">
                      
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nom</label>
                            <input class="form-control" type="text" value="{{ $member->name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Prénom(s)</label>
                            <input class="form-control" type="email" value="{{ $member->username }}">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Date de naissance</label>
                            <input class="form-control" type="text" value="{{ $member->birth_date }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Lieu de naissance</label>
                            <input class="form-control" type="text" value="{{ $member->birth_place }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Sexe</label>
                            <input class="form-control" type="text" value="{{ $member->sexe }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Pays d'origine</label>
                            <input class="form-control" type="text" value="{{ $member->cfo_name }}">
                        </div>
                    </div>
                </div>

                <hr class="horizontal dark">
                <p class="text-uppercase text-sm">Information de contact</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Email</label>
                            <input class="form-control" type="text" value="{{ $member->email }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Numero de téléphone</label>
                            <input class="form-control" type="text" value="{{ $member->phone }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Pays de residence</label>
                            <input class="form-control" type="text" value="{{ $member->cfr_name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Ville actuelle</label>
                            <input class="form-control" type="text" value="{{ $member->city }}">
                        </div>
                    </div>
                </div>
            </fieldset>

            <hr class="horizontal dark">
            <p class="text-uppercase text-sm">Information professionelle</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Niveau d'étude</label>
                        <input disabled class="form-control" type="text" value="{{ $member->loe_name }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Profession</label>
                        <input disabled class="form-control" type="text" value="{{ $member->occupation_name }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group ">
                        <label for="example-text-input" class="form-control-label">Pièce jointe</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <a href="{{ asset(Storage::url($member->d_file)) }}" target="_blanck"
                                    class="input-group-text btn btn-primary font-weight-medium form-left">Télécharger
                                </a>
                            </div>
                            <input disabled type="text" name="icon" value="{{ $member->d_name }}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <hr class="horizontal dark">
            <p class="text-uppercase text-sm">Pièce d'identité</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Type de pièce</label>
                        <input disabled class="form-control" type="text" value="{{ $member->card }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group ">
                        <label for="example-text-input" class="form-control-label">Numero de la pièce</label>
                        <input disabled class="form-control" type="text" value="{{ $member->card_number }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Date d'expiration</label>
                        <input disabled class="form-control" type="text" value="{{ $member->card_expired_at }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group ">
                        <label for="example-text-input" class="form-control-label">Pièce jointe</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <a href="{{ asset(Storage::url($member->c_file)) }}" target="_blanck"
                                    class="input-group-text btn btn-primary font-weight-medium form-left">Télécharger
                                </a>
                            </div>
                            <input disabled type="text" name="icon" value="{{ $member->c_name }}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
<div class="modal fade" id="new-address-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Motif de rejet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-default" role="form" action="" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="p-2">
                            <div class="form-group">
                                <textarea class="form-control text-editor mb-3" placeholder="Entrer le motif" rows="6" name="error_message" required></textarea>
                                <span class="invalid-feedback" role="alert">

                                </span>
                            </div>
                        
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-sm btn-primary" id="error_message">Confirmer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script type="text/javascript">
        $('#status').on('change', function() {
            var status = ($("#status option:selected"));
            if (status.text() === 'Rejeté') {
                $('#new-address-modal').modal('show');
                $('#error_message').on('click', function(e) {
                    e.preventDefault();
                    $('.invalid-feedback').html(null);
                    $('textarea[name=error_message]').removeClass('is-invalid');
                    var errorMessage = $('textarea[name=error_message]').val();
                    if (errorMessage == '') {
                        $('textarea[name=error_message]').addClass('is-invalid');
                        $('.invalid-feedback').html('<strong>Le champ est obligatoire</strong>');
                    }else if(errorMessage.length < 10){
                        $('textarea[name=error_message]').addClass('is-invalid');
                        $('.invalid-feedback').html('<strong>Le champ doit contenir au minimum 10 caractères</strong>');
                    }else {
                        $.post(
                            '{{ route('member.addErrorMessage') }}', 
                            {_token: AIZ.data.csrf , id: '{{ $member->id }}', errorMessage: errorMessage},
                            function (data) {
                                data = JSON.parse(data);
                                if (data.status === 1) {
                                    $('#new-address-modal').modal('hide');
                                    update_status(status.val());
                                }
                            }
                        );
                        
                    }
                });
            }else{
                update_status(status.val());
            }

            function update_status (status) {
                $.post('{{ route('member.status') }}', {
                    _token: '{{ csrf_token() }}',
                    status_id: status,  
                    id: $('[name=member_id]').attr('value') 
                }, function(data) {
                    if (data.status == 1) {
                        AIZ.plugins.notify('success', 'Le statut à été modifié avec succès');
                        setInterval(() => {
                            location.reload();
                        }, 5000);
                    } else {
                        AIZ.plugins.notify('danger', "Quelque chose s'est mal passé");
                    }
                });
            }
        });
    </script>
@endsection
