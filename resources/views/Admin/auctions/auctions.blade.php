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
                                        <div style="display:flex;flex-direction:row ;padding:1%">
                                            <div class="col-lg-3">
                                            <select class="form-select" id="filterByCar" onchange="searchFilter()">
                    <option value="" selected>اسم السيارة</option>
                    <option value="توسان">توسان</option>
                    <option value="سنتافي">سنتافي</option>
                    <option value="برايد">برايد</option>
                    <option value="كامري">كامري</option>
                    <option value="نافارا">نافارا</option>
                    <option value="تورس">تورس</option>
                    <option value="النترا">النترا</option>
                    <option value="باترول">باترول</option>
                    <option value="رافور">رافور</option>
                    <option value="اكسنت">اكسنت</option>
                    <option value="سوناتا">سوناتا</option>

                </select>
                                            </div>
                                            <div class="col-lg-3">
                                            <select class="form-select" id="filterByBrand" onchange="searchFilterBrand()">
                    <option value="" selected>ماركة السيارة</option>
                    <option value= "هوانداي"> هوانداي</option>
                    <option value="تويوتا">تويوتا</option>
                    <option value="مرسيدس">مرسيدس</option>
                    <option value="كيا">كيا</option>
                    <option value="فورد">فورد</option>
                    <option value="GMC">GMC</option>
                    <option value="نيسان">نيسان</option>
                    <option value="BMW">BMW</option>
                    <option value="سوزوكي">سوزوكي</option>

                </select>
                                            </div>
                                            <div class="col-lg-3 ">
                                            <select class="form-select" id="filterByState" onchange="searchFilterState()">
                                                    <option value="" selected="selected" > حالة المزاد</option>
                                                    @foreach (\App\Models\Auction::getAuctionStatusValues() as $key => $value)
                                                        <option value="{{ $value }}">
                                                            {{ $value }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
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

                                            <th style="text-align:center">
                                                ماركة السيارة
                                            </th>
                                            <th style="text-align:center">
                                                اسم السيارة
                                            </th>
                                            <th style="text-align:center">
                                                تاريخ الانتهاء
                                            </th>

                                            <th style="text-align:center">
                                                الفائز بالمزاد
                                            </th>
                                            <th style="text-align:center">
                                                حالة المزاد
                                            </th>
                                            <th style="text-align:center">
                                                تفاصيل
                                            </th>
                                            <th style="text-align:center">
                                                عمليات
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody class="Auction_card">
                                        @foreach ($auctions as $auction)
                                            <tr class="series {{ $auction->car->series->name }}  brand {{ $auction->car->brand->name }} state  {{ \App\Models\Auction::matchAuctionStatus($auction->status) }} ">
                                                <div class="  ">
                                                <td style="text-align:center">

                                                       <h5> {{ $auction->car->brand->name }}</h5>
                                                </td>
                                                <td style="text-align:center">

                                                       <h5> {{ $auction->car->series->name }} </h5>
                                                </td>
                                                <td style="text-align:center">
                                                  <h5>  {{ $auction->closeDate }}</h5>
                                                </td>
                                                <td  style="text-align:center">
                                                  <h5 >  {{ $auction->winner }}</h5>
                                                </td>
                                                <td style="text-align:center" >
                                                    <h5 >
                                                        {{ \App\Models\Auction::matchAuctionStatus($auction->status) }}
                                                    </h5>
                                                </td>
                                                <td style="text-align:center">
                                                    <a href="{{ route('admin.auction.details', $auction->id) }}"
                                                        class="btn     " style="font-size:12px;
                                                        width: fit-content; font-size: 25px ;color:#f79522 "
                                                        >                                                                 
  <h5>  المزيد   ..<i class="fa-solid fa-angles-left">   </i></h5>
                                                         </a>
                                                        
                                                </td>
                                                <td class="status status_filed" style="text-align:center">
                                                    <form action="{{ route('admin.auction.action', $auction->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @if ($auction->status == '0')
                                                        <div style="display:flex;flex-direction:row">
                                                            <button type="submit" name="approve" style="width: fit-content"
                                                                class="
                                                            btn d-flex align-items-center
                                                             btn-inverse-success
                                                             btn-fw btn-rounded"
                                                                value="موافقة"></button>
                                                            <button type="submit" name="disapprove"
                                                            style="width: fit-content; font-size: 30px ;color:#ff4747;align:center"
                                                        class="btn d-flex align-items-center
                                                                    font-weight-inverse-success
                                                              btn-rounded  fa-solid fa-circle-xmark  pe-2"
                                                                value="رفض"></button>
</div>
                                                        @elseif($auction->status == '1')
                                                              <button type="submit" name="approve" style="width: fit-content; font-size: 30px ;color:#ff4747;align:center"
                                                        class="btn d-flex align-items-center
                                                                    font-weight-inverse-success
                                                              btn-rounded  fa-solid fa-ban  pe-2" value="توقيف"
                                                              
                                                                > </button>
                                                        @elseif($auction->status == '2')
                                                            <button type="submit" name="disapprove"
                                                            style="width: fit-content; font-size: 30px ;color:#71c016;align:center"
                                                        class="btn d-flex align-items-center
                                                                    font-weight-inverse-success
                                                              btn-rounded  fa-solid  fa-circle-check pe-2" value="قبول"></button>
                                                        @endif
                                                    </form>
                                                    <!-- fa-circle-ellipsis -->
                                                </td>
</div>
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
