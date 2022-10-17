@extends('backend.layouts.appDemo')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="align-items-center">
            <h1 class="h3">Liste des memebres</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Membres</h5>
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
                        <th data-breakpoints="sm">Email</th>
                        <th data-breakpoints="sm">Téléphone</th>
                        <th data-breakpoints="lg">Pays d'origine</th>
                        <th data-breakpoints="lg">Pays de résidence</th>
                        <th data-breakpoints="sm">Profession</th>
                        <th data-breakpoints="sm">Niveau d'etude</th>
                        <th data-breakpoints="sm">Statut</th>
                        <th class="text-right">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $key => $member)
                        <tr>
                            <td>{{ $member->name }} {{ $member->username }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>{{ $member->cfo_name }}</td>
                            <td>{{ $member->cfr_name }}</td>
                            <td>{{ $member->occupation_name }}</td>
                            <td>{{ $member->loe_name }}</td>
                            <td><span class="badge badge-inline {{ $member->text_color }} fs-600">{{ $member->status }}</span></td>
                            <td class="text-right">
                                <a class="btn btn-soft-success btn-icon btn-circle btn-sm " href="{{ route('admin.member.profile', ['id'=> $member->user_id]) }}" title="Voir">
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
