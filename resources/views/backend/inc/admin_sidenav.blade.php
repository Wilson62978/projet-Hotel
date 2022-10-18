<div class="sidebar-wrap">
    <div class="sidebar left c-scrollbar">
        <div class="side-nav-logo-wrap">
            <a href="" class="d-block text-left">
                <img class="mw-100" src="{{ asset('admin_assets/assets/img/logo.png') }}" class="brand-icon" alt="">
            </a>
        </div>
        <div class="side-nav-wrap">
            <ul class="side-nav-list" id="main-menu" data-toggle="side-menu">
                <li class="side-nav-item">
                    <a href="{{route("admin")}}" class="side-nav-link">
                        <i class="las la-home side-nav-icon"></i>
                        <span class="side-nav-text">{{('Dashboard')}}</span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{ route('demandes.index') }}" class="side-nav-link">
                        <i class="las la-user-friends side-nav-icon"></i>
                        <span class="side-nav-text">{{('Demandes de cotations')}}</span>
                    </a>
                </li>

               
                
                <li class="side-nav-item">
                    <a href="#" class="side-nav-link" aria-expanded="false">
                        <i class="las la-dharmachakra side-nav-icon"></i>
                        <span class="side-nav-text">Parametre</span>
                        <span class="side-nav-arrow"></span>
                    </a>
                    <ul class="side-nav-list level-2 mm-collapse" >
                        <li class="side-nav-item">
                            <a href="{{ route('reductions.index') }}" class="side-nav-link">
                                <span class="side-nav-text">{{('Réductions')}}</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('evenements.index') }}" class="side-nav-link">
                                <span class="side-nav-text">{{('Evenements')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                
            </ul><!-- .side-nav -->
        </div><!-- .side-nav-wrap -->
    </div><!-- .sidebar -->
    <div class="sidebar-overlay"></div>
</div><!-- .sidebar -->
