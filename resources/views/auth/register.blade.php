<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>إنشاء حساب</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ @asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ @asset('assets/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ @asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ @asset('assets/css/styles.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ @asset('assets/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ @asset('assets/images/logo.svg') }}" alt="logo">
                            </div>
                            <h4>جديد ع الموقع ؟</h4>
                            <h6 class="font-weight-light">أنشئ حسابك الان, شوي خطوات سهلة</h6>
                            <form class="pt-3" action="{{ route('save_user') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control form-control-lg @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}" placeholder="أسم المستخدم">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        id="exampleInputEmail1" name="email" value="{{ old('email') }}"
                                        placeholder="البريد الالكتروني">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        id="exampleInputPassword1" name="password" placeholder="كلمة المرور">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password"
                                        class="form-control form-control-lg @error('confirm_password') is-invalid @enderror"
                                        id="exampleInputPassword1" name="confirm_password"
                                        value="{{ old('confirm_password') }}" placeholder="تاكيد كلمة المرور">
                                    @error('confirm_password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- <div class="mb-4">
                                    <div class="form-check d-flex">
                                        <label class="form-check-label text-muted " for="agree">
                                            أوافق على كل الشروط والاحكام
                                        </label>
                                        <input type="checkbox" class="form-check-input" id="agree" name="agree">
                                    </div>
                                </div> --}}
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-inverse-primary btn-fw btn-rounded fs-5 fw-bold">إنشاء حساب
                                    </button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    لديك حساب بالفعل ؟ <a href="{{ route('login') }}" class="text-primary"> سجل
                                        الدخول </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ @asset('assets/vendors/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ @asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ @asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ @asset('assets/js/template.js') }}"></script>
    <!-- endinject -->
</body>

</html>