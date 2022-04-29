<div class="container-fluid page-body-wrapper">
    <!-- partial:'assets/partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav" style="padding-inline: 0">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.profile') }}">
                    <i class="fa-solid fa-user menu-icon ms-3 "></i>
                    <span class="menu-title fw-bold fs-5">المعلومات الشخصية</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.dashboard') }}">
                    <i class=" mdi mdi-settings menu-icon ms-3 "></i>
                    <span class="menu-title fw-bold fs-5">إعدادات الحساب</span>
                </a>
            </li>
            {{-- <li class="nav-item"> --}}
            {{-- <a class="nav-link" href="{{ route('user.auction') }}"> --}}
            {{-- <i class=" mdi mdi-car menu-icon ms-3 "></i> --}}
            {{-- <span class="menu-title fw-bold fs-5">المزادات</span> --}}
            {{-- </a> --}}
            {{-- </li> --}}
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="mdi mdi-car menu-icon ms-3 "></i>
                    <span class="menu-title fw-bold fs-5">المزادات</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item me-5"> <a class="nav-link" href="{{ route('user.auction') }}"
                                target="_self">عرض المزادات</a></li>
                        <li class="nav-item me-5"> <a class="nav-link"
                                href="{{ route('user.add.auction') }}">إضافة مزاد</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
