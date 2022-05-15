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
                             <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#cars"
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
                                 <!-- <button wire:click ="load" type="button" class=" items-center px-2.5 py-1.5 border " style="position: relative;
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
</button>  -->
                             </div>
                         </div>
                         <!--/ End cars Single Tab -->
                         @livewire('salons')



                         <!--/ End salons Single Tab -->

                         <!-- Start taxis Single Tab -->
                         @livewire('taxis')
                         <!--/ End taxi Single Tab -->

                         <!-- Start babor Single Tab -->
                         @livewire('babor')
                         <!--/ End babor Single Tab -->
 <!-- Start bus Single Tab -->
 @livewire('buses')
                         <!--/ End bus Single Tab -->

                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- End Product Area -->
