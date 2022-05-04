@include('partials.header')
@include('partials.navbar');
@include('partials.userSidebar')

<div class="main-panel">
    <div class="content-wrapper">
        @if (session()->has('successRegistration'))
            <div class="alert alert-dismissible alert-success fade show" role="alert">
                {{ session()->get('successRegistration') }}
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
                                        تعديل البيانات الشخصية
                                    </div>
                                </a>
                                <a class="card nav-link {{ request()->is('user/dashboard/settings/psw') ? 'active' : null }}"
                                    id="{{ route('change-password-user') }}-tab"
                                    href="{{ route('change-password-user') }}" role="tab">
                                    <div class="card-body">
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
                    <div class="col-md-8 m-auto mt-2">
                        <div class="card">
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
                                            <label for="name" class="text-muted">الاسم الكامل</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $user->name ?? '' }}" placeholder="الاسم كاملا">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="username" class="text-muted">اسم المستخدم</label>
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
                                            <label for="job" class="text-muted">الوظيفة</label>
                                            <input type="text" class="form-control" id="job" name="job"
                                                value="{{ old('job') }} {{ $user->profile->job ?? '' }}"
                                                placeholder="مندوب مبيعات">
                                            @error('job')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="phone" class="text-muted">رقم الهاتف</label>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                value="{{ old('phone') }} {{ $user->profile->phone ?? '' }}"
                                                placeholder="رقم الهاتف">
                                            @error('phone')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="city" class="text-muted">المدينة</label>
                                            <input type="text" class="form-control" id="city" name="city"
                                                value="{{ old('city') }} {{ $user->profile->city ?? '' }}"
                                                placeholder="رقم الهاتف">
                                            @error('city')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="bio" class="text-muted">نبذة عني</label>
                                        <textarea class="form-control" id="bio" rows="4"
                                            name="bio">{{ old('bio') }} {{ $user->profile->bio ?? '' }}</textarea>
                                        @error('bio')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="text-muted">العنوان</label>
                                        <textarea class="form-control" id="address" rows="4" name="address">
                                            {{ old('address') }} {{ $user->profile->address ?? '' }}</textarea>
                                        @error('address')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary text-white me-2">حفظ</button>
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
                                    <h3><i class="fa fa-lock fa-2x my-3"></i></h3>
                                    <h2 class="text-center">تغيير كلمة المرور</h2>
                                    <div class="panel-body my-5">
                                        <form id="register-form" action="{{ route('update-password-user') }}"
                                            autocomplete="off" class="form" method="POST">
                                            @csrf
                                            <div class="input-group mt-3">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                        class="fa-solid fa-lock"></i></span>
                                                <input type="password" name="old_password" class="form-control"
                                                    placeholder="كلمة المرور القديمة">
                                                @error('old_password')
                                                    <p class="text-danger">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class="input-group mt-3">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                        class="fa-solid fa-lock"></i></span>
                                                <input type="password" name="new_password"
                                                    class="form-control @error('new_password') is-invalid @enderror"
                                                    placeholder="كلمة المرور الجديدة">
                                            </div>
                                            @error('new_password')
                                                <p class="text-danger">
                                                    {{ $message }}</p>
                                            @enderror
                                            <div class="input-group my-3">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                        class="fa-solid fa-lock"></i></span>
                                                <input type="password" name="confirm_new_password"
                                                    class="form-control @error('confirm_new_password') is-invalid @enderror"
                                                    placeholder="تاكيد كلمة المرور الجديدة">
                                            </div>
                                            @error('confirm_new_password')
                                                <p class="text-danger">
                                                    {{ $message }}</p>
                                            @enderror
                                            <input name="recover-submit"
                                                class="btn btn-sm px-5 py-2 btn-primary text-white btn-block"
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
