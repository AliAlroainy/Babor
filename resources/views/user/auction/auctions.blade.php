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
                                        <h4 class="mt-1 car_name">
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
                            <div class="d-flex flex-wrap justify-content-xl-between">
                                <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-calendar-heart icon-lg me-3 text-primary"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Start date</small>
                                        <div class="dropdown">
                                            <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                                                <a class="dropdown-item" href="#">12 Aug 2018</a>
                                                <a class="dropdown-item" href="#">22 Sep 2018</a>
                                                <a class="dropdown-item" href="#">21 Oct 2018</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-download me-3 icon-lg text-warning"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Downloads</small>
                                        <h5 class="me-2 mb-0">2233783</h5>
                                    </div>
                                </div>
                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-eye me-3 icon-lg text-success"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Total views</small>
                                        <h5 class="me-2 mb-0">9833550</h5>
                                    </div>
                                </div>
                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-currency-usd me-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Revenue</small>
                                        <h5 class="me-2 mb-0">$577545</h5>
                                    </div>
                                </div>
                                <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-flag me-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Flagged</small>
                                        <h5 class="me-2 mb-0">3497843</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="purchases" role="tabpanel" aria-labelledby="purchases-tab">
                            <div class="d-flex flex-wrap justify-content-xl-between">
                                <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-calendar-heart icon-lg me-3 text-primary"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Start date</small>
                                        <div class="dropdown">
                                            <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                                                <a class="dropdown-item" href="#">12 Aug 2018</a>
                                                <a class="dropdown-item" href="#">22 Sep 2018</a>
                                                <a class="dropdown-item" href="#">21 Oct 2018</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-currency-usd me-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Revenue</small>
                                        <h5 class="me-2 mb-0">$577545</h5>
                                    </div>
                                </div>
                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-eye me-3 icon-lg text-success"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Total views</small>
                                        <h5 class="me-2 mb-0">9833550</h5>
                                    </div>
                                </div>
                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-download me-3 icon-lg text-warning"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Downloads</small>
                                        <h5 class="me-2 mb-0">2233783</h5>
                                    </div>
                                </div>
                                <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-flag me-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Flagged</small>
                                        <h5 class="me-2 mb-0">3497843</h5>
                                    </div>
                                </div>
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

