@include('partials.header')
@include('partials.navbar');
@include('partials.userSidebar')

<div class="main-panel">
    <div class="content-wrapper">
        @if (session()->has('successRegistration'))
            <p class="alert alert-success">{{ session()->get('successRegistration') }}</p>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <nav class="row">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="card nav-link active" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                    aria-selected="@if (isset($tab)) @if ($tab == 'profile')  true @endif
@else
false @endif">
                                    <div class="card-body">
                                        تعديل البيانات الشخصية
                                    </div>
                                </button>
                                <button class="card nav-link" id="nav-psw-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-psw" type="button" role="tab" aria-controls="nav-psw"
                                    aria-selected="@if (isset($tab)) @if ($tab == 'psw')  true @endif
@else
false @endif">
                                    <div class="card-body">
                                        تغيير كلمة السر
                                    </div>
                                </button>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade  @if ($tab == 'profile') show active @else '' @endif"
                    id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="col-md-8 m-auto mt-2">
                        <div class="card">
                            <div class="card-body">
                                @if (session()->has('successEditProfile'))
                                    <p class="alert alert-success">{{ session()->get('successEditProfile') }}</p>
                                @endif
                                <p class="card-description">
                                    تعديل بياناتك الشخصية التي تظهر للعامة
                                </p>
                                <form action="{{ route('info.save') }}" method="POST">
                                    @csrf
                                    <div class="form-group d-flex justify-content-between">
                                        <div class="col-md-7">
                                            <label for="name">الاسم الكامل</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $user->name ?? '' }}" placeholder="الاسم كاملا">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="username">اسم المستخدم</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                value="{{ $user->profile->username ?? '' }}"
                                                placeholder="اسم المستخدم">
                                            @error('username')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group d-flex justify-content-between">
                                        <div class="col-md-5">
                                            <label for="gender">اختر الجنس</label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="gender">
                                                <option value="{{ \App\Enums\Gender::MALE }}">ذكر</option>
                                                {{-- @if ($user->profile->gender == 'ذكر') selected @endif --}}
                                                <option value="{{ \App\Enums\Gender::FEMALE }}">أنثى</option>
                                                {{-- @if ($user->profile->gender == 'أنثى') selected @endif --}}
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phone">رقم الهاتف</label>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                value="{{ old('phone') }} {{ $user->profile->phone ?? '' }}"
                                                placeholder="رقم الهاتف">
                                            @error('phone')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="bio">نبذة عني</label>
                                        <textarea class="form-control" id="bio" rows="4"
                                            name="bio">{{ old('bio') }} {{ $user->profile->bio ?? '' }}</textarea>
                                        @error('bio')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="address">العنوان</label>
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
                <div class="tab-pane fade  @if ($tab == 'psw') show active @else '' @endif" id="nav-psw"
                    role="tabpanel" aria-labelledby="nav-psw-tab">
                    <div class="col-sm-6 border m-auto mt-2">
                        <div class="text-center">
                            <div class="card">
                                <div class="card-body">
                                    @if (session()->has('successChangePSW'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session()->get('successChangePSW') }}
                                        </div>
                                    @elseif (session()->has('errMatch'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session()->get('errMatch') }}
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
