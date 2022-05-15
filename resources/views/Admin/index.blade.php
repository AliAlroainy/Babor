@extends('partials.master')
@section('body')
    <!-- partial -->
 <!-- Small Stats Blocks -->
 <div style="display:flex;flex-direction:row">

 <div class="row">
 
              <div class="col-lg-2 col-md-6 col-sm-6 mb-4  ml-2">
                <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex" style="text-align: center;
    ">
                    <div class="d-flex flex-column m-auto pl-5">
                      <div class="stats-small__data text-center mt-2">
                        <span class=" text-uppercase " style="color:#f79522;">المزادات</span>
                        <h2 class="stats-small__value count my-3"style="color:green;font-size:40px">{{$auction}}</h2>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--increase"style="color:red">{{$prec}}%</span>
                      </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-2"></canvas>
                  </div>
                </div>
              </div>

              <div class="col-lg-2 col-md-6 col-sm-6 mb-4 ml-2 mr-2">
                <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex" style="text-align: center;
    direction: ltr;">
                    <div class="d-flex flex-column m-auto pl-5">
                      <div class="stats-small__data text-center mt-2">
                        <span class="stats-small__label text-uppercase"style="color:#f79522">الخدمات</span>
                        <h2 class="stats-small__value count my-3" style="color:green;font-size:40px">{{$service}}</h2>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--decrease"style="color:red">{{$serviceprec}}%</span>
                      </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-3"></canvas>
                  </div>
                </div>
              </div>

              <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex" style="text-align: center;
    direction: ltr;">
                    <div class="d-flex flex-column m-auto pl-5">
                      <div class="stats-small__data mt-2">
                        <span class="stats-small__label text-uppercase"style="color:#f79522">المستخدمين</span>
                        <h6 class="stats-small__value count my-3"style="color:green;font-size:40px">{{$user}}</h6>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--increase"style="color:red">{{$userper}}%</span>
                      </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-4"></canvas>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex" style="text-align: center;
    direction: ltr;">
                    <div class="d-flex flex-column m-auto pl-5">
                      <div class="stats-small__data mt-2">
                        <span class="stats-small__label text-uppercase " style="color:#f79522">المفضلة</span>
                        <h6 class="stats-small__value count my-3"style="color:green;font-size:40px">{{$auction}}</h6>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--increase"style="color:red">{{$auction}}%</span>
                      </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-4"></canvas>
                  </div>
                </div>
              </div>

              <div class="col-lg-2 col-md-4 col-sm-12 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex" style="text-align: center;
    direction: ltr;">
                    <div class="d-flex flex-column m-auto pl-5">
                      <div class="stats-small__data text-center mt-2">
                        <span class="stats-small__label text-uppercase" style="color:#f79522">البلاغات</span>
                        <h6 class="stats-small__value count my-3" style="color:green;font-size:40px">{{$auction}}</h6>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--decrease" style="color:red">{{$auction}}%</span>
                      </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-5"></canvas>
                  </div>
                </div>
              </div>

            </div>
</div>
<br>
            <!-- End Small Stats Blocks -->
             <!-- End Small Stats Blocks -->
            

        <!-- container-scroller -->
    @endsection
