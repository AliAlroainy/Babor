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
            <div class="col-lg-10 col-md-7 col-12 " style="direction:ltr ;margin: right 0px;">
                <div class="search-bar-top">
                    <div class="">
                        <div style="display:flex;flex-direction:row ;padding:1%">
                        <div class="col-lg-3">
                        <img style="direction:ltr ;width:100%;left:0px" class="col-lg-4 grid-margin right 0px"
                             src="/images/profiles/1651016298.png" alt="image" />
</div> 
                        <div class="col-lg-3 " style="margin:4%;direction:rtl" >
<h4 class="card-title">2013 </h4>
<h4 class="card-title">300$ </h4>
<h4 class="card-title">2700$  </h4>
<h4 class="card-title">200$  </h4>
<h4 class="card-title">200$  </h4>
<h4 class="card-title">اسود  </h4>
<h4 class="card-title"> 3000 كيلو  </h4>
<h4 class="card-title">اليمن-تعز  </h4>
<h4 class="card-title">متوسط  </h4>
</div>
<div class="col-lg-3" style="margin:4%;direction:rtl">
<h4 class="card-title  warning" > الموديل:</h4>
<h4 class="card-title warning"> السعرالإبتدائي:</h4>
<h4 class="card-title warning"> السعرالحالي:</h4>
<h4 class="card-title warning">"الحد الادنى للمزايدة :</h4>
<h4 class="card-title warning"> السعر الاحتياطي:</h4>
<h4 class="card-title warning"> اللون:</h4>
<h4 class="card-title warning"> كم كيلو تم قطعه:</h4>
<h4 class="card-title warning"> موقع السيارة:</h4>
<h4 class="card-title warning"> حجم الضرر:</h4>

</div>
</div>
                    </div>
                    <div class="">
                        <div style="display:flex;flex-direction:row ;padding:1%">
                        <div class="col-lg-3">
                        <img style="direction:ltr ;width:100%;left:0px" class="col-lg-4 grid-margin right 0px"
                             src="/images/profiles/1651016298.png" alt="image" />
</div> 
<div class="col-lg-3">
                        <img style="direction:ltr ;width:100%;left:0px" class="col-lg-4 grid-margin right 0px"
                             src="/images/profiles/1651016298.png" alt="image" />
</div> 
<div class="col-lg-3">
                        <img style="direction:ltr ;width:100%;left:0px" class="col-lg-4 grid-margin right 0px"
                             src="/images/profiles/1651016298.png" alt="image" />
</div> 
<div class="col-lg-3">
                        <img style="direction:ltr ;width:100%;left:0px" class="col-lg-4 grid-margin right 0px"
                             src="/images/profiles/1651016298.png" alt="image" />
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




        </div>

        <!-- container-scroller -->
    @endsection
