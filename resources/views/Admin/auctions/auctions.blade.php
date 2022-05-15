@extends('partials.master')
@livewireStyles
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
                                

                            @livewire('filter-auction')

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
                                            <tr
                                                class="series {{ $auction->car->series->name }}  brand {{ $auction->car->brand->name }} state  {{ \App\Models\Auction::matchAuctionStatus($auction->status) }} ">
                                                <div class="  ">
                                                    <td style="text-align:center">

                                                        <h5> {{ $auction->car->brand->name }}</h5>
                                                    </td>
                                                    <td style="text-align:center">

                                                        <h5> {{ $auction->car->series->name }} </h5>
                                                    </td>
                                                    <td style="text-align:center">
                                                        <h5> {{ $auction->closeDate }}</h5>
                                                    </td>
                                                    <td style="text-align:center">
                                                        <h5> {{ $auction->winner }}</h5>
                                                    </td>
                                                    <td style="text-align:center">
                                                        <h5>
                                                            {{ \App\Models\Auction::matchAuctionStatus($auction->status) }}
                                                        </h5>
                                                    </td>
                                                    <td style="text-align:center">
                                                        <a href="{{ route('admin.auction.details', $auction->id) }}"
                                                            class="btn     "
                                                            style="font-size:12px;
                                                                                                width: fit-content; font-size: 25px ;color:#f79522 ">
                                                            <h5> المزيد ..<i class="fa-solid fa-angles-left"></i></h5>
                                                        </a>

                                                    </td>
                                                    <td class="status status_filed">
                                                        @if ($auction->status == '0')
                                                            <div class="d-flex">
                                                                <form
                                                                    action="{{ route('admin.auction.action', $auction->id) }}"
                                                                    method="POST" class="d-flex justify-content-center">
                                                                    @csrf
                                                                    <button type="submit" name="approve"
                                                                        style="color:#71c016;"
                                                                        class="fs-25px btn btn-rounded fa-solid fa-circle-check">
                                                                    </button>
                                                                </form>
                                                                <form
                                                                    action="{{ route('admin.auction.action', $auction->id) }}"
                                                                    method="POST" class="d-flex justify-content-center">
                                                                    @csrf
                                                                    <span style="color:#ff4747;"
                                                                        class="fs-25px btn btn-rounded fa-solid fa-circle-xmark"
                                                                        data-bs-target="#rejectReason-{{ $auction->id }}"
                                                                        data-bs-toggle="modal">
                                                                    </span>
                                                                    <div class="modal fade"
                                                                        id="rejectReason-{{ $auction->id }}"
                                                                        tabindex="-1" aria-hidden="true">
                                                                        <div class="modal-dialog"
                                                                            style="max-width: 800px;" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel1">بيان سبب
                                                                                        الرفض</h5>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="row">
                                                                                        <div class="col mb-3">
                                                                                            <label for="editTitle"
                                                                                                class="form-label"> اكتب
                                                                                                السبب من فضلك
                                                                                            </label>
                                                                                            <input type="hidden"
                                                                                                name="disapprove">
                                                                                            <div
                                                                                                class="col-12 w-100  mb-4 d-flex justify-content-center align-items-center">
                                                                                                <textarea style="width: 100%;" name="reject_reason" class="form-control myTextarea" cols="30"
                                                                                                    rows="10">{!! old('reject_reason') !!}</textarea>
                                                                                                @error('reject_reason')
                                                                                                    {{ $message }}
                                                                                                @enderror
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-outline-danger"
                                                                                        data-bs-dismiss="modal">إلغاء</button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-warning text-white">حفظ</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        @elseif($auction->status == '2')
                                                            <form
                                                                action="{{ route('admin.auction.action', $auction->id) }}"
                                                                method="POST" class="d-flex justify-content-center">
                                                                @csrf
                                                                <span style="color:#ff4747;"
                                                                    class="fs-25px btn btn-rounded fa-solid fa-circle-xmark"
                                                                    data-bs-target="#rejectReason-{{ $auction->id }}"
                                                                    data-bs-toggle="modal">
                                                                </span>
                                                                <div class="modal fade"
                                                                    id="rejectReason-{{ $auction->id }}" tabindex="-1"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" style="max-width: 800px;"
                                                                        role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel1">بيان سبب
                                                                                    الرفض</h5>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div class="col mb-3">
                                                                                        <label for="editTitle"
                                                                                            class="form-label"> اكتب
                                                                                            السبب من فضلك
                                                                                        </label>
                                                                                        <input type="hidden"
                                                                                            name="disapprove">
                                                                                        <div
                                                                                            class="col-12 w-100  mb-4 d-flex justify-content-center align-items-center">
                                                                                            <textarea style="width: 100%;" name="reject_reason" class="form-control myTextarea" cols="30"
                                                                                                rows="10">{!! old('reject_reason') !!}</textarea>
                                                                                            @error('reject_reason')
                                                                                                {{ $message }}
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-outline-danger"
                                                                                    data-bs-dismiss="modal">إلغاء</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-warning text-white">حفظ</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        @endif
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
    @endsection
    @livewireScripts