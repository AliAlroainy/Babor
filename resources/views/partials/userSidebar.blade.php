<div class="container-fluid page-body-wrapper">
    <!-- partial:'assets/partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" style="" id="sidebar">
        <ul class="nav" style="padding-inline: 0">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.profile') }}">
                    <i class="fa-solid fa-user menu-icon ms-3 "></i>
                    <span class="menu-title fw-bold " style="font-family: Tajawal">المعلومات الشخصية</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="mdi mdi-car menu-icon ms-3 "></i>
                    <span class="menu-title fw-bold" style="font-family: Tajawal">المزادات</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">

                        <li class="nav-item me-5">
                            <a class="nav-link" href="{{ route('user.add.auction') }}"
                                style="font-family: Tajawal">
                                إضافة مزاد
                            </a>
                        </li>


                        <li class="nav-item me-5">
                            <a class="nav-link" data-bs-toggle="collapse" href="#show-auctions"
                                aria-expanded="false" aria-controls="show-auctions">
                                <span class="menu-title fw-bold" style="font-family: Tajawal; "> تفاصيل المزادات</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="show-auctions">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item me-5">
                                        <a class="nav-link" href="{{ route('user.show.progress.auction') }}"
                                            style="font-family: Tajawal">
                                            الجارية
                                        </a>
                                    </li>
                                    <li class="nav-item me-5">
                                        <a class="nav-link" href="{{ route('user.show.completed.auction') }}"
                                            style="font-family: Tajawal">
                                            المكتملة
                                        </a>
                                    </li>
                                    <li class="nav-item me-5">
                                        <a class="nav-link" href="{{ route('user.show.uncompleted.auction') }}"
                                            style="font-family: Tajawal">
                                            الغير المكتملة
                                        </a>
                                    </li>
                                    <li class="nav-item me-5">
                                        <a class="nav-link" href="{{ route('user.show.pending.auction') }}"
                                            style="font-family: Tajawal">
                                            في انتظار المسؤول
                                        </a>
                                    </li>
                                    <li class="nav-item me-5">
                                        <a class="nav-link" href="{{ route('user.show.disapproved.auction') }}"
                                            style="font-family: Tajawal">
                                            المرفوضة
                                        </a>
                                    </li>
                                    <li class="nav-item me-5">
                                        <a class="nav-link" href="{{ route('user.show.canceled.auction') }}"
                                            style="font-family: Tajawal">
                                            الملغية
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.show.bids') }}">
                    <i class="fas fa-money-bill-alt  me-3 ms-3"></i>
                    <span class="menu-title fw-bold " style="font-family: Tajawal">مزايداتي</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.wallet') }}">
                    <i class="fa-solid fa-wallet me-3 ms-3"></i>
                    <span class="menu-title fw-bold " style="font-family: Tajawal">المحفظة</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.dashboard') }}">
                    <i class=" mdi mdi-settings menu-icon ms-3"></i>
                    <span class="menu-title fw-bold " style="font-family: Tajawal">إعدادات الحساب</span>
                </a>
            </li>

        </ul>
    </nav>
