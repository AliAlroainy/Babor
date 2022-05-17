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
                            <img src="/images/cars/car_images/{{ $img }}" alt="car img">
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
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
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5" dir="rtl">
                <div class="product-details">
                    <div class="d-flex">
                        <h2 class="product-name">{{ $auction->type_and_model() }}</h2>
                        <span class="product-available">{{ App\Models\Car::getStatus($auction->car->status) }}</span>
                    </div>
                    <div>
                        <h3 class="product-price">
                            @if ($auction->bids->count() > 0)
                                {{ $auction->bids->first()->currentPrice }}
                            @else
                                {{ $auction->openingBid }}
                            @endif
                        </h3>
                    </div>
                    <div>
                        @error('bidPrice')
                            <p style="color: red;">
                                {{ $message }}
                            </p>
                        @enderror
                        @if (session()->has('errorBid'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ session()->get('errorBid') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session()->has('warningBid'))
                            <div class="alert alert-warning alert-dismissible fade show">
                                {{ session()->get('warningBid') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session()->has('successBid'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session()->get('successBid') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (Auth::user())
                            <div class="add-to-cart">
                                @if ($auction->status == '4' || $auction->status == '5')
                                    <span class="text-danger" style="font-size: 12px; vertical-align: bottom;">
                                        انتهى
                                    </span>
                                    <br>
                                @elseif($auction->status == '3')
                                    <span class="text-danger" style="font-size: 12px; vertical-align: bottom;">
                                        ملغي
                                    </span>
                                    <br>
                                @else
                                    <button class="add-to-cart-btn" data-bs-toggle="modal" data-bs-target="#bidding"><i
                                            class="fa fa-shopping-cart"></i> دخول
                                        بالمزاد</button>
                                @endif

                                <span class="text-muted" style="font-size: 12px; vertical-align: bottom;"> أقل سعر
                                    للمزايدة به هو:
                                    {{ $auction->minInc }}
                                </span>
                            </div>
                        @else
                            <div class="add-to-cart">
                                <a href="{{ route('login') }}" style="line-height: 40px;"
                                    class="d-inline-block add-to-cart-btn">
                                    <i class="fa fa-sign-in"></i> سجل دخول للبدء
                                    بالمزايدة
                                </a>
                            </div>
                        @endif
                    </div>
                    <p>
                        {!! $auction->car->description !!}
                    </p>

                    <ul class="product-btns">
                        <li><a href="#"><i class="fa fa-heart-o"></i> اضافة للمفضلة</a></li>
                    </ul>

                    <h6> البائع</h6>
                    <div class="d-flex align-items-center justify-content-start ">
                        <img src="/images/profiles/{{ $auction->user->profile->avatar }}" class="rounded-circle mb-3"
                            style="width: 40px; margin-left: 10px" alt="Avatar" />
                        <h6 class="mb-2 text-muted">{{ $auction->user->name }}</h6>
                    </div>
                    <div>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <br />
                        <a class="review-link" href="#">10 تقييمات البائع
                            | ضيف تقييمك
                        </a>

                    </div>

                    <ul class="product-links">
                        <li>الاقسام:</li>
                        <li class="badge bg-secondary"><a style="text-decoration: none; color: white"
                                href="#">{{ $auction->car->category->name }}</a></li>
                        <li class="badge bg-secondary"><a style="text-decoration: none; color: white" href="#">
                                {{ App\Models\Car::getStatus($auction->car->status) }}</a></li>
                    </ul>

                    <ul class="product-links">
                        <li>مشاركة :</li>
<!--                         
                    <div class="likeShareBtnmt-3">
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v11.0" nonce="ccaa4s"></script>
                        <div 
                            class="fb-like" 
                            data-layout="standard" 
                            data-action="like" 
                            data-size="large" 
                            data-show-faces="true" 
                            data-href="https://developers.facebook.com/docs/plugins/" 
                            data-share="true">c,.jkhf
                        </div>
                    </div> -->
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>

                </div>
            </div>
            <!-- /Product details -->


            <!-- Product modle -->

            <!-- Modal -->
            <div class="modal fade" id="bidding" action="post" tabindex="-1" dir="rtl"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <form action="{{ route('user.place.bid', $auction->id) }}" method="POST">
                        @csrf
                        <div class="modal-content alert alert-warning" role="alert">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">مزايدة</h5>
                            </div>
                            <div class="mt-4 modal-body">
                                <div class="qty-label">
                                    سعر المزايدة
                                    <div class="input-n">
                                        <input type="number" name="bidPrice">
                                        <span class="qty-up">+</span>
                                        <span class="qty-down">-</span>
                                    </div>
                                </div>
                                <div class="alert alert-warning mt-4" role="alert" dir="rtl">
                                    <i class="bi bi-shield-fill-exclamation"></i>
                                    تنبية سيتم خصم نسبة 10% من حسابك قيمة الدخول للمزاد
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-dark">تاكيد</button>
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">الغاء الامر
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



            		<!-- Product reviews -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
							
								<li><a data-toggle="tab" href="#tab3">التقييمات (3)</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">

						      	<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab3">التقييمات (3)</a></li>

							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
					

					

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade fade show active" dir="rtl">
									<div class="row">
										<!-- Rating -->
										<div class="col-md-3" >
											<div id="rating">
												<div class="rating-avg" >
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
										<div class="col-md-6" dir="rtl" >
											<div id="reviews" dir="ltr">
												<ul class="reviews" dir="rtl" >
													<li >
														<div class="review-heading">
															<h5 class="name">علي الرعيني</h5>
															<p class="date">27 DEC 2018, 8:0 PM</p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
														</div>
														<div class="review-body" dir="rtl" >
															<p>هذه السيارة جميلة فعلا!</p>
														</div>
													</li>
													<li>
														<div class="review-heading">
															<h5 class="name">ريم الشاذلي</h5>
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
															<p>حلااااااوة ذي السيارة </p>
														</div>
													</li>
													<li>
														<div class="review-heading">
															<h5 class="name">حمد بكيل</h5>
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
															<p>ي عيني ذي سيارة والا طيارة</p>
														</div>
													</li>
												</ul>
										
											</div>
										</div>
										<!-- /Reviews -->

										<!-- Review Form -->
										<div class="col-md-3">
											<div id="review-form">
												<form class="review-form">
													<input class="input" type="text" placeholder="اسمك ">
													<input class="input" type="email" placeholder="بريدك الالكتروني">
													<textarea class="input" placeholder="اضف تعليقك للتقييم"></textarea>
													<div class="input-rating">
														<span> تقييمك:</span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
														</div>
													</div>
													<button class="primary-btn">حفظ</button>
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
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product reviews -->



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
