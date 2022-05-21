<div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex justify-content-center">
            <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                <a class="navbar-brand brand-logo" href="{{ route('/') }}">
                    <img  src="{{ @asset('assets/images/logo.png') }}" style="width: 80px; height: 50px;" alt="logo"  /></a>
                <a class="navbar-brand brand-logo-mini" href="{{ route('/') }}">
                    <img
                        src="{{ @asset('assets/images/logo.png') }}" alt="logo"  class="img-fluid" /></a>
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
                    <a href="{{ url('/') }}">
                        <i class="fa-solid fa-home btn-light fs-5 mb-2 ms-3"></i>
                    </a>
                </li>

                <li class="nav-item dropdown me-1">
                    <a class="nav-link count-indicator  d-flex justify-content-center align-items-center"
                        id="messageDropdown" href="{{ route('private') }}">
                        <i class="mdi mdi-message-text mx-0"></i>
                        <span class="count"></span>
                    </a>

                </li>
                <li class="nav-item dropdown me-4">
                    <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown"
                        id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                        <i class="mdi mdi-bell mx-0"></i>
                        <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right rtl navbar-dropdown"
                         id="dropdown-menu"
                        aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal  dropdown-header" id="dropdown-menu">الإشعارات</p>
                        @foreach( \App\Http\Controllers\Notifications\NotificationController::getNotifications()['notifications'] as $notification)
                            @if($notification->type == 1)
                        <span class="dropdown-item">
                            <span class="cart-img ms-2" ><img src="/images/cars/{{$notification->thumbnail}}" alt="#"></span>
                                <a class="quantity text-dark" href="{{ url('auction')}}/{{$notification->link}}">
                                <p class="fw-bold m-0"> {{$notification->message}}</p>
                                <span class="amount">$ {{$notification->price}}</span>
                                <span class="d-block mb-0 date">ينتهي بتاريخ {{$notification->closeDate}}</span>
                            </a>
                        </span>
                            @elseif($notification->type == 2)
                                <span class="dropdown-item">
                                    <a class="quantity text-dark" href="{{ url('user/auction/details')}}/{{$notification->link}}">
                                        <p class="fw-bold m-0"> {{$notification->message}}</p>
                                    </a>
                                </span>
                            @elseif($notification->type == 3)
                                <span class="dropdown-item">
                                    <a class="quantity text-dark" href="{{ url('user/auction/details')}}/{{$notification->link}}">
                                        <p class="fw-bold m-0"> {{$notification->message}}</p>
                                        <p class="m-0">إضغط لمعرفة السبب</p>
                                    </a>
                                </span>
                                @else
                                <span class="dropdown-item">
                                    <a class="quantity text-dark" href="{{ url('user/auction/details')}}/{{$notification->link}}">
                                        <p class="fw-bold m-0"> {{$notification->message}}</p>
                                    </a>
                                </span>
                            @endif
                        @endforeach


                        <span class="all">
                            <a href="#" class="removeAll text-center w-100 d-inline-block mt-2">حذف الكل</a>
                            <a href="#" class="showAll text-center w-100 d-inline-block mt-2">عرض الكل</a>
                        </span>
                    </div>
                </li>
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle d-flex" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                        <div>
                            @if (Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))
                                <img src="/images/profiles/default.png" alt="profile" width="100"
                                    class="d-block h-auto ms-0 rounded user-profile-img" />
                            @else
                                @if (isset(Auth::user()->profile->avatar))
                                    <img src="/images/profiles/{{ Auth::user()->profile->avatar }}" alt="profile"
                                        width="100" class="d-block h-auto ms-0 rounded user-profile-img" />
                                @else
                                    <img src="/images/profiles/default.png" alt="profile"
                                        class="d-block h-auto ms-0 rounded user-profile-img" width="100" />
                                @endif
                            @endif
                        </div>
                        <div>
                            <span class="nav-profile-name">
                                @if (Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))
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
                        <a class="dropdown-item" href="{{ route('/') }}">
                            <i class="fa fa-car ps-1"></i>
                            العودة للموقع
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
