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
                                <div class=" mt-n2 mx-sm-0 mx-auto pt-3 pe-3" style="position: relative">
                                    @if (Auth::user() == $user)
                                        <button type="button" class="  d-flex align-items-center justify-content-center "
                                            data-bs-toggle="modal" data-bs-target="#profile_pic"
                                            style="position: absolute; bottom:0; right:0px; width: 40px; height: 40px; border-radius:50%; border: none; background-color: rgba(0, 0, 0, 0.225)">
                                            <i class="fas fa-camera"
                                                style="color: rgba(255, 255, 255, 0.867); width: 20px; height: 20px; line-height:20px;"></i>
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
                                <div class="mt-3">
                                    @if (@isset($user->profile->username))
                                        <h1>
                                            {{ $user->profile->username }} </h1>
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
                                @if (Auth::user() != $user)
                                    <div class="mb-3">
                                        <a href="/private"
                                            class="btn btn-dark d-flex justify-content-center align-items-center"
                                            style="width: 100px; height: 40px;">
                                            <i class="bi bi-chat-dots ms-2"></i>
                                            تواصل
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content -->
            <div class="w-100 ms-0 me-0">
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
                                <small class="text-muted text-uppercase  ">
                                    <i class="bi bi-activity"></i>
                                    آراء العملاء</small>


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
                                                <p class="mb-2"> {{ $comment->comments }} </p>
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
        </div>
    </div>
    <!--/ User Profile Content -->
@endsection
