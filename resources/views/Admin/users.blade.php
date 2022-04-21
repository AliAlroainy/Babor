<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Babor Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{@asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{@asset('assets/vendors/base/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- inject:css -->
    <link rel="stylesheet" href="{{@asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{@asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{@asset('assets/css/all.min.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{@asset('assets/images/favicon.png')}}" />

{{--    google fonts--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
</head>

<body >
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
          <a class="navbar-brand brand-logo" href="index.html"><img src="{{@asset('assets/images/logo.svg')}}" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{@asset('assets/images/logo-mini.svg')}}" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
{{--            <span class="mdi mdi-sort-variant"></span>--}}
              <i class="fa-solid fa-bars fs-5 me-3"></i>
          </button>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify ms-2"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="البحث" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown me-1">
            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-bs-toggle="dropdown">
              <i class="mdi mdi-message-text mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">المحادثات</p>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src=" {{@asset('assets/images/faces/face4.jpg')}}" alt="image" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal">David Grey
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src="{{@asset('assets/images/faces/face2.jpg')}}" alt="image" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal">Tim Cook
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    New product launch
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src="{{@asset('assets/images/faces/face3.jpg')}}" alt="image" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal"> Johnson
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown me-4">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
              <i class="mdi mdi-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">الإشعارات</p>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-success">
                    <i class="mdi mdi-information mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-warning">
                    <i class="mdi mdi-settings mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">الإعدادات</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-info">
                    <i class="mdi mdi-account-box mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <img src="{{@asset('assets/images/faces/face5.jpg')}}" alt="profile"/>
              <span class="nav-profile-name">علي الرعيني</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary ps-1" ></i>
                الإعدادات
              </a>
              <a class="dropdown-item">
                <i class="mdi mdi-logout text-primary ps-1"></i>
                تسجيل الخروج
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
{{--          <span class="mdi mdi-menu"></span>--}}
            <i class="fa-solid fa-bars "></i>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:'assets/partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav " style="padding-inline: 0">
          <li class="nav-item">
            <a class="nav-link" href="admin/users">
{{--              <i class="mdi mdi-home menu-icon"></i>--}}
              <i class="fa-solid fa-user menu-icon ms-3 "></i>
              <span class="menu-title fw-bold fs-5">إدارة المستخدمين</span>
            </a>
          </li>
{{--          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-circle-outline menu-icon mx-2"></i>
              <span class="menu-title">إدارة المستخدمين</span>
              <i class="menu-arrow mx-2"></i>
            </a>
           <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="assets/pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
         </li>--}}

            {{--   <li class="nav-item">
                <a class="nav-link" href="assets/pages/forms/basic_elements.html">
                  <i class="mdi mdi-view-headline menu-icon"></i>
                  <span class="menu-title">Form elements</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="assets/pages/charts/chartjs.html">
                  <i class="mdi mdi-chart-pie menu-icon"></i>
                  <span class="menu-title">Charts</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/tables/basic-table.html">
                  <i class="mdi mdi-grid-large menu-icon"></i>
                  <span class="menu-title">Tables</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="assets/pages/icons/mdi.html">
                  <i class="mdi mdi-emoticon menu-icon"></i>
                  <span class="menu-title">Icons</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                  <i class="mdi mdi-account menu-icon"></i>
                  <span class="menu-title">User Pages</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="assets/pages/samples/login.html"> Login </a></li>
                    <li class="nav-item"> <a class="nav-link" href="assets/pages/samples/login-2.html"> Login 2 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="assets/pages/samples/register.html"> Register </a></li>
                    <li class="nav-item"> <a class="nav-link" href="assets/pages/samples/register-2.html"> Register 2 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="assets/pages/samples/lock-screen.html"> Lockscreen </a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="assets/documentation/documentation.html">
                  <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                  <span class="menu-title">Documentation</span>
                </a>
              </li>--}}
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">عرض المستخدمين</h4>

                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>
                            المستخدم
                          </th>
                          <th>
                              الإسم
                          </th>
                          <th>
                            البريد الالكتروني
                          </th>
                          <th>
                            العنوان
                          </th>
                          <th>
                            الهاتف
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="py-1">
                              <img src="{{@asset('assets/images/faces/face2.jpg')}}" alt="image"/>
                          </td>
                          <td>
                            ابرار عبدالواحد
                          </td>
                          <td>
                              abrar@email.com
{{--                            <div class="progress">--}}
{{--                              <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                            </div>--}}
                          </td>
                          <td>
                            تعز / المطار القديم
                          </td>
                          <td>
                            +967324234123
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                              <img src="{{@asset('assets/images/faces/face1.jpg')}}" alt="image"/>
                          </td>
                            <td>
                                حمد بكيل
                            </td>
                          <td>
                            ali.abdu@gmail.com
                          </td>
                          <td>
                              صنعاء/ الاصبحي
                          </td>
                          <td>
                              +977234234
                          </td>
                        </tr>
           </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <footer class="footer text-center">
          <span class="text-muted d-block d-sm-inline-block">جميع الحقوق محفوضة لدى © <a href="" target="_blank"> Babor </a>2022</span>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{@asset('assets/vendors/base/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->

  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{@asset('assets/js/off-canvas.js')}}"></script>
  <script src="{{@asset('assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{@asset('assets/js/template.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
