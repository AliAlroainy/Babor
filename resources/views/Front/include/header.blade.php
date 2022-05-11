<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content='Babor company'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>Babor</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="/assets/images/favicon.png" />
    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Almarai&family=Cairo:wght@800&family=Griffy&family=Josefin+Sans:wght@100&display=swap"
        rel="stylesheet">
    <!-- StyleSheet -->

    <!-- Bootstrap -->

    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="/css/magnific-popup.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/css/font-awesome.css">
    <!-- Fancybox -->
    <link rel="stylesheet" href="/css/jquery.fancybox.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="/css/themify-icons.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="/css/niceselect.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="/css/animate.css">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="/css/flex-slider.min.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="/css/owl-carousel.css">
    <!-- Slicknav -->
    <link rel="stylesheet" href="/css/slicknav.min.css">

    <!--  StyleSheet -->
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <!-- some linkes -->
    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="/css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="/css/nouislider.min.css" />

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="/css/style.css" />

    <!-- ppp-->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet">



    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/swiper/swiper.css" />
    <!-- Page CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/pages/ui-carousel.css" />


    {{-- bootstrap link --}}
    <link rel="stylesheet" href="/bootstrap-5.1.3-dist/css/bootstrap.css" />

    {{-- jQuery link --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    <link href="/assets/css/font-awesome.min.css" rel="stylesheet" />
    @livewireStyles


    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-47923629-1', 'gigagit.com');
        ga('send', 'pageview');
    </script>
    
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- End Preloader -->


    <!-- Header -->
    <header class="header shop">
        <!-- Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-12">

                        <!-- Top left -->
                        <div class="top-left">
                            <ul class="list-main">
                                <li>
                                    <a class="nav-link" href="#offer">اخر العروض
                                        <i class="ti-alarm-clock"></i>
                                    </a>
                                </li>
                                <li>
                                    @if (!Auth::user())
                                        <a href="{{ route('login') }}"
                                            style="background-color: transparent ; border:none; text-decoration: none">
                                            تسجيل دخول <i class="ti-power-off"></i>
                                        </a>
                                    @else
                                        {{ ucfirst(Auth::user()->name) }}
                                    @endif

                                </li>
                            </ul>
                        </div>
                        <!-- End Top left -->
                    </div>
                    <div class="col-lg-5 col-md-12 col-12">

                        <!-- Top right -->
                        <div class="right-content">
                            <ul class="list-main">
                                <li> +060 (800) 801-582 <i class="ti-headphone-alt"></i></li>
                                <li> support@babor.com <i class="ti-email"></i></li>
                            </ul>
                        </div>
                        <!--/ End Top right -->

                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <div class="middle-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-12">

                        <div class="right-bar">
                            <!-- noted Form -->
                            <div class="sinlge-bar shopping">
                                <a href="#" class="single-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                        class="bi bi-bell" viewBox="0 0 16 16">
                                        <path
                                            d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                                    </svg>
                                    <span class="total-count">2</span>
                                </a>

                                <!-- notfications Item -->
                                <div class="shopping-item" dir="rtl">
                                    <div class="dropdown-cart-header">
                                        <span>2 اشعارات</span>

                                    </div>
                                    <ul class="shopping-list">
                                        <li>
                                            <a href="#" class="remove" title="Remove this item"><i
                                                    class="fa fa-remove"></i></a>
                                            <a class="cart-img" href="#"><img src="img/c1.jpg" alt="#"></a>
                                            <h4><a class="nav-link" href="#">تبقى يومين </a></h4>
                                            <p class="quantity">مزاد سيارة لاندكروسر <span
                                                    class="amount">$9990.00</span></p>
                                        </li>
                                        <li>

                                            <a class="cart-img" href="#"><img src="img/c1.jpg" alt="#"></a>
                                            <h4><a class="nav-link" href="#"> سيارة شفرليه </a></h4>
                                            <p class="quantity"> عرض قد يهمك <span
                                                    class="amount">$3905.00</span></p>

                                            <a href="#" class="remove" title="Remove this item"><i
                                                    class="fa fa-remove"></i></a>
                                        </li>
                                    </ul>
                                    <div class="bottom"><a class="nav-link" href="#">عرض الكل </a> </div>
                                </div>
                                <!--/ End notfications Item -->
                            </div>

                            <div class="sinlge-bar">
                                <a href="/favorite" class="single-icon "><i class="fa fa-heart-o"
                                        aria-hidden="true"></i> </a>
                            </div>
                            <div class="sinlge-bar">
                                <a href="{{ route('user.profile') }}" class="single-icon"><i
                                        class="fa fa-user-circle-o" aria-hidden="true"></i> </a>
                            </div>

                        </div>

                        <!-- Search Form -->
                        <div class="search-top">
                            <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                            <!-- Search Form -->
                            <div class="search-top" dir="rtl">
                                <form class="search-form">
                                    <input type="text" placeholder="ابحث هنا..." name="search">
                                    <button value="search" type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                            <!--/ End Search Form -->
                        </div>
                        <!--/ End Search Form -->

                        <div class="mobile-nav"></div>
                    </div>

                    <div class="col-lg-8 col-md-7 col-12">
                        <div class="search-bar-top">
                            <div class="search-bar">
                                <select>
                                    <option selected="selected">كل الانواع</option>
                                    <option>دايوها</option>
                                    <option>سنتافي</option>
                                    <option>تكاسي</option>
                                </select>
                                <form>
                                    <input name="search" placeholder="....ابحث هنا عن السيارة الي تناسبك" type="بحث">
                                    <button class="btnn"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-2 col-md-3 col-12 d-flex justify-content-start align-items-center">

                        <!-- Logo -->
                        <div>
                            <a class="navbar-brand fw-bold" href="/" style="color: #F7941D">
                                <h2><img src="/assets/images/logo.png" width="100"></h2>
                            </a>
                        </div>
                        <!--/ End Logo -->



                    </div>
                </div>
            </div>
        </div>




        <!-- Header Inner -->
        <div class="header-inner" dir="rtl">
            <div class="container">
                <div class="cat-nav-head">
                    <div class="row">

                        <div class="col-lg-9 col-12">
                            <div class="menu-area">
                                <!-- Main Menu -->
                                <nav class="navbar navbar-expand-lg">
                                    <div class="navbar-collapse">
                                        <div class="nav-inner">
                                            <ul class="nav main-menu menu navbar-nav ">
                                                <li class="active "><a class="nav-link"
                                                        href="/">الرئيسية</a></li>
                                                <li><a class="nav-link" href="/offer">العروض</a></li>
                                                <li><a class="nav-link" href="/services">الخدمات</a></li>
                                                <li><a class="nav-link" href="/soon">شراء سيارة<i
                                                            class="ti-angle-down"></i>
                                                        <!--span class="new">جديد</span-->
                                                    </a>
                                                    <ul class="dropdown">
                                                        <li><a class="nav-link" href="/soon">مستعملة</a></li>
                                                        <li><a class="nav-link" href="/soon">جديد</a></li>
                                                    </ul>
                                                </li>



                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                                <!--/ End Main Menu -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Header Inner -->
    </header>
    <!--/ End Header -->













    <!--DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Babor</title>

    {{-- bootstrap link --}}
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css" />

    {{-- jQuery link --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
/>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">


<link
  rel="stylesheet"
  href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
/>
 Google Fonts
<link
  rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
/>

</head>
<body>
<livewire:counter /> 
@livewireScripts

      <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top mb-5">
        <div class="container">
          <a class="navbar-brand fw-bold" href="index.html" style="color: #c20e1a"
            >بابور</a
          >
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="container">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/"
                    >الرئيسية</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="/jobs">الخدمات</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="/hire">من نحن</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/about">تواصل معنا</a>
                </li>
          
                <li class="nav-item">
                  <i class="bi bi-translate nav-link"></i>
                </li>
              </ul>
              
            </div>
  
            <div class="container">
              <form class="d-flex" style="position: relative">
                <input
                  style="color: #939392"
                  class="form-control bg-white rounded-pill w-100"
                  type="search"
                  placeholder="بحث"
                  aria-label="بحث"
                />
                <button
                  style="
                    position: absolute;
                    left: 10px;
                    width: 30px;
                    height: 35px;
                    top: 1.4px;
                    background-color: transparent;
                    border: none;
                  "
                  class="rounded-pill"
                  type="submit"
                >
                  <i style="color: #ffeba7" class="fa fa-search"></i>
                </button>
              </form>
            </div>
           
            
            <div class="nav-item m-3">
              <a
                class="nav-link btn"
                href="/singin"
                style="text-decoration: none"
                >تسجيل </a
              >
            </div>
           
          </div>
        </div>
      </nav>
  
    @include('Front.include.modals')
