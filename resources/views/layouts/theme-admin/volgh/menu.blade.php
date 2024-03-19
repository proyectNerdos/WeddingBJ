            <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
                <aside class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="index.html">
                            @if(isset($setting->logo_imagen))
                                    <img src="{{asset($setting->logo_imagen)}}"  class="desktop-logo"  width="100" height="50" alt="logo">
                                @else
                                    <img src=""  class="desktop-logo"  width="300px" height="200px" alt="logo">
                                @endif



                            {{-- <img src="assets\images\brand\logo.png" class="header-brand-img desktop-logo" alt="logo">
                            <img src="assets\images\brand\logo-1.png" class="header-brand-img toggle-logo" alt="logo">
                            <img src="assets\images\brand\logo-2.png" class="header-brand-img light-logo" alt="logo">
                            <img src="assets\images\brand\logo-3.png" class="header-brand-img light-logo1" alt="logo"> --}}
                        </a><!-- LOGO -->
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle ml-auto" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->
                    </div>

{{--
                    <div class="app-sidebar__user">
                        <div class="dropdown user-pro-body text-center">
                            <div class="user-pic">

                                @if(Auth::user()->image == null)
                                    <img src="{{asset('storage/avatar-default.svg')}}"   alt="user-img" class="avatar-xl rounded-circle">
                                @else
                                    <img src="{{asset(Auth::user()->image)}}"   alt="user-img" class="avatar-xl rounded-circle">
                                @endif


                            </div>
                            <div class="user-info">

                               @if (Auth::check())

                                <h6 class=" mb-0 text-dark">{{Auth::user()->name }} {{Auth::user()->lastname }}</h6>
                                @foreach (Auth::user()->roles as $rol)
                                    <span class="text-muted app-sidebar__user-name text-sm">{{ $rol->name }}</span>
                                @endforeach

                                @endif
                            </div>
                        </div>
                    </div> --}}


                    {{-- <div class="sidebar-navs">
                        <ul class="nav  nav-pills-circle">
                            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Settings">
                                <a class="nav-link text-center m-2" href="{{ route('setting.company.index') }}">
                                    <i class="fe fe-settings"></i>
                                </a>
                            </li>
                            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Chat">
                                <a class="nav-link text-center m-2">
                                    <i class="fe fe-mail"></i>
                                </a>
                            </li>
                           <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Followers">
                                <a class="nav-link text-center m-2">
                                    <i class="fe fe-user"></i>
                                </a>
                            </li>
                            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Logout">
                                <a class="nav-link text-center m-2" href="{{ route('logout') }}">
                                    <i class="fe fe-power"></i>
                                </a>
                            </li>
                        </ul>
                    </div> --}}


                    <ul class="side-menu">
                        {{-- <li><h3>Main</h3></li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="index.html"><span>Sales Dashboard</span></a></li>
                                <li><a class="slide-item" href="index2.html"><span>Marketing Dashboard</span></a></li>
                                <li><a class="slide-item" href="index3.html"><span>Service Dashboard</span></a></li>
                                <li><a class="slide-item" href="index4.html"><span>Finance Dashboard</span></a></li>
                                <li><a class="slide-item" href="index5.html"><span>IT Dashboard</span></a></li>
                            </ul>
                        </li> --}}
                        {{-- <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-layout-accordion-separated"></i><span class="side-menu__label">Layouts</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="verticalmenu.html" class="slide-item">Vertical-Menu</a></li>
                                <li><a href="horizontalmenu.html" class="slide-item">Horizontal-Menu</a></li>
                            </ul>
                        </li> --}}


                        {{-- <li><h3>Widgets & Maps</h3></li>
                        <li>
                            <a class="side-menu__item" href="widgets.html"><i class="side-menu__icon ti-package"></i><span class="side-menu__label">Ticket</span></a>
                        </li>
                        <li>
                            <a class="side-menu__item" href="maps.html"><i class="side-menu__icon ti-map-alt"></i><span class="side-menu__label">Maps</span></a>
                        </li> --}}

                        <br>
    @permission('user-view')
        <li><h3>Panel Admin</h3></li>
    <li class="slide">
        <a class="side-menu__item" data-toggle="slide" href="#"><i class="fas fa-user side-menu__icon ti-panel"></i><span class="side-menu__label">Usuarios</span><i class="angle fa fa-angle-right"></i></a>
        <ul class="slide-menu">
            <li><a href="{!! URL::to('user/') !!}" class="slide-item"> Usuarios</a></li>
            <li><a href="{!! URL::to('user-roles/') !!}" class="slide-item"> Roles</a></li>
            <li><a href="{!! URL::to('user-permissions/') !!}" class="slide-item"> Permisos</a></li>
        </ul>
    </li>
    @endpermission


    {{-- @permission('employee-access')
    <li>
        <a class="side-menu__item" href="{{ route('admin.employee.index') }}">
        <i class="fas fa-users side-menu__icon ti-panel"></i>
        <span class="side-menu__label">Empleados</span></a>
    </li>
    @endpermission --}}



    {{-- import menu modules --}}

    {{-- import Product --}}
    @include('productos::layouts.menu')

    {{-- import cashflow --}}
    @include('cashflow::layouts.menu')



    {{-- import ticket --}}

    @permission('ticket-view')
    {{-- <li class="slide">
        <a class="side-menu__item" data-toggle="slide" href="#"><i class="fas fa-ticket-alt side-menu__icon ti-panel"></i><span class="side-menu__label">Tickets</span><i class="angle fa fa-angle-right"></i></a>
        <ul class="slide-menu">
            @permission('ticket-view')
            <li><a href="{{ route('ticket.index') }}" class="slide-item"> Tickets</a></li>
            @endpermission

            @permission('ticket-area-view')
            <li><a href="{{ route('ticket.area.index') }}" class="slide-item"> Areas</a></li>
            @endpermission

            @permission('ticket-status-view')
            <li><a href="{{ route('ticket.status.index') }}" class="slide-item"> Estados</a></li>
            @endpermission

            @permission('ticket-staff-view')
            <li><a href="{{ route('ticket.staff.index') }}" class="slide-item"> Staff</a></li>
            @endpermission

            @permission('ticket-categories-view')
            <li><a href="{{ route('ticket.categorie.index') }}" class="slide-item"> Categorias</a></li>
            @endpermission

        </ul>
    </li> --}}
    @endpermission


    @permission('recibos-view')
    {{-- <li class="slide">
        <a class="side-menu__item" data-toggle="slide" href="#"><i class="fas fa-receipt side-menu__icon ti-panel"></i><span class="side-menu__label">Recibos</span><i class="angle fa fa-angle-right"></i></a>
        <ul class="slide-menu">
            <li><a href="{{ route('receipt.index') }}" class="slide-item"> Recibos</a></li>
        </ul>
    </li> --}}
    @endpermission



    @permission('expenses-view')
    {{-- <li class="slide">
        <a class="side-menu__item" data-toggle="slide" href="#"><i class="fas fa-file-alt side-menu__icon ti-panel"></i><span class="side-menu__label">Expensas</span><i class="angle fa fa-angle-right"></i></a>
        <ul class="slide-menu">
            <li><a href="{{ route('expenses.index') }}" class="slide-item"> Expensas</a></li>
            <li><a href="{{ route('expenses.obras.index') }}" class="slide-item"> Informes de Obras</a></li>
        </ul>
    </li>
    <li>
        <a class="side-menu__item" href="{{ route('expenses.index') }}"><i class="fas fa-file-alt side-menu__icon ti-panel"></i><span class="side-menu__label">Expensas</span></a>
    </li>
    <li>
        <a class="side-menu__item" href="{{ route('expenses.obras.index') }}"><i class="fas fa-file-alt side-menu__icon ti-panel"></i><span class="side-menu__label">Informes de Obras</span></a>
    </li> --}}
    @endpermission


    @permission('setting-company-view')
    <li>
        <a class="side-menu__item" href="{{ route('setting.company.index') }}"><i class="fas fa-cog side-menu__icon ti-panel"></i><span class="side-menu__label">Configuracion</span></a>
    </li>
    @endpermission

    {{-- <li>
        <a class="side-menu__item" href="#" @disabled(true)><i class="fas fa-home side-menu__icon ti-panel" style="color: rgb(121, 118, 118)"></i><span class="side-menu__label" style="color: rgb(121, 118, 118)">Alquiler</span></a>
    </li>
    <li>
        <a class="side-menu__item" href="#"><i class="fas fa-comment-dollar
            side-menu__icon ti-panel" style="color: rgb(121, 118, 118)"></i><span class="side-menu__label" style="color: rgb(121, 118, 118)">Cupones</span></a>
    </li>
    <li>
        <a class="side-menu__item" href="#"><i class="fas fa-user-secret side-menu__icon ti-panel" style="color: rgb(121, 118, 118)"></i><span class="side-menu__label" style="color: rgb(121, 118, 118)">Visitas</span></a>
    </li>
    <li>
        <a class="side-menu__item" href="#"><i class="fas fa-wallet side-menu__icon ti-panel" style="color: rgb(121, 118, 118)"></i><span class="side-menu__label" style="color: rgb(121, 118, 118)">Deudas</span></a>
    </li> --}}



  {{-- <li><h3>Panel de Usuario</h3></li> --}}


    {{-- <li class="slide">
        <a class="side-menu__item" data-toggle="slide" href="#"><i class="fas fa-ticket-alt  side-menu__icon ti-panel"></i><span class="side-menu__label">Ticket</span><i class="angle fa fa-angle-right"></i></a>
        <ul class="slide-menu">
            <li><a href="{{ route('client.ticket.index') }}" class="slide-item"> Mis Ticket</a></li>
        </ul>
    </li>

    <li class="slide">
        <a class="side-menu__item" data-toggle="slide" href="#"><i class="fas fa-receipt  side-menu__icon ti-panel"></i><span class="side-menu__label">Recibos</span><i class="angle fa fa-angle-right"></i></a>
        <ul class="slide-menu">
            <li><a href="{{ route('client.receipt.index') }}" class="slide-item"> Mis Recibos</a></li>
        </ul>
    </li>

    <li class="slide">
        <a class="side-menu__item" data-toggle="slide" href="#"><i class="fas fa-file-alt  side-menu__icon ti-panel"></i><span class="side-menu__label">Expensas</span><i class="angle fa fa-angle-right"></i></a>
        <ul class="slide-menu">
            <li><a href="{{ route('client.expenses.index') }}" class="slide-item"> Expensas</a></li>
            <li><a href="{{ route('client.expenses.obras.index') }}" class="slide-item"> Informes de Obras</a></li>
        </ul>
    </li> --}}


                    </ul>
                </aside>



<!-- Mobile Header -->
{{-- <div class="mobile-header">
    <div class="container-fluid">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->
            <a class="header-brand" href="index.html">aaaa
                <img src="assets\images\brand\logo.png" class="header-brand-img desktop-logo" alt="logo">
                <img src="assets\images\brand\logo-3.png" class="header-brand-img desktop-logo mobile-light" alt="logo">
            </a>
            <div class="d-flex order-lg-2 ml-auto header-right-icons">
                <button class="navbar-toggler navresponsive-toggler d-md-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical text-white"></span>
                </button>
                <div class="dropdown profile-1">
                    <a href="#" data-toggle="dropdown" class="nav-link pr-2 leading-none d-flex">
                        <span>
                            <img src="assets\images\users\10.jpeg" alt="profile-user" class="avatar  profile-user brround cover-image">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <div class="drop-heading">
                            <div class="text-center">
                                <h5 class="text-dark mb-0">Elizabeth Dyer</h5>
                                <small class="text-muted">Administrator</small>
                            </div>
                        </div>
                        <div class="dropdown-divider m-0"></div>
                        <a class="dropdown-item" href="{{ route('user.setting.index') }}">
                            <i class="dropdown-icon mdi mdi-account-outline"></i> Profile
                        </a>
                        <a class="dropdown-item" href="{{ route('setting.company.index') }}">
                            <i class="dropdown-icon  mdi mdi-settings"></i> Settings
                        </a>
                        <a class="dropdown-item" href="#">
                            <span class="float-right"></span>
                            <i class="dropdown-icon mdi  mdi-message-outline"></i> Inbox
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="dropdown-icon mdi mdi-comment-check-outline"></i> Message
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <i class="dropdown-icon mdi mdi-compass-outline"></i> Need help?
                        </a>

                        <a class="dropdown-item" href="{{ route('logout') }}">
                            <i class="dropdown-icon mdi  mdi-logout-variant"></i> sSign out
                        </a>
                    </div>
                </div>
                <div class="dropdown d-md-flex header-settings">
                    <a href="#" class="nav-link icon " data-toggle="sidebar-right" data-target=".sidebar-right">
                        <i class="fe fe-align-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div> --}}


