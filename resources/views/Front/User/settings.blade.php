@include('partials.header')
@include('partials.navbar');
@include('partials.userSidebar')

{{-- style --}}
@include('Front.user.style.style')

<div class="main-panel">

    <div class="row m-2 ">

        <div class="col-lg-12 grid-margin stretch-card" style="width: 100%">
            <div class="cardp d-flex align-items-center justify-content-center">
                <div class="card-body d-flex  align-items-center justify-content-center">

                    <h1 style="margin-top:-40px">
                        <i class=" mdi mdi-settings menu-icon  me-3 ms-3"></i>
                        الاعدادات
                    </h1>
    
                 
                </div>
            </div>
        </div>
    
    </div>
    <div class="content-wrapper">
        @if (session()->has('successRegistration'))
            <div class="alert alert-dismissible alert-success fade show" role="alert">
                {{ session()->get('successRegistration') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('Emailverfication'))
            <div class="alert alert-dismissible alert-danger fade show" role="alert">
                {{ session()->get('Emailverfication') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <nav class="row">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="card nav-link {{ request()->is('user/dashboard/settings/info') ? 'active' : null }}"
                                    id="{{ route('user.dashboard') }}-tab" href="{{ route('user.dashboard') }}"
                                    role="tab">
                                    <div class="card-body">
                                        <i class="bi bi-person-workspace ms-2"></i>
                                        تعديل البيانات الشخصية
                                    </div>
                                </a>
                                <a class="card nav-link {{ request()->is('user/dashboard/settings/psw') ? 'active' : null }}"
                                    id="{{ route('change-password-user') }}-tab"
                                    href="{{ route('change-password-user') }}" role="tab">
                                    <div class="card-body">
                                        <i class="bi bi-key ms-2"></i>
                                        تغيير كلمة السر
                                    </div>
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade {{ request()->is('user/dashboard/settings/info') ? 'show active' : null }}"
                    id="{{ route('user.dashboard') }}" role="tabpanel" aria-labelledby="info-tab">
                    <div class="col-md-12  mt-2">
                        <div class="card w-100">
                            <div class="card-body">
                                @if (session()->has('successEdit'))
                                    <div class="alert alert-dismissible alert-success fade show" role="alert">
                                        {{ session()->get('successEdit') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <p class="
                                    card-description">
                                    تعديل بياناتك الشخصية التي تظهر للعامة
                                </p>
                                <form action="{{ route('info.save') }}" method="POST">
                                    @csrf
                                    <div class="form-group d-flex justify-content-between">
                                        <div class="col-sm-7">
                                            <label for="name" class="text-muted">
                                                <i class="bi bi-person-bounding-box ms-1" style="color: #F7941D "></i>
                                                الاسم الكامل:</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $user->name ?? '' }}" placeholder="الاسم كاملا">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="username" class="text-muted">
                                                <i class="bi bi-person-video3 ms-1" style="color: #F7941D "></i>
                                                اسم المستخدم:</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                value="{{ old('username') }}{{ $user->profile->username ?? '' }}"
                                                placeholder="اسم المستخدم">
                                            @error('username')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group d-flex justify-content-between">
                                        <div class="col-sm-4">
                                            <label for="job" class="text-muted">
                                                <i class="bi bi-briefcase ms-1" style="color: #F7941D"></i>
                                                الوظيفة:</label>
                                            <input type="text" class="form-control" id="job" name="job"
                                                value="{{ old('job') }} {{ $user->profile->job ?? '' }}"
                                                placeholder="مندوب مبيعات">
                                            @error('job')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="phone" class="text-muted">
                                                <i class="bi bi-phone ms-1" style="color: #F7941D"></i>
                                                رقم الهاتف:</label>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                value="{{ old('phone') }} {{ $user->profile->phone ?? '' }}"
                                                placeholder="رقم الهاتف">
                                            @error('phone')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="city" class="text-muted">
                                                <i class="bi bi-geo-alt ms-1" style="color: #F7941D"></i>
                                                المدينة:</label>
                                            <input type="text" class="form-control" id="city" name="city"
                                                value="{{ old('city') }} {{ $user->profile->city ?? '' }}"
                                                placeholder="رقم الهاتف">
                                            @error('city')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        <i class="bi bi-award ms-1" style="color: #F7941D"></i>

                                        <label  class="text-muted ">
                                            نبذة عني:</label>
                                    </div>
                                <div class="form-group">
                                        <label for="bio" class="text-muted myTextarea">
                                            نبذة عني:</label>
                                        <textarea class="form-control" rows="4" name="bio">{{ old('bio') }} {{ $user->profile->bio ?? '' }}</textarea>
                                        @error('bio')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="text-muted">
                                            <i class="bi bi-geo ms-1" style="color: #F7941D"></i>
                                            العنوان:</label>
                                        <textarea class="form-control" id="address" rows="4" name="address">
                                            {{ old('address') }} {{ $user->profile->address ?? '' }}</textarea>
                                        @error('address')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="d-flex gap-1">
                                    <button type="submit" class="btn  text-white me-2" style="background-color: #F7941D">حفظ</button>
                                    <button type="reset" class="btn btn-dark text-white me-2">الغاء</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade {{ request()->is('user/dashboard/settings/psw') ? 'show active' : null }}"
                    id="{{ route('change-password-user') }}" role="tabpanel"
                    aria-labelledby="{{ route('change-password-user') }}-tab">
                    <div class="col-sm-6 border m-auto mt-2">
                        <div class="text-center">
                            <div class="card">
                                <div class="card-body">
                                    @if (session()->has('successChangePSW'))
                                        <div class="alert alert-dismissible alert-success fade show" role="alert">
                                            {{ session()->get('successChangePSW') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @elseif (session()->has('errMatch'))
                                        <div class="alert alert-dismissible alert-danger fade show" role="alert">
                                            {{ session()->get('errMatch') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <h3><i class="bi bi-lock my-3" style="color: #F7941D; font-size: 4em"></i></h3>
                                    <h2 class="text-center text-muted">تغيير كلمة المرور</h2>
                                    <div class="panel-body my-5">
                                        <form id="register-form" action="{{ route('update-password-user') }}"
                                            autocomplete="off" class="form" method="POST">
                                            @csrf
                                            <div class=" d-flex flex-column align-items-start mt-3">
                                                <p> كلمة المرور القديمة: </p>
                                                <input type="password" name="old_password" class="form-control"
                                                    placeholder="******">
                                                @error('old_password')
                                                    <p class="text-danger">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class="d-flex flex-column align-items-start mt-3">
                                                <p> كلمة المرور الجديدة: </p>

                                                <input type="password" name="new_password"
                                                    class="form-control @error('new_password') is-invalid @enderror"
                                                    placeholder="*******">
                                            </div>
                                            @error('new_password')
                                                <p class="text-danger">
                                                    {{ $message }}</p>
                                            @enderror
                                            <div class="d-flex flex-column align-items-start mt-3 mb-3">
                                                <p> تاكيد كلمة المرور: </p>

                                                <input type="password" name="confirm_new_password"
                                                    class="form-control @error('confirm_new_password') is-invalid @enderror"
                                                    placeholder="*******">
                                            </div>
                                            @error('confirm_new_password')
                                                <p class="text-danger">
                                                    {{ $message }}</p>
                                            @enderror
                                            <input name="recover-submit mt-3"
                                                class="btn btn-sm px-5 py-2  text-white " style="background-color: #F7941D"
                                                value="تغيير " type="submit">
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    
    @include('partials.footer')
