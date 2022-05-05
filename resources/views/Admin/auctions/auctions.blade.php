@extends('partials.master')
@section('body')
    <!-- partial -->

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper" style="position: relative">
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-lg-12 col-md-7 col-12 " style="direction:ltr ;margin: right 0px;">
                                <div class="search-bar-top">
                                    <div class="search-bar">
                                        <h4 class="card-title">عرض بحسب</h4>
                                        <select id="filter-auction" class="filter form-select">
                                            <option selected="selected" value="0"> اسم السيارة</option>
                                            <option value="سنتافي">سنتافي </option>
                                            <option value="برادو">برادو </option>
                                            <option value="توسان"> توسان</option>
                                            <option value="كامري"> كامري</option>

                                        </select>

                                        <select id="filter-brand" class="filter1 form-select">
                                            <option selected="selected" value="0"> ماركة السيارة</option>
                                            <option value="تويوتا"> تويوتا</option>
                                            <option value="هونداي"> هونداي</option>
                                            <option value="كيا"> كيا</option>
                                            <option value="مرسديس"> مرسديس</option>

                                        </select>
                                        <select id="filter-status" class="filter2 form-select">
                                            <option selected="selected" value="0"> حالة المزاد</option>
                                            <option value="مفعل">مفعل </option>
                                            <option value="غيرمفعل"> غيرمفعل</option>

                                        </select>
                                    </div>

                                </div>
                            </div>
                            <h4 class="card-title">عرض المزادات</h4>
                            @if (session()->has('errorEdit'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session()->get('errorEdit') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session()->has('successAdd'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{ session()->get('successAdd') }}
                                    <button type=" button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session()->has('errorAdd'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{ session()->get('errorAdd') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <ul class="m-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                الصورة
                                            </th>
                                            <th>
                                                ماركة السيارة
                                            </th>
                                            <th>
                                                اسم السيارة
                                            </th>
                                            <th>
                                                الموديل
                                            </th>
                                            <th>
                                                السعر الابتدائي
                                            </th>
                                            <th>
                                                تاريخ البدء
                                            </th>
                                            <th>
                                                تاريخ الانتهاء
                                            </th>
                                            <th>
                                                السعر الاحتياطي
                                            </th>
                                            <th>
                                                اقل قيمة للمزايدة </th>
                                            <th>
                                                الفائز بالمزاد </th>
                                            <th>
                                                نسبة الموقع </th>
                                            <th>
                                                مبلغ التأمين
                                            </th>

                                            <th>
                                                حالة المزاد </th>
                                        </tr>
                                    </thead>
                                    <tbody class="Auction_card">
                                        @foreach ($auctions as $auction)
                                            <tr>
                                                <td>
                                                    <img src="/images/cars/{{ $auction->car->thumbnail }}" alt="image" />
                                                </td>
                                                <td class="brand brand_filed ">
                                                    {{ $auction->car->brand->name }}
                                                </td>
                                                <td class="name Auction_filed ">
                                                    {{ $auction->car->series->name }}
                                                </td>
                                                <td>
                                                    {{ $auction->car->model }}
                                                </td>
                                                <td>
                                                    {{ $auction->openingBid }}
                                                </td>
                                                <td>
                                                    {{ $auction->startDate }}
                                                </td>
                                                <td>
                                                    {{ $auction->closeDate }}
                                                </td>
                                                <td>
                                                    {{ $auction->reservePrice }}
                                                </td>
                                                <td>
                                                    {{ $auction->minInc }}
                                                </td>
                                                <td>
                                                    {{ $auction->winnerPrice }}
                                                </td>
                                                <td>
                                                    {{ $auction->winner }}
                                                </td>
                                                <td>
                                                    {{ $auction->commission }}
                                                </td>
                                                <td>
                                                    {{ $auction->securityDeposit }}
                                                </td>
                                                <td class="status status_filed">
                                                    <form action="{{ route('admin.auction.action', $auction->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @if ($auction->status == '0')
                                                            <button style="width: fit-content"
                                                                class="
                                                            btn d-flex align-items-center
                                                             btn-inverse-success
                                                             btn-fw btn-rounded ">
                                                                رفض
                                                                <i class="fa-solid fa-trash pe-2"
                                                                    style="font-size: 12px ;"></i>
                                                            </button>
                                                        @else
                                                            <button style="width: fit-content"
                                                                class="
                                                            btn d-flex align-items-center
                                                             btn-inverse-danger
                                                             btn-fw btn-rounded ">
                                                                موافقة
                                                                <i class="fas fa-trash-restore pe-2"
                                                                    style="font-size: 12px ;"></i>
                                                            </button>
                                                        @endif
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>




        </div>

        <!-- container-scroller -->
    @endsection
