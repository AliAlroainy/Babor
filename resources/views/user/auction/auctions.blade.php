@extends('partials.usermaster')
@section('body')

<div class="container mt-2 ">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body dashboard-tabs p-0">
                    <ul class="nav nav-tabs px-4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">المزادات الجارية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="sales-tab" data-bs-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false">المزادات المنتهية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="purchases-tab" data-bs-toggle="tab" href="#purchases" role="tab" aria-controls="purchases" aria-selected="false">مزادات اشتركت فيها</a>
                        </li>
                    </ul>
                    <div class="tab-content py-0 px-0">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="auctions">

                            <a href="#" class="auction">
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

                            <a href="#" class="auction">
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

                        <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">
                            <div class="auctions">

                                <a href="#" class="auction">
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

                                <a href="#" class="auction">
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

                                <a href="#" class="auction">
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

                                <a href="#" class="auction">
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

                                <a href="#" class="auction">
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

