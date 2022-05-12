
<!-- Start Product Area -->
 <div class="product-area section" id="offer">
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
                                     role="tab">حافلات</a></li>
                             <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#babors"
                                     role="tab">شاحنات</a></li>
                             <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#taxis"
                                     role="tab">تكاسي</a></li>
                             <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#salons"
                                     role="tab">صوالين</a></li>
                             <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#cars"
                                     role="tab">سيارات</a></li>
                         </ul>
                         <!--/ End Tab Nav -->
                     </div>
                     <div class="tab-content" id="myTabContent">
                         <!-- Start cars Single Tab -->
                         <div class="tab-pane fade show active" id="cars" role="tabpanel">
                             <div class="tab-single">
                                 <div class="row">
                                     @foreach ($last_cars as $auction)
                                         @if ($auction->car != null)
                                             <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                                 <div class="single-product">
                                                     <div class="product-img">
                                                         <a href="{{ route('site.auction.details', $auction->id) }}">
                                                             <img class="default-img"
                                                                 src="images/cars/{{ $auction->car->thumbnail }}"
                                                                 alt="#">
                                                         </a>
                                                         <div class="button-head">
                                                             <div class="product-action">
                                                                 <a data-toggle="modal" data-target="#exampleModal"
                                                                     title="Quick View" href="#"><i
                                                                         class=" ti-eye"></i><span>Quick
                                                                         Shop</span></a>
                                                                 <a title="Wishlist" href="#"><i
                                                                         class=" ti-heart "></i><span>اضافة
                                                                         للتفضيلات</span></a>
                                                                 <a title="Compare" href="#"><i
                                                                         class="ti-bar-chart-alt"></i><span>مشاركة
                                                                         المزاد</span></a>
                                                             </div>
                                                             <div class="product-action-2">
                                                                 <a title="Add to cart" href="#">شراء</a>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="product-content">
                                                         <h3><a
                                                                 href="{{ route('user.auction.details', $auction->id) }}">{{ $auction->type_and_model() }}
                                                             </a></h3>
                                                         <div class="product-price">
                                                             <span>
                                                                 @if ($auction->bids->count() > 0)
                                                                     {{ $auction->bids->first()->currentPrice }}
                                                                 @else
                                                                     {{ $auction->openingBid }}
                                                                 @endif
                                                             </span>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         @endif
                                     @endforeach
                                 </div>
                             </div>
                         </div>
                         <!--/ End cars Single Tab -->

                         <!-- Start Salons Single Tab -->
                         <div class="tab-pane fade" id="salons" role="tabpanel">
                             <div class="tab-single">
                                 <div class="row">
                                     @foreach ($last_salons as $auction)
                                         @if ($auction->car != null)
                                             <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                                 <div class="single-product">
                                                     <div class="product-img">
                                                         <a href="{{ route('site.auction.details', $auction->id) }}">
                                                             <img class="default-img"
                                                                 src="images/cars/{{ $auction->car->thumbnail }}"
                                                                 alt="#">
                                                         </a>
                                                         <div class="button-head">
                                                             <div class="product-action">
                                                                 <a data-toggle="modal" data-target="#exampleModal"
                                                                     title="Quick View" href="#"><i
                                                                         class=" ti-eye"></i><span>Quick
                                                                         Shop</span></a>
                                                                 <a title="Wishlist" href="#"><i
                                                                         class=" ti-heart "></i><span>اضافة
                                                                         للتفضيلات</span></a>
                                                                 <a title="Compare" href="#"><i
                                                                         class="ti-bar-chart-alt"></i><span>مشاركة
                                                                         المزاد</span></a>
                                                             </div>
                                                             <div class="product-action-2">
                                                                 <a title="Add to cart" href="#">شراء</a>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="product-content">
                                                         <h3><a
                                                                 href="{{ route('user.auction.details', $auction->id) }}">{{ $auction->type_and_model() }}
                                                             </a></h3>
                                                         <div class="product-price">
                                                             <span>
                                                                 @if ($auction->bids->count() > 0)
                                                                     {{ $auction->bids->first()->currentPrice }}
                                                                 @else
                                                                     {{ $auction->openingBid }}
                                                                 @endif
                                                             </span>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         @endif
                                     @endforeach
                                 </div>
                             </div>
                         </div>
                         <!--/ End Daion Single Tab -->

                         <!-- Start taxis Single Tab -->
                         <div class="tab-pane fade show active" id="taxis" role="tabpanel">
                             <div class="tab-single">
                                 <div class="row">
                                     @foreach ($last_taxis as $auction)
                                         @if ($auction->car != null)
                                             <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                                 <div class="single-product">
                                                     <div class="product-img">
                                                         <a href="{{ route('site.auction.details', $auction->id) }}">
                                                             <img class="default-img"
                                                                 src="images/cars/{{ $auction->car->thumbnail }}"
                                                                 alt="#">
                                                         </a>
                                                         <div class="button-head">
                                                             <div class="product-action">
                                                                 <a data-toggle="modal" data-target="#exampleModal"
                                                                     title="Quick View" href="#"><i
                                                                         class=" ti-eye"></i><span>Quick
                                                                         Shop</span></a>
                                                                 <a title="Wishlist" href="#"><i
                                                                         class=" ti-heart "></i><span>اضافة
                                                                         للتفضيلات</span></a>
                                                                 <a title="Compare" href="#"><i
                                                                         class="ti-bar-chart-alt"></i><span>مشاركة
                                                                         المزاد</span></a>
                                                             </div>
                                                             <div class="product-action-2">
                                                                 <a title="Add to cart" href="#">شراء</a>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="product-content">
                                                         <h3><a
                                                                 href="{{ route('user.auction.details', $auction->id) }}">{{ $auction->type_and_model() }}
                                                             </a></h3>
                                                         <div class="product-price">
                                                             <span>
                                                                 @if ($auction->bids->count() > 0)
                                                                     {{ $auction->bids->first()->currentPrice }}
                                                                 @else
                                                                     {{ $auction->openingBid }}
                                                                 @endif
                                                             </span>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         @endif
                                     @endforeach
                                 </div>
                             </div>
                         </div>
                         <!--/ End babor Single Tab -->

                         <!-- Start salon Single Tab -->
                         <div class="tab-pane fade show active" id="babors" role="tabpanel">
                             <div class="tab-single">
                                 <div class="row">
                                     @foreach ($last_babors as $auction)
                                         @if ($auction->car != null)
                                             <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                                 <div class="single-product">
                                                     <div class="product-img">
                                                         <a href="{{ route('site.auction.details', $auction->id) }}">
                                                             <img class="default-img"
                                                                 src="images/cars/{{ $auction->car->thumbnail }}"
                                                                 alt="#">
                                                         </a>
                                                         <div class="button-head">
                                                             <div class="product-action">
                                                                 <a data-toggle="modal" data-target="#exampleModal"
                                                                     title="Quick View" href="#"><i
                                                                         class=" ti-eye"></i><span>Quick
                                                                         Shop</span></a>
                                                                 <a title="Wishlist" href="#"><i
                                                                         class=" ti-heart "></i><span>اضافة
                                                                         للتفضيلات</span></a>
                                                                 <a title="Compare" href="#"><i
                                                                         class="ti-bar-chart-alt"></i><span>مشاركة
                                                                         المزاد</span></a>
                                                             </div>
                                                             <div class="product-action-2">
                                                                 <a title="Add to cart" href="#">شراء</a>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="product-content">
                                                         <h3><a
                                                                 href="{{ route('user.auction.details', $auction->id) }}">{{ $auction->type_and_model() }}
                                                             </a></h3>
                                                         <div class="product-price">
                                                             <span>
                                                                 @if ($auction->bids->count() > 0)
                                                                     {{ $auction->bids->first()->currentPrice }}
                                                                 @else
                                                                     {{ $auction->openingBid }}
                                                                 @endif
                                                             </span>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         @endif
                                     @endforeach
                                 </div>
                             </div>
                         </div>
                         <!--/ End salon Single Tab -->

                         <!-- Start taxi Single Tab -->
                         <div class="tab-pane fade show active" id="taxis" role="tabpanel">
                             <div class="tab-single">
                                 <div class="row">
                                     @foreach ($last_taxis as $auction)
                                         @if ($auction->car != null)
                                             <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                                 <div class="single-product">
                                                     <div class="product-img">
                                                         <a href="{{ route('site.auction.details', $auction->id) }}">
                                                             <img class="default-img"
                                                                 src="images/cars/{{ $auction->car->thumbnail }}"
                                                                 alt="#">
                                                         </a>
                                                         <div class="button-head">
                                                             <div class="product-action">
                                                                 <a data-toggle="modal" data-target="#exampleModal"
                                                                     title="Quick View" href="#"><i
                                                                         class=" ti-eye"></i><span>Quick
                                                                         Shop</span></a>
                                                                 <a title="Wishlist" href="#"><i
                                                                         class=" ti-heart "></i><span>اضافة
                                                                         للتفضيلات</span></a>
                                                                 <a title="Compare" href="#"><i
                                                                         class="ti-bar-chart-alt"></i><span>مشاركة
                                                                         المزاد</span></a>
                                                             </div>
                                                             <div class="product-action-2">
                                                                 <a title="Add to cart" href="#">شراء</a>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="product-content">
                                                         <h3><a
                                                                 href="{{ route('user.auction.details', $auction->id) }}">{{ $auction->type_and_model() }}
                                                             </a></h3>
                                                         <div class="product-price">
                                                             <span>
                                                                 @if ($auction->bids->count() > 0)
                                                                     {{ $auction->bids->first()->currentPrice }}
                                                                 @else
                                                                     {{ $auction->openingBid }}
                                                                 @endif
                                                             </span>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         @endif
                                     @endforeach
                                 </div>
                             </div>
                         </div>
                         <!--/ End taxi Single Tab -->

                         <!-- Start buses Single Tab -->
                         <div class="tab-pane fade show active" id="buses" role="tabpanel">
                             <div class="tab-single">
                                 <div class="row">
                                     @foreach ($last_buses as $auction)
                                         @if ($auction->car != null)
                                             <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                                 <div class="single-product">
                                                     <div class="product-img">
                                                         <a href="{{ route('site.auction.details', $auction->id) }}">
                                                             <img class="default-img"
                                                                 src="images/cars/{{ $auction->car->thumbnail }}"
                                                                 alt="#">
                                                         </a>
                                                         <div class="button-head">
                                                             <div class="product-action">
                                                                 <a data-toggle="modal" data-target="#exampleModal"
                                                                     title="Quick View" href="#"><i
                                                                         class=" ti-eye"></i><span>Quick
                                                                         Shop</span></a>
                                                                 <a title="Wishlist" href="#"><i
                                                                         class=" ti-heart "></i><span>اضافة
                                                                         للتفضيلات</span></a>
                                                                 <a title="Compare" href="#"><i
                                                                         class="ti-bar-chart-alt"></i><span>مشاركة
                                                                         المزاد</span></a>
                                                             </div>
                                                             <div class="product-action-2">
                                                                 <a title="Add to cart" href="#">شراء</a>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="product-content">
                                                         <h3><a
                                                                 href="{{ route('user.auction.details', $auction->id) }}">{{ $auction->type_and_model() }}
                                                             </a></h3>
                                                         <div class="product-price">
                                                             <span>
                                                                 @if ($auction->bids->count() > 0)
                                                                     {{ $auction->bids->first()->currentPrice }}
                                                                 @else
                                                                     {{ $auction->openingBid }}
                                                                 @endif
                                                             </span>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         @endif
                                     @endforeach
                                 </div>
                             </div>
                         </div>
                         <!--/ End buses Single Tab -->
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- End Product Area -->
