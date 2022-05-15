@include('Front.include.header')
<div class="">
    <div class="col-12">
        <div class="section-title mt-4">
            <div style="font-size: 50px"> &#128640; </div>
            <h2> خطوات بسيطة يجب ان تعلمها </h2>
        </div>
    </div>
    <div class="container ">
        <div class="main-timeline">
            <!-- start experience section-->
            <div class="timeline">
                <div class="icon"></div>
                <div class="date-content">
                    <div class="date-outer">
                        <span class="date">
                            <span class="year">اولاً</span>
                        </span>
                    </div>
                </div>
                <div class="timeline-content">
                    <h5 class="title"> قم بالتسجيل بالموقع</h5>
                    <p class="description">
                        من خلال صفحة التسجيل بالموقع ستقوم بخطوات بسيطة
                    </p>
                    <img src="img/Reg.png" width="300" height="300" alt="first">
                </div>
            </div>
            <!-- end experience section-->

            <div class="container ">
                <div class="main-timeline">

                    <!-- start experience section-->
                    <div class="timeline">
                        <div class="icon"></div>
                        <div class="date-content">
                            <div class="date-outer">
                                <span class="date">
                                    <span class="year">اولاً</span>
                                </span>
                            </div>
                        </div>
                        <div class="timeline-content">
                            <h5 class="title"> قم بالتسجيل بالموقع</h5>
                            <p class="description">
                                من خلال صفحة التسجيل بالموقع ستقوم بخطوات بسيطة
                            </p>
                            <img src="img/Reg.png" width="300" height="300" alt="first">
                        </div>
                    </div>
                    <!-- end experience section-->

                    <!-- start experience section-->
                    <div class="timeline">
                        <div class="icon"></div>
                        <div class="date-content">
                            <div class="date-outer">
                                <span class="date">
                                    <span class="month"></span>
                                    <span class="year">ثانياً</span>
                                </span>
                            </div>
                        </div>
                        <div class="timeline-content">
                            <h5 class="title"> قم بالتسجيل بالموقع</h5>
                            <p class="description">
                                من خلال صفحة التسجيل بالموقع ستقوم بخطوات بسيطة
                            </p>
                            <img src="img/Reg.png" width="300" height="300" alt="first">
                        </div>
                    </div>
                    <!-- end experience section-->

                    <!-- start experience section-->
                    <div class="timeline">
                        <div class="icon"></div>
                        <div class="date-content">
                            <div class="date-outer">
                                <span class="date">
                                    <span class="month"></span>
                                    <span class="year">ثالثاً</span>
                                </span>
                            </div>
                        </div>
                        <div class="timeline-content">
                            <h5 class="title"> قم بالتسجيل بالموقع</h5>
                            <p class="description">
                                من خلال صفحة التسجيل بالموقع ستقوم بخطوات بسيطة
                            </p>
                            <img src="img/Reg.png" width="300" height="300" alt="first">
                        </div>
                    </div>
                    <!-- end experience section-->

                    <!-- start experience section-->
                    <div class="timeline">
                        <div class="icon"></div>
                        <div class="date-content">
                            <div class="date-outer">
                                <span class="date">
                                    <span class="month"></span>
                                    <span class="year">رابعاً</span>
                                </span>
                            </div>
                        </div>
                        <div class="timeline-content">
                            <h5 class="title"> قم بالتسجيل بالموقع</h5>
                            <p class="description">
                                من خلال صفحة التسجيل بالموقع ستقوم بخطوات بسيطة
                            </p>
                            <img src="img/Reg.png" width="300" height="300" alt="first">
                        </div>
                    </div>
                    <!-- end experience section-->

                </div>
            </div>

   
        </div>
    </div>

    <section class="section free-version-banner mb-0  ">
        <div class="container">
            <div class="row align-items-center fixed-bottom" >
                <div class="col-md-8 offset-md-2 col-xs-12">
                    <div class="section-title mb-60">
                        @if (!Auth::user())
                            <div class="col-12 d-inline-flex justify-content-center my-3" >
                                <div class="form-group" style="background-color: #F7941D;">
                                    <a  href="{{ route('login') }}" class="btn p-3 "

                                        style="background-color: #1a1a19; color: #F7941D; box-shadow: 0px 0px 15px #F7941D">
                                        <h6 class="text-white wow fadeInUp" data-wow-delay=".4s"
                                            style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                                            سجل الدخول
                                            في
                                            الموقع لاضافة مزاد </h6>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-12 d-inline-flex justify-content-center fixed-bottom">
                                <div class="form-group" style="background-color: #F7941D;  box-shadow: 0px 0px 15px #F7941D">
                                    <a href="{{ route('user.add.auction') }}" class="btn p-3"
                                    style="background-color: #1a1a19; color: #F7941D;">ابدأ الآن</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('Front.include.footer')
