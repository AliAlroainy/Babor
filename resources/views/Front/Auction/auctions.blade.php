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
                                <a class=" nav-link {{ request()->is('user/auctions/in-progress') ? 'active' : null }}"
                                    id="{{ route('user.show.progress.auction') }}-tab"
                                    href="{{ route('user.show.progress.auction') }}" role="tab">

                                    المزادات الجارية

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class=" nav-link {{ request()->is('user/auctions/complete') ? 'active' : null }}"
                                    id="{{ route('user.show.complete.auction') }}-tab"
                                    href="{{ route('user.show.complete.auction') }}" role="tab">

                                    المزادات المنتهيه
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class=" nav-link {{ request()->is('user/auctions/subscribed_auction') ? 'active' : null }}"
                                    id="{{ route('user.show.subscribed.auction') }}-tab"
                                    href="{{ route('user.show.subscribed.auction') }}" role="tab">

                                    مزادات اشتركت فيها
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content py-0 px-0">
                            <div class="tab-pane fade {{ request()->is('user/auctions/in-progress') ? 'show active' : null }}"
                                id="{{ route('user.show.progress.auction') }}" role="tabpanel"
                                aria-labelledby="{{ route('user.show.progress.auction') }}-tab">

                                <div class="auctions">
                                    {{-- @if (isset($auctions) && $auctions->count() > 0) --}}
                                    @if (isset($auctions) && $auctions->count() > 0)
                                        @foreach ($auctions as $auction)
                                            <a href="{{ @url('user/auctions/auctionId') }}" class="auction">
                                                <div class="d-flex justify-content-between rounded m-2">
                                                    <div
                                                        class="auction_brief_info p-2 d-flex flex-column justify-content-between">
                                                        <h4 class="mt-1 car_name">
                                                            {{ $auction->car->brand->name }}
                                                            {{ $auction->car->series->name }}
                                                            {{ $auction->car->model }}
                                                        </h4>
                                                        <div class="group d-flex flex-column ">
                                                            <div class="prices d-flex justify-content-between">
                                                                <div>
                                                                    <p> السعر الإبتدائي <i class="mdi mdi-cash"></i></p>
                                                                    <p class="old_price"> {{ $auction->openingBid }}
                                                                    </p>
                                                                </div>
                                                                <div>
                                                                    <p class="text-success fw-bold">السعر الحالي<i
                                                                            class="mdi mdi-arrow-up"></i></p>
                                                                    <p class="new_price text-success fw-bold">
                                                                        @if ($auction->bids->count() > 0)
                                                                            {{ $auction->bids->first()->currentPrice }}
                                                                        @else
                                                                            {{ $auction->openingBid }}
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-between info">
                                                                <div class="bidder">
                                                                    <h6>
                                                                        عدد المزايدين
                                                                    </h6>
                                                                    <p class="top_bidder text-danger">
                                                                        @if ($auction->bids->count() > 0)
                                                                            {{ $auction->bids->count() }}
                                                                        @else
                                                                            لا يوجد مزايدين إلى الآن
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-between info">
                                                                <div class="bidder">
                                                                    <h6>
                                                                        أعلى مزايد
                                                                    </h6>
                                                                    <p class="top_bidder">
                                                                        @if ($auction->bids->count() > 0)
                                                                            {{ $auction->bids->first()->user->name }}
                                                                        @else
                                                                            لا يوجد مزايدين إلى الآن
                                                                        @endif
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
                                                        <img src="/images/cars/{{ $auction->car->thumbnail }}"
                                                            alt="image" />
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="tab-pane fade {{ request()->is('user/auctions/exprired') ? 'show active' : null }}"
                                id="{{ route('user.show.complete.auction') }}" role="tabpanel"
                                aria-labelledby="{{ route('user.show.complete.auction') }}-tab">

                                <div class="auctions">
                                    {{-- @if (isset($auctions) && $auctions->count() > 0) --}}
                                    @if (isset($auctions) && $auctions->count() > 0)
                                        @foreach ($auctions as $auction)
                                            <a href="{{ @url('user/auctions/auctionId') }}" class="auction">
                                                <div class="d-flex justify-content-between rounded m-2">
                                                    <div
                                                        class="auction_brief_info p-2 d-flex flex-column justify-content-between">
                                                        <h4 class="mt-1 car_name">
                                                            {{ $auction->car->brand->name }}
                                                            {{ $auction->car->series->name }}
                                                            {{ $auction->car->model }}
                                                        </h4>
                                                        <div class="group d-flex flex-column ">
                                                            <div class="prices d-flex justify-content-between">
                                                                <div>
                                                                    <p> السعر الإبتدائي <i class="mdi mdi-cash"></i></p>
                                                                    <p class="old_price"> {{ $auction->openingBid }}
                                                                    </p>
                                                                </div>
                                                                <div>
                                                                    <p class="text-success fw-bold"><i
                                                                            class="mdi mdi-arrow-up">السعر الفائز</i> </p>
                                                                    <p class="new_price text-success fw-bold">
                                                                        {{ $auction->winnerPrice }} </p>
                                                                </div>
                                                            </div>

                                                            <div class="d-flex justify-content-between info">
                                                                <div class="bidder">
                                                                    <h6>
                                                                        الفائز
                                                                    </h6>
                                                                    <p class="top_bidder">
                                                                        {{ $auction->winner }}
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

                                                        <img src="/images/cars/{{ $auction->car->thumbnail }}"
                                                            alt="image" />
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade {{ request()->is('user/auctions/subscribed_auction') ? 'show active' : null }}"
                                id="{{ route('user.show.subscribed.auction') }}" role="tabpanel"
                                aria-labelledby="{{ route('user.show.subscribed.auction') }}-tab">

                                <div class="auctions">
                                    {{-- @if (isset($auctions) && $auctions->count() > 0) --}}
                                    @if (isset($auctions) && $auctions->count() > 0)
                                        {{-- @foreach ($bids as $bid) --}}
                                        @foreach ($auctions as $auction)
                                            <a href="{{ @url('user/auctions/auctionId') }}" class="auction">
                                                <div class="d-flex justify-content-between rounded m-2">
                                                    <div
                                                        class="auction_brief_info p-2 d-flex flex-column justify-content-between">
                                                        <h4 class="mt-1 car_name">
                                                            {{ $auction->car->brand->name }}
                                                            {{ $auction->car->series->name }}
                                                            {{ $auction->car->model }}
                                                        </h4>
                                                        <div class="group d-flex flex-column ">
                                                            <div class="prices d-flex justify-content-between">
                                                                <div>
                                                                    <p> السعر الإبتدائي <i class="mdi mdi-cash"></i></p>
                                                                    <p class="old_price"> {{ $auction->openingBid }}
                                                                    </p>
                                                                </div>
                                                                <div>
                                                                    <p class="text-success fw-bold">السعر الحالي<i
                                                                            class="mdi mdi-arrow-up"></i></p>
                                                                    {{-- <p class="new_price text-success fw-bold"> {{$bid->currentPrice }}</p> --}}
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

                                                        <img src="/images/cars/{{ $auction->car->thumbnail }}"
                                                            alt="image" />
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                        {{-- @endforeach --}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <button class="btn btn-warning fw-bold add_auction">إنشاء مزاد</button> --}}

    </div>
    </body>
@endsection
