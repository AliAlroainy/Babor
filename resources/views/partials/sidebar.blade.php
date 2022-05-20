<div class="container-fluid page-body-wrapper">
    <!-- partial:'assets/partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav " style="padding-inline: 0">
        <li class="nav-item">
                <a class="nav-link" href="/admin/index">
                
                    <i class="fa fa-line-chart menu-icon ms-3 "></i>
                    <span class="menu-title fw-bold " style="font-family: Tajawal"> الاحصائيات</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fa-solid fa-user menu-icon ms-3 "></i>
                    <span class="menu-title fw-bold " style="font-family: Tajawal">إدارة المستخدمين</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.service.index') }}">
                    <i class="bi bi-inboxes-fill menu-icon me-3 ms-3 "></i>
                    <span class="menu-title fw-bold " style="font-family: Tajawal">إدارة الخدمات</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.category.index') }}">
                    <i class="fa-solid fa-qrcode menu-icon ms-3 "></i>
                    <span class="menu-title fw-bold " style="font-family: Tajawal">إدارة الاقسام</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <i class="mdi mdi-car menu-icon ms-3 "></i>
                    <span class="menu-title  fw-bold" style="font-family: Tajawal">إدارة مواصفات السيارات</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class=" me-5">
                            <a class="nav-link" href="{{ route('admin.brand.index') }}" target="_self" style="font-family: Tajawal">
                                الماركات
                            </a>
                        </li>
                        <li class=" me-5">
                            <a class="nav-link" href="{{ route('admin.series.index') }}" style="font-family: Tajawal">
                                الانواع
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

             <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#auction" aria-expanded="false" aria-controls="auction">
                    <i class="bi bi-megaphone-fill menu-icon ms-3 me-3"></i>
                    <span class="menu-title fw-bold " style="font-family: Tajawal"> 
                        
                        إدارة المزادات</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auction">
                    <ul class="nav flex-column sub-menu">
                        <li class=" me-5">
                            <a class="nav-link" href="{{ route('admin.auction.index') }}" style="font-family: Tajawal" target="_self">
                                المزادات
                            </a>
                        </li>
                        <li class=" me-5">
                            <a class="nav-link" href="{{ route('admin.bid.index') }}" style="font-family: Tajawal">
                                عمليات المزايدة
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- wallet link --}}

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#wallet" aria-expanded="false" aria-controls="wallet">
                    <i class="fa-solid fa-wallet menu-icon me-3 ms-3"></i>
                    <span class="menu-title fw-bold " style="font-family: Tajawal"> 
                       
                        المحفظة </span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="wallet">
                    <ul class="nav flex-column sub-menu">
                        <li class=" me-5">
                            <a class="nav-link" href="/admin/wallet" style="font-family: Tajawal" target="_self">
                                <i class="bi bi-cash-stack  me-2 ms-2"></i>
                                الرصيد 
                            </a>
                        </li>
                        <li class=" me-5">
                            <a class="nav-link" href="/admin/walletAuctions" style="font-family: Tajawal">
                                <i class="bi bi-people-fill me-2 ms-2"></i>
                                عمليات المزادات
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.question.index') }}">
                    <i class="fa-solid fa-question-circle menu-icon ms-3 me-3 "></i>
                    <span class="menu-title fw-bold " style="font-family: Tajawal"> إدارة الاسئلة الشائعة</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.contactus.index.index') }}">
                    <i class="fa-solid fa-comment menu-icon ms-3 "></i>
                    <span class="menu-title fw-bold " style="font-family: Tajawal">  رسائل الزوار</span>
                </a>
            </li>


        </ul>
    </nav>
