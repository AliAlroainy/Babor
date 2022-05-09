@extends('partials.usermaster')
@section('body')
    <div class="container mt-2 ">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body dashboard-tabs p-0">
                        <ul class="nav nav-tabs px-4" role="tablist">
                            <li class="nav-item">
                                <a class=" nav-link {{ request()->is('user/auctions/in-progress') ? 'active' : null }}"
                                    id="{{ route('user.show.progress.auction') }}-tab"
                                    href="{{ route('user.show.progress.auction') }}" role="tab">
                                    المزادات الجارية
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class=" nav-link {{ request()->is('user/auctions/completed') ? 'active' : null }}"
                                    id="{{ route('user.show.completed.auction') }}-tab"
                                    href="{{ route('user.show.completed.auction') }}" role="tab">
                                    المزادات المكتملة
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class=" nav-link {{ request()->is('user/auctions/uncompleted') ? 'active' : null }}"
                                    id="{{ route('user.show.uncompleted.auction') }}-tab"
                                    href="{{ route('user.show.uncompleted.auction') }}" role="tab">
                                    المزادات الغير مكتملة
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class=" nav-link {{ request()->is('user/auctions/pending') ? 'active' : null }}"
                                    id="{{ route('user.show.pending.auction') }}-tab"
                                    href="{{ route('user.show.pending.auction') }}" role="tab">
                                    المزادات التي في انتظار المسئول
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class=" nav-link {{ request()->is('user/auctions/disapproved') ? 'active' : null }}"
                                    id="{{ route('user.show.disapproved.auction') }}-tab"
                                    href="{{ route('user.show.disapproved.auction') }}" role="tab">
                                    المزادات المرفوضة
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class=" nav-link {{ request()->is('user/auctions/canceled') ? 'active' : null }}"
                                    id="{{ route('user.show.canceled.auction') }}-tab"
                                    href="{{ route('user.show.canceled.auction') }}" role="tab">
                                    المزادات الملغاة
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
                                                    <div class="mt-1">
                                                        <h4 class="mt-1 car_name">
                                                            {{ $auction->car->brand->name }}
                                                            {{ $auction->car->series->name }}
                                                            {{ $auction->car->model }}
                                                        </h4>
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
                                                                        لا يوجد مزايدين إلى الآن
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
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade {{ request()->is('user/auctions/completed') ? 'show active' : null }}"
                                id="{{ route('user.show.progress.auction') }}" role="tabpanel"
                                aria-labelledby="{{ route('user.show.progress.auction') }}-tab">
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
                                                    <div class="mt-1">
                                                        <h4 class="mt-1 car_name">
                                                            {{ $auction->car->brand->name }}
                                                            {{ $auction->car->series->name }}
                                                            {{ $auction->car->model }}
                                                        </h4>
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
                                                                        لا يوجد مزايدين إلى الآن
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
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade {{ request()->is('user/auctions/uncompleted') ? 'show active' : null }}"
                                id="{{ route('user.show.uncompleted.auction') }}" role="tabpanel"
                                aria-labelledby="{{ route('user.show.uncompleted.auction') }}-tab">
                                <div class="container my-5">
                                    <div class="row">
                                        @if (isset($auctions) && $auctions->count() > 0)
                                            @foreach ($auctions as $auction)
                                                <div
                                                    class="col-md-6 col-lg-4 col-xl-4 p-5 bg-white d-flex flex-column  shadow rounded">
                                                    <div class="mt-1 text-center">
                                                        <img class="img-fluid img-responsive rounded product-image"
                                                            src="/images/cars/{{ $auction->car->thumbnail }}"
                                                            alt="car image" width="100">
                                                    </div>
                                                    <div class="mt-1">
                                                        <h4 class="mt-1 car_name">
                                                            {{ $auction->car->brand->name }}
                                                            {{ $auction->car->series->name }}
                                                            {{ $auction->car->model }}
                                                        </h4>
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
                                                                        لا يوجد مزايدين إلى الآن
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
                                                            {{-- {{ $auction->bids->first()->user->profile }} --}}
                                                            <a style="width: fit-content"
                                                                href="{{ route('user.visit.profile', $auction->bids->first()->user->id) }}"
                                                                class="mt-3 btn btn-inverse-info btn-rounded">
                                                                بروفايل آخر مزايد
                                                                <i class="fad fa-solid fa-stop pe-2"
                                                                    style="font-size: 12px ;"></i>
                                                            </a>
                                                        @endif
                                                    </div>

                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade {{ request()->is('user/auctions/pending') ? 'show active' : null }}"
                                id="{{ route('user.show.progress.auction') }}" role="tabpanel"
                                aria-labelledby="{{ route('user.show.progress.auction') }}-tab">
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
                                                    <div class="mt-1">
                                                        <h4 class="mt-1 car_name">
                                                            {{ $auction->car->brand->name }}
                                                            {{ $auction->car->series->name }}
                                                            {{ $auction->car->model }}
                                                        </h4>
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
                                                                        لا يوجد مزايدين إلى الآن
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
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ request()->is('user/auctions/disapproved') ? 'show active' : null }}"
                                id="{{ route('user.show.progress.auction') }}" role="tabpanel"
                                aria-labelledby="{{ route('user.show.progress.auction') }}-tab">
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
                                                    <div class="mt-1">
                                                        <h4 class="mt-1 car_name">
                                                            {{ $auction->car->brand->name }}
                                                            {{ $auction->car->series->name }}
                                                            {{ $auction->car->model }}
                                                        </h4>
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
                                                                        لا يوجد مزايدين إلى الآن
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
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade {{ request()->is('user/auctions/canceled') ? 'show active' : null }}"
                                id="{{ route('user.show.progress.auction') }}" role="tabpanel"
                                aria-labelledby="{{ route('user.show.progress.auction') }}-tab">
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
                                                    <div class="mt-1">
                                                        <h4 class="mt-1 car_name">
                                                            {{ $auction->car->brand->name }}
                                                            {{ $auction->car->series->name }}
                                                            {{ $auction->car->model }}
                                                        </h4>
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
                                                                        لا يوجد مزايدين إلى الآن
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
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade {{ request()->is('user/auctions/subscribed_auction') ? 'show active' : null }}"
                                id="{{ route('user.show.subscribed.auction') }}" role="tabpanel"
                                aria-labelledby="{{ route('user.show.subscribed.auction') }}-tab">

                                <div class="auctions">
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
                                                                    <p class="old_price">
                                                                        {{ $auction->openingBid }}
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
