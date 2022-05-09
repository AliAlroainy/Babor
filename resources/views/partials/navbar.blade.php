<div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex justify-content-center">
            <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                <a class="navbar-brand brand-logo" href="index.html"><img src="{{ @asset('assets/images/logo.png') }}"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img
                        src="{{ @asset('assets/images/logo-mini.svg') }}" alt="logo" /></a>
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    {{-- <span class="mdi mdi-sort-variant"></span> --}}
                    <i class="fa-solid fa-bars fs-5 me-3"></i>
                </button>
            </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <ul class="navbar-nav mr-lg-4 w-100">
                <li class="nav-item nav-search d-none d-lg-block w-100">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="search">
                                <i class="mdi mdi-magnify ms-2"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="البحث" aria-label="search"
                            aria-describedby="search">
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-flex ">
                <a href="{{url('/')}}">
                    <i class="fa-solid fa-home btn-light fs-5 mb-2 ms-3"></i>
                </a>
            </li>
                <li class="nav-item dropdown me-1">
                    <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center"
                        id="messageDropdown" href="#" data-bs-toggle="dropdown">
                        <i class="mdi mdi-message-text mx-0"></i>
                        <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">المحادثات</p>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <img src=" {{ @asset('assets/images/faces/face4.jpg') }}" alt="image"
                                    class="profile-pic">
                            </div>
                            <div class="item-content flex-grow">
                                <h6 class="ellipsis font-weight-normal">David Grey
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    The meeting is cancelled
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <img src="{{ @asset('assets/images/faces/face2.jpg') }}" alt="image"
                                    class="profile-pic">
                            </div>
                            <div class="item-content flex-grow">
                                <h6 class="ellipsis font-weight-normal">Tim Cook
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    New product launch
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <img src="{{ @asset('assets/images/faces/face3.jpg') }}" alt="image"
                                    class="profile-pic">
                            </div>
                            <div class="item-content flex-grow">
                                <h6 class="ellipsis font-weight-normal"> Johnson
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    Upcoming board meeting
                                </p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown me-4">
                    <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown"
                        id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                        <i class="mdi mdi-bell mx-0"></i>
                        <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                        aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">الإشعارات</p>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <div class="item-icon bg-success">
                                    <i class="mdi mdi-information mx-0"></i>
                                </div>
                            </div>
                            <div class="item-content">
                                <h6 class="font-weight-normal">Application Error</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    Just now
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <div class="item-icon bg-warning">
                                    <i class="mdi mdi-settings mx-0"></i>
                                </div>
                            </div>
                            <div class="item-content">
                                <h6 class="font-weight-normal">الإعدادات</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    Private message
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <div class="item-icon bg-info">
                                    <i class="mdi mdi-account-box mx-0"></i>
                                </div>
                            </div>
                            <div class="item-content">
                                <h6 class="font-weight-normal">New user registration</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    2 days ago
                                </p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle d-flex" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                        <div>
                            @if (isset($route))
                                <img src="/images/profiles/default.png" alt="profile" width="100"
                                    class="d-block h-auto ms-0 rounded user-profile-img" />
                            @elseif (isset($user))
                                @if (isset($user->profile->avatar))
                                    <img src="/images/profiles/{{ $user->profile->avatar }}" alt="profile" width="100"
                                        class="d-block h-auto ms-0 rounded user-profile-img" />
                                @else
                                    <img src="/images/profiles/default.png" alt="profile"
                                        class="d-block h-auto ms-0 rounded user-profile-img" width="100" />
                                @endif
                            @endif
                        </div>
                        <div>
                            <span class="nav-profile-name">
                                @if (Auth::user()->hasRole('admin'))
                                    Admin
                                @else
                                    {{ Auth::user()->name }}
                                @endif
                            </span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item">
                            <i class="mdi mdi-settings text-primary ps-1"></i>
                            الإعدادات
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            <i class="mdi mdi-logout text-primary ps-1"></i>
                            تسجيل الخروج
                        </a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
                {{-- <span class="mdi mdi-menu"></span> --}}
                <i class="fa-solid fa-bars "></i>
            </button>
        </div>
    </nav>
