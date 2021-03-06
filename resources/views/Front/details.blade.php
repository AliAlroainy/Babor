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
                            <img src="/images/cars/car_images/{{ $img }}" alt="car images">
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5" dir="rtl">
                <div class="product-details">
                    <div class="d-flex">
                        <h2 class="product-name mb-0 ms-1"> {{ $auction->type_and_model() }} </h2>
                        <span
                            class="product-available align-self-end">{{ App\Models\Car::getStatus($auction->car->status) }}
                        </span>
                    </div>
                    <div>
                        <h3 class="product-price">
                            @if ($auction->bids->count() > 0)
                                {{ $auction->bids->first()->currentPrice }}$
                            @else
                                {{ $auction->openingBid }}$
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
                                    @if (Auth::user()->profile != $auction->user->profile)
                                        <button class="add-to-cart-btn" data-bs-toggle="modal"
                                            data-bs-target="#bidding"><i class="fa fa-shopping-cart"></i> دخول
                                            بالمزاد</button>
                                    @endif
                                @endif
                                <span class="text-muted" style="font-size: 12px; vertical-align: bottom;"> أقل
                                    سعر
                                    للمزايدة به هو:
                                    <span class="text-danger"> ${{ $auction->minInc }} </span>
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
                    <p class="d-flex flex-column">

                    <div class="d-flex flex-column">
                        <p class="ms-3">
                            <i class="bi bi-gear" style="color: #F7941D"></i>
                            نوع الجير :
                            {{ \App\Models\Car::getJear($auction->car->jear) }}
                        </p>
                        <p class="ms-3">
                            <i class="bi bi-speedometer2" style="color: #F7941D"></i>
                            المسافة المقطوعة :
                            {{ $auction->car->numberOfKillos }} كيلو
                        </p>

                        <div class="d-flex flex-column">
                            <p class="ms-3">
                                <i class="bi bi-card-text"></i>
                                تفاصيل اضافية :
                            </p>
                            {!! $auction->car->description !!}
                        </div>
                    </div>

                    </p>

                    <ul class="product-btns">
                        <li>
                            @auth
                                @if (Auth::user()->favorite->where('pivot.auction_id', $auction->id)->count() == 0)
                                    <a title="Wishlist" class="wishlist cursor-pointer"
                                        data-auction-id="{{ $auction->id }}" method="add">
                                        <i class="ti-heart"></i>
                                        أضف إلى المفضلة
                                    </a>
                                @else
                                    <a title="Wishlist" class="wishlist cursor-pointer"
                                        data-auction-id="{{ $auction->id }}" method="remove">
                                        <i class="fa fa-heart" style="color: #F7941D;"> في المفضلة </i>
                                    </a>
                                @endif
                            @endauth
                        </li>
                    </ul>

                    <div class="d-flex align-items-center justify-content-start">
                        <span class="fw-bold"> البائع: </span>
                        <a href="{{ route('user.visit.profile', $auction->user->id) }}"
                            class="d-flex  align-items-center">
                            <img src="/images/profiles/{{ $auction->user->profile->avatar }}"
                                class="rounded-circle mb-3" style="width: 40px; margin-left: 10px" alt="Avatar" />
                            <h6 class="mb-2 text-muted">{{ $auction->user->name }}</h6>
                        </a>
                    </div>
                    <div>
                        <div class="product-rating">
                            @if ($total > 0)
                                @php
                                    $remain = 5 - $total;
                                @endphp
                                @for ($i = 1; $i <= $total; $i++)
                                    <i class="fa fa-star" style="color: #f79522;"></i>
                                @endfor

                                @if ($remain > 0)
                                    @for ($i = 1; $i <= $remain; $i++)
                                        <i class="fa fa-star-o" style="color: #f79522;"></i>
                                    @endfor
                                @endif
                            @else
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fa fa-star-o" style="color: #f79522;"></i>
                                @endfor
                            @endif
                        </div>
                        <br />
                        <a class="review-link" href="#">{{ $total }} تقييمات للبائع
                            @if (!Auth::user() == $auction->user)
                                | ضيف تقييمك
                            @endif
                        </a>

                    </div>

                    <ul class="product-links">
                        <li>الاقسام:</li>
                        <li class="badge bg-secondary"><a style="text-decoration: none; color: white"
                                href="#">{{ $auction->car->category->name }}</a></li>
                        <li class="badge bg-secondary">
                            <a style="text-decoration: none; color:white;" href="#">
                                {{ App\Models\Car::getStatus($auction->car->status) }}
                            </a>
                        </li>
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
                                <div class="d-flex mb-3">
                                    السعر الحالي :
                                    <span style="color:#F7941D">
                                        @if ($auction->bids->count() > 0)
                                            {{ $auction->bids->first()->currentPrice }}$
                                        @else
                                            {{ $auction->openingBid }}$
                                        @endif
                                    </span>
                                </div>
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
                                <button type="submit" class="btn "
                                    style="background-color: #F7941D;">تاكيد</button>
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">الغاء الامر
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

                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">

                        <!-- Product tab -->
                        <div class="col-md-12">
                            <div id="product-tab">
                                <!-- product tab nav -->
                                <ul class="tab-nav">
                                    <li class="active"><a data-toggle="tab" href="#tab3">التقييمات
                                            @if ($count == 0.02)
                                                <span>0</span>
                                            @else
                                                <span>{{ $count }}</span>
                                            @endif
                                        </a></li>

                                </ul>
                                <!-- /product tab nav -->

                                <!-- product tab content -->
                                <div class="tab-content">




                                    <!-- tab3  -->
                                    <div id="tab3" class="tab-pane fade fade show active" dir="rtl">
                                        <div class="row">
                                            <!-- Rating -->
                                            <div class="col-md-3">
                                                <div id="rating">
                                                    <div class="rating-avg">
                                                        @if ($totalstar == 0.02)
                                                            <span>0</span>
                                                        @else
                                                            <span>{{ $totalstar }}</span>
                                                        @endif
                                                        <div class="rating-stars">
                                                            @if ($total > 0)
                                                                @php
                                                                    $remain = 5 - $total;
                                                                @endphp
                                                                @for ($i = 1; $i <= $total; $i++)
                                                                    <i class="fa fa-star"
                                                                        style="color: #f79522;"></i>
                                                                @endfor

                                                                @if ($remain > 0)
                                                                    @for ($i = 1; $i <= $remain; $i++)
                                                                        <i class="fa fa-star-o"
                                                                            style="color: #f79522;"></i>
                                                                    @endfor
                                                                @endif
                                                            @else
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    <i class="fa fa-star-o"
                                                                        style="color: #f79522;"></i>
                                                                @endfor
                                                            @endif
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
                                                                <div style="width:{{ $five }}%;"></div>
                                                            </div>
                                                            <span class="sum">{{ $fiveStar }}</span>
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
                                                                <div style="width: {{ $four }}%;"></div>
                                                            </div>
                                                            <span class="sum">{{ $fourStar }}</span>
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
                                                                <div style="width: {{ $three }}%;"></div>
                                                            </div>
                                                            <span class="sum">{{ $threeStar }}</span>
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
                                                                <div style="width: {{ $two }}%;"></div>
                                                            </div>
                                                            <span class="sum">{{ $twoStar }}</span>
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
                                                                <div style="width: {{ $one }}%;"></div>
                                                            </div>
                                                            <span class="sum"> {{ $oneStar }}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- /Rating -->

                                            <!-- Reviews -->
                                            <div class="col-md-6" dir="rtl">
                                                <div id="reviews" dir="ltr">
                                                    <ul class="reviews" dir="rtl">
                                                        @foreach ($auction->user->ReviewData as $review)
                                                            <li>
                                                                <div class="review-heading">
                                                                    <h5 class="name">{{ $review->name }}
                                                                    </h5>
                                                                    <p class="date">
                                                                        {{ $review->created_at->format('jS \\of F Y') }}
                                                                    </p>
                                                                    <div class="review-rating">
                                                                        @for ($i = 1; $i <= $review->star_rating; $i++)
                                                                            <i class="fa fa-star"></i>
                                                                        @endfor


                                                                    </div>
                                                                </div>
                                                                <div class="review-body" dir="rtl">
                                                                    <p>{{ $review->comments }}</p>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>

                                                </div>
                                            </div>
                                            <!-- /Reviews -->

                                            <!-- Review Form -->
                                            <div class="col-md-3">
                                                <div id="review-form">
                                                    @if (session()->has('successAdd'))
                                                        <div class="alert alert-success alert-dismissible fade show">
                                                            {{ session()->get('successAdd') }}
                                                            <button type=" button" class="btn-close"
                                                                data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                    @endif
                                                    @if (session()->has('errorAdd'))
                                                        <div class="alert alert-success alert-dismissible fade show">
                                                            {{ session()->get('errorAdd') }}
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                    @endif
                                                    @if ($errors->any())
                                                        <div class="alert alert-danger alert-dismissible fade show">
                                                            <ul class="m-0">
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                    @endif
                                                    <form class="review-form"
                                                        action="{{ route('review.store') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="user_id"
                                                            value="{{ $auction->user->id }}">
                                                        <input class="input" type="text" name="name"
                                                            placeholder="اسمك " require>

                                                        <textarea class="input" name="comment" placeholder="اضف تعليقك للتقييم" require></textarea>
                                                        <div class="input-rating">
                                                            <span> تقييمك:</span>
                                                            <div class="stars">
                                                                <input id="star5" name="rating" value="5"
                                                                    type="radio"><label for="star5"></label>
                                                                <input id="star4" name="rating" value="4"
                                                                    type="radio"><label for="star4"></label>
                                                                <input id="star3" name="rating" value="3"
                                                                    type="radio"><label for="star3"></label>
                                                                <input id="star2" name="rating" value="2"
                                                                    type="radio"><label for="star2"></label>
                                                                <input id="star1" name="rating" value="1"
                                                                    type="radio"><label for="star1" require></label>
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
                    @forelse ($similars as $item)
                        @if ($item->car != null)
                            <!-- Start Single Product -->
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="{{ route('site.auction.details', $item->id) }}">
                                        <img class="default-img" src="/images/cars/{{ $item->car->thumbnail }}"
                                            alt="car img">
                                        <span class="out-of-stock">Hot</span>
                                    </a>
                                    <div class="button-head d-flex justify-content-center">
                                        @auth
                                            @if (Auth::user()->favorite->where('pivot.auction_id', $item->id)->count() == 0)
                                                <a title="Wishlist" class="wishlist cursor-pointer"
                                                    data-auction-id="{{ $item->id }}" method="add">
                                                    <i class="ti-heart"></i>
                                                    أضف إلى المفضلة
                                                </a>
                                            @else
                                                <a title="Wishlist" class="wishlist cursor-pointer"
                                                    data-auction-id="{{ $item->id }}" method="remove">
                                                    <i class="fa fa-heart" style="color: #F7941D;"> في المفضلة </i>
                                                </a>
                                            @endif
                                        @endauth
                                        <div class="product-action-2 ">
                                            <a title="Add to cart"
                                                href="{{ route('site.auction.details', $item->id) }}">دخول
                                                المزاد</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a
                                            href="{{ route('site.auction.details', $item->id) }}">{{ $item->type_and_model() }}</a>
                                    </h3>
                                    <div class="product-price">
                                        <span>
                                            @if ($item->bids->count() > 0)
                                                {{ $item->bids->first()->currentPrice }}$
                                            @else
                                                {{ $item->openingBid }}$
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                        @endif
                    @empty
                        لا توجد عروض مشابهة
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End related cars -->



@include('Front.include.footer')
