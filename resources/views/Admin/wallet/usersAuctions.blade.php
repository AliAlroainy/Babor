@extends('partials.master')
@section('body')
    {{-- style --}}
    @include('Front.user.style.style')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card" style="width: 100%">
                    <div class="cardp d-flex align-items-center justify-content-center">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <h1 class="card-title">
                                <i class="bi bi-people-fill"></i>
                                عمليات المزايدين
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container ">
                <table class="table table-borderless table-responsive card-1 p-4" dir="rtl">
                    <thead class="d-flex justify-content-between">
                        <tr class="w-100 d-flex justify-content-between border-bottom">
                            <th>
                                <span class="ml-2 d-flex flex-column text-muted ">
                                    <i class="bi bi-calendar-date mb-2 " style="color: #F7941D"></i>
                                    التاريخ</span>
                            </th>
                            <th>
                                <span class="ml-2 d-flex flex-column text-muted">
                                    <i class="bi bi-file-person mb-2" style="color: #F7941D"></i>
                                    المشتري</span>
                            </th>
                            <th>
                                <span class="ml-2 d-flex flex-column text-muted">
                                    <i class="bi bi-person-badge mb-2" style="color: #F7941D"></i>
                                    البائع</span>
                            </th>
                            <th>
                                <span class="ml-2 d-flex flex-column text-muted">
                                    <i class="bi bi-coin mb-2" style="color: #F7941D"></i>
                                    السعر</span>
                            </th>
                            <th>
                                <span class="ml-2  d-flex flex-column text-muted">
                                    <i class="bi bi-app-indicator mb-2" style="color: #F7941D"></i>
                                    الحالة</span>
                            </th>
                            <th>
                                <span class="ml-2 d-flex flex-column text-muted">
                                    <i class="bi bi-hand-index  mb-2" style="color: #F7941D"></i>
                                    اجراء</span>
                            </th>
                            <th>
                                <span class="ml-2 d-flex flex-column text-muted">
                                    <i class="bi bi-window mb-2" style="color: #F7941D"></i>
                                    التفاصيل</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="d-flex justify-content-center">
                        @if (isset($bill->contract))
                            @forelse ($bills as $bill)
                                <tr class="border-bottom">
                                    <td>
                                        <div class="p-2">
                                            <span class="d-block font-weight-bold">اليوم</span>
                                            <small>2:30PM</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="p-2 d-flex flex-row align-items-center mb-2">
                                            <img src="/images/profiles/{{ $bill->bid->user->profile->avatar }}" width="40"
                                                class="rounded-circle" />
                                            <div class="d-flex flex-column ml-2">
                                                <span class="d-block font-weight-bold">{{ $bill->bid->user->name }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="p-2 d-flex flex-row align-items-center mb-2">
                                            <img src="/images/profiles/{{ $bill->bid->auction->user->profile->avatar }}"
                                                width="40" class="rounded-circle">
                                            <div class="d-flex flex-column ml-2">
                                                <span
                                                    class="d-block font-weight-bold">{{ $bill->bid->auction->user->name }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="p-2 ">
                                            <p class="font-weight-bold">{{ $bill->bid->currentPrice }}<span
                                                    style="color: #F7941D"></span> </P>
                                        </div>
                                    </td>
                                    <td>

                                        @if ($bill->bid->auction->status == '4')
                                            @if (!isset($bill->contract->seller_confirm) && !isset($bill->contract->buyer_confirm))
                                                <div class="p-2 text-warning d-flex">
                                                    <i class="bi bi-hourglass-split"></i>
                                                    في انتظار توقيع الطرفين
                                                </div>
                                            @elseif(!isset($bill->contract->seller_confirm))
                                                <div class="p-2 text-warning d-flex">
                                                    <i class="bi bi-hourglass-split"></i>
                                                    في انتظار توقيع البائع
                                                </div>
                                            @elseif(!isset($bill->contract->buyer_confirm))
                                                <div class="p-2 text-warning d-flex">
                                                    <i class="bi bi-hourglass-split"></i>
                                                    في انتظار توقيع المشتري
                                                </div>
                                            @elseif($bill->contract->buyer_confirm == '0')
                                                <div class="p-2 text-danger d-flex">
                                                    <i class="bi bi-info-circle"></i>
                                                    تم التراجع من قبل المشتري
                                                </div>
                                            @endif
                                        @else
                                            <div class="p-2 text-success d-flex">
                                                <i class="bi bi-check-all"></i>
                                                مكتملة
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="p-2">
                                            @if ($bill->bid->auction->status == '4')
                                                @if ($bill->contract->buyer_confirm == '0')
                                                    <form action="{{ route('buyerPenalty', $bill->id) }}" method="POST">
                                                        @csrf
                                                        <button
                                                            class="btn alert-secondary mt-2 d-flex align-items-center justify-content-center"
                                                            style="width: 150px" type="submit">
                                                            معاقبة المشتري
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('sellerPenalty', $bill->id) }}" method="POST">
                                                        @csrf
                                                        <button
                                                            class="btn alert-secondary  mt-2 d-flex align-items-center justify-content-center "
                                                            style="width: 150px" type="submit">
                                                            معاقبة البائع
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('sendToBuyer', $bill->id) }}" method="POST">
                                                        @csrf
                                                        <button
                                                            class="btn alert-secondary mt-2 d-flex align-items-center justify-content-center"
                                                            style="width: 150px" type="submit">
                                                            إرجاع المبلغ للمشتري
                                                        </button>
                                                    </form>
                                                @endif
                                            @else
                                                <div class="p-2 text-success d-flex">
                                                    <i class="bi bi-check-all"></i>
                                                    -
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="d-flex flex-column align-items-center justify-content-center">
                                        @if ($bill->bid->auction->status == '4')
                                            @if ($bill->contract->buyer_confirm == '0')
                                                <a href="#rejectReasonModal" class="p-2 font-warining"
                                                    data-bs-toggle="modal">
                                                    سبب الرفض
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                            @endif
                                            <a href="{{ route('show.contract', $bill->id) }}" class="p-2 font-warining"
                                                target="_blank">
                                                صفحة العقد
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('site.auction.details', $bill->bid->auction->id) }}"
                                                class="p-2 font-warining" target="_blank">
                                                صفحة المزاد
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        @else
                            <tr class="border-bottom">
                                <td>
                                    <div class="p-2">
                                        <span class="d-block font-weight-bold">لا يوجد بيانات</span>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="rejectReasonModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header w-100 d-flex align-items-center justify-content-center text-center"
                    style="top:-80px;">
                    <div>
                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                        <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_rdkrsaca.json"
                            background="transparent" speed="1" style="width: 150px; height: 150px;" loop autoplay>
                        </lottie-player>
                    </div>
                </div>
                <div class="modal-body">
                    <h4 class="w-90 m-3" style="font-size: 18px;">
                        @isset($bill->contract)
                            {{ $bill->contract->buyer_undoReason }}
                        @endisset
                    </h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"
                        style="background-color: rgb(205, 205, 205)">إلغاء</button>
                </div>
            </div>
        </div>
    </div>
    <style>
        .card-1 {

            border: none;
            border-radius: 10px;
            width: 100%;
            background-color: #fff;
        }


        .icons i {

            margin-left: 20px;

        }

    </style>
@endsection
