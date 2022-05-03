@include('Front.include.header')

@include('Front.include.carstyle')



<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container text-center">
        <!-- row -->
        <h5> تفاصيل المزاد </h5>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="/images/cars/{{ $auction->car->thumbnail }}" alt="thumbnail pic">
                    </div>

                    @php
                        $images = json_decode($auction->car->car_images, true);
                    @endphp
                    @foreach ($images as $img)
                        <div class="product-preview">
                            <img src="/images/cars/car_images/{{ $img }}" alt="">
                        </div>
                    @endforeach
                    {{-- <div class="product-preview">
                        <img src="/img/c1.jpg" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="/img/c3.jpg" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="/img/c1.jpg" alt="">
                    </div> --}}
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    @foreach ($images as $img)
                        <div class="product-preview">
                            <img src="/images/cars/car_images/{{ $img }}" alt="">
                        </div>
                    @endforeach
                    {{-- <div class="product-preview">
                        <img src="/img/c4.jpg" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="/img/c3.jpg" alt="">
                    </div> --}}

                    <div class="product-preview">
                        <img src="/images/cars/{{ $auction->car->thumbnail }}" alt="thumbnail pic">
                    </div>

                    {{-- <div class="product-preview">
                        <img src="/img/c5.jpg" alt="">
                    </div> --}}
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5" dir="rtl">
                <div class="product-details">
                    <h2 class="product-name">شفرلية 2020</h2>
                    <div>
                        البائع
                    </div>
                    <div>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <a class="review-link" href="#">10 تقييمات
                            @if (Auth::user())
                                | ضيف تقييمك
                            @endif
                        </a>
                    </div>
                    <div>
                        <h3 class="product-price">{{ $auction->openingBid }}</h3>
                        <span class="product-available">{{ App\Models\Car::getStatus($auction->car->status) }}</span>
                    </div>
                    <p>
                    </p>

                    <div class=" d-flex ">
                        <div class="d-flex flex-row p-3">

                            الجير

                            <select class="input-select">
                                <option value="0">3</option>
                                <option value="0">4</option>
                                <option value="0">6</option>
                            </select>

                        </div>

                        <div class="d-flex flex-row  p-3">


                            الالوان

                            <select class="input-select">
                                <option value="0">احمر</option>
                                <option value="0">اسود</option>
                            </select>
                        </div>

                    </div>
                    @if (Auth::user())
                        <form action="{{ route('user.place.bid', $auction->id) }}" method="POST">
                            <div class="add-to-cart">
                                <div class="qty-label">
                                    سعر المزايدة
                                    <div class="input-number">
                                        <input type="number" name="bidPrice">
                                        <span class="qty-up">+</span>
                                        <span class="qty-down">-</span>
                                    </div>
                                </div>
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> دخول
                                    بالمزاد</button>
                            </div>
                        </form>
                    @endif
                    <ul class="product-btns">
                        <li><a href="#"><i class="fa fa-heart-o"></i> اضافة للمفضلة</a></li>
                    </ul>

                    <ul class="product-links">
                        <li>الاقسام:</li>
                        <li class="badge bg-secondary"><a style="text-decoration: none" href="#">سيارات</a></li>
                        <li class="badge bg-secondary"><a style="text-decoration: none" href="#">سيارات مستعملة</a></li>
                    </ul>

                    <ul class="product-links">
                        <li>Share:</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>

                </div>
            </div>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">الوصف</a></li>
                        <li><a data-toggle="tab" href="#tab2">التفاصيل</a></li>
                        <li><a data-toggle="tab" href="#tab3">التقييمات (3)</a></li>
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                        culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->

                        <!-- tab2  -->
                        <div id="tab2" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                        culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab2  -->

                        <!-- tab3  -->
                        <div id="tab3" class="tab-pane fade in">
                            <div class="row">
                                tab 3

                            </div>
                        </div>
                        <!-- /tab3  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Related Products</h3>
                </div>
            </div>

            <!-- product -->
            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                <div class="single-product">
                    <div class="product-img">
                        <a href="/details">
                            <img class="default-img" src="img/c1.jpg" alt="#">
                            <!--img class="hover-img" src="img/c2.jpg" alt="#"-->
                        </a>
                        <div class="button-head">
                            <div class="product-action">
                                <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i
                                        class=" ti-eye"></i><span>Quick Shop</span></a>
                                <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>اضافة
                                        للتفضيلات</span></a>
                                <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>مشاركة
                                        المزاد</span></a>
                            </div>
                            <div class="product-action-2">
                                <a title="Add to cart" href="#">شراء</a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="/details">لاند كروسر 2020 </a></h3>
                        <div class="product-price">
                            <span>$2989.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /product -->


            <!-- product -->
            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                <div class="single-product">
                    <div class="product-img">
                        <a href="/details">
                            <img class="default-img" src="img/c1.jpg" alt="#">
                            <!--img class="hover-img" src="img/c2.jpg" alt="#"-->
                        </a>
                        <div class="button-head">
                            <div class="product-action">
                                <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i
                                        class=" ti-eye"></i><span>Quick Shop</span></a>
                                <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>اضافة
                                        للتفضيلات</span></a>
                                <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>مشاركة
                                        المزاد</span></a>
                            </div>
                            <div class="product-action-2">
                                <a title="Add to cart" href="#">شراء</a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="/details">لاند كروسر 2020 </a></h3>
                        <div class="product-price">
                            <span>$2989.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /product -->

            <div class="clearfix visible-sm visible-xs"></div>


            <!-- product -->
            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                <div class="single-product">
                    <div class="product-img">
                        <a href="/details">
                            <img class="default-img" src="img/c1.jpg" alt="#">
                            <!--img class="hover-img" src="img/c2.jpg" alt="#"-->
                        </a>
                        <div class="button-head">
                            <div class="product-action">
                                <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i
                                        class=" ti-eye"></i><span>Quick Shop</span></a>
                                <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>اضافة
                                        للتفضيلات</span></a>
                                <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>مشاركة
                                        المزاد</span></a>
                            </div>
                            <div class="product-action-2">
                                <a title="Add to cart" href="#">شراء</a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="/details">لاند كروسر 2020 </a></h3>
                        <div class="product-price">
                            <span>$2989.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /product -->


            <!-- product -->
            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                <div class="single-product">
                    <div class="product-img">
                        <a href="/details">
                            <img class="default-img" src="img/c1.jpg" alt="#">
                            <!--img class="hover-img" src="img/c2.jpg" alt="#"-->
                        </a>
                        <div class="button-head">
                            <div class="product-action">
                                <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i
                                        class=" ti-eye"></i><span>Quick Shop</span></a>
                                <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>اضافة
                                        للتفضيلات</span></a>
                                <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>مشاركة
                                        المزاد</span></a>
                            </div>
                            <div class="product-action-2">
                                <a title="Add to cart" href="#">شراء</a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="/details">لاند كروسر 2020 </a></h3>
                        <div class="product-price">
                            <span>$2989.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /product -->


        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->







@include('Front.include.footer')
