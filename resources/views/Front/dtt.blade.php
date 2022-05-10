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
                        <img src="img/c1.jpg" alt="thumbnail pic">
                    </div>
               
                        <div class="product-preview">
                            <img src="img/c1.jpg" alt="car img">
                        </div>
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
                        <img src="img/c1.jpg" alt="thumbnail pic">
                    </div>
                   
                        <div class="product-preview">
                            <img src="img/c1.jpg" alt="..">
                        </div>

                    {{-- <div class="product-preview">
                        <img src="img/c5.jpg" alt="">
                    </div> --}}
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5" dir="rtl">
                <div class="product-details">
                    <div class="d-flex">
                    <h2 class="product-name">شفرلية 2020</h2>
                    <span class="product-available">مستعمله</span>
                    </div>
                   
                    <!-- dfsadfasdf -->
                    <div>
                        <h3 class="product-price">$8009</h3>
                    </div>
               

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
                        <div  >
                            <div class="add-to-cart">
                                <div class="qty-label">
                                    سعر المزايدة
                                   
                                
                                    <div class="input-n">
                                        <input type="number" name="bidPrice"
                                            class="">
                                        <span class="qty-up">+</span>
                                        <span class="qty-down">-</span>
                                    </div>
                               
                                </div>
                                <button class="add-to-cart-btn" data-bs-toggle="modal" data-bs-target="#alarm"><i class="fa fa-shopping-cart"></i> دخول
                                    بالمزاد</button>
                            </div>
                        </div>

                    

                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, delectus!
                        </p>

                    <ul class="product-btns">
                        <li><a href="#"><i class="fa fa-heart-o"></i> اضافة للمفضلة</a></li>
                    </ul>

                    <p style="font-size: 14px"> البائع</p>
                    <div class="d-flex align-items-center justify-content-start ">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="rounded-circle mb-3" style="width: 40px; margin-left: 10px"
  alt="Avatar" />

<h6 class="mb-2 text-muted">مختار غالب</h6>
                    </div>
                    <div>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <br/>
                        <a class="review-link" href="#">10  تقييمات البائع
                                | ضيف تقييمك
                        </a>

                    </div>

                    <ul class="product-links">
                        <li>الاقسام:</li>
                        <li class="badge bg-secondary"><a style="text-decoration: none; color: white" href="#">سيارات</a></li>
                        <li class="badge bg-secondary"><a style="text-decoration: none; color: white" href="#">سيارات مستعملة</a></li>
                    </ul>

                    <ul class="product-links">
                        <li>مشاركة :</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>

                </div>
            </div>
            <!-- /Product details -->

            <!-- Product tab -->




            <!-- Modal -->
<div class="modal fade"  id="alarm" action="post" tabindex="-1" dir="rtl" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " >
      <div class="modal-content alert alert-warning" role="alert">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="alert alert-warning" role="alert" dir="rtl">
            <i class="bi bi-shield-fill-exclamation"></i>
            <br/>
          تنبية سيتم خصم مبلغ 500$  من حسابك قيمة الدخول للمزاد
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" >تاكيد</button>
          <button type="button" class="btn btn-warning" data-bs-dismiss="modal">الغاء الامر </button>
        </div>
      </div>
    </div>
  </div>
           












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
