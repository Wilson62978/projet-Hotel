<div class="topbar px-15px px-lg-25px d-flex align-items-stretch justify-content-between">
    <div class="d-flex">
        <div class="topbar-nav-toggler d-flex align-items-center justify-content-start mr-2 mr-md-3 ml-0" data-toggle="mobile-nav">
            <button class="mobile-toggler">
                <span></span>
            </button>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-stretch flex-grow-xl-1">
        <div class="d-flex justify-content-around align-items-center align-items-stretch">
            <div class="d-flex justify-content-around align-items-center align-items-stretch">
                <div class="topbar-item">
                    <div class="d-flex align-items-center">
                        <a class="btn btn-icon btn-circle btn-light" href="{{ route('home')}}" target="_blank" title="{{ ('Parcourir le site Web') }}">
                            <i class="las la-globe"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-around align-items-center align-items-stretch">

            <div class="topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown">
                    <a class="dropdown-toggle no-arrow" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="btn btn-icon p-0 d-flex justify-content-center align-items-center">
                            <span class="d-flex align-items-center position-relative">
                                <i class="las la-bell fs-24"></i>
                                <span class="badge badge-sm badge-dot badge-circle badge-primary position-absolute absolute-top-right"></span>
                            </span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg py-0">
                        <div class="p-3 bg-light border-bottom">
                            <h6 class="mb-0">{{ ('Notifications') }}</h6>
                        </div>
                        <div class="px-3 c-scrollbar-light overflow-auto " style="max-height:300px;">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                    <div class="media text-inherit">
                                        <
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="text-center border-top">
                            <a href="" class="text-reset d-block py-2">
                                {{('Afficher toutes les notifications')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            {{-- <div class="topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown">
                    <a class="dropdown-toggle no-arrow text-dark" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <span class="avatar avatar-sm mr-md-2">
                                <img
                                    src=""
                                    onerror="this.onerror=null;this.src='{{ asset('admin_assets/assets/img/avatar-place.png') }}';"
                                >
                            </span>
                            <span class="d-none d-md-block">
                                <span class="d-block fw-500">Admin</span>
                                <span class="d-block small opacity-60">Admin</span>
                            </span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-md">
                        <a href="" class="dropdown-item">
                            <i class="las la-user-circle"></i>
                            <span>{{('Profil')}}</span>
                        </a>

                        <form action="{{ route('logout')}}" method="post">
                            @csrf
                            <button class="dropdown-item">
                                <i class="las la-sign-out-alt"></i>
                                <span>Se déconnecter</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div><!-- .topbar-item --> --}}
        </div>
    </div>
</div><!-- .topbar -->
