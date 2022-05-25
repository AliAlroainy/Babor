@include('Front.include.header')
<!-- Start Most Popular -->
<div class="product-area most-popular section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2> الاكثر تداول</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel popular-slider">
                    <!-- Start Single Product -->
                    @foreach($auctions as $auction)
                    <div class="single-product">
                        <div class="product-img">
                            <a href="/details">
                                <img class="default-img" src="images/cars/{{ $auction->car->thumbnail }}" alt="#">
                                <img class="hover-img" src="images/cars/{{ $auction->car->thumbnail }}" alt="#">
                                <span class="out-of-stock">Hot</span>
                            </a>
                            <div class="button-head">
                                <div class="product-action">
                                    <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i
                                            class=" ti-eye"></i><span>عرض سريع</span></a>
                                    <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>اضافة
                                            للمفضلة</span></a>
                                </div>
                                <div class="product-action-2">
                                    <a title="Add to cart" href="#">دخول المزاد</a>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="/details">{{ $auction->car->series->name }}</a></h3>
                            <div class="product-price">
                                <span class="old"> {{ $auction->openingBid}}</span>
                                <span> {{ $auction->reservePrice}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- End Single Product -->
                    <!-- Start Single Product -->

                    <!-- End Single Product -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Most Popular Area -->


<!-- Start Product Area -->
<div class="product-area section a-res" id="offer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>آخر العروض</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-info">
                    <div class="nav-main">
                        <!-- Tab Nav -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#buses"
                                    role="tab">الاكثر تفضيل</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#taxis"
                                    role="tab">الاكثر مبيعاً</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#now"
                                    role="tab">المزادات الحالية</a></li>
                            
                        </ul>
                        <!--/ End Tab Nav -->
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <!-- Start cars Single Tab -->
                        <div class="tab-pane fade show" id="taxis" role="tabpanel">
                            <div class="tab-single">
                                <div class="row" id="list">
                                    <section class="shop-home-list section">
                                        <div class="container" dir="rtl">
                                            <div class="row">
                                            @foreach($auctionmore as $auction)
                                                <div class="col-lg-4 col-md-6 col-12">

                                                    <!-- Start Single List  -->

                                                    <div class="single-list">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <div class="list-image overlay">
                                                                    <img src="images/cars/{{ $auction->car->thumbnail }}" alt="#">
                                                                    <a href="#" class="buy"><i
                                                                            class="fa fa-shopping-bag"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                                                <div class="content">
                                                                    <h4 class="title"><a href="#">{{ $auction->car->series->name }} {{ $auction->car->model }}</a></h4>
                                                                    <p class="price with-discount">{{ $auction->reservePrice}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single List  -->

                                                </div>
                                                @endforeach

                                                
                                                

                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <!--/ End cars Single Tab -->
                         <!-- Start cars Single Tab -->
                         <div class="tab-pane fade show" id="now" role="tabpanel">
                            <div class="tab-single">
                                <div class="row" id="list">
                                    <section class="shop-home-list section">
                                        <div class="container" dir="rtl">
                                            <div class="row">
                                           


                                               

                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <!--/ End cars Single Tab -->

                        <!-- Start taxis Single Tab -->
                        
                        <!--/ End babor Single Tab -->

                        <!-- Start salon Single Tab -->

                        <!--/ End salon Single Tab -->


                        <!-- Start buses Single Tab -->



                        <!--/ End buses Single Tab -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Product Area -->










<!-- Start Shop Home List  -->

<!-- End Shop Home List  -->

{{-- <section class="section free-version-banner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8 offset-md-2 col-xs-12">
                <div class="section-title mb-60">
                    <span class="text-white wow fadeInDown" data-wow-delay=".2s"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">عرووض بابور
                        الحصرية</span>
                    <h2 class="text-white wow fadeInUp" data-wow-delay=".4s"
                        style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">يمكنك الان
                        الاستفادة من العروض<br> والدخول بمزادات بابور.</h2>
                    <p class="text-white wow fadeInUp" data-wow-delay=".6s"
                        style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">يرجى التسجيل
                        بالموقع اولا والاستفاده بميزات المستخدم,<br> ولوحة التحكم الخاصة بك حيث يمكنك ااضافة ومشاركة
                        بالمزادات.</p>

                    <div class="button">
                        <a href="/register" target="_blank" rel="nofollow" class="btn wow fadeInUp"
                            data-wow-delay=".8s">سجل الان </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}





@include('Front.include.footer')