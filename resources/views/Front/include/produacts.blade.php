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
                             <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#cars"
                                     role="tab">سيارات</a></li>
                         </ul>
                         <!--/ End Tab Nav -->
                     </div>
                     <div class="tab-content" id="myTabContent">
                         <!-- Start cars Single Tab -->
                         <div class="tab-pane fade show active" id="cars" role="tabpanel">
                             <div class="tab-single">
                                 <div class="row " id="list">
                                     @foreach ($last_cars as $auction)
                                         @if ($auction->car != null)
                                             <div class="cars col-xl-3 col-lg-4 col-md-4 col-12">
                                                 <div class="single-product">
                                                     <div class="product-img">
                                                         <a href="{{ route('site.auction.details', $auction->id) }}">
                                                             <img class="default-img"
                                                                 src="images/cars/{{ $auction->car->thumbnail }}"
                                                                 alt="#">
                                                         </a>
                                                         <div class="button-head">
                                                             <div class="product-action">
                                                                 <a title="Wishlist" class="addWishlist"
                                                                     data-auction-id="{{ $auction->id }}">
                                                                     <i class="ti-heart"></i>
                                                                 </a>
                                                                 {{-- <a title="Wishlist" class="addWishlist"
                                                                     data-auction-id="{{ $auction->id }}"
                                                                     href="javascript:void(0);"
                                                                     onclick="document.getElementById('favorite-form-{{ $auction->id }}').submit();">
                                                                     <i class="ti-heart"></i>
                                                                 </a>
                                                                 <form id="favorite-form-{{ $auction->id }}"
                                                                     method="POST"
                                                                     action="{{ route('auction_favorite', $auction->id) }}">
                                                                     @csrf
                                                                 </form> --}}
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
                                                                 href="{{ route('site.auction.details', $auction->id) }}">{{ $auction->type_and_model() }}
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

                         <!-- Start taxis Single Tab -->
                         <div class="tab-pane fade show" id="taxis" role="tabpanel">
                             <div class="tab-single">
                                 <div class="row" id="list">
                                     @foreach ($last_taxis as $auction)
                                         @if ($auction->car != null)
                                             <div class="cars col-xl-3 col-lg-4 col-md-4 col-12">
                                                 <div class="single-product">
                                                     <div class="product-img">
                                                         <a href="{{ route('site.auction.details', $auction->id) }}">
                                                             <img class="default-img"
                                                                 src="images/cars/{{ $auction->car->thumbnail }}"
                                                                 alt="#">
                                                         </a>
                                                         <div class="button-head">
                                                             <div class="product-action">
                                                                 <a title="Wishlist" class="addWishlist"
                                                                     data-auction-id="{{ $auction->id }}">
                                                                     <i class="ti-heart"></i>
                                                                 </a>
                                                                 {{-- <a title="Wishlist" class="addWishlist"
                                                                     data-auction-id="{{ $auction->id }}"
                                                                     href="javascript:void(0);"
                                                                     onclick="document.getElementById('favorite-form-{{ $auction->id }}').submit();">
                                                                     <i class="ti-heart"></i>
                                                                 </a> --}}
                                                                 {{-- <form id="favorite-form-{{ $auction->id }}"
                                                                     method="POST"
                                                                     action="{{ route('auction_favorite', $auction->id) }}">
                                                                     @csrf
                                                                 </form> --}}
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
                                                                 href="{{ route('site.auction.details', $auction->id) }}">{{ $auction->type_and_model() }}
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
                         <div class="tab-pane fade show" id="babors" role="tabpanel">
                             <div class="tab-single">
                                 <div class="row" id="list">
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
                                                                 <a title="Wishlist" class="addWishlist"
                                                                     data-auction-id="{{ $auction->id }}">
                                                                     <i class="ti-heart"></i>
                                                                 </a>
                                                                 {{-- <a title="Wishlist" class="addWishlist"
                                                                     data-auction-id="{{ $auction->id }}"
                                                                     href="javascript:void(0);"
                                                                     onclick="document.getElementById('favorite-form-{{ $auction->id }}').submit();">
                                                                     <i class="ti-heart"></i>
                                                                 </a>
                                                                 <form id="favorite-form-{{ $auction->id }}"
                                                                     method="POST"
                                                                     action="{{ route('auction_favorite', $auction->id) }}">
                                                                     @csrf
                                                                 </form> --}}
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
                                                                 href="{{ route('site.auction.details', $auction->id) }}">{{ $auction->type_and_model() }}
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


                         <!-- Start buses Single Tab -->
                         <div class="tab-pane fade show" id="buses" role="tabpanel">
                             <div class="tab-single">
                                 <div class="row" id="list">
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
                                                                 <a title="Wishlist" class="addWishlist"
                                                                     data-auction-id="{{ $auction->id }}">
                                                                     <i class="ti-heart"></i>
                                                                 </a>
                                                                 {{-- <a title="Wishlist" class="addWishlist"
                                                                     data-auction-id="{{ $auction->id }}"
                                                                     href="javascript:void(0);"
                                                                     onclick="document.getElementById('favorite-form-{{ $auction->id }}').submit();">
                                                                     <i class="ti-heart"></i>
                                                                 </a>
                                                                 <form id="favorite-form-{{ $auction->id }}"
                                                                     method="POST"
                                                                     action="{{ route('auction_favorite', $auction->id) }}">
                                                                     @csrf
                                                                 </form> --}}
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
                                                                 href="{{ route('site.auction.details', $auction->id) }}">{{ $auction->type_and_model() }}
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
