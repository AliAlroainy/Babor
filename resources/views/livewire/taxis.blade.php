<!-- Start taxis Single Tab -->
<div class="tab-pane fade show" id="taxis" role="tabpanel">
    <div class="tab-single">
        <div class="row">
            @foreach ($last_taxis as $auction)
                @if ($auction->car != null)
                    <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="{{ route('site.auction.details', $auction->id) }}">
                                    <img class="default-img" src="images/cars/{{ $auction->car->thumbnail }}"
                                        alt="#">
                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                            href="#"><i class=" ti-eye"></i><span>Quick
                                                Shop</span></a>
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
                                <h3><a href="{{ route('site.auction.details', $auction->id) }}">{{ $auction->type_and_model() }}
                                    </a></h3>
                                <div class="product-price">
                                    <span>
                                        @if ($auction->bids->count() > 0)
                                            {{ $auction->bids->first()->currentPrice }}$
                                        @else
                                            {{ $auction->openingBid }}$
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <!-- <button wire:click ="load2" type="button" class=" items-center px-2.5 py-1.5 border "style="position: relative;
    border: 2px solid transparent;
    height: 40px;
    padding: 0 30px;
    background-color: #F7941D;
    color: #FFF;
    text-transform: uppercase;
    font-weight: 700;
    border-radius: 40px;
    -webkit-transition: 0.2s all;
    transition: 0.2s all;">
                                   عرض المزيد
</button> -->
    </div>
</div>
