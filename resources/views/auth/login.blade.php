<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Majestic Admin</title>
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
    <link rel="shortcut icon" href="{{ @asset('assets/images/favicon.png') }}">
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
                            <h4>مرحبا بك</h4>
                            @if(session()->has('message')){
                                <p class="alert alert-danger">{{ session()->get('message') }}</p>
                              }
                              @endif
                            @if (session()->has('emailVerification'))
                                <p class="alert alert-warning">{{ session()->get('emailVerification') }}</p>
                            @endif
                            @if (session()->has('errLogin'))
                                <p class="alert alert-danger">{{ session()->get('errLogin') }}</p>
                            @endif
                            <h6 class="font-weight-light">سجل الدخول للإنقال للصفحة التالية</h6>
                            <form class="pt-3" action="{{ route('do_login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control form-control-lg"
                                        id="exampleInputEmail1" placeholder=" بريدك الالكتروني">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="كلمة المرور">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-inverse-success btn-fw btn-rounded">تسجيل
                                        الدخول</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input " id="rememberMe">
                                        <label class="form-check-label text-muted" style="margin-left: 0.5rem"
                                            for="rememberMe">
                                            تذكرني
                                        </label>
                                    </div>
                                    <a href="{{ url('forgetPassword') }}" class="auth-link text-black"> هل نسيت
                                        كلمة
                                        مرورك ؟</a>
                                </div>
                                <div class="mb-2 ">
                                    <button type="button"
                                        class=" d-flex align-items-center py-1 btn btn-block btn-facebook auth-form-btn">
                                        <i class="mdi mdi-facebook ms-2"></i>تسجيل الدخول باستخدام فيسبوك
                                    </button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    ليس لديك حساب ؟
                                    <a href="{{ route('register') }}" class="text-primary">انشئ حسابك</a>
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
