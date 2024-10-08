



{{-- <div class="app-content">
    <div class="side-app">
        <div class="page-header"> --}}

        <!-- PAGE-HEADER -->
        @yield('title-module')
        <!-- PAGE-HEADER END -->

            <!-- /Notification -->
            <div class="d-flex  ml-auto header-right-icons header-search-icon">
                {{-- <div class="dropdown d-sm-flex">
                    <a href="#" class="nav-link icon" data-toggle="dropdown">
                        <i class="fe fe-search"></i>
                    </a>
                    <div class="dropdown-menu header-search dropdown-menu-left">
                        <div class="input-group w-100 p-2">
                            <input type="text" class="form-control " placeholder="Search....">
                            <div class="input-group-append ">
                                <button type="button" class="btn btn-primary ">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- SEARCH -->
                <div class="dropdown d-md-flex">
                    <a class="nav-link icon full-screen-link nav-link-bg">
                        <i class="fe fe-maximize fullscreen-button"></i>
                    </a>
                </div><!-- FULL-SCREEN -->
                {{-- <div class="dropdown d-md-flex notifications">
                    <a class="nav-link icon" data-toggle="dropdown">
                        <i class="fe fe-bell"></i>
                        <span class="nav-unread badge badge-success badge-pill">2</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <div class="notifications-menu">
                            <a class="dropdown-item d-flex pb-3" href="#">
                                <div class="fs-16 text-success mr-3">
                                    <i class="fa fa-thumbs-o-up"></i>
                                </div>
                                <div class="">
                                    <strong>Someone likes our posts.</strong>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex pb-3" href="#">
                                <div class="fs-16 text-primary mr-3">
                                    <i class="fa fa-commenting-o"></i>
                                </div>
                                <div class="">
                                    <strong>3 New Comments.</strong>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex pb-3" href="#">
                                <div class="fs-16 text-danger mr-3">
                                    <i class="fa fa-cogs"></i>
                                </div>
                                <div class="">
                                    <strong>Server Rebooted</strong>
                                </div>
                            </a>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item text-center">View all Notification</a>
                    </div>
                </div><!-- NOTIFICATIONS --> --}}
                {{-- <div class="dropdown d-md-flex message">
                    <a class="nav-link icon text-center" data-toggle="dropdown">
                        <i class="fe fe-mail"></i>
                        <span class="nav-unread badge badge-danger badge-pill">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <div class="message-menu">
                            <a class="dropdown-item d-flex pb-3" href="#">
                                <span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="https://laravel.spruko.com/volgh/ltr/assets/images/users/1.jpg"></span>
                                <div>
                                    <strong>Madeleine</strong> Hey! there I' am available....
                                    <div class="small text-muted">
                                        3 hours ago
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex pb-3" href="#">
                                <span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="https://laravel.spruko.com/volgh/ltr/assets/images/users/12.jpg"></span>
                                <div>
                                    <strong>Anthony</strong> New product Launching...
                                    <div class="small text-muted">
                                        5 hour ago
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex pb-3" href="#">
                                <span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="https://laravel.spruko.com/volgh/ltr/assets/images/users/4.jpg"></span>
                                <div>
                                    <strong>Olivia</strong> New Schedule Realease......
                                    <div class="small text-muted">
                                        45 mintues ago
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex pb-3" href="#">
                                <span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="https://laravel.spruko.com/volgh/ltr/assets/images/users/15.jpg"></span>
                                <div>
                                    <strong>Sanderson</strong> New Schedule Realease......
                                    <div class="small text-muted">
                                        2 days ago
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item text-center">See all Messages</a>
                    </div>
                </div><!-- MESSAGE-BOX --> --}}
                <div class="dropdown profile-1">
                    <a href="#" data-toggle="dropdown" class="nav-link pr-2 leading-none d-flex">
                        <span>
                            @if(Auth::user()->image == null)
                                    <img src="{{asset('storage/avatar-default.svg')}}"  alt="profile-user" class="avatar  profile-user brround cover-image">
                                @else
                                    <img src="{{asset(Auth::user()->image)}}"  alt="profile-user" class="avatar  profile-user brround cover-image">
                                @endif
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <div class="drop-heading">
                            <div class="text-center">
                                @if (Auth::check())
                                    <h5 class="text-dark mb-0">{{Auth::user()->name }} {{Auth::user()->lastname }}</h5>
                                    @foreach (Auth::user()->roles as $rol)
                                        <small class="text-muted">{{ $rol->name }}</small>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="dropdown-divider m-0"></div>
                        <a class="dropdown-item" href="{{ route('user.setting.index') }}">
                            <i class="dropdown-icon mdi mdi-account-outline"></i> Profile
                        </a>

                        @permission('setting-company-view')
                        <a class="dropdown-item" href="{{ route('setting.company.index') }}">
                            <i class="dropdown-icon  mdi mdi-settings"></i> Settings
                        </a>
                        @endpermission
                        {{-- <a class="dropdown-item" href="#">
                            <span class="float-right"></span>
                            <i class="dropdown-icon mdi  mdi-message-outline"></i> Inbox
                        </a> --}}
                        {{-- <a class="dropdown-item" href="#">
                            <i class="dropdown-icon mdi mdi-comment-check-outline"></i> Message
                        </a> --}}
                        <div class="dropdown-divider mt-0"></div>
                        {{-- <a class="dropdown-item" href="#">
                            <i class="dropdown-icon mdi mdi-compass-outline"></i> Need help?
                        </a> --}}
                        <form action="{{ route('logout') }}" method="GET">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
                            </button>
                        </form>
                    </div>
                </div>
                {{-- <div class="dropdown d-md-flex header-settings">
                    <a href="#" class="nav-link icon " data-toggle="sidebar-right" data-target=".sidebar-right">
                        <i class="fe fe-align-right"></i>
                    </a>
                </div><!-- SIDE-MENU --> --}}
            </div>
<!-- /Notification Ends -->




        {{-- </div>
    </div>
</div> --}}
<!-- CONTAINER END -->
