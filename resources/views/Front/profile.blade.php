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
                            <h3>
                                {{ $user->profile->username }}
                            </h3>
                            <div class="rating-stars d-flex justify-content-center">
                                <h5>
                                    @if ($total > 0)
                                        @php
                                            $remain = 5 - $total;
                                        @endphp
                                        @for ($i = 1; $i <= $total; $i++)
                                            <i class="fa fa-star" style="color: #f79522;"></i>
                                        @endfor

                                        @if ($remain > 0)
                                            @for ($i = 1; $i <= $remain; $i++)
                                                <i class="fa fa-star-o" style="color: #f79522;"></i>
                                            @endfor
                                        @endif
                                    @else
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="fa fa-star-o" style="color: #f79522;"></i>
                                        @endfor
                                    @endif
                                </h5>
                            </div>
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
                        <small class="text-muted text-uppercase fw-bold">
                            <i class="bi bi-activity"></i>
                            التعليقات</small>


                        <ul class="list-unstyled mt-3 ms-2">
                            <li class="timeline-item timeline-item-transparent">
                                <span class="timeline-point timeline-point-warning"></span>
                                @forelse ($comments as $comment)
                                    <div class="timeline-event">
                                        <div class="timeline-header mb-1">

                                            <h6 class="mb-0"> {{ $comment->name }}</h6>

                                            <small
                                                class="text-muted">{{ $comment->created_at->format('jS \\of F Y') }}</small>
                                        </div>
                                        <p class="mb-4"> {{ $comment->comments }} </p>
                                    @empty
                                        <h6 class="mb-0"> لايوجد تعليقات حتى الان</h6>
                                    </div>
                                @endforelse
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
