<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
@extends('partials.master')
@section('body')
    <div class="main-panel">
        <div class="content-wrapper" style="position: relative">
            <div class="card">
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-12">
                        <table class="table table-responsive table-striped table-hover">
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
                                            <span class="text-danger">{!! $auction->rejectReason !!}</span>
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
                    <div class="col-lg-4 col-md-12 mt-5">
                        <img style="direction:ltr ;width:600px;border-raduis:1%" class="img-fluid"
                            src="/images/cars/{{ $auction->car->thumbnail }}" alt="image" />
                        <div id="demo" class="carousel slide" data-ride="carousel">
                            <br>
                            <h6 style="direction:rtl;margin-left:20%">عرض المزيد من الصور</h6>
                            <!-- Indicators -->
                            <ul class="carousel-indicators">
                                <li data-target="#demo" data-slide-to="0" class="active">
                                </li>
                                <li data-target="#demo" data-slide-to="1"></li>
                                <li data-target="#demo" data-slide-to="2"></li>
                            </ul>
                            <!-- The slideshow -->
                            <div class="carousel-inner" style="width:400px;">
                                <div class="carousel-item active">
                                    <img src="/images/cars/{{ $auction->car->thumbnail }}" class="img-fluid"
                                        style="width:100%;height:50%" alt="" width="1100" height="500">
                                </div>
                                @php
                                    $images = json_decode($auction->car->car_images, true);
                                @endphp
                                @foreach ($images as $img)
                                    <div class="carousel-item">
                                        <img src="/images/cars/car_images/{{ $img }}" alt="car img"
                                            class="img-fluid" width="1100" height="500" style="width:100%">
                                    </div>
                                @endforeach
                            </div>
                            <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-scroller -->
    @endsection
