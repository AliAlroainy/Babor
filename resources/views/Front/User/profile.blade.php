@extends('partials.usermaster')
@section('body')
    @include('Front.user.style.style')
    <!-- Content wrapper -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card" style="width: 100%">
                    <div class="cardp d-flex align-items-center justify-content-center">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <div class="p-3 d-flex flex-column align-items-center justify-content-center">
                                <div class=" mt-n2 mx-sm-0 mx-auto pt-3" style="position: relative">
                                    @if (Auth::user() == $user)
                                        <button type="button" class=" d-flex align-items-center justify-content-center"
                                            data-bs-toggle="modal" data-bs-target="#profile_pic"
                                            style="position: absolute; bottom:0; left:-25px; background-color: rgba(0, 0, 0, 0.35) ; border-radius: 50%; width: 40px; height: 40px; border: none">
                                            <i class="fas fa-camera" style="color: rgba(240, 248, 255, 0.714)"></i>
                                        </button>
                                    @endif
                                    @if (isset($user->profile->avatar))
                                        <img src="/images/profiles/{{ $user->profile->avatar }}" alt="profile" width="100"
                                            class="d-block h-auto ms-0 rounded user-profile-img" />
                                    @else
                                        <img src="/images/profiles/default.png" alt="profile"
                                            class="d-block h-auto ms-0 rounded user-profile-img" width="100" />
                                    @endif
                                </div>
                                <div class="mt-3 text-center">
                                    <h1> {{ $user->profile->username }} </h1>
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
                                                        <i class="far fa-star" style="color: #f79522;"></i>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content -->
            <div class="w-100">
                <!-- Modal -->
                @if (session()->has('Emailverfication'))
                    <div class="alert alert-dismissible alert-danger fade show" role="alert">
                        {{ session()->get('Emailverfication') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="modal fade" id="profile_pic" tabindex="-1" aria-labelledby="profile_pic_label"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="profile_pic_label">اختر صورة</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('avatar.change') }}" method="POST" enctype="multipart/form-data"
                                    id="profileForm">
                                    @csrf
                                    <input type="file" name="avatar" class="dropify">
                                    <div class="d-inline mx-auto mt-2 previewFrames alert alert-dismissible"
                                        style="position: relative;"></div>
                                </form>
                            </div>
                            @error('avatar')
                                {{ $message }}
                            @enderror
                            <div class="modal-footer">
                                <button type="submit" form="profileForm" class="btn btn-warning text-white">حفظ</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- User Profile Content -->
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-5">
                        <!-- About User -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <small class="text-muted text-uppercase">
                                    <i class="bi bi-person"></i>
                                    نبذة</small>
                                <ul class="list-unstyled mb-4 mt-3">
                                    <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span
                                            class="fw-semibold mx-2"><i class="fa-solid fa-user-large"></i> الاسم: </span>
                                        <span>{{ $user->name }}</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span
                                            class="fw-semibold mx-2"><i class="fa-solid fa-suitcase"></i> المهنة: </span>
                                        <span>{{ $user->profile->job }}</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><i class="bx bx-flag"></i><span
                                            class="fw-semibold mx-2"><i class="fa-solid fa-location-dot"></i> العنوان:
                                        </span>
                                        <span>{{ $user->profile->city }} -
                                            {{ $user->profile->address }}</span>
                                    </li>
                                </ul>
                                <small class="text-muted text-uppercase">معلومات التواصل</small>
                                <ul class="list-unstyled mb-4 mt-3">
                                    <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span
                                            class="fw-semibold mx-2"><i class="fa-solid fa-phone"></i> الهاتف: </span>
                                        <span>{{ $user->profile->phone }}</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span
                                            class="fw-semibold mx-2"><i class="fa-solid fa-envelope"></i> ايميل: </span>
                                        <span>{{ $user->email }}</span>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <!--/ About User -->
                        <!-- Profile Overview -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <small class="text-muted text-uppercase">
                                    <i class="bi bi-trophy"></i>
                                    الانجازات</small>
                                <ul class="list-unstyled mt-3 mb-0">
                                    <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span
                                            class="fw-semibold mx-2">عملية شراء:</span>
                                        <span>{{ $countPurchases }}</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><i class='bx bx-customize'></i><span
                                            class="fw-semibold mx-2">عملية بيع:</span> <span>{{ $countSales }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--/ Profile Overview -->
                    </div>
                    <div class="col-xl-8 col-lg-7 col-md-7">
                        <!-- Activity Timeline -->
                        <div class="card card-action mb-4 ">


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
                                                <p class="mb-4">{{ $comment->comments }}</p>
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
    </div>
@endsection
