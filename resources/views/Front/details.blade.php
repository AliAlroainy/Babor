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
                        <img src="img/c3.jpg" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="img/c1.jpg" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="img/c5.jpg" alt="">
                    </div> --}}
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    {{-- <div class="product-preview">
                        <img src="img/c4.jpg" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="img/c3.jpg" alt="">
                    </div> --}}

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
                        <img src="img/c5.jpg" alt="">
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
                        {{ $auction->car->description }}
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
                            @csrf
                            <div class="add-to-cart">
                                <div class="qty-label">
                                    سعر المزايدة
                                    <div class="input-n">
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




            <!-- Start Product Area -->
            {{-- <div class="product-area section" id="offer">
        <div class="container">
            <div class="row">
         
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info"  id="product-tab">
                        <div class="nav-main">
                            <!-- Tab Nav -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                               
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#taxi" role="tab">اتفاصيل</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#babor" role="tab">الوصف</a></li>
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#cars" role="tab">التقييمات</a></li>
                            </ul>
                            <!--/ End Tab Nav -->
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <!-- Start cars Single Tab -->
                            <div class="tab-pane fade show active" id="cars" role="tabpanel">
                                <div class="tab-single">
                                    <div class="row">
                            

                                        التقييمات
                                   
                                    </div>
                                </div>
                            </div>
                            <!--/ End cars Single Tab -->

                            <!-- Start Daio Single Tab -->
                            <div class="tab-pane fade" id="taxi" role="tabpanel">
                                <div class="tab-single">
                                    <div class="row">
                                    
                                    التفاصيل
                                      
                                    </div>
                                </div>
                            </div>
                            <!--/ End Daion Single Tab -->

                            <!-- Start babor Single Tab -->
                            <div class="tab-pane fade show active" id="babor" role="tabpanel">
                                <div class="tab-single">
                                    <div class="row">
                             
                            الوصف

                                   
                                    </div>
                                </div>
                            </div>
                            <!--/ End babor Single Tab -->

                            <!-- Start salon Single Tab -->
                            <div class="tab-pane fade" id="accessories" role="tabpanel">
                                <div class="tab-single">
                                    <div class="row">
                                     
                            التقييمات
                                    </div>
                                </div>
                            </div>
                            <!--/ End salon Single Tab -->

                            <!-- Start taxi Single Tab -->
                            <div class="tab-pane fade" id="essential" role="tabpanel">
                                <div class="tab-single">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="/details">
                                                        <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a title="Add to cart" href="#">Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="/details">Women Hot Collection</a></h3>
                                                    <div class="product-price">
                                                        <span>$29.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="/details">
                                                        <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a title="Add to cart" href="#">Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="/details">Awesome Pink Show</a></h3>
                                                    <div class="product-price">
                                                        <span>$29.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="/details">
                                                        <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a title="Add to cart" href="#">Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="/details">Awesome Bags Collection</a></h3>
                                                    <div class="product-price">
                                                        <span>$29.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="/details">
                                                        <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <span class="new">New</span>
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a title="Add to cart" href="#">Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="/details">Women Pant Collectons</a></h3>
                                                    <div class="product-price">
                                                        <span>$29.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="/details">
                                                        <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a title="Add to cart" href="#">Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="/details">Awesome Bags Collection</a></h3>
                                                    <div class="product-price">
                                                        <span>$29.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="/details">
                                                        <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <span class="price-dec">30% Off</span>
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a title="Add to cart" href="#">Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="/details">Awesome Cap For Women</a></h3>
                                                    <div class="product-price">
                                                        <span>$29.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="/details">
                                                        <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a title="Add to cart" href="#">Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="/details">Polo Dress For Women</a></h3>
                                                    <div class="product-price">
                                                        <span>$29.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="/details">
                                                        <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <span class="out-of-stock">Hot</span>
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a title="Add to cart" href="#">Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="/details">Black Sunglass For Women</a></h3>
                                                    <div class="product-price">
                                                        <span class="old">$60.00</span>
                                                        <span>$50.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ End taxi Single Tab -->

                            <!-- Start buses Single Tab -->
                            <div class="tab-pane fade" id="prices" role="tabpanel">
                                <div class="tab-single">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="/details">
                                                        <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a title="Add to cart" href="#">Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="/details">Women Hot Collection</a></h3>
                                                    <div class="product-price">
                                                        <span>$29.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="/details">
                                                        <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a title="Add to cart" href="#">Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="/details">Awesome Pink Show</a></h3>
                                                    <div class="product-price">
                                                        <span>$29.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="/details">
                                                        <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a title="Add to cart" href="#">Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="/details">Awesome Bags Collection</a></h3>
                                                    <div class="product-price">
                                                        <span>$29.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="/details">
                                                        <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <span class="new">New</span>
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a title="Add to cart" href="#">Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="/details">Women Pant Collectons</a></h3>
                                                    <div class="product-price">
                                                        <span>$29.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="/details">
                                                        <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a title="Add to cart" href="#">Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="/details">Awesome Bags Collection</a></h3>
                                                    <div class="product-price">
                                                        <span>$29.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="/details">
                                                        <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <span class="price-dec">30% Off</span>
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a title="Add to cart" href="#">Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="/details">Awesome Cap For Women</a></h3>
                                                    <div class="product-price">
                                                        <span>$29.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="/details">
                                                        <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a title="Add to cart" href="#">Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="/details">Polo Dress For Women</a></h3>
                                                    <div class="product-price">
                                                        <span>$29.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="/details">
                                                        <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <span class="out-of-stock">Hot</span>
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a title="Add to cart" href="#">Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="/details">Black Sunglass For Women</a></h3>
                                                    <div class="product-price">
                                                        <span class="old">$60.00</span>
                                                        <span>$50.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ End buses Single Tab -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div> --}}
            <!-- End Product Area -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav" role="tablist">
                        <li class="active nav-item"><a class="nav-link " data-toggle="tab" role="tab"
                                href="#tab1">Description</a></li>
                        <li class="nav-item"><a class="nav-link " data-toggle="tab" role="tab"
                                href="#tab2">Details</a></li>
                        <li class="nav-item"><a class="nav-link " data-toggle="tab" role="tab"
                                href="#tab3">Reviews (3)</a></li>
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade show active" role="tabpanel">
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
                        <div id="tab2" class="tab-pane fade  " role="tabpanel">
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
                        <div id="tab3" class="tab-pane fade show active" role="tabpanel">
                            <div class="row">
                                <!-- Rating -->
                                <div class="col-md-3">
                                    <div id="rating">
                                        <div class="rating-avg">
                                            <span>4.5</span>
                                            <div class="rating-stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <ul class="rating">
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: 80%;"></div>
                                                </div>
                                                <span class="sum">3</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: 60%;"></div>
                                                </div>
                                                <span class="sum">2</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div></div>
                                                </div>
                                                <span class="sum">0</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div></div>
                                                </div>
                                                <span class="sum">0</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div></div>
                                                </div>
                                                <span class="sum">0</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Rating -->

                                <!-- Reviews -->
                                <div class="col-md-6">
                                    <div id="reviews">
                                        <ul class="reviews">
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">John</h5>
                                                    <p class="date">27 DEC 2018, 8:0 PM</p>
                                                    <div class="review-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">John</h5>
                                                    <p class="date">27 DEC 2018, 8:0 PM</p>
                                                    <div class="review-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">John</h5>
                                                    <p class="date">27 DEC 2018, 8:0 PM</p>
                                                    <div class="review-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="reviews-pagination">
                                            <li class="active">1</li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Reviews -->

                                <!-- Review Form -->
                                <div class="col-md-3">
                                    <div id="review-form">
                                        <form class="review-form">
                                            <input class="input" type="text" placeholder="Your Name">
                                            <input class="input" type="email" placeholder="Your Email">
                                            <textarea class="input" placeholder="Your Review"></textarea>
                                            <div class="input-rating">
                                                <span>Your Rating: </span>
                                                <div class="stars">
                                                    <input id="star5" name="rating" value="5" type="radio"><label
                                                        for="star5"></label>
                                                    <input id="star4" name="rating" value="4" type="radio"><label
                                                        for="star4"></label>
                                                    <input id="star3" name="rating" value="3" type="radio"><label
                                                        for="star3"></label>
                                                    <input id="star2" name="rating" value="2" type="radio"><label
                                                        for="star2"></label>
                                                    <input id="star1" name="rating" value="1" type="radio"><label
                                                        for="star1"></label>
                                                </div>
                                            </div>
                                            <button class="primary-btn">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /Review Form -->
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




<!-- Start related cars -->
<div class="product-area most-popular section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h4> عروض مشابهة</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel popular-slider">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-img">
                            <a href="/details">
                                <img class="default-img" src="img/c1.jpg" alt="#">
                                <img class="hover-img" src="img/c1.jpg" alt="#">
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
                            <h3><a href="/details">فورد</a></h3>
                            <div class="product-price">
                                <span class="old">$60.00</span>
                                <span>$50.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-img">
                            <a href="/details">
                                <img class="default-img" src="img/c1.jpg" alt="#">
                                <img class="hover-img" src="img/c1.jpg" alt="#">
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
                            <h3><a href="/details">سنتافي</a></h3>
                            <div class="product-price">
                                <span>$50.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-img">
                            <a href="/details">
                                <img class="default-img" src="img/c1.jpg" alt="#">
                                <img class="hover-img" src="img/c1.jpg" alt="#">
                                <span class="new">جديد</span>
                            </a>
                            <div class="button-head">
                                <div class="product-action">
                                    <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i
                                            class=" ti-eye"></i><span>عرض سريع</span></a>
                                    <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>اضافة
                                            للمفضلة</span></a>
                                </div>
                                <div class="product-action-2">
                                    <a title="Add to cart" href="/details">دخول في المزاد</a>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="/details">فورد</a></h3>
                            <div class="product-price">
                                <span>$50.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-img">
                            <a href="/details">
                                <img class="default-img" src="img/c1.jpg" alt="#">
                                <img class="hover-img" src="img/c1.jpg" alt="#">
                            </a>
                            <div class="button-head">
                                <div class="product-action">
                                    <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i
                                            class=" ti-eye"></i><span>عرض سريع</span></a>
                                    <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>اضافة
                                            للمفضلة</span></a>
                                </div>
                                <div class="product-action-2">
                                    <a title="Add to cart" href="#">دخول في المزاد</a>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="/details">فورد</a></h3>
                            <div class="product-price">
                                <span>$50.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End related cars -->



@include('Front.include.footer')
