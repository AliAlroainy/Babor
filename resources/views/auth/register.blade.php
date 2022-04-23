<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>إنشاء حساب</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{@asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{@asset('assets/vendors/base/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{@asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{@asset('assets/css/styles.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{@asset('assets/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{ @asset('assets/images/logo.svg')}}" alt="logo">
              </div>
              <h4>جديد ع الموقع ؟</h4>
              <h6 class="font-weight-light">أنشئ حسابك الان, شوي خطوات سهلة</h6>
              <form class="pt-3">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" name="username" placeholder="أسم المستخدم">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="email" placeholder="البريد الالكتروني">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="كلمة المرور">
                </div>
                  <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="repassowrd" placeholder="تاكيد كلمة المرور">
                </div>
                <div class="mb-4">
                  <div class="form-check d-flex">
                    <label class="form-check-label text-muted " for="agree" >
                      أوافق على كل الشروط والاحكام
                    </label>
                      <input type="checkbox" class="form-check-input" id="agree" name="agree">
                  </div>
                </div>
                <div class="mt-3">
                    <a class="btn btn-inverse-primary btn-fw btn-rounded fs-5 fw-bold" href="">إنشاء حساب</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  لديك حساب بالفعل ؟ <a href="user/login" class="text-primary"> سجل الدخول </a>
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
  <script src="{{@asset('assets/vendors/base/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{@asset('assets/js/off-canvas.js')}}"></script>
  <script src="{{@asset('assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{@asset('assets/js/template.js')}}"></script>
  <!-- endinject -->
</body>

</html>
