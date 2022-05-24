@include('Front.include.header')
<!-- Start Product Area -->
<div class="product-area section a-res" id="offer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>{{ $title }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-info">
                    <div class="tab-content" id="myTabContent">
                        <!-- Start cars Single Tab -->
                        <div class="tab-pane fade show active" id="cars" role="tabpanel">
                            <div class="tab-single">
                                <div class="row">
                                    @foreach ($auctions as $auction)
                                        @if ($auction->car)
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="{{ route('site.auction.details', $auction->id) }}">
                                                            <img class="default-img"
                                                                src="/images/cars/{{ $auction->car->thumbnail }}"
                                                                alt="#">
                                                            <!--img class="hover-img" src="img/c2.jpg" alt="#"-->
                                                        </a>
                                                        <div class="button-head">
                                                            <div class="product-action">
                                                                @auth
                                                                    @if (Auth::user()->favorite->where('pivot.auction_id', $auction->id)->count() == 0)
                                                                        <a title="Wishlist" class="wishlist cursor-pointer"
                                                                            data-auction-id="{{ $auction->id }}"
                                                                            method="add">
                                                                            <i class="ti-heart"></i>
                                                                        </a>
                                                                    @else
                                                                        <a title="Wishlist" class="wishlist cursor-pointer"
                                                                            data-auction-id="{{ $auction->id }}"
                                                                            method="remove">
                                                                            <i class="fa fa-heart"
                                                                                style="color: #F7941D;"></i>
                                                                        </a>
                                                                    @endif
                                                                @endauth
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
                                                            <span>{{ $auction->openingBid }}</span>
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


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Product Area -->

@include('Front.include.footer')
