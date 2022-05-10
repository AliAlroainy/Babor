@extends('partials.master')
@section('body')
    <div class="main-panel">
        <div class="content-wrapper" style="position: relative">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">عرض تفاصيل المزاد</h4>
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
                                <div class="row">
                                    <div class="col-lg-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col-lg-10 col-md-7 col-12 "
                                                    style="direction:ltr; margin:right 0px;">
                                                    <div class="search-bar-top">
                                                        <div class="">
                                                            <div style="display:flex;flex-direction:row ;padding:1%">
                                                                <div class="col-lg-3">
                                                                    <img style="direction:ltr ;width:100%;left:0px"
                                                                        class="col-lg-4 grid-margin right 0px"
                                                                        src="/images/cars/{{ $auction->car->thumbnail }}"
                                                                        alt="image" />
                                                                </div>
                                                                <div class="col-lg-3 " style="margin:4%;direction:rtl">
                                                                    <h4 class="card-title">
                                                                        {{ $auction->user->name }}
                                                                    </h4>
                                                                    <h4 class="card-title">
                                                                        {{ $auction->car->model }}
                                                                    </h4>
                                                                    <h4 class="card-title">
                                                                        {{ $auction->openingBid }}
                                                                    </h4>
                                                                    <h4 class="card-title text-success">
                                                                        @if ($auction->bids->count() > 0)
                                                                            {{ $auction->bids->first()->currentPrice }}
                                                                        @else
                                                                            {{ $auction->openingBid }}
                                                                        @endif
                                                                    </h4>
                                                                    <h4 class="card-title">
                                                                        @if ($auction->status == '1')
                                                                            <span
                                                                                class="text-danger">{!! $auction->rejectReason !!}</span>
                                                                        @elseif($auction->status == '2' && $auction->bids->count() > 0)
                                                                            {{ $auction->bids->first()->user->name }}
                                                                        @elseif($auction->status == '2' && $auction->bids->count() == 0)
                                                                            -
                                                                        @endif
                                                                    </h4>
                                                                    <h4 class="card-title">
                                                                        {{ $auction->minInc }}
                                                                    </h4>
                                                                    <h4 class="card-title">
                                                                        {{ $auction->reservePrice }}
                                                                    </h4>
                                                                    <h4 class="card-title">
                                                                        {{ $auction->car->color }}
                                                                    </h4>
                                                                    <h4 class="card-title">
                                                                        {{ $auction->car->numberOfKillos }} كيلو </h4>
                                                                    <h4 class="card-title">
                                                                        {{ $auction->car->carPosition }}
                                                                    </h4>
                                                                    <h4 class="card-title">
                                                                        {{ $auction->car->sizOfDamage }}
                                                                    </h4>
                                                                    <h4 class="card-title">
                                                                        {!! $auction->car->description !!}
                                                                    </h4>
                                                                </div>
                                                                <div class="col-lg-3" style="margin:4%;direction:rtl">
                                                                    <h4 class="card-title warning"> صاحب المزاد:</h4>
                                                                    <h4 class="card-title warning"> الموديل:</h4>
                                                                    <h4 class="card-title warning"> السعرالإبتدائي:</h4>
                                                                    <h4 class="card-title warning"> السعرالحالي:</h4>
                                                                    <h4 class="card-title warning">
                                                                        @if ($auction->status == '1')
                                                                            <span class="text-danger"> سبب الرفض </span>
                                                                        @elseif($auction->status == '2')
                                                                            أعلى مزايد:
                                                                        @endif
                                                                    </h4>
                                                                    <h4 class="card-title warning">الحد الادنى للمزايدة :
                                                                    </h4>
                                                                    <h4 class="card-title warning"> السعر الاحتياطي:</h4>
                                                                    <h4 class="card-title warning"> اللون:</h4>
                                                                    <h4 class="card-title warning"> كم كيلو تم قطعه:</h4>
                                                                    <h4 class="card-title warning"> موقع السيارة:</h4>
                                                                    <h4 class="card-title warning"> حجم الضرر:</h4>
                                                                    <h4 class="card-title warning"> الوصف :</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div style="display:flex;flex-direction:row ;padding:1%">
                                                                @php
                                                                    $images = json_decode($auction->car->car_images, false);
                                                                @endphp
                                                                @foreach ($images as $img)
                                                                    <div class="col-lg-3">
                                                                        <img style="direction:ltr ;width:100%;left:0px"
                                                                            class="col-lg-4 grid-margin right 0px"
                                                                            src="/images/cars/car_images/{{ $img }}"
                                                                            alt="image" />
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- container-scroller -->
                    @endsection
