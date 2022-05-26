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
                                <i class="bi bi-cash-stack"></i>
                                الرصيد
                            </h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <div class="row box-right me-0 ms-0 w-100">
                        <div class="col-md-8 ps-0 ">
                            <p class="ps-3 text-muted fw-bold h6 mb-0">اجمالي الرصيد</p>
                            <p class="fw-bold d-flex">
                                {{-- <span class="text-muted">58.</span> --}}
                                <span class="h1">{{ $balance }}</span>
                                <small class="text-muted h7"> ر.ي </small>
                            </p>
                            <p class="ms-3 mt-5 px-2 rouned-btn bg-green">غذي حسابك</p>
                        </div>
                        <div class="col-md-4">
                            <p class="p-blue"><span class="fas fa-circle pe-2"></span> الأرباح </p>
                            <p class="fw-bold mb-3">
                                {{-- <span class="text-muted">.{{ $gains - intval($gains) }}</span> --}}
                                {{ $gains }}
                                <span class="text-muted h8">ر.ي</span>
                            </p>
                            <p class="p-org"><span class="fas fa-circle pe-2"></span> إيداع المزايدات </p>
                            <p class="fw-bold">
                                {{ $bidding_money }}
                                <span class="text-muted h8">ر.ي</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 px-0 mb-4">
                    <div class="box-right">
                        <div class="d-flex pb-2">
                            <p class="fw-bold h7">
                                <i class="bi bi-clock-history"></i>
                                <span class="textmuted">المحفظة/</span>العمليات المالية
                            </p>
                            <p class="ms-auto p-blue"> </p>
                        </div>
                        {{-- table --}}
                        <table class="table align-middle mb-0 bg-white">
                            <thead class="bg-light">
                                <tr>
                                    <th>#</th>
                                    <th>المرسل</th>
                                    <th>المبلغ</th>
                                    <th>المستفيد</th>
                                    <th>السبب</th>
                                    <th>التاريخ</th>
                                    <th>تفاصيل</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($tran = 0; $tran < $operations->count(); $tran++)
                                    @php
                                        $users = \App\Models\User::get(); //::table('users');
                                    @endphp
                                    <tr>
                                        <td>
                                            {{ $tran + 1 }}
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div class="ms-3">
                                                        <p class="fw-bold mb-1">
                                                            @if ($operations[$tran]->type == 'withdraw')
                                                                {{ $users->where('id', $operations[$tran]->wallet_id)->first()->name }}
                                                            @else
                                                                {{-- {{ $users->where('id', $operations[$tran + 1]->wallet_id)->first()->name }} --}}
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{ abs($operations[$tran]->amount) }}
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div class="ms-3">
                                                        <p class="fw-bold mb-1">
                                                            @if ($operations[$tran]->type == 'deposit')
                                                                {{ $users->where('id', $operations[$tran]->wallet_id)->first()->name }}
                                                            @else
                                                                @if ($tran != $operations->count() - 1)
                                                                    {{ $users->where('id', $operations[$tran + 1]->wallet_id)->first()->name }}
                                                                @endif
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        @if (isset($operations[$tran]->meta['bid']))
                                            <td>مزايدة</td>
                                        @elseif (isset($operations[$tran]->meta['unbid']))
                                            <td>إرجاع قيمة المزايدة</td>
                                        @elseif (isset($operations[$tran]->meta['buy']))
                                            <td>شراء مزاد </td>
                                        @elseif (isset($operations[$tran]->meta['unbuy']))
                                            <td>تراجع عن شراء مزاد من قبل المشتري</td>
                                        @elseif (isset($operations[$tran]->meta['unsell']))
                                            <td>تراجع عن شراء مزاد من قبل المشتري</td>
                                        @elseif (isset($operations[$tran]->meta['commission']))
                                            <td>ارباح الموقع</td>
                                        @elseif (isset($operations[$tran]->meta['compensation']))
                                            <td>تعويض صاحب المزاد</td>
                                        @elseif (isset($operations[$tran]->meta['penalty-commission']))
                                            <td>أرباح الموقع من البائع</td>
                                        @endif
                                        <td>
                                            {{ $operations[$tran]->created_at }}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-link btn-sm btn-rounded">
                                                المزاد
                                            </button>
                                        </td>
                                        @php
                                            $tran += 1;
                                        @endphp
                                    </tr>

                                    {{-- <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                                                    style="width: 45px; height: 45px" class="rounded-circle" />
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1">jone</p>
                                                    <p class="text-muted mb-0">john.doe@gmail.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            231531 $
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                                                    style="width: 45px; height: 45px" class="rounded-circle" />
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1">John Doe</p>
                                                    <p class="text-muted mb-0">john.doe@gmail.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Senior</td>
                                        <td>

                                            22-5-2020
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-link btn-sm btn-rounded">
                                                المزاد
                                            </button>

                                        </td>
                                    </tr> --}}
                                @endfor
                            </tbody>
                        </table>
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

        /* @keyframes anim{
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         from{
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             opacity:0.3;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          transform:rotate(0deg);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         to{
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             opacity:0.8;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             transform:rotate(180deg);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     } */
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
            margin-left: 6px;
        }

        .box-left {
            padding: 20px 20px;
            background-color: white;
            border-radius: 10px
        }

        .rouned-btn {
            background-color: #d4f8f2;
            padding: 3px 0;
            display: inline;
            border-radius: 25px;
            font-size: 11px
        }

        .bg-green {
            color: #06e67a;
        }

        .bg-main {
            color: #f79522;
        }

        .p-blue {
            font-size: 14px;
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
