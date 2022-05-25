@extends('partials.usermaster')
@section('body')

    {{-- style --}}
    @include('Front.user.style.style')

    <div class="main-panel">
        <div class="content-wrapper" style="position: relative">

            <div class="row  ">

                <div class="col-lg-12 grid-margin stretch-card" style="width: 100%">
                    <div class="cardp d-flex align-items-center justify-content-center">
                        <div class="card-body d-flex  align-items-center justify-content-center">

                            <h1 style="margin-top:-40px">
                                <i class="fas fa-money-bill-alt  me-3 ms-3"></i>
                                مزايداتي
                            </h1>


                        </div>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-lg-12 col-md-7 col-12 " style="direction:ltr ;margin: right 0px;">
                                <div class="search-bar-top">

                                </div>
                            </div>
                            @if (session()->has('notFound'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session()->get('notFound') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session()->has('sendMoney'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{ session()->get('sendMoney') }}
                                    <button type=" button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session()->has('errorPayment'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    {{ session()->get('errorPayment') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                صاحب المزاد
                                            </th>
                                            <th>
                                                سعر المزايدة التي زايدت بها
                                            </th>
                                            <th>
                                                هل انتهى المزاد؟
                                            </th>
                                            <th>
                                                هل فزت بالمزاد؟
                                            </th>
                                            <th>
                                                وقت المزايدة
                                            </th>
                                            <th>
                                                رابط المزاد
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($bids) && $bids->count() > 0)
                                            @foreach ($bids as $bid)
                                                <tr>
                                                    <td class="py-1">
                                                        {{ $bid->auction->user->name }}
                                                    </td>
                                                    <td>
                                                        {{ $bid->bidPrice }}
                                                    </td>
                                                    <td>
                                                        @if ($bid->auction->status == '2')
                                                            <span class="text-success">ليس بعد</span>
                                                        @elseif($bid->auction->status == '3')
                                                            <span class="text-success">أُلغي المزاد</span>
                                                        @elseif ($bid->auction->status == '4' || $bid->auction->status == '5')
                                                            <span class="text-success">نعم</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($bid->auction->status == '2')
                                                            <span class="text-success">ليس بعد</span>
                                                        @elseif($bid->auction->status == '3')
                                                            <span class="text-success">أُلغي المزاد</span>
                                                        @elseif ($bid->auction->status == '4' || $bid->auction->status == '5')
                                                            @if ($bid->auction->winner_id == Auth::id())
                                                                <div class="d-flex justify-content-center">
                                                                    @if (!isset($bid->payment_bill))
                                                                        <span class="text-success">نعم</span>
                                                                    @else
                                                                        <span class="text-success">نعم، </span>
                                                                        @if ($bid->payment_bill->payment_status == 0)
                                                                            {{-- <form
                                                                                action="{{ route('user.buy.auction', $bid->auction->id) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="next_url"
                                                                                    value="{{ $bid->auction->next_url }}">
                                                                                <input type="submit"
                                                                                    class="ms-3 px-2 rouned-btn bg-main border-none"
                                                                                    value="شراء">
                                                                            </form> --}}
                                                                            <a href="{{ $bid->auction->next_url }}"
                                                                                target="_blank"
                                                                                class="me-1 py-1 px-2 rouned-btn bg-main border-none text-decoration-none shadow">
                                                                                شراء </a>
                                                                        @elseif(!isset($bid->payment_bill->contract->buyer_confirm))
                                                                            <a href="{{ route('do.contract', $bid->payment_bill->id) }}"
                                                                                class="me-1 py-1 px-2 rouned-btn bg-main border-none text-decoration-none shadow">
                                                                                توقيع العقد
                                                                            </a>
                                                                        @elseif($bid->payment_bill->contract->buyer_confirm == '0')
                                                                            <span
                                                                                class="me-1 py-1 px-2 rouned-btn bg-danger text-white border-none text-decoration-none">وتم
                                                                                التراجع عن
                                                                                الشراء من قبلك </span>
                                                                        @elseif($bid->payment_bill->contract->buyer_confirm == '1')
                                                                            <span
                                                                                class="me-1 py-1 px-2 rouned-btn bg-success text-white border-none text-decoration-none">
                                                                                وتمت البيعة
                                                                            </span>
                                                                        @endif
                                                                    @endif
                                                                </div>
                                                            @else
                                                                <span class="text-danger">لا</span>
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $bid->created_at }}
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('site.auction.details', $bid->auction->id) }}">{{ $bid->auction->type_and_model() }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <!-- container-scroller -->
    @endsection
    <style>
        .rouned-btn {
            padding: 3px 0;
            display: inline;
            border-radius: 25px;
            font-size: 11px
        }

        .bg-green {
            background-color: #d4f8f2;
            color: #02b05c;
        }

        .bg-main {
            background-color: #f79522;
            color: white;
        }

        .p-blue {
            font-size: 12px;
            color: #1976d2
        }

    </style>
