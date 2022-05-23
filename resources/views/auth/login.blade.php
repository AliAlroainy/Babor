


{{-- @include('partials.header') --}}

 @include('Front.include.header')

<body>
    <div class="container-scroller" dir="rtl">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">

                            <div class="brand-logo">
                                {{-- <img src="{{ @asset('assets/images/logo.png') }}" alt="logo"> --}}
                                <div > <img src="svg\login.svg" class="" /> </div>

                            </div>
                            <h4>مرحبا بك</h4>
                            @if (session()->has('message'))
                                {
                                <p class="alert alert-danger">{{ session()->get('message') }}</p>
                                }
                            @endif
                            @if (session()->has('emailVerification'))
                                <p class="alert alert-warning">{{ session()->get('emailVerification') }}</p>
                            @endif
                            @if (session()->has('errLogin'))
                                <p class="alert alert-danger">{{ session()->get('errLogin') }}</p>
                            @endif
                            <h6 class="font-weight-light">سجل الدخول للإنتقال للصفحة التالية</h6>
                            <form class="pt-3" action="{{ route('do_login') }}" method="POST">
                                @csrf
                                <div class="form-group mb-2">
                                    <input type="text" name="email" class="dark-placeholder rounded form-control form-control-lg"
                                        id="exampleInputEmail1" autofocus placeholder=" بريدك الالكتروني">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="dark-placeholder rounded form-control form-control-lg"
                                        id="exampleInputPassword1"  autofocus placeholder="كلمة المرور">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-warning text-nowrap btn-fw btn-rounded fs-5 fw-bold">تسجيل
                                        الدخول</button>
                                </div>
                                <div class="my-2 d-flex flex-column justify-content-start mb-2 " >
                                    <div>
                                    <div  >
                                        <input type="checkbox" class="form-check-input " id="rememberMe">
                                        <label class="form-check-label text-muted" style=""
                                            for="rememberMe">
                                            تذكرني
                                        </label>
                                    </div>
                                </div>
                                    <a href="{{ url('forgetPassword') }}" class="auth-link text-black"> هل نسيت
                                        كلمة
                                        مرورك ؟</a>
                                </div>
                                <div class="mb-2 ">
                                    <button type="button"
                                        class=" d-flex align-items-center py-1 btn btn-light btn-facebook auth-form-btn">
                                        <i class="mdi mdi-facebook ms-2"></i>تسجيل الدخول باستخدام فيسبوك
                                    </button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    ليس لديك حساب ؟
                                    <a href="{{ route('register') }}" class=" text-warning">انشئ حسابك</a>
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
{{-- </body>

</html> --}}

@include('Front.include.footer')
