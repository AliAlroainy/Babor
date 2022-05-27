{{-- <!DOCTYPE html>
<html lang="en">
    @include('partials.header') --}}

    @include('Front.include.header') 

    <body>

    <div class="container-scroller" dir="rtl">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ @asset('assets/images/logo.png') }}" alt="logo">
                            </div>
                            <h4>جديد ع الموقع ؟</h4>
                            <h6 class="font-weight-light">أنشئ حسابك الان, شوية خطوات سهلة</h6>
                            <form class="pt-3" action="{{ route('save_user') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text"
                                        class="form-control form-control-lg dark-placeholder rounded @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}"
                                           placeholder="أسم المستخدم">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text"
                                        class="form-control form-control-lg dark-placeholder rounded @error('email') is-invalid @enderror"
                                        id="exampleInputEmail1" name="email" value="{{ old('email') }}"
                                        placeholder="البريد الالكتروني">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password"
                                        class="form-control form-control-lg dark-placeholder rounded @error('password') is-invalid @enderror"
                                        id="exampleInputPassword1" name="password" placeholder="كلمة المرور">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password"
                                        class="form-control form-control-lg dark-placeholder rounded @error('confirm_password') is-invalid @enderror"
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

                                    <button type="submit" class="btn btn-warning text-nowrap btn-fw btn-rounded fs-8 fw-bold" style="background-color: #F7941D;">
                                        
                                        انشاء حساب
                                        </button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    لديك حساب بالفعل ؟ <a href="{{ route('login') }}" style="color: #F7941D;"> سجل
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

{{-- </html>  --}}


@include('Front.include.footer')
