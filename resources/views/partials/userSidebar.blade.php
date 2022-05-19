<div class="container-fluid page-body-wrapper">
    <!-- partial:'assets/partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" style="" id="sidebar">
        <ul class="nav " style="padding-inline: 0">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.profile') }}">
                    <i class="fa-solid fa-user menu-icon me-3 ms-3 "></i>
                    <span class="menu-title fw-bold " style="font-family: Tajawal">
                        
                        المعلومات الشخصية</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="mdi mdi-car menu-icon me-3 ms-3 "></i>
                    <span class="menu-title fw-bold" style="font-family: Tajawal">المزادات</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic" >
                    <ul class="nav flex-column sub-menu  " style="list-style: none">

                        <li class=" me-5 ">
                            <a class="nav-link" href="{{ route('user.add.auction') }}"
                                style="font-family: Tajawal">
                                <i class="bi bi-megaphone ms-2"></i>
                                إضافة مزاد
                            </a>
                        </li>


                        <li class="me-5">
                            <a class="nav-link" data-bs-toggle="collapse" href="#show-auctions"
                                aria-expanded="false" aria-controls="show-auctions">
                                <span class="menu-title fw-bold" style="font-family: Tajawal; ">
                                    <i class="bi bi-cone-striped ms-2"></i>
                                    تفاصيل المزادات</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse " id="show-auctions"  >
                                <ol class="list-unstyled nav flex-column sub-menu">
                                    <li class=" me-5" >

                                        <a class="nav-link" href="{{ route('user.show.progress.auction') }}"
                                            style="font-family: Tajawal">
                                            <i class="bi bi-activity ms-2"></i>

                                            الجارية
                                        </a>
                                    </li>
                             
                                    <li class=" me-5">
                                        <a class="nav-link" href="{{ route('user.show.uncompleted.auction') }}"
                                            style="font-family: Tajawal">
                                            <i class="bi bi-pen ms-2"></i>
                                              بانتظار اتمام البيع  
                                        </a>
                                    </li>

                                 

                                    <li class=" me-5">
                                        <a class="nav-link" href="{{ route('user.show.pending.auction') }}"
                                            style="font-family: Tajawal">
                                            <i class="bi bi-hourglass-split ms-1"></i>
                                             بانتظار موافقة المسؤول
                                        </a>
                                    </li>

                                    <li class=" me-5">
                                        <a class="nav-link" href="{{ route('user.show.completed.auction') }}"
                                            style="font-family: Tajawal">
                                            <i class="bi bi-check2-all ms-2"></i>
                                            المكتملة
                                        </a>
                                    </li>

                                    <li class=" me-5">
                                        <a class="nav-link" href="{{ route('user.show.disapproved.auction') }}"
                                            style="font-family: Tajawal">
                                            <i class="bi bi-archive ms-2"></i>
                                            المرفوضة
                                        </a>
                                    </li>

                                  
                                    <li class=" me-5">
                                        <a class="nav-link" href="{{ route('user.show.canceled.auction') }}"
                                            style="font-family: Tajawal">
                                            <i class="bi bi-trash3 ms-2"></i>
                                            الملغية
                                        </a>
                                    </li>
                                </ol>
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
                <a class="nav-link " href="{{ route('user.dashboard') }}">
                    <i class=" mdi mdi-settings menu-icon  me-3 ms-3"></i>
                    <span class="menu-title fw-bold " style="font-family: Tajawal">إعدادات الحساب</span>
                </a>
            </li>

        </ul>
    </nav>
