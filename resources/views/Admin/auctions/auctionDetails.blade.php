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
                                    <div class="col-lg-10 grid-margin stretch-card">
                                        <div class=" row">

                                            <div class="col-lg-8">

                                                <div class="col-lg-12 table-responsive" id="filteredSection">
                                                    <table class=" col-lg-10 table table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    التفاصيل
                                                                </th>
                                                                <th>
                                                                    البيانات
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <h4 class="card-title warning" style="color:#eb9023">
                                                                        صاحب المزاد:

                                                                    </h4>
                                                                </td>
                                                                <td>
                                                                    {{ $auction->user->name }}
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>
                                                                    <h4 class="card-title warning" style="color:#eb9023">
                                                                        تاريخ الانتهاء:</h4>

                                                                </td>
                                                                <td>
                                                                    {{ $auction->closeDate }}
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                                <td>
                                                                    <h4 class="card-title warning" style="color:#eb9023">
                                                                        الموديل:</h4>

                                                                </td>
                                                                <td>
                                                                    {{ $auction->car->model }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h4 class="card-title warning" style="color:#eb9023">
                                                                        السعرالإبتدائي:</h4>
                                                                </td>
                                                                <td>
                                                                    {{ $auction->openingBid }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h4 class="card-title warning" style="color:#eb9023">
                                                                        السعرالحالي:</h4>
                                                                </td>
                                                                <td>
                                                                    @if ($auction->bids->count() > 0)
                                                                        {{ $auction->bids->first()->currentPrice }}
                                                                    @else
                                                                        {{ $auction->openingBid }}
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h4 class="card-title warning" style="color:#eb9023">
                                                                        @if ($auction->status == '1')
                                                                            <span class="text-danger"> سبب الرفض </span>
                                                                        @elseif($auction->status == '2')
                                                                            أعلى مزايد:
                                                                        @endif
                                                                    </h4>
                                                                </td>
                                                                <td>
                                                                    @if ($auction->status == '1')
                                                                        <span
                                                                            class="text-danger">{!! $auction->rejectReason !!}</span>
                                                                    @elseif($auction->status == '2' && $auction->bids->count() > 0)
                                                                        {{ $auction->bids->first()->user->name }}
                                                                    @elseif($auction->status == '2' && $auction->bids->count() == 0)
                                                                        -
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h4 class="card-title warning" style="color:#eb9023">
                                                                        الحد الادنى للمزايدة :
                                                                    </h4>
                                                                </td>
                                                                <td>
                                                                    {{ $auction->minInc }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h4 class="card-title warning" style="color:#eb9023">
                                                                        السعر الاحتياطي:</h4>
                                                                </td>
                                                                <td>
                                                                    {{ $auction->reservePrice }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h4 class="card-title warning" style="color:#eb9023">
                                                                        اللون:</h4>
                                                                </td>
                                                                <td>
                                                                    {{ $auction->car->color }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h4 class="card-title warning" style="color:#eb9023"> كم
                                                                        كيلو تم قطعه:</h4>
                                                                </td>
                                                                <td>
                                                                    {{ $auction->car->numberOfKillos }} كيلو
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h4 class="card-title warning" style="color:#eb9023">
                                                                        موقع السيارة:</h4>
                                                                </td>
                                                                <td>
                                                                    {{ $auction->car->carPosition }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h4 class="card-title warning" style="color:#eb9023">
                                                                        حجم الضرر:</h4>
                                                                </td>
                                                                <td>
                                                                    {{ $auction->car->sizOfDamage }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h4 class="card-title warning" style="color:#eb9023">
                                                                        الوصف :</h4>
                                                                </td>
                                                                <td>
                                                                    {!! $auction->car->description !!}
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="col-lg-4">
                                                <img style="direction:ltr ;width:100%;left:0px;border-raduis:1%"
                                                    class="col-lg-4 grid-margin right 0px"
                                                    src="/images/cars/{{ $auction->car->thumbnail }}" alt="image" />
                                            </div>
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
                                                    src="/images/cars/car_images/{{ $img }}" alt="image" />
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
        <!-- container-scroller -->
    @endsection
