@include('partials.header')
@include('partials.navbar');
@include('partials.userSidebar')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-dismissible alert-danger fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session()->has('successEdit'))
                            <div class="alert alert-dismissible alert-success fade show" role="alert">
                                {{ session()->get('successEdit') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="row">
                            <div class="border-bottom text-center pb-4">
                                @if (isset($user->profile->avatar))
                                    <img src="/images/profiles/{{ $user->profile->avatar }}" alt="profile"
                                        class="img-lg rounded-circle mb-3" />
                                @else
                                    <img src="/images/profiles/default.jpg" alt="profile"
                                        class="img-lg rounded-circle mb-3" />
                                @endif
                                <!-- Button trigger modal -->
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#profile_pic">
                                    <i class="fas fa-camera"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="profile_pic" tabindex="-1"
                                    aria-labelledby="profile_pic_label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="profile_pic_label">اختر صورة</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('avatar.change') }}" method="POST"
                                                    enctype="multipart/form-data" id="profileForm">
                                                    @csrf
                                                    <input type="file" name="avatar" class="form-control">
                                                </form>
                                            </div>
                                            @error('avatar')
                                                {{ $message }}
                                            @enderror
                                            <div class="modal-footer">
                                                <button type="submit" form="profileForm"
                                                    class="btn btn-primary text-white">حفظ</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h3>{{ $user->name }}</h3>
                                </div>
                                <p class="w-75 mx-auto mb-3">
                                    {{ $user->profile->bio }}
                                </p>
                                {{-- <div class="d-flex justify-content-center"> --}}
                                {{-- <button class="btn btn-success ms-1">Hire Me</button> --}}
                                {{-- <button class="btn btn-success">Follow</button> --}}
                                {{-- </div> --}}
                            </div>

                            <div class="py-4">
                                <p class="clearfix">
                                    <span class="float-left">
                                        الحالة
                                    </span>
                                    <span class="float-right text-muted">
                                        مفعل
                                    </span>
                                </p>

                                <p class="clearfix">
                                    <span class="float-left">
                                        الهاتف
                                    </span>

                                    <span class="float-right text-muted">
                                        @if ($user->profile->phone)
                                            {{ $user->profile->phone }}
                                        @else
                                            لم يتم النشر
                                        @endif
                                    </span>
                                </p>

                                <p class="clearfix">
                                    <span class="float-left">
                                        البريد الالكتروني
                                    </span>
                                    <span class="float-right text-muted">
                                        {{ $user->email }}
                                    </span>
                                </p>

                                <p class="clearfix">
                                    <span class="float-left">
                                        فيسبوك
                                    </span>
                                    <span class="float-right text-muted">
                                        <a href="#">David Grey</a>
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        تويتر
                                    </span>
                                    <span class="float-right text-muted">
                                        <a href="#">@davidgrey</a>
                                    </span>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
