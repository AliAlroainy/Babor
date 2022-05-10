@extends('partials.master')
@section('body')
    <div class="main-panel">
        <div class="content-wrapper" style="position: relative">
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-lg-12 col-md-7 col-12 " style="direction:ltr ;margin: right 0px;">

                            </div>
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
                                                    style="direction:ltr ;margin: right 0px;">
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
                                                                        @if ($auction->bids->count() > 0)
                                                                            {{ $auction->bids->first()->user->name }}
                                                                        @else
                                                                            <span class="text-danger">لا يوجد مزايدين إلى
                                                                                الآن</span>
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
                                                                        {{ \App\Models\Car::matchSizOfDamageValue($auction->car->sizOfDamage) }}
                                                                    </h4>
                                                                    <h4 class="card-title">
                                                                        {!! $auction->car->description !!}
                                                                    </h4>
                                                                </div>
                                                                <div class="col-lg-3" style="margin:4%;direction:rtl">
                                                                    <h4 class="card-title"  style="color:#eb9023"> صاحب المزاد:</h4>
                                                                    <h4 class="card-title warning"  style="color:#eb9023"> الموديل:</h4>
                                                                    <h4 class="card-title warning"  style="color:#eb9023"> السعرالإبتدائي:</h4>
                                                                    <h4 class="card-title warning"  style="color:#eb9023"> السعرالحالي:</h4>
                                                                    <h4 class="card-title warning"  style="color:#eb9023"> أعلى مزايد:</h4>
                                                                    <h4 class="card-title warning" style="color:#eb9023">الحد الادنى للمزايدة :
                                                                    </h4>
                                                                    <h4 class="card-title warning" style="color:#eb9023"> السعر الاحتياطي:</h4>
                                                                    <h4 class="card-title warning"style="color:#eb9023"> اللون:</h4>
                                                                    <h4 class="card-title warning"style="color:#eb9023"> كم كيلو تم قطعه:</h4>
                                                                    <h4 class="card-title warning"style="color:#eb9023"> موقع السيارة:</h4>
                                                                    <h4 class="card-title warning"style="color:#eb9023"> حجم الضرر:</h4>
                                                                    <h4 class="card-title warning"style="color:#eb9023"> الوصف :</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div style="display:flex;flex-direction:row ;padding:1%">
                                                                @php
                                                                    $images = json_decode($auction->car->car_images, true);
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
