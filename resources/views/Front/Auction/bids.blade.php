@extends('partials.usermaster')
@section('body')
    <div class="main-panel">
        <div class="content-wrapper" style="position: relative">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-lg-12 col-md-7 col-12 " style="direction:ltr ;margin: right 0px;">
                                <div class="search-bar-top">
                                    <div class="search-bar">
                                        <h4 class="card-title">عرض بحسب</h4>
                                        <select>
                                            <option selected="selected"> الكل</option>
                                            <option>اسم البائع</option>
                                            <option>تاريخ الانتهاء</option>
                                            <option> سعر المزايدة</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <h4 class="card-title">عرض المزايدات</h4>
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
                                                        @if ($bid->auction->status == '4' || $bid->auction->status == '5')
                                                            <span class="text-success">نعم</span>
                                                        @else
                                                            <span class="text-success">لا</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($bid->auction->status == '4' || $bid->auction->status == '5')
                                                            {{-- @if ($bid->acution->winner == Auth::id())
                                                                <span class="text-success">نعم</span>
                                                            @else
                                                                <span class="text-success">لا</span>
                                                            @endif --}}
                                                        @else
                                                            <span class="text-success">لا</span>
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