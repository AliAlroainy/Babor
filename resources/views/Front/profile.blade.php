@include('Front.include.header')
{{-- style --}}
@include('Front.user.style.style')
<!-- Content wrapper -->
<div class="container mt-3" dir="rtl">
    <div class="row mb-3">
        <div class="col-lg-12 grid-margin stretch-card" style="width: 100%">
            <div class="cardp d-flex align-items-center justify-content-center">
                <div class="card-body d-flex align-items-center justify-content-center">
                    <div class="p-3 d-flex flex-column align-items-center justify-content-center">
                        <div class=" mt-n2 mx-sm-0 mx-auto pt-3 pe-3" style="position: relative">
                            @if (isset($user->profile->avatar))
                                <img src="/images/profiles/{{ $user->profile->avatar }}" alt="profile" width="100"
                                    class="d-block h-auto ms-0 rounded user-profile-img" />
                            @else
                                <img src="/images/profiles/default.png" alt="profile"
                                    class="d-block h-auto ms-0 rounded user-profile-img" width="100" />
                            @endif
                        </div>
                        <div class="mt-3">
                            @if (@isset($user->profile->username))
                                <h3>
                                    {{ $user->profile->username }}
                                </h3>
                                <div class="rating-stars" style="display:flex; flex-direction:row">
                                    @if (@isset($total))
                                        @for ($i = 1; $i <= $total; $i++)
                                            <h5>
                                                <i class="fa fa-star"></i>
                                        @endfor
                                    @endif
                                    <i class="fa fa-star-o"></i>
                                    </h5>
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <a href="/private" class="btn btn-dark d-flex justify-content-center align-items-center"
                                style="width: 100px; height: 40px;">
                                <i class="bi bi-chat-dots ms-2"></i>
                                تواصل
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- User Profile Content -->
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-5">
                <!-- About User -->
                <div class="card w-100 mb-4">
                    <div class="card-body w-100">
                        <small class="text-muted text-uppercase">
                            <i class="bi bi-person"></i>
                            نبذة</small>
                        <ul class="list-unstyled mb-4 mt-3">
                            <li class="d-flex align-items-center mb-3"><span class="fw-semibold mx-2"><i
                                        class="fa-solid fa-user-large"></i> الاسم: </span>
                                <span>{{ $user->name }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-3"><span class="fw-semibold mx-2"> المهنة: </span>
                                <span>{{ $user->profile->job }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-3"><span class="fw-semibold mx-2"> العنوان: </span>
                                <span>{{ $user->profile->city }} -
                                    {{ $user->profile->address }}
                                </span>
                            </li>
                        </ul>
                        <small class="text-muted text-uppercase">معلومات التواصل</small>
                        <ul class="list-unstyled mb-4 mt-3">
                            <li class="d-flex align-items-center mb-3"><span class="fw-semibold mx-2"> الهاتف: </span>
                                <span>{{ $user->profile->phone }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-3"><span class="fw-semibold mx-2"> ايميل: </span>
                                <span>{{ $user->email }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--/ About User -->
                <!-- Profile Overview -->
                <div class="card w-100 mb-4">
                    <div class="card-body">
                        <small class="text-muted text-uppercase">
                            <i class="bi bi-trophy"></i>
                            الانجازات</small>
                        <ul class="list-unstyled mt-3 mb-0">
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span
                                    class="fw-semibold mx-2">عملية شراء:</span> <span>{{ $countPurchases }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-3"><i class='bx bx-customize'></i><span
                                    class="fw-semibold mx-2">عملية بيع:</span> <span>{{ $countSales }}</span></li>
                        </ul>
                    </div>
                </div>
                <!--/ Profile Overview -->
            </div>
            <div class="col-xl-8 col-lg-7 col-md-7">
                <!-- Activity Timeline -->
                <div class="card w-100 card-action mb-4 ">
                    <div class="card-body">
                        <small class="text-muted text-uppercase  ">
                            <i class="bi bi-activity"></i>
                            الانشطة</small>
                        <ul class="list-unstyled mt-3 ms-2">
                            <li class="timeline-item timeline-item-transparent">
                                <span class="timeline-point timeline-point-warning"></span>
                                <div class="timeline-event">
                                    <div class="timeline-header mb-1">
                                        <h6 class="mb-0"> الدخول بمزاد</h6>
                                        <small class="text-muted">اليوم</small>
                                    </div>
                                    <p class="mb-2">عقد صفقة بيع الساعة 12:40PM </p>
                                </div>
                                <div class="timeline-event">
                                    <div class="timeline-header mb-1">
                                        <h6 class="mb-0"> الدخول بمزاد</h6>
                                        <small class="text-muted">اليوم</small>
                                    </div>
                                    <p class="mb-2">عقد صفقة بيع الساعة 12:40PM </p>

                                </div>
                                <div class="timeline-event">
                                    <div class="timeline-header mb-1">
                                        <h6 class="mb-0"> الدخول بمزاد</h6>
                                        <small class="text-muted">اليوم</small>
                                    </div>
                                    <p class="mb-2">عقد صفقة بيع الساعة 12:40PM </p>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/ Activity Timeline -->
        </div>
    </div>
    <!--/ User Profile Content -->
</div>
<!--/ User Profile Content -->
@include('Front.include.footer')
