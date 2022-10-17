@extends('backend.layouts.appDemo')

@section('content')
    <div class="titlebar text-left mt-2 mb-3">
        <div class="align-items-center">
            <h1 class="h3">Detail  de paiement</h1>
        </div>
    </div>

    <div class="card">
        <form id="sort_uploads" action="">
          
            <div class="card-header row gutters-5">
                <div class="col-md-3">
                    <h5 class="mb-0 h6">Detail de paiement</h5>
                </div>
                <div class="col-md-3 ml-auto mr-0">
                    @if ($payment->status !== 'Accepté')
                        <select class="form-control form-control-xs selectpicker" name="status" id="status"
                            data-selected="{{ $payment->status_id }}">
                            @foreach ($status as $statut)
                                <option value="{{ $statut->id }}" @if($statut->value === 'Rejeté') onclick="add_new_address()" @endif>{{ $statut->value }}</option>
                            @endforeach
                        </select>
                        
                    @else
                        <input type="text" class="form-control" value="{{ $payment->status }}" disabled>
                    @endif
                </div>
            </div>
        </form>


        <div class="card-body">
           
            <fieldset disabled="disabled">
                <p class="text-uppercase text-sm"> Information de l'utilisateur</p>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nom</label>
                            <input class="form-control" type="text" value="{{ $payment->name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Prénom(s)</label>
                            <input class="form-control" type="email" value="{{ $payment->username }}">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Email</label>
                            <input class="form-control" type="text" value="{{ $payment->email }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Numéro de téléphone</label>
                            <input class="form-control" type="text" value="{{ $payment->phone }}">
                        </div>
                    </div>
                  
                </div>

                <hr class="horizontal dark">
                <p class="text-uppercase text-sm">Information de paiement</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Numéro du reçu</label>
                            <input class="form-control" type="text" value="{{ $payment->payment_code }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Montant</label>
                            <input class="form-control" type="text" value="{{ $payment->amount }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p class=" text-uppercase text-sm">Photo du réçu de paiement</p>
                        <div class=" rounded " style="background-color: #f7f8fa;">
                            
                            <div class="text-center"><img class="m-2 image-fluid rounded h-25" src="{{Storage::url($payment->img_file)}}"  alt="payment's image">
                            
                            </div>
                        </div>
                    </div>
                   
                </div>
            </fieldset>

            

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
                            '{{ route('admin.payments.addErrorMessage') }}', 
                            {_token: AIZ.data.csrf , id: '{{ $payment->id }}', errorMessage: errorMessage},
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
                $.post('{{ route('admin.payments.status') }}', {
                    _token: '{{ csrf_token() }}',
                    status_id: status,
                    id: '{{ $payment->id }}'
                }, function(data) {
                    if (data == 1) {
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
