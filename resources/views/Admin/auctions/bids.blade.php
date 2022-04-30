@extends('partials.master')
@section('body')
    <!-- partial -->

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper" style="position: relative">
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <div class="col-lg-12 col-md-7 col-12 " style="direction:ltr ;margin: right 0px;">
                        <div class="search-bar-top">
                            
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
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                البائع
                                            </th>
                                            <th>
                                                 الفائز بالمزاد
                                            </th>
                                            <th>
                                                السعر الحالي
                                            </th>
                                            <th>
                                                 وقت انتهاء المزاد
                                            </th>
                                            <th>
                                                 رابط  المزاد
                                            </th>
                                        </tr>
                                    </thead>
                                   
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
