@extends('partials.usermaster')
@section('body')

<div class="container mt-2 ">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body dashboard-tabs p-0">
                    <ul class="nav nav-tabs px-4" role="tablist">
                        <li class="nav-item">
                            {{-- <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">المزادات الجارية</a> --}}
                            <a class=" nav-link {{ request()->is('user/auctions/current_auction') ? 'active' : null }}"
                                id="{{ route('user.show.current.auction') }}-tab" href="{{ route('user.show.current.auction') }}"
                                role="tab">

                                    المزادات الجارية

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link {{ request()->is('user/auctions/ended_auction') ? 'active' : null }}"
                                id="{{ route('user.show.ended.auction') }}-tab" href="{{ route('user.show.ended.auction') }}"
                                role="tab">

                                    المزادات المنتهيه
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="purchases-tab" data-bs-toggle="tab" href="#purchases" role="tab" aria-controls="purchases" aria-selected="false">مزادات اشتركت فيها</a>
                        </li>
                    </ul>
                    <div class="tab-content py-0 px-0">
                        <div class="tab-pane fade {{ request()->is('user/auctions/current_auction') ? 'show active' : null }}"
                            id="{{ route('user.show.current.auction') }}" role="tabpanel" aria-labelledby="{{ route('user.show.current.auction') }}-tab">

                            <div class="auctions">
                                {{-- @if (isset($auctions) && $auctions->count() > 0) --}}
                                @if (isset($auctions) && $auctions->count() > 0)
                                @foreach ($auctions as $auction)


                            <a href="{{@url('user/auctions/auctionId')}}" class="auction">
                                <div class="d-flex justify-content-between rounded m-2">
                                    <div class="auction_brief_info p-2 d-flex flex-column justify-content-between">
                                        <h4 class="mt-1 car_name">
                                            {{ $auction->car->brand->name }} {{ $auction->car->series->name }}   {{ $auction->car->model }}
                                        </h4>
                                        <div class="group d-flex flex-column ">
                                            <div class="prices d-flex justify-content-between">
                                                <div>
                                                    <p> السعر الإبتدائي <i class="mdi mdi-cash"></i></p>
                                                    <p class="old_price">     {{ $auction->openingBid }}</p>
                                                </div>
                                                <div>
                                                    <p class="text-success fw-bold">السعر الحالي<i class="mdi mdi-arrow-up"></i></p>
                                                    <p class="new_price text-success fw-bold">10000$  </p>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between info">
                                                <div class="bidder">
                                                    <h6>
                                                        أعلى مزايد
                                                    </h6>
                                                    <p class="top_bidder">
                                                        حمد بكيل
                                                    </p>
                                                </div>
                                                <div class="end_date ">
                                                    <h6>ناريخ الإنتهاء</h6>
                                                    <p>
                                                        {{ $auction->closeDate }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="img-container">

                                        <img src="/images/cars/{{ $auction->car->thumbnail }}" alt="image" />
                                    </div>
                                </div>
                            </a>

                            @endforeach

                            @endif

                            </div>

                        </div>

                        <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">
                            <div class="auctions">

                                <a href={{@url('user/auctions/auctionId')}} class="auction">
                                    <div class="d-flex justify-content-between rounded m-2">
                                        <div class="auction_brief_info p-2 d-flex flex-column justify-content-between">
                                            <h4 class="mt-1">
                                                فاو BESTUNE T77 2020 فل
                                            </h4>
                                            <div class="group d-flex flex-column ">
                                                <div class="prices d-flex justify-content-between">
                                                    <div>
                                                        <p> السعر الإبتدائي <i class="mdi mdi-cash"></i></p>
                                                        <p class="old_price">9000$</p>
                                                    </div>
                                                    <div>
                                                        <p class="text-success fw-bold">السعر الحالي<i class="mdi mdi-arrow-up"></i></p>
                                                        <p class="new_price text-success fw-bold">10000$  </p>
                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-between">
                                                    <div class="bidder">
                                                        <h6>
                                                            أعلى مزايد
                                                        </h6>
                                                        <p class="top_bidder">
                                                            حمد بكيل
                                                        </p>
                                                    </div>
                                                    <div class="end_date ">
                                                        <h6>ناريخ الإنتهاء</h6>
                                                        <p>
                                                            2022/3/3
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="img-container">
                                            <img src="{{@asset('assets/img/cars/car.webp')}}" alt="car_img" >
                                        </div>
                                    </div>
                                </a>

                                <a href={{@url('user/auctions/auctionId')}} class="auction">
                                    <div class="d-flex justify-content-between rounded m-2">
                                        <div class="auction_brief_info p-2 d-flex flex-column justify-content-between">
                                            <h4 class="mt-1">
                                                فاو BESTUNE T77 2020 فل
                                            </h4>
                                            <div class="group d-flex flex-column ">
                                                <div class="prices d-flex justify-content-between">
                                                    <div>
                                                        <p> السعر الإبتدائي <i class="mdi mdi-cash"></i></p>
                                                        <p class="old_price">9000$</p>
                                                    </div>
                                                    <div>
                                                        <p class="text-success fw-bold">السعر الحالي<i class="mdi mdi-arrow-up"></i></p>
                                                        <p class="new_price text-success fw-bold">10000$  </p>
                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-between">
                                                    <div class="bidder">
                                                        <h6>
                                                            أعلى مزايد
                                                        </h6>
                                                        <p class="top_bidder">
                                                            حمد بكيل
                                                        </p>
                                                    </div>
                                                    <div class="end_date ">
                                                        <h6>ناريخ الإنتهاء</h6>
                                                        <p>
                                                            2022/3/3
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="img-container">
                                            <img src="{{@asset('assets/img/cars/car.webp')}}" alt="car_img" >
                                        </div>
                                    </div>
                                </a>

                                <a href={{@url('user/auctions/auctionId')}} class="auction">
                                    <div class="d-flex justify-content-between rounded m-2">
                                        <div class="auction_brief_info p-2 d-flex flex-column justify-content-between">
                                            <h4 class="mt-1">
                                                فاو BESTUNE T77 2020 فل
                                            </h4>
                                            <div class="group d-flex flex-column ">
                                                <div class="prices d-flex justify-content-between">
                                                    <div>
                                                        <p> السعر الإبتدائي <i class="mdi mdi-cash"></i></p>
                                                        <p class="old_price">9000$</p>
                                                    </div>
                                                    <div>
                                                        <p class="text-success fw-bold">السعر الحالي<i class="mdi mdi-arrow-up"></i></p>
                                                        <p class="new_price text-success fw-bold">10000$  </p>
                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-between">
                                                    <div class="bidder">
                                                        <h6>
                                                            أعلى مزايد
                                                        </h6>
                                                        <p class="top_bidder">
                                                            حمد بكيل
                                                        </p>
                                                    </div>
                                                    <div class="end_date ">
                                                        <h6>ناريخ الإنتهاء</h6>
                                                        <p>
                                                            2022/3/3
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="img-container">
                                            <img src="{{@asset('assets/img/cars/car.webp')}}" alt="car_img" >
                                        </div>
                                    </div>
                                </a>

                                <a href={{@url('user/auctions/auctionId')}} class="auction">
                                    <div class="d-flex justify-content-between rounded m-2">
                                        <div class="auction_brief_info p-2 d-flex flex-column justify-content-between">
                                            <h4 class="mt-1">
                                                فاو BESTUNE T77 2020 فل
                                            </h4>
                                            <div class="group d-flex flex-column ">
                                                <div class="prices d-flex justify-content-between">
                                                    <div>
                                                        <p> السعر الإبتدائي <i class="mdi mdi-cash"></i></p>
                                                        <p class="old_price">9000$</p>
                                                    </div>
                                                    <div>
                                                        <p class="text-success fw-bold">السعر الحالي<i class="mdi mdi-arrow-up"></i></p>
                                                        <p class="new_price text-success fw-bold">10000$  </p>
                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-between">
                                                    <div class="bidder">
                                                        <h6>
                                                            أعلى مزايد
                                                        </h6>
                                                        <p class="top_bidder">
                                                            حمد بكيل
                                                        </p>
                                                    </div>
                                                    <div class="end_date ">
                                                        <h6>ناريخ الإنتهاء</h6>
                                                        <p>
                                                            2022/3/3
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="img-container">
                                            <img src="{{@asset('assets/img/cars/car.webp')}}" alt="car_img" >
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="purchases" role="tabpanel" aria-labelledby="purchases-tab">
                            <div class="auctions">

                                <a href={{@url('user/auctions/auctionId')}} class="auction">
                                    <div class="d-flex justify-content-between rounded m-2">
                                        <div class="auction_brief_info p-2 d-flex flex-column justify-content-between">
                                            <h4 class="mt-1">
                                                فاو BESTUNE T77 2020 فل
                                            </h4>
                                            <div class="group d-flex flex-column ">
                                                <div class="prices d-flex justify-content-between">
                                                    <div>
                                                        <p> السعر الإبتدائي <i class="mdi mdi-cash"></i></p>
                                                        <p class="old_price">9000$</p>
                                                    </div>
                                                    <div>
                                                        <p class="text-success fw-bold">السعر الحالي<i class="mdi mdi-arrow-up"></i></p>
                                                        <p class="new_price text-success fw-bold">10000$  </p>
                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-between">
                                                    <div class="bidder">
                                                        <h6>
                                                            أعلى مزايد
                                                        </h6>
                                                        <p class="top_bidder">
                                                            حمد بكيل
                                                        </p>
                                                    </div>
                                                    <div class="end_date ">
                                                        <h6>ناريخ الإنتهاء</h6>
                                                        <p>
                                                            2022/3/3
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="img-container">
                                            <img src="{{@asset('assets/img/cars/car.webp')}}" alt="car_img" >
                                        </div>
                                    </div>
                                </a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    <button class="btn btn-warning fw-bold add_auction">إنشاء مزاد</button>--}}

</div>
</body>
@endsection

