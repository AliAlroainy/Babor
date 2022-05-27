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
                <table class="table table-borderless table-responsive card-1  p-4 w-100 text-center" dir="rtl">
                    <thead>
                        <tr class="border-bottom">
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
                    <tbody>
                        @forelse ($bills as $bill)
                            @if (isset($bill->contract))
                                <tr class="border-bottom">
                                    <td>
                                        <div class="p-2">
                                            <small>{{ $bill->contract->created_at->locale('ar')->dayName }}</small>
                                            <br>
                                            <small>{{ $bill->contract->created_at->format('d-m-Y') }}</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="p-2 d-flex flex-row align-items-center">
                                            <div class="d-flex flex-column ml-2">
                                                <span class="d-block font-weight-bold">{{ $bill->bid->user->name }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="p-2 d-flex flex-row align-items-center">
                                            <div class="d-flex flex-column ml-2">
                                                <span
                                                    class="d-block font-weight-bold">{{ $bill->bid->auction->user->name }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="p-2 ">
                                            <p class="font-weight-bold">{{ $bill->bid->currentPrice }}$<span
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
                                                    <i class="bi bi-info-circle ps-1"></i>
                                                    تم التراجع من قبل المشتري
                                                </div>
                                            @endif
                                        @else
                                            <div class="p-2 text-success d-flex">
                                                مكتملة
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div>
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
                                                    <form action="{{ route('sendToSeller', $bill->id) }}" method="POST">
                                                        @csrf
                                                        <button
                                                            class="btn alert-secondary mt-2 d-flex align-items-center justify-content-center"
                                                            style="width: 150px" type="submit">
                                                            إرجاع المبلغ للبائع
                                                        </button>
                                                    </form>
                                                @endif
                                            @else
                                                @if ($bill->contract->buyer_confirm == '1')
                                                    @if ($bill->contract->seller_confirm == 1)
                                                        <div class="alert alert-success p-2 text-success d-flex">
                                                            <span>
                                                                <i class="bi bi-check-all"></i>
                                                                تم البيع
                                                            </span>
                                                        </div>
                                                    @elseif(!isset($bill->contract->seller_confirm))
                                                        <div
                                                            class="alert alert-success p-2 text-success text-center d-flex">
                                                            <i class="bi bi-check-all"></i>
                                                            تم البيع بدون تأكيد البائع
                                                        </div>
                                                    @endif
                                                @elseif ($bill->contract->buyer_confirm == '0')
                                                    <div class="alert alert-danger p-2 text-danger text-center d-flex">
                                                        <i class="bi bi-info-circle ps-1"></i>
                                                        تم التراجع من قبل المشتري
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </td>
                                    <td class="d-flex flex-column align-items-center justify-content-center">
                                        @if ($bill->contract->buyer_confirm == '0')
                                            <a href="#rejectReasonModal-{{ $bill->id }}" class="p-2 font-warining"
                                                data-bs-toggle="modal">
                                                سبب الرفض
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <div id="rejectReasonModal-{{ $bill->id }}" class="modal fade">
                                                <div class="modal-dialog modal-confirm">
                                                    <div class="modal-content">
                                                        <div class="modal-header w-100 d-flex align-items-center justify-content-center text-center"
                                                            style="top:-80px;">
                                                            <div>
                                                                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                                                                <lottie-player
                                                                    src="https://assets9.lottiefiles.com/packages/lf20_rdkrsaca.json"
                                                                    background="transparent" speed="1"
                                                                    style="width: 150px; height: 150px;" loop autoplay>
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
                                                            <button type="button" class="btn btn-outline-danger"
                                                                data-bs-dismiss="modal"
                                                                style="background-color: rgb(205, 205, 205)">إلغاء</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                    </td>
                                </tr>
                            @else
                                <tr class="border-bottom">
                                    <td>
                                        <div class="p-2">
                                            <span class="d-block font-weight-bold">لا يوجد بيانات</span>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @empty
                        @endforelse

                    </tbody>
                </table>
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
