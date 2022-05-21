@extends('partials.master')
@section('body')
    {{-- style --}}
    @include('Front.user.style.style')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row ">

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
                        @forelse ($trans as $tran)
                            <tr class="border-bottom">
                                <td>
                                    <div class="p-2">
                                        <span class="d-block font-weight-bold">اليوم</span>
                                        <small>2:30PM</small>
                                    </div>
                                </td>
                                <td>
                                    <div class="p-2 d-flex flex-row align-items-center mb-2">
                                        <img src="/images/profiles/{{ $tran->bid->user->profile->avatar }}" width="40"
                                            class="rounded-circle" />
                                        <div class="d-flex flex-column ml-2">
                                            <span class="d-block font-weight-bold">{{ $tran->bid->user->name }}</span>
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    <div class="p-2 d-flex flex-row align-items-center mb-2">
                                        <img src="/images/profiles/{{ $tran->bid->auction->user->profile->avatar }}"
                                            width="40" class="rounded-circle">
                                        <div class="d-flex flex-column ml-2">
                                            <span
                                                class="d-block font-weight-bold">{{ $tran->bid->auction->user->name }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="p-2 ">
                                        <p class="font-weight-bold">{{ $tran->bid->currentPrice }}<span
                                                style="color: #F7941D"></span> </P>
                                    </div>
                                </td>
                                <td>
                                    @if ($tran->bid->auction->status == '4')
                                        @if (!isset($tran->contract->seller_confirm) && !isset($tran->contract->buyer_confirm))
                                            <div class="p-2 text-warning d-flex">
                                                <i class="bi bi-hourglass-split"></i>
                                                في انتظار توقيع الطرفين
                                            </div>
                                        @elseif(!isset($tran->contract->seller_confirm))
                                            <div class="p-2 text-warning d-flex">
                                                <i class="bi bi-hourglass-split"></i>
                                                في انتظار توقيع البائع
                                            </div>
                                        @elseif(!isset($tran->contract->buyer_confirm))
                                            <div class="p-2 text-warning d-flex">
                                                <i class="bi bi-hourglass-split"></i>
                                                في انتظار توقيع المشتري
                                            </div>
                                        @else
                                            <div class="p-2 text-success d-flex ">
                                                <i class="bi bi-check-all"></i>
                                                مكتملة
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
                                    <div class="p-2 ">
                                        @if ($tran->bid->auction->status == '4')
                                            @if ($tran->contract->buyer_confirm == '1' && $tran->contract->seller_confirm == '1')
                                                <form action="{{ route('sendToSeller', $tran->id) }}" method="POST">
                                                    @csrf
                                                    <button
                                                        class="btn alert-secondary mt-2 d-flex align-items-center justify-content-center"
                                                        style="width: 150px" type="submit">
                                                        ارجاع المبلغ للبائع
                                                    </button>
                                                </form>
                                            @elseif($tran->contract->seller_confirm == '1')
                                                @if ($tran->contract->seller_confirm == '0')
                                                    <form action="{{ route('sendToSeller', $tran->id) }}" method="POST">
                                                        @csrf
                                                        <button
                                                            class="btn alert-secondary mt-2 d-flex align-items-center justify-content-center"
                                                            style="width: 150px" type="submit">
                                                            ارجاع المبلغ للبائع
                                                        </button>
                                                    </form>
                                                    <a class="btn alert-secondary  mt-2 d-flex align-items-center justify-content-center "
                                                        style="width: 150px" href="{{ route('sendToBuyer', $tran->id) }}">
                                                        ارجاع المبلغ للمشتري </a>
                                                @else
                                                    <form action="{{ route('sendToSeller', $tran->id) }}" method="POST">
                                                        @csrf
                                                        <button
                                                            class="btn alert-secondary mt-2 d-flex align-items-center justify-content-center"
                                                            style="width: 150px" type="submit">
                                                            تحويل المبلغ للبائع
                                                        </button>
                                                    </form>
                                                @endif
                                            @endif
                                        @else
                                            <div class="p-2 text-success d-flex">
                                                <i class="bi bi-check-all"></i>
                                                -
                                            </div>
                                        @endif
                                    </div>
                                </td>

                                <td>
                                    <a href="{{ route('show.contract', $tran->id) }}" class="p-2 font-warining"
                                        target="_blank">
                                        عرض صفحة العقد
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>

                            </tr>
                        @empty
                        @endforelse



                        <tr class="border-bottom">
                            <td>
                                <div class="p-2">
                                    <span class="d-block font-weight-bold">اليوم</span>
                                    <small>2:30PM</small>
                                </div>
                            </td>
                            <td>
                                <div class="p-2 d-flex flex-row align-items-center mb-2">
                                    <img src="/img/ali.jpg" width="40" class="rounded-circle" />
                                    <div class="d-flex flex-column ml-2">
                                        <span class="d-block font-weight-bold">علي الرعيني </span>
                                    </div>
                                </div>

                            </td>
                            <td>
                                <div class="p-2 d-flex flex-row align-items-center mb-2">
                                    <img src="/img/jihad.jpg" width="40" class="rounded-circle">
                                    <div class="d-flex flex-column ml-2">
                                        <span class="d-block font-weight-bold"> ابرار الخرساني </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="p-2 d-flex flex-column">
                                    <span> حي المسبح - تعز ,اليمن</span>
                                </div>
                            </td>
                            <td>
                                <div class="p-2 ">
                                    <p class="font-weight-bold"> 345345 <span style="color: #F7941D">$</span> </P>
                                </div>
                            </td>
                            <td>
                                <div class="p-2 text-success d-flex ">
                                    <i class="bi bi-check-all"></i>
                                    مكتملة
                                </div>
                            </td>
                            <td>
                                <div class="p-2 ">
                                    <div class="alert alert-success  d-flex align-items-center justify-content-center "
                                        style="width: 150px">
                                        <i class="bi bi-check-all"></i>
                                        تم البيع
                                    </div>
                                </div>
                            </td>

                            <td>
                                <a href="#" class="p-2 font-warining ">
                                    عرض التفاصيل
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>

                        </tr>







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
