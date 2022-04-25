<div class="container-fluid page-body-wrapper">
    <!-- partial:'assets/partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav " style="padding-inline: 0">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fa-solid fa-user menu-icon ms-3 "></i>
                    <span class="menu-title fw-bold fs-5">إدارة المستخدمين</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.service.index') }}">
                    <i class="fa-solid fa-user menu-icon ms-3 "></i>
                    <span class="menu-title fw-bold fs-5">إدارة الخدمات</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="mdi mdi-car menu-icon ms-3 "></i>
                    <span class="menu-title fs-5 fw-bold">إدارة مواصفات السيارات</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item me-5"> <a class="nav-link" href="{{ route('admin.brand.index') }}"
                                target="_self">الماركات</a></li>
                        <li class="nav-item me-5"> <a class="nav-link"
                                href="{{ url('admin/carSpecs/types') }}">الانواع</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
