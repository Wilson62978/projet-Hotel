@extends('backend.layouts.appDemo')

@section('content')
    <div class="titlebar text-left mt-2 mb-3">
        <div class="align-items-center">
            <h1 class="h3">Liste des   payements</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Payements</h5>
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
                        <th>Nom et Prénom</th>
                        <th data-breakpoints="sm">Montant</th>
                        <th data-breakpoints="sm">Numero du reçu</th>
                        <th data-breakpoints="sm">Statut</th>
                        <th class="text-right">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $key => $payment)
                        <tr>
                            <td>{{ $payment->name }} {{ $payment->username }}</td>
                            <td>{{ $payment->amount }}</td>
                            <td>{{ $payment->payment_code }}</td>
                            <td><span class="badge badge-inline {{$payment->text_color }} fs-600">{{ $payment->status }}</span></td>
                            <td class="text-right">
                                <a class="btn btn-soft-success btn-icon btn-circle btn-sm " href="{{ route('admin.payments.view', ['id'=> $payment->id]) }}" title="Voir">
                                    <i class="las la-eye"></i>
                                </a>
                                <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                                    data-href="" title="Supprimer">
                                    <i class="las la-user-slash"></i>
                                </a>
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
