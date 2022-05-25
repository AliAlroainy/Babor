@extends('partials.usermaster')
@section('body')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row ">
                <div class="col-lg-12 grid-margin stretch-card" style="width: 100%">
                    <div class="cardp d-flex align-items-center justify-content-center">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <h1 class="card-title">
                                <i class="bi bi-cash-stack"></i>
                                المحفظة
                            </h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7 col-12">
                    <div class="">
                        <div class="col-12 mb-4">
                            <div class="row box-right me-0 ms-0 w-100">
                                <div class="col-md-8 ps-0 ">
                                    <p class="ps-3 text-muted fw-bold h6 mb-0">اجمالي الرصيد</p>
                                    <p class="h1 fw-bold d-flex"> <span
                                            class=" fas fa-dollar-sign text-muted pe-1 h6 align-text-top mt-1"></span>
                                        {{-- <span class="text-muted">58.</span> --}}
                                        {{ $balance }}
                                    </p>
                                    <p class="ms-3 mt-5 px-2 rouned-btn bg-green">غذي حسابك</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="p-blue"><span class="fas fa-circle pe-2"></span> الداخل </p>
                                    <p class="fw-bold mb-3">
                                        {{-- <span class="text-muted">.{{ $gains - intval($gains) }}</span> --}}
                                        <span class="fas fa-dollar-sign pe-1"></span>{{ $gains }}
                                    </p>
                                    <p class="p-org"><span class="fas fa-circle pe-2"></span> الخارج </p>
                                    <p class="fw-bold">
                                        {{-- <span class="text-muted">.{{ $loses - intval($loses) }}</span> --}}
                                        <span class="fas fa-dollar-sign pe-1"></span>{{ $loses }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 px-0 mb-4">
                            <div class="box-right me-3">
                                <div class="d-flex pb-2">
                                    <p class="fw-bold h7">
                                        <i class="bi bi-clock-history"></i>
                                        <span class="text-muted">المحفظة/</span>
                                        العمليات المالية
                                    </p>
                                </div>
                                @forelse($operations as $item)
                                    @if (isset($item->meta['bid']))
                                        @php
                                            $bid = \App\Models\Bid::where('id', $item->meta['bid'])->first();
                                        @endphp
                                        <div class="bg-blue p-3 mb-3">
                                            <p class="h6 text-muted"> مزايدة على
                                                {{ $bid->auction->type_and_model() }} بتكلفة
                                                {{ $bid->getDeduction() }}
                                                @if ($bid->refund == '1')
                                                    <small class="text-danger">
                                                        <i class="fas fa-undo"></i>
                                                        تمت الاستعادة
                                                    </small>
                                                @endif
                                            </p>
                                            <div class="d-flex">
                                                @if ($bid->auction->status == '4')
                                                    @if (isset($bid->payment_bill) && $bid->payment_bill->payment_status == 0)
                                                        <p>
                                                            <a href="{{ $bid->auction->next_url }}" target="_blank"
                                                                class="ms-3 px-2 rouned-btn bg-main border-none text-decoration-none shadow">شراء</a>
                                                        </p>
                                                    @endif
                                                @endif
                                                <p>
                                                    <a href="{{ route('site.auction.details', $bid->auction->id) }}"
                                                        class="ms-3 mt-5 px-2 rouned-btn bg-green text-decoration-none">
                                                        التفاصيل
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    @elseif(isset($item->meta['buy']))
                                        @php
                                            $bill = \App\Models\Payment_Bill::with('contract')
                                                ->where('id', $item->meta['buy'])
                                                ->first();
                                        @endphp
                                        <div class="bg-blue p-3 mb-3">
                                            <p class="h6 text-muted"> شراء
                                                {{ $bill->bid->auction->car->category->name }} -
                                                {{ $bill->bid->auction->type_and_model() }}
                                                بقيمة
                                                (<span class="text-danger">{{ $bill->bid->currentPrice }}</span> ر.ي)
                                                @if ($bill->contract->buyer_confirm == '0')
                                                    <small class="text-danger">
                                                        <i class="fas fa-undo"></i>
                                                        تم التراجع
                                                    </small>
                                                @endif
                                            </p>
                                            @if ($bill->bid->auction->status == '4')
                                                @if (!isset($bill->contract->buyer_confirm))
                                                    <a href="{{ route('do.contract', $bill->id) }}"
                                                        class="ms-3 mt-5 px-2 rouned-btn bg-main text-decoration-none shadow">
                                                        توقيع العقد
                                                    </a>
                                                @elseif($bill->contract->buyer_confirm == '0')
                                                    <small class="text-danger">
                                                        <i class="fa fa-spinner" aria-hidden="true"></i>
                                                        <a href="{{ route('do.contract', $bill->id) }}"
                                                            class="text-danger text-decoration-none">
                                                            في انتظار استرداد المبلغ
                                                        </a>
                                                    </small>
                                                @elseif(!isset($bill->contract->seller_confirm))
                                                    <small class="text-danger">
                                                        <i class="fa fa-spinner" aria-hidden="true"></i>
                                                        <span class="text-danger text-decoration-none">
                                                            في انتظار توقيع صاحب السيارة
                                                        </span>
                                                    </small>
                                                    <a href="{{ route('do.contract', $bill->id) }}"
                                                        class="mx-1 mt-5 px-2 rouned-btn bg-green text-decoration-none">
                                                        العقد
                                                    </a>
                                                @endif
                                            @elseif($bill->bid->auction->status == '5')
                                                @if ($bill->contract->buyer_confirm == '1' && $bill->contract->buyer_confirm == '1')
                                                    <small class="text-success">
                                                        <i class="fa fa-check"></i>
                                                        تمت البيعة
                                                    </small>
                                                @elseif($bill->contract->buyer_confirm == '0')
                                                    @php
                                                        $tran = \Bavix\Wallet\Models\Transaction::where(['type' => 'deposit', 'wallet_id' => $bill->bid->user->id])
                                                            ->where('meta->unbuy', $bill->id)
                                                            ->first();
                                                    @endphp
                                                    <!-- Button trigger modal -->
                                                    <a class="mx-1 mt-5 px-2 rouned-btn bg-red text-white text-decoration-none cursor-pointer"
                                                        data-bs-toggle="modal" href="#"
                                                        data-bs-target="#unbbuyReason-{{ $bill->id }}">
                                                        <small>
                                                            <i class="fa fa-check"></i>
                                                            تم استرداد المبلغ
                                                        </small>
                                                    </a>
                                                    <!-- Modal -->
                                                    <div id="unbbuyReason-{{ $bill->id }}" class="modal fade">
                                                        <div class="modal-dialog modal-confirm">
                                                            <div class="modal-content">
                                                                <div class="modal-header w-100 d-flex align-items-center justify-content-center text-center"
                                                                    style="top:-80px;">
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p class="fw-bold h2">
                                                                        إرجاع المبلغ إلى المشتري
                                                                    </p>
                                                                    <p class="mt-5 h7 text-center"> العملية رقم :
                                                                        <i class="bi bi-receipt"></i>
                                                                        #{{ $tran->uuid }}
                                                                    </p>
                                                                    <p class="h7">سبب التراجع :
                                                                        {{ $bill->contract->buyer_undoReason }}</p>
                                                                    <p class="h7">اسم المستحق:
                                                                        {{ $bill->bid->user->name }}</p>
                                                                    <p class="h7 mb-2">المبلغ المستحق :
                                                                        <span>{{ $tran->amount }} ريال
                                                                            يمني
                                                                        </span>
                                                                    </p>
                                                                    <p class="textmuted h7 mb-2">تاريخ الاستحقاق :
                                                                        <small>{{ $tran->created_at->locale('ar')->dayName }}</small>
                                                                        -
                                                                        <small>{{ $tran->created_at->format('d/m/Y') }}</small>
                                                                    </p>
                                                                    <p class="text-danger h7 mb-2">الخصومات :
                                                                    <div class="row m-0 border mb-3">
                                                                        <div class="col-2 h8 pe-0 ps-2">
                                                                            <p class="text-muted py-2">العناصر</p>
                                                                            <span class="d-block py-2 border-bottom h8">
                                                                                أرباح الموقع
                                                                            </span>
                                                                            <span class="d-block py-2 border-bottom h8">
                                                                                تعويض البائع
                                                                            </span>
                                                                        </div>
                                                                        <div class="col-6 text-center p-0">
                                                                            <p class="text-muted p-2">الاسم</p>
                                                                            <span class="d-block p-2 border-bottom h8">موقع
                                                                                بابور</span>
                                                                            <span
                                                                                class="d-block p-2 border-bottom h8">{{ $bill->bid->auction->user->name }}</span>
                                                                        </div>
                                                                        <div class="col-2 p-0 text-center h8 border-end">
                                                                            <p class="text-muted p-2">المبلغ</p>
                                                                            <span class="d-block border-bottom h8 py-2">
                                                                                {{ $bill->bid->auction->commission }}
                                                                            </span>
                                                                            <span class="d-block border-bottom h8 py-2">
                                                                                {{ $bill->bid->auction->commission }}
                                                                            </span>
                                                                        </div>
                                                                        <div class="col-2 p-0 text-center">
                                                                            <p class="text-muted p-2">العملة</p>
                                                                            <span class="d-block py-2 border-bottom h8">
                                                                                ر.ي
                                                                            </span>
                                                                            <span class="d-block py-2 border-bottom h8">
                                                                                ر.ي
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex h7 mb-2">
                                                                        <p class="ms-5">الاجمالي الكلي للخصومات
                                                                        </p>
                                                                        <p class="ms-auto">
                                                                            <span>{{ $bill->bid->auction->commission * 2 }}</span>
                                                                        </p>
                                                                    </div>
                                                                    </p>
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
                                                <a href="{{ route('do.contract', $bill->id) }}"
                                                    class="mx-1 mt-5 px-2 rouned-btn bg-green text-decoration-none">
                                                    العقد
                                                </a>
                                            @endif
                                            <a href="{{ route('user.wallet', $bill->id) }}"
                                                class="mt-5 px-2 rouned-btn bg-green text-decoration-none">
                                                الفاتورة
                                            </a>
                                            <a href="{{ route('site.auction.details', $bill->bid->auction->id) }}"
                                                class="ms-3 mt-5 px-2 rouned-btn bg-green text-decoration-none">
                                                التفاصيل
                                            </a>
                                            <div id="billShow" class="modal fade">
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
                                        </div>
                                    @elseif(isset($item->meta['sell']))
                                        @php
                                            $bill = \App\Models\Payment_Bill::with('contract')
                                                ->where('id', $item->meta['sell'])
                                                ->first();
                                        @endphp
                                        <div class="bg-blue p-3 mb-3">
                                            <p class="h6 text-muted">
                                                بيع
                                                {{ $bill->bid->auction->car->category->name }} -
                                                {{ $bill->bid->auction->type_and_model() }}
                                                بقيمة
                                                (<span
                                                    class="text-danger">{{ $bill->bid->currentPrice - $bill->bid->auction->commission }}</span>
                                                ر.ي)
                                            </p>
                                            @if ($bill->bid->auction->status == '4')
                                                @if (!isset($bill->contract->seller_confirm))
                                                    <a href="{{ route('do.contract', $bill->id) }}"
                                                        class="ms-3 mt-5 px-2 rouned-btn bg-main text-decoration-none">
                                                        توقيع العقد
                                                    </a>
                                                    <a href="{{ route('site.auction.details', $bill->bid->auction->id) }}"
                                                        class="ms-3 mt-5 px-2 rouned-btn bg-green text-decoration-none">
                                                        التفاصيل
                                                    </a>
                                                @elseif(!isset($bill->contract->buyer_confirm))
                                                    <small class="text-danger">
                                                        <i class="fa fa-spinner" aria-hidden="true"></i>
                                                        <a href="{{ route('do.contract', $bill->id) }}"
                                                            class="text-danger text-decoration-none">
                                                            في انتظار توقيع الفائز بالمزاد
                                                        </a>
                                                    </small>
                                                @endif
                                            @elseif($bill->bid->auction->status == '5')
                                                <small class="text-success">
                                                    <i class="fa fa-check"></i>
                                                    تمت العملية بنجاح
                                                    <a href="{{ route('do.contract', $bill->id) }}"
                                                        class="mx-1 mt-5 px-2 rouned-btn bg-green text-decoration-none">
                                                        العقد
                                                    </a>
                                                </small>
                                                <a href="{{ route('site.auction.details', $bill->bid->auction->id) }}"
                                                    class="mt-5 px-2 rouned-btn bg-green text-decoration-none">
                                                    التفاصيل
                                                </a>
                                                <div id="billShow" class="modal fade">
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
                                        </div>
                                    @elseif(isset($item->meta['compensation']))
                                        @php
                                            $bill = \App\Models\Payment_Bill::with('contract')
                                                ->where('id', $item->meta['compensation'])
                                                ->first();
                                        @endphp
                                        <div class="bg-blue p-3 mb-3">
                                            <p class="h6 text-muted">
                                                تعويض مبلغ وقدره(<span
                                                    class="text-danger">{{ $bill->bid->auction->commission }}ر.ي</span>)
                                                عن مزاد
                                                {{ $bill->bid->auction->car->category->name }} -
                                                {{ $bill->bid->auction->type_and_model() }}
                                                تم التراجع عنه
                                            </p>
                                            <a href="{{ route('do.contract', $bill->id) }}"
                                                class="mx-1 mt-5 px-2 rouned-btn bg-green text-decoration-none">
                                                العقد
                                            </a>
                                            <a href="{{ route('site.auction.details', $bill->bid->auction->id) }}"
                                                class="ms-3 mt-5 px-2 rouned-btn bg-green text-decoration-none">
                                                التفاصيل
                                            </a>
                                        </div>
                                    @endif
                                @empty
                                    <div class="bg-blue p-2 mb-3">
                                        <p class="h6 text-muted">لا يوجد أي عمليات مالية لديك </p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5  ">
                    <div class="box-left">
                        <div class="d-flex">
                            <i class="bi bi-receipt"></i>
                            <p class="text-muted h8 me-3"> الفاتورة
                                #{{ $billPaper->invoice_reference ?? '' }}</p>
                        </div>
                        <p class="fw-bold h7">شراء {{ $billPaper->bid->auction->car->category->name ?? '' }}
                            @isset($billPaper)
                                {{ $billPaper->bid->auction->type_and_model() }}
                            @endisset
                        </p>
                        <p class="text-muted h8">البائع : {{ $billPaper->bid->auction->user->name ?? '' }} </p>
                        <p class="text-muted h8">المشتري: {{ $billPaper->bid->user->name ?? '' }}
                        </p>
                        <p class="text-muted h8 mb-2">التاريخ :
                            {{ $billPaper->created_at ?? '' }}</p>
                        <div class="h8">
                            <div class="row m-0 border mb-3">
                                <div class="col-6 h8 pe-0 ps-2">
                                    <p class="text-muted py-2">العناصر
                                    </p>
                                    <span
                                        class="d-block py-2 border-bottom">{{ $billPaper->bid->auction->car->category->name ?? '' }}
                                        @isset($billPaper)
                                            {{ $billPaper->bid->auction->type_and_model() }}
                                        @endisset
                                    </span>
                                </div>
                                <div class="col-2 text-center p-0">
                                    <p class="text-muted p-2">الكمية</p>
                                    <span class="d-block p-2 border-bottom">
                                        @isset($billPaper)
                                            {{ $billPaper->count() }}
                                        @endisset
                                    </span>
                                </div>
                                <div class="col-2 p-0 text-center h8 border-end">
                                    <p class="text-muted p-2">السعر</p>
                                    <span class="d-block border-bottom py-2">
                                        {{ $billPaper->bid->currentPrice ?? '' }}
                                    </span>
                                </div>
                                <div class="col-2 p-0 text-center">
                                    <p class="text-muted p-2">الاجمالي
                                    </p>
                                    <span class="d-block py-2 border-bottom">
                                        {{ $billPaper->bid->currentPrice ?? '' }}
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex h7 mb-2">
                                <p class="ms-5">الاجمالي
                                    الكلي:</p>
                                <p class="ms-auto">
                                    {{ $billPaper->bid->currentPrice ?? '' }}
                                </p>
                            </div>
                            <div class="h8 mb-5">
                                <p> التفاصيل </p>
                                <p class="text-muted"> وسيلة الدفع
                                    منصة وصل</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rokkitt:wght@100;400&display=swap');

        * {
            margin: 0;
            padding: 0;
        }


        .cardp {
            height: 220px;
            width: 100%;
            border-radius: 10px;
            background-image: linear-gradient(to top right, #393938, #F7941D);
            padding: 10px;
            padding-right: 20px;
            padding-left: 20px;
            color: #fff;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .cardp .line-1 {
            height: 200px;
            width: 200px;
            display: flex;
            clip-path: polygon(50% 0%, 15% 100%, 78% 100%);
            opacity: 0.6;
            background: #1e45b3;
            position: absolute;
            bottom: 90px;
            right: -30px;
            transform: rotate(45deg);
            animation: anim 3s infinite;


        }

        .cardp .line-2 {
            height: 300px;
            width: 300px;
            display: flex;
            clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
            opacity: 0.4;
            background: #1e45b3;
            position: absolute;
            top: -30px;
            right: -30px;
            transform: rotate(70deg);
            animation: anim 3s infinite;
            animation-delay: 2s;
        }

        .cardp .line-3 {
            height: 200px;
            width: 200px;
            display: flex;
            clip-path: polygon(100% 0, 0 55%, 78% 100%);
            opacity: 0.3;
            background: #1e45b3;
            position: absolute;
            top: -30px;
            right: -30px;
            transform: rotate(70deg);
            animation: anim 3s infinite;
            animation-delay: 4s;
        }

        @keyframes anim {
            from {
                opacity: 0.3;
                transform: rotate(0deg);

            }

            to {
                opacity: 0.8;
                transform: rotate(180deg);

            }
        }



        .visa h4 {
            font-size: 40px;
            font-family: 'Rokkitt', serif;

        }

        .visa span {
            margin-left: 2px;
            font-family: 'Rokkitt', serif;
        }

        .visa img {
            width: 50px;
        }

        .cardp .visa i {
            font-size: 50px;

        }

        .tick {
            height: 25px;
            width: 25px;
            background-color: #7587c5;
            border-radius: 7px;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 15px;
            margin-top: 6px;
        }

        .tick i {
            transition: all 1s;
        }

        .cardp:hover .tick i {

            transform: rotate(360deg);
        }

        .top-row {
            display: flex;
            justify-content: space-between;

            position: relative;

        }

        .bottom-row {
            display: flex;
            flex-direction: row;
            align-items: center;
            position: absolute;
            bottom: 20px;

        }

        .bottom-row .dots {
            display: flex;
            flex-direction: row;
            margin-right: 7px;
        }

        .bottom-row .dots span {
            height: 6px;
            width: 6px;
            background-color: #fff;
            border-radius: 50%;
            margin: 0 2px;
        }

        .bottom-row .number {
            font-size: 20px;
            font-weight: 600;
        }


        .box-right {
            padding: 30px 25px;
            background-color: white;
            border-radius: 10px;
            margin-left: 16px;
        }

        .box-left {
            padding: 20px 20px;
            background-color: white;
            border-radius: 10px
        }

        .rouned-btn {
            padding: 3px 0;
            display: inline;
            border-radius: 25px;
            font-size: 14px
        }

        .bg-green {
            background-color: #d4f8f2;
            color: #02b05c;
        }

        .bg-red {
            background-color: #e35d64;
            color: #a81a21;
        }

        .bg-main {
            background-color: #f79522;
            color: white;
        }

        .p-blue {
            font-size: 12px;
            color: #1976d2
        }

        .fas.fa-circle {
            font-size: 12px
        }

        .p-org {
            font-size: 14px;
            color: #fbc02d
        }

        .h7 {
            font-size: 15px
        }

        .h8 {
            font-size: 12px
        }

        .h9 {
            font-size: 10px
        }

        .bg-blue {
            background-color: #dfe9fc9c;
            border-radius: 5px
        }



        .far.fa-credit-card {
            position: absolute;
            top: 10px;
            padding: 0 15px
        }

        .fas,
        .far {
            cursor: pointer
        }

        .cursor {
            cursor: pointer
        }

        .btn.btn-primary {
            box-shadow: none;
            height: 40px;
            padding: 11px
        }

        .bg.btn.btn-primary {
            background-color: transparent;
            border: none;
            color: #1976d2
        }

        .bg.btn.btn-primary:hover {
            color: #539ee9
        }

    </style>
@endsection
