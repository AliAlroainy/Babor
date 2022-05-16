@extends('partials.usermaster')
@section('body')
    <div class="container mt-2 ">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body dashboard-tabs p-0">
                        <div class="tab-content py-0 px-0">
                            <div class="tab-pane fade {{ request()->is('user/auctions/in-progress') ? 'show active' : null }}"
                                id="{{ route('user.show.progress.auction') }}" role="tabpanel"
                                aria-labelledby="{{ route('user.show.progress.auction') }}-tab">
                                <h2 class="text-center mt-3">المزادات الجارية</h2>
                                <div class="container my-5">
                                    <div class="row auction-list">
                                        @if (isset($auctions) && $auctions->count() > 0)
                                            @foreach ($auctions as $auction)
                                                <div class=" p-2 bg-white d-flex flex-column shadow rounded">
                                                    <div class="mt-1 text-center">
                                                        <img class="img-fluid img-responsive rounded product-image"
                                                            src="/images/cars/{{ $auction->car->thumbnail }}"
                                                            alt="car image" width="100">
                                                    </div>
                                                    <div class="d-flex align-items-baseline mt-1">
                                                        <span class="mt-1 car_name">
                                                            {{ $auction->car->brand->name }}
                                                            {{ $auction->car->series->name }}
                                                            {{ $auction->car->model }}
                                                        </span>
                                                        <a href="{{ route('user.auction.details', $auction->id) }}"
                                                            class="main-color p-2">
                                                            <span> المزيد ..<i class="fa-solid fa-angles-left"></i>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="mt-3 row align-items-baseline justify-content-evenly">
                                                        <div class="col-12 col-sm-5">
                                                            <p>
                                                                <i class="fas fa-hourglass-start"></i>
                                                                <span class="fw-bold">تاريخ النشر</span>
                                                                <br>
                                                                <span class="ps-1 pe-3">
                                                                    {{ $auction->startDate }}
                                                                </span>
                                                            </p>
                                                        </div>
                                                        <div class="mt-3 col-sm-5">
                                                            <p>
                                                                <i class="fas fa-hourglass-start"></i>
                                                                <span class="fw-bold">تاريخ الإنتهاء</span>
                                                                <br>
                                                                <span class="ps-1 pe-3">
                                                                    {{ $auction->closeDate }}
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3 row align-items-baseline justify-content-evenly">
                                                        <div class="col-sm-5">
                                                            <p>
                                                                <i class="far fa-money-bill-alt"></i>
                                                                <span class="fw-bold">السعر الإبتدائي</span>
                                                                <br>
                                                                <span class="ps-1 pe-3">
                                                                    {{ $auction->openingBid }}
                                                                </span>
                                                            </p>
                                                        </div>
                                                        <div class="mt-3 col-sm-5">
                                                            <p>
                                                                <i class="far fa-arrow-alt-circle-up"></i>
                                                                <span class="fw-bold">السعر الحالي</span>
                                                                <br>
                                                                <span class="ps-1 pe-3">
                                                                    @if ($auction->bids->count() > 0)
                                                                        {{ $auction->bids->first()->currentPrice }}
                                                                    @else
                                                                        {{ $auction->openingBid }}
                                                                    @endif
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3 row align-items-baseline justify-content-evenly">
                                                        <div class="col-sm-5">
                                                            <p>
                                                                <i class="fas fa-users"></i>
                                                                <span class="fw-bold">عددالمزايدين</span>
                                                                <br>
                                                                <span class="text-danger ps-1 pe-3">
                                                                    @if ($auction->bids->count() > 0)
                                                                        {{ $auction->bids->count() }}
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </span>
                                                            </p>
                                                        </div>
                                                        <div class="mt-3 col-sm-5">
                                                            <p>
                                                                <i class="fas fa-user-clock"></i>
                                                                <span class="fw-bold">أعلى مزايد</span>
                                                                <br>
                                                                <span class="text-danger ps-1 pe-3">
                                                                    @if ($auction->bids->count() > 0)
                                                                        {{ $auction->bids->first()->user->name }}
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-auto row align-items-baseline justify-content-evenly">
                                                        <button style="width: fit-content"
                                                            class="mt-3 btn btn-inverse-danger btn-rounded"
                                                            data-bs-target="#cancel-{{ $auction->id }}"
                                                            data-bs-toggle="modal">
                                                            إلغاء المزاد
                                                            <i class="fa-solid fa-times pe-2" style="font-size: 12px ;"></i>
                                                        </button>
                                                        <div class="modal fade" id="cancel-{{ $auction->id }}"
                                                            tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <form
                                                                    action="{{ route('user.progress.action.auction', $auction->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel1">
                                                                                تأكيد
                                                                                الإلغاء</h5>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <span>هل أنت متأكد من رغبتك في إلغاء
                                                                                هذا المزاد؟</span>
                                                                            <span class="text-danger fw-bold">لا
                                                                                يمكنك
                                                                                التراجع</span>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-outline-secondary"
                                                                                data-bs-dismiss="modal">إلغاء</button>
                                                                            <button type="submit" name="cancel"
                                                                                class="btn btn-warning text-white">نعم</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        @if ($auction->bids->count() > 0)
                                                            <button style="width: fit-content"
                                                                class="mt-3 btn btn-inverse-info btn-rounded"
                                                                data-bs-target="#stop-{{ $auction->id }}"
                                                                data-bs-toggle="modal">
                                                                توقيف
                                                                <i class="fad fa-solid fa-stop pe-2"
                                                                    style="font-size: 12px ;"></i>
                                                            </button>
                                                            <div class="modal fade" id="stop-{{ $auction->id }}"
                                                                tabindex="-1" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <form
                                                                        action="{{ route('user.progress.action.auction', $auction->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel1">
                                                                                    تأكيد إرساء المزاد
                                                                                </h5>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <span>هل أنت متأكد من رغبتك في إرساء
                                                                                    المزاد؟</span>
                                                                                <span class="text-danger fw-bold">لا
                                                                                    يمكنك
                                                                                    التراجع</span>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-outline-secondary"
                                                                                    data-bs-dismiss="modal">إلغاء</button>
                                                                                <button type="submit" name="stop"
                                                                                    class="btn btn-warning text-white">نعم</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <button style="width: fit-content"
                                                                class="mt-3 btn btn-inverse-info btn-rounded"
                                                                data-bs-target="#expand-{{ $auction->id }}"
                                                                data-bs-toggle="modal">
                                                                تمديد الوقت
                                                                <i class="fas fa-expand-alt pe-2"
                                                                    style="font-size: 12px ;"></i>
                                                            </button>
                                                            <div class="modal fade" id="expand-{{ $auction->id }}"
                                                                tabindex="-1" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <form
                                                                        action="{{ route('user.progress.action.auction', $auction->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel1">
                                                                                    تأكيد تمديد الوقت
                                                                                </h5>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <span>هل أنت متأكد من رغبتك في تمديد
                                                                                    وقت
                                                                                    المزاد يومين؟</span>
                                                                                <span class="text-danger fw-bold">لا
                                                                                    يمكنك
                                                                                    التراجع</span>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-outline-secondary"
                                                                                    data-bs-dismiss="modal">إلغاء</button>
                                                                                <button type="submit" name="timeExtension"
                                                                                    class="btn btn-warning text-white">نعم</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>

                                                </div>
                                            @endforeach
                                        @else
                                            <h4 class="text-center">لا توجد مزادات جارية </h4>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ request()->is('user/auctions/completed') ? 'show active' : null }}"
                                id="{{ route('user.show.completed.auction') }}" role="tabpanel"
                                aria-labelledby="{{ route('user.show.completed.auction') }}-tab">
                                <h2 class="text-center mt-3 ">المزادات المنتهية</h2>
                                <div class="container my-5">
                                    <div class="row auction-list ">
                                        @if (isset($auctions) && $auctions->count() > 0)
                                            @foreach ($auctions as $auction)
                                                <div class=" p-2 bg-white d-flex flex-column shadow rounded">
                                                    <div class="mt-1 text-center">
                                                        <img class="img-fluid img-responsive rounded product-image"
                                                            src="/images/cars/{{ $auction->car->thumbnail }}"
                                                            alt="car image" width="100">
                                                    </div>
                                                    <div class="d-flex align-items-baseline mt-1">
                                                        <span class="mt-1 car_name">
                                                            {{ $auction->car->brand->name }}
                                                            {{ $auction->car->series->name }}
                                                            {{ $auction->car->model }}
                                                        </span>
                                                        <a href="{{ route('user.auction.details', $auction->id) }}"
                                                            class="main-color p-2">
                                                            <span> المزيد ..<i class="fa-solid fa-angles-left"></i>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="mt-3 row align-items-baseline justify-content-evenly">
                                                        <div class="col-12 col-sm-5">
                                                            <p>
                                                                <i class="fas fa-hourglass-start"></i>
                                                                <span class="fw-bold">تاريخ النشر</span>
                                                                <br>
                                                                <span class="ps-1 pe-3">
                                                                    {{ $auction->startDate }}
                                                                </span>
                                                            </p>
                                                        </div>
                                                        <div class="mt-3 col-sm-5">
                                                            <p>
                                                                <i class="fas fa-hourglass-start"></i>
                                                                <span class="fw-bold">تاريخ الإنتهاء</span>
                                                                <br>
                                                                <span class="ps-1 pe-3">
                                                                    {{ $auction->closeDate }}
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3 row align-items-baseline justify-content-evenly">
                                                        <div class="col-sm-5">
                                                            <p>
                                                                <i class="far fa-money-bill-alt"></i>
                                                                <span class="fw-bold">السعر الإبتدائي</span>
                                                                <br>
                                                                <span class="ps-1 pe-3">
                                                                    {{ $auction->openingBid }}
                                                                </span>
                                                            </p>
                                                        </div>
                                                        <div class="mt-3 col-sm-5">
                                                            <p>
                                                                <i class="far fa-arrow-alt-circle-up"></i>
                                                                <span class="fw-bold">السعر الحالي</span>
                                                                <br>
                                                                <span class="ps-1 pe-3">
                                                                    @if ($auction->bids_count > 0)
                                                                        {{ $auction->bids->first()->currentPrice }}
                                                                    @else
                                                                        {{ $auction->openingBid }}
                                                                    @endif
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3 row align-items-baseline justify-content-evenly">
                                                        <div class="col-sm-5">
                                                            <p>
                                                                <i class="fas fa-users"></i>
                                                                <span class="fw-bold">عددالمزايدين</span>
                                                                <br>
                                                                <span class="text-danger ps-1 pe-3">
                                                                    @if ($auction->bids_count > 0)
                                                                        {{ $auction->bids_count }}
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </span>
                                                            </p>
                                                        </div>
                                                        <div class="mt-3 col-sm-5">
                                                            <p>
                                                                <i class="fas fa-user-clock"></i>
                                                                <span class="fw-bold">أعلى مزايد</span>
                                                                <br>
                                                                <span class="text-danger ps-1 pe-3">
                                                                    @if ($auction->bids_count > 0)
                                                                        {{ $auction->bids->first()->user->name }}
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-auto row align-items-baseline justify-content-evenly">
                                                        <button style="width: fit-content"
                                                            class="mt-3 btn btn-inverse-danger btn-rounded"
                                                            data-bs-target="#cancel-{{ $auction->id }}"
                                                            data-bs-toggle="modal">
                                                            إلغاء المزاد
                                                            <i class="fa-solid fa-times pe-2"
                                                                style="font-size: 12px ;"></i>
                                                        </button>
                                                        <div class="modal fade" id="cancel-{{ $auction->id }}"
                                                            tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <form
                                                                    action="{{ route('user.progress.action.auction', $auction->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel1">
                                                                                تأكيد
                                                                                الإلغاء</h5>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <span>هل أنت متأكد من رغبتك في إلغاء
                                                                                هذا المزاد؟</span>
                                                                            <span class="text-danger fw-bold">لا
                                                                                يمكنك
                                                                                التراجع</span>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-outline-secondary"
                                                                                data-bs-dismiss="modal">إلغاء</button>
                                                                            <button type="submit" name="cancel"
                                                                                class="btn btn-warning text-white">نعم</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        @if ($auction->bids_count > 0)
                                                            <button style="width: fit-content"
                                                                class="mt-3 btn btn-inverse-info btn-rounded"
                                                                data-bs-target="#stop-{{ $auction->id }}"
                                                                data-bs-toggle="modal">
                                                                توقيف
                                                                <i class="fad fa-solid fa-stop pe-2"
                                                                    style="font-size: 12px ;"></i>
                                                            </button>
                                                            <div class="modal fade" id="stop-{{ $auction->id }}"
                                                                tabindex="-1" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <form
                                                                        action="{{ route('user.progress.action.auction', $auction->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel1">
                                                                                    تأكيد إرساء المزاد
                                                                                </h5>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <span>هل أنت متأكد من رغبتك في إرساء
                                                                                    المزاد؟</span>
                                                                                <span class="text-danger fw-bold">لا
                                                                                    يمكنك
                                                                                    التراجع</span>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-outline-secondary"
                                                                                    data-bs-dismiss="modal">إلغاء</button>
                                                                                <button type="submit" name="stop"
                                                                                    class="btn btn-warning text-white">نعم</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <button style="width: fit-content"
                                                                class="mt-3 btn btn-inverse-info btn-rounded"
                                                                data-bs-target="#expand-{{ $auction->id }}"
                                                                data-bs-toggle="modal">
                                                                تمديد الوقت
                                                                <i class="fas fa-expand-alt pe-2"
                                                                    style="font-size: 12px ;"></i>
                                                            </button>
                                                            <div class="modal fade" id="expand-{{ $auction->id }}"
                                                                tabindex="-1" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <form
                                                                        action="{{ route('user.progress.action.auction', $auction->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel1">
                                                                                    تأكيد تمديد الوقت
                                                                                </h5>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <span>هل أنت متأكد من رغبتك في تمديد
                                                                                    وقت
                                                                                    المزاد يومين؟</span>
                                                                                <span class="text-danger fw-bold">لا
                                                                                    يمكنك
                                                                                    التراجع</span>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-outline-secondary"
                                                                                    data-bs-dismiss="modal">إلغاء</button>
                                                                                <button type="submit" name="timeExtension"
                                                                                    class="btn btn-warning text-white">نعم</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>

                                                </div>
                                            @endforeach
                                        @else
                                            <h4 class="text-center">لا توجد مزادات منتهية </h4>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ request()->is('user/auctions/uncompleted') ? 'show active' : null }}"
                                id="{{ route('user.show.uncompleted.auction') }}" role="tabpanel"
                                aria-labelledbyh2="{{ route('user.show.uncompleted.auction') }}-tab">
                                <h2 class="text-center mt-3 ">المزادات الغير مكتملة</h2>
                                <div class="container my-5">
                                    <div class="row auction-list">
                                        @if (isset($auctions) && $auctions->count() > 0)
                                            @foreach ($auctions as $auction)
                                                <div class=" p-2 bg-white d-flex flex-column shadow rounded">
                                                    <div class="mt-1 text-center">
                                                        <img class="img-fluid img-responsive rounded product-image"
                                                            src="/images/cars/{{ $auction->car->thumbnail }}"
                                                            alt="car image" width="100">
                                                    </div>
                                                    <div class="d-flex align-items-baseline mt-1">
                                                        <span class="mt-1 car_name">
                                                            {{ $auction->car->brand->name }}
                                                            {{ $auction->car->series->name }}
                                                            {{ $auction->car->model }}
                                                        </span>
                                                        <a href="{{ route('user.auction.details', $auction->id) }}"
                                                            class="main-color p-2">
                                                            <span> المزيد ..<i class="fa-solid fa-angles-left"></i>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="mt-3 row align-items-baseline justify-content-evenly">
                                                        <div class="col-12 col-sm-5">
                                                            <p>
                                                                <i class="fas fa-hourglass-start"></i>
                                                                <span class="fw-bold">تاريخ النشر</span>
                                                                <br>
                                                                <span class="ps-1 pe-3">
                                                                    {{ $auction->startDate }}
                                                                </span>
                                                            </p>
                                                        </div>
                                                        <div class="mt-3 col-sm-5">
                                                            <p>
                                                                <i class="fas fa-hourglass-start"></i>
                                                                <span class="fw-bold">تاريخ الإنتهاء</span>
                                                                <br>
                                                                <span class="ps-1 pe-3">
                                                                    {{ $auction->closeDate }}
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3 row align-items-baseline justify-content-evenly">
                                                        <div class="col-sm-5">
                                                            <p>
                                                                <i class="far fa-money-bill-alt"></i>
                                                                <span class="fw-bold">السعر الإبتدائي</span>
                                                                <br>
                                                                <span class="ps-1 pe-3">
                                                                    {{ $auction->openingBid }}
                                                                </span>
                                                            </p>
                                                        </div>
                                                        <div class="mt-3 col-sm-5">
                                                            <p>
                                                                <i class="far fa-arrow-alt-circle-up"></i>
                                                                <span class="fw-bold">السعر الحالي</span>
                                                                <br>
                                                                <span class="ps-1 pe-3">
                                                                    @if ($auction->bids->count() > 0)
                                                                        {{ $auction->bids->first()->currentPrice }}
                                                                    @else
                                                                        {{ $auction->openingBid }}
                                                                    @endif
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-auto row align-items-baseline justify-content-evenly">
                                                        <button style="width: fit-content"
                                                            class="mt-3 btn btn-inverse-danger btn-rounded"
                                                            data-bs-target="#cancel-{{ $auction->id }}"
                                                            data-bs-toggle="modal">
                                                            إلغاء المزاد
                                                            <i class="fa-solid fa-times pe-2"
                                                                style="font-size: 12px ;"></i>
                                                        </button>
                                                        <div class="modal fade" id="cancel-{{ $auction->id }}"
                                                            tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <form
                                                                    action="{{ route('user.progress.action.auction', $auction->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel1">
                                                                                تأكيد
                                                                                الإلغاء</h5>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <span>هل أنت متأكد من رغبتك في إلغاء
                                                                                هذا المزاد؟</span>
                                                                            <span class="text-danger fw-bold">لا
                                                                                يمكنك
                                                                                التراجع</span>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-outline-secondary"
                                                                                data-bs-dismiss="modal">إلغاء</button>
                                                                            <button type="submit" name="cancel"
                                                                                class="btn btn-warning text-white">نعم</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        @if ($auction->bids->count() > 0)
                                                            <a style="width: fit-content"
                                                                href="{{ route('user.visit.profile', $auction->bids->first()->user->id) }}"
                                                                class="mt-3 btn btn-inverse-info btn-rounded">
                                                                بروفايل آخر مزايد
                                                                <i class="fad fa-solid fa-stop pe-2"
                                                                    style="font-size: 12px ;"></i>
                                                            </a>
                                                        @endif
                                                        @if (isset($auction->bids->first()->payment_bill))
                                                            @if ($auction->bids->first()->payment_bill->payment_status == 1)
                                                                <a style="width: fit-content"
                                                                    href="{{ route('do.contract', $auction->bids->first()->payment_bill->id) }}"
                                                                    class="mt-3 btn btn-inverse-info btn-rounded">
                                                                    إتمام العقد
                                                                    <i class="fad fa-solid fa-stop pe-2"
                                                                        style="font-size: 12px ;"></i>
                                                                </a>
                                                            @else
                                                                <span class="bg-success"> في انتظار دفع المزايد
                                                                    الفائز</span>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <h4 class="text-center">لا توجد مزادات غير مكتملة </h4>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ request()->is('user/auctions/pending') ? 'show active' : null }}"
                                id="{{ route('user.show.pending.auction') }}" role="tabpanel"
                                aria-labelledby="{{ route('user.show.pending.auction') }}-tab">
                                <h2 class="text-center mt-3">المزادات المعلقة</h2>
                                @if (session()->has('successDelete'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session()->get('successDelete') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @elseif (session()->has('errorDelete'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session()->get('errorDelete') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @elseif (session()->has('notFound'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session()->get('notFound') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="container my-5">
                                    <div class="row auction-list">
                                        @if (isset($auctions) && $auctions->count() > 0)
                                            @foreach ($auctions as $auction)
                                                <div class=" p-2 bg-white d-flex flex-column shadow rounded">
                                                    <div class="mt-1 text-center">
                                                        <img class="img-fluid img-responsive rounded product-image"
                                                            src="/images/cars/{{ $auction->car->thumbnail }}"
                                                            alt="car image" width="100">
                                                    </div>
                                                    <div class="d-flex align-items-baseline mt-1">
                                                        <span class="mt-1 car_name">
                                                            {{ $auction->car->brand->name }}
                                                            {{ $auction->car->series->name }}
                                                            {{ $auction->car->model }}
                                                        </span>
                                                        <a href="{{ route('user.auction.details', $auction->id) }}"
                                                            class="main-color p-2">
                                                            <span> المزيد ..<i class="fa-solid fa-angles-left"></i>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="mt-3 row align-items-baseline justify-content-evenly">
                                                        <div class="col-12 col-sm-5">
                                                            <p>
                                                                <i class="fas fa-hourglass-start"></i>
                                                                <span class="fw-bold">تاريخ النشر</span>
                                                                <br>
                                                                <span class="ps-1 pe-3">
                                                                    {{ $auction->startDate }}
                                                                </span>
                                                            </p>
                                                        </div>
                                                        <div class="mt-3 col-sm-5">
                                                            <p>
                                                                <i class="fas fa-hourglass-start"></i>
                                                                <span class="fw-bold">تاريخ الإنتهاء</span>
                                                                <br>
                                                                <span class="ps-1 pe-3">
                                                                    {{ $auction->closeDate }}
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3 row align-items-baseline justify-content-evenly">
                                                        <div class="col-sm-5">
                                                            <p>
                                                                <i class="far fa-money-bill-alt"></i>
                                                                <span class="fw-bold">السعر الإبتدائي</span>
                                                                <br>
                                                                <span class="ps-1 pe-3">
                                                                    {{ $auction->openingBid }}
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-auto row align-items-baseline justify-content-evenly">
                                                        <button style="width: fit-content"
                                                            class="mt-3 btn btn-inverse-danger btn-rounded"
                                                            data-bs-target="#delete-{{ $auction->id }}"
                                                            data-bs-toggle="modal">
                                                            حذف المزاد
                                                            <i class="fa-solid fa-times pe-2"
                                                                style="font-size: 12px ;"></i>
                                                        </button>
                                                        <div class="modal fade" id="delete-{{ $auction->id }}"
                                                            tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <form
                                                                    action="{{ route('user.delete.pending.auction', $auction->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel1">
                                                                                تأكيد
                                                                                الحذف</h5>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <span>هل أنت متأكد من رغبتك في حذف هذا
                                                                                المزاد؟</span>
                                                                            <span class="text-danger fw-bold">لا
                                                                                يمكنك
                                                                                التراجع</span>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-outline-secondary"
                                                                                data-bs-dismiss="modal">إلغاء</button>
                                                                            <button type="submit" name="delete"
                                                                                class="btn btn-warning text-white">نعم</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <h4 class="text-center w-100">لا يوجد مزادات معلقة</h4>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ request()->is('user/auctions/disapproved') ? 'show active' : null }}"
                                id="{{ route('user.show.disapproved.auction') }}" role="tabpanel"
                                aria-labelledby="{{ route('user.show.disapproved.auction') }}-tab">
                                <h2 class="text-center mt-3 ">المزادات المرفوضة </h2>
                                <div class="container my-5">
                                    <div class="row auction-list ">
                                        @if (isset($auctions) && $auctions->count() > 0)
                                            @foreach ($auctions as $auction)
                                                <div class=" p-2 bg-white d-flex flex-column shadow rounded">
                                                    <div class="mt-1 text-center">
                                                        <img class="img-fluid img-responsive rounded product-image"
                                                            src="/images/cars/{{ $auction->car->thumbnail }}"
                                                            alt="car image" width="100">
                                                    </div>
                                                    <div class="d-flex align-items-baseline mt-1">
                                                        <span class="mt-1 car_name">
                                                            {{ $auction->car->brand->name }}
                                                            {{ $auction->car->series->name }}
                                                            {{ $auction->car->model }}
                                                        </span>
                                                        <a href="{{ route('user.auction.details', $auction->id) }}"
                                                            class="main-color p-2">
                                                            <span> المزيد ..<i class="fa-solid fa-angles-left"></i>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="mt-3 row align-items-baseline justify-content-evenly">
                                                        <div class="col-12 col-sm-5">
                                                            <p>
                                                                <i class="fas fa-hourglass-start"></i>
                                                                <span class="fw-bold">تاريخ النشر</span>
                                                                <br>
                                                                <span class="ps-1 pe-3">
                                                                    {{ $auction->startDate }}
                                                                </span>
                                                            </p>
                                                        </div>
                                                        <div class="mt-3 col-sm-5">
                                                            <p>
                                                                <i class="fas fa-hourglass-start"></i>
                                                                <span class="fw-bold">تاريخ الإنتهاء</span>
                                                                <br>
                                                                <span class="ps-1 pe-3">
                                                                    {{ $auction->closeDate }}
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3 row align-items-baseline justify-content-evenly">
                                                        <div class="col-sm-5">
                                                            <p>
                                                                <i class="far fa-money-bill-alt"></i>
                                                                <span class="fw-bold">السعر الإبتدائي</span>
                                                                <br>
                                                                <span class="ps-1 pe-3">
                                                                    {{ $auction->openingBid }}
                                                                </span>
                                                            </p>
                                                        </div>
                                                        <div class="mt-3 col-sm-5">
                                                            <p>
                                                                <i class="far fa-arrow-alt-circle-up"></i>
                                                                <span class="fw-bold">السعر الحالي</span>
                                                                <br>
                                                                <span class="ps-1 pe-3">
                                                                    @if ($auction->bids_count > 0)
                                                                        {{ $auction->bids->first()->currentPrice }}
                                                                    @else
                                                                        {{ $auction->openingBid }}
                                                                    @endif
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3 row align-items-baseline justify-content-evenly">
                                                        <div class="col-sm-5">
                                                            <p>
                                                                <i class="fas fa-users"></i>
                                                                <span class="fw-bold">عددالمزايدين</span>
                                                                <br>
                                                                <span class="text-danger ps-1 pe-3">
                                                                    @if ($auction->bids_count > 0)
                                                                        {{ $auction->bids_count }}
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </span>
                                                            </p>
                                                        </div>
                                                        <div class="mt-3 col-sm-5">
                                                            <p>
                                                                <i class="fas fa-user-clock"></i>
                                                                <span class="fw-bold">أعلى مزايد</span>
                                                                <br>
                                                                <span class="text-danger ps-1 pe-3">
                                                                    @if ($auction->bids_count > 0)
                                                                        {{ $auction->bids->first()->user->name }}
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-auto row align-items-baseline justify-content-evenly">
                                                        <button style="width: fit-content"
                                                            class="mt-3 btn btn-inverse-danger btn-rounded"
                                                            data-bs-target="#cancel-{{ $auction->id }}"
                                                            data-bs-toggle="modal">
                                                            إلغاء المزاد
                                                            <i class="fa-solid fa-times pe-2"
                                                                style="font-size: 12px ;"></i>
                                                        </button>
                                                        <div class="modal fade" id="cancel-{{ $auction->id }}"
                                                            tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <form
                                                                    action="{{ route('user.progress.action.auction', $auction->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel1">
                                                                                تأكيد
                                                                                الإلغاء</h5>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <span>هل أنت متأكد من رغبتك في إلغاء
                                                                                هذا المزاد؟</span>
                                                                            <span class="text-danger fw-bold">
                                                                                لا يمكنك التراجع
                                                                            </span>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-outline-secondary"
                                                                                data-bs-dismiss="modal">
                                                                                إلغاء
                                                                            </button>
                                                                            <button type="submit" name="cancel"
                                                                                class="btn btn-warning text-white">
                                                                                نعم
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        @if ($auction->bids_count > 0)
                                                            <button style="width: fit-content"
                                                                class="mt-3 btn btn-inverse-info btn-rounded"
                                                                data-bs-target="#stop-{{ $auction->id }}"
                                                                data-bs-toggle="modal">
                                                                توقيف
                                                                <i class="fad fa-solid fa-stop pe-2"
                                                                    style="font-size: 12px ;"></i>
                                                            </button>
                                                            <div class="modal fade" id="stop-{{ $auction->id }}"
                                                                tabindex="-1" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <form
                                                                        action="{{ route('user.progress.action.auction', $auction->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel1">
                                                                                    تأكيد إرساء المزاد
                                                                                </h5>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <span>هل أنت متأكد من رغبتك في إرساء
                                                                                    المزاد؟</span>
                                                                                <span class="text-danger fw-bold">لا
                                                                                    يمكنك
                                                                                    التراجع</span>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-outline-secondary"
                                                                                    data-bs-dismiss="modal">إلغاء</button>
                                                                                <button type="submit" name="stop"
                                                                                    class="btn btn-warning text-white">نعم</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <button style="width: fit-content"
                                                                class="mt-3 btn btn-inverse-info btn-rounded"
                                                                data-bs-target="#expand-{{ $auction->id }}"
                                                                data-bs-toggle="modal">
                                                                تمديد الوقت
                                                                <i class="fas fa-expand-alt pe-2"
                                                                    style="font-size: 12px ;"></i>
                                                            </button>
                                                            <div class="modal fade" id="expand-{{ $auction->id }}"
                                                                tabindex="-1" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <form
                                                                        action="{{ route('user.progress.action.auction', $auction->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel1">
                                                                                    تأكيد تمديد الوقت
                                                                                </h5>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <span>هل أنت متأكد من رغبتك في تمديد
                                                                                    وقت
                                                                                    المزاد يومين؟</span>
                                                                                <span class="text-danger fw-bold">لا
                                                                                    يمكنك
                                                                                    التراجع</span>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-outline-secondary"
                                                                                    data-bs-dismiss="modal">إلغاء</button>
                                                                                <button type="submit" name="timeExtension"
                                                                                    class="btn btn-warning text-white">نعم</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>

                                                </div>
                                            @endforeach
                                        @else
                                            <h4 class="text-center">لا يوجد مزادات مرفوظة من قبل مشرفي الموقع</h4>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ request()->is('user/auctions/canceled') ? 'show active' : null }}"
                                id="{{ route('user.show.canceled.auction') }}" role="tabpanel"
                                aria-labelledby="{{ route('user.show.canceled.auction') }}-tab">
                                <h2 class="text-center mt-3 ">المزادات الملغية</h2>
                                <div class="container my-5">
                                    <div class="row auction-list ">
                                        @if (isset($auctions) && $auctions->count() > 0)
                                            @foreach ($auctions as $auction)
                                                <div class=" p-2 bg-white d-flex flex-column shadow rounded">
                                                    <div class="mt-1 text-center">
                                                        <img class="img-fluid img-responsive rounded product-image"
                                                            src="/images/cars/{{ $auction->car->thumbnail }}"
                                                            alt="car image" width="100">
                                                    </div>
                                                    <div class="d-flex align-items-baseline mt-1">
                                                        <span class="mt-1 car_name">
                                                            {{ $auction->car->brand->name }}
                                                            {{ $auction->car->series->name }}
                                                            {{ $auction->car->model }}
                                                        </span>
                                                        <a href="{{ route('user.auction.details', $auction->id) }}"
                                                            class="main-color p-2">
                                                            <span> المزيد ..<i class="fa-solid fa-angles-left"></i>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="mt-3 row align-items-baseline justify-content-evenly">
                                                        <div class="col-12 col-sm-5">
                                                            <p>
                                                                <i class="fas fa-hourglass-start"></i>
                                                                <span class="fw-bold">تاريخ النشر</span>
                                                                <br>
                                                                <span class="ps-1 pe-3">
                                                                    {{ $auction->startDate }}
                                                                </span>
                                                            </p>
                                                        </div>
                                                        <div class="mt-3 col-sm-5">
                                                            <p>
                                                                <i class="fas fa-hourglass-start"></i>
                                                                <span class="fw-bold">تاريخ الإنتهاء</span>
                                                                <br>
                                                                <span class="ps-1 pe-3">
                                                                    {{ $auction->closeDate }}
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3 row align-items-baseline justify-content-evenly">
                                                        <div class="col-sm-5">
                                                            <p>
                                                                <i class="far fa-money-bill-alt"></i>
                                                                <span class="fw-bold">السعر الإبتدائي</span>
                                                                <br>
                                                                <span class="ps-1 pe-3">
                                                                    {{ $auction->openingBid }}
                                                                </span>
                                                            </p>
                                                        </div>
                                                        <div class="mt-3 col-sm-5">
                                                            <p>
                                                                <i class="far fa-arrow-alt-circle-up"></i>
                                                                <span class="fw-bold">السعر الحالي</span>
                                                                <br>
                                                                <span class="ps-1 pe-3">
                                                                    @if ($auction->bids->count() > 0)
                                                                        {{ $auction->bids->first()->currentPrice }}
                                                                    @else
                                                                        {{ $auction->openingBid }}
                                                                    @endif
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3 row align-items-baseline justify-content-evenly">
                                                        <div class="col-sm-5">
                                                            <p>
                                                                <i class="fas fa-users"></i>
                                                                <span class="fw-bold">عددالمزايدين</span>
                                                                <br>
                                                                <span class="text-danger ps-1 pe-3">
                                                                    @if ($auction->bids->count() > 0)
                                                                        {{ $auction->bids->count() }}
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </span>
                                                            </p>
                                                        </div>
                                                        <div class="mt-3 col-sm-5">
                                                            <p>
                                                                <i class="fas fa-user-clock"></i>
                                                                <span class="fw-bold">أعلى مزايد</span>
                                                                <br>
                                                                <span class="text-danger ps-1 pe-3">
                                                                    @if ($auction->bids->count() > 0)
                                                                        {{ $auction->bids->first()->user->name }}
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <h4 class="text-center">لا يوجد مزادات تم الغائها</h4>
                                        @endif
                                    </div>
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
