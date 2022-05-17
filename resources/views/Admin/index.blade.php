@extends('partials.master')
@section('body')
    <!-- partial -->
 <!-- Small Stats Blocks -->
 <div class="main-panel">
        <div class="content-wrapper" style="position: relative">
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
                   
                  </div>
                  <div class="progress">
  <div class="progress-bar" role="progressbar" style="width:{{$auction}}%;background:#f79725" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
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
                 
                  </div>
                  <div class="progress">
  <div class="progress-bar" role="progressbar" style="width:{{$service}}%;background:#f79725" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
</div>
                </div>
              </div>
              <div class="col-lg-2 col-md-6 col-sm-6 mb-4 ml-2 mr-2">
                <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex" style="text-align: center;
    direction: ltr;">
                    <div class="d-flex flex-column m-auto pl-5">
                      <div class="stats-small__data text-center mt-2">
                        <span class="stats-small__label text-uppercase"style="color:#f79522">التقييمات</span>
                        <h2 class="stats-small__value count my-3" style="color:green;font-size:40px">{{$service}}</h2>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--decrease"style="color:red">{{$serviceprec}}%</span>
                      </div>
                    </div>
                 
                  </div>
                  <div class="progress">
  <div class="progress-bar" role="progressbar" style="width:{{$service}}%;background:#f79725" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
</div>
                </div>
              </div>

              <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex" style="text-align: center;
    direction: ltr;">
                    <div class="d-flex flex-column m-auto pl-5">
                      <div class="stats-small__data mt-2">
                        <span class="stats-small__label text-uppercase me-2"style="color:#f79522">المستخدمين</span>
                        <h6 class="stats-small__value count my-3"style="color:green;font-size:40px">{{$user}}</h6>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--increase"style="color:red">{{$userper}}%</span>
                      </div>
                    </div>
                  </div>
                  <div class="progress">
  <div class="progress-bar" role="progressbar" style="width:{{$user}}%;background:#f79725" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
</div>
                </div>
              </div>
              
              <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex" style="text-align: center;
    direction: ltr;">
                    <div class="d-flex flex-column m-auto pl-5">
                      <div class="stats-small__data mt-2">
                        <span class="stats-small__label text-uppercase " style="color:#f79522">الاقسام</span>
                        <h6 class="stats-small__value count my-3"style="color:green;font-size:40px">{{$category}}</h6>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--increase"style="color:red">{{$categoryper}}%</span>
                      </div>
                    </div>
                   
                  </div>
                  <div class="progress">
  <div class="progress-bar" role="progressbar" style="width:{{$category}}%;background:#f79725" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
</div>
                </div>
              </div>

              <div class="col-lg-2 col-md-4 col-sm-12 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex" style="text-align: center;
    direction: ltr;">
                    <div class="d-flex flex-column m-auto pl-5">
                      <div class="stats-small__data text-center mt-2">
                        <span class="stats-small__label text-uppercase" style="color:#f79522">الماركات </span>
                        <h6 class="stats-small__value count my-3" style="color:green;font-size:40px">{{$brands}}</h6>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--decrease" style="color:red">{{$brandsper}}%</span>
                      </div>
                    </div>
                  </div>
                  <div class="progress">
  <div class="progress-bar" role="progressbar" style="width:{{$brands}}%;background:#f79725" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
</div>
                </div>
              </div>
              <div class="col-lg-2 col-md-4 col-sm-12 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex" style="text-align: center;
    direction: ltr;">
                    <div class="d-flex flex-column m-auto pl-5">
                      <div class="stats-small__data text-center mt-2">
                        <span class="stats-small__label text-uppercase" style="color:#f79522"> السيارات</span>
                        <h6 class="stats-small__value count my-3" style="color:green;font-size:40px">{{$seris}}</h6>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--decrease" style="color:red">{{$serisper}}%</span>
                      </div>
                    </div>
                  </div>
                  <div class="progress">
  <div class="progress-bar" role="progressbar" style="width:{{$seris}}%;background:#f79725" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
</div>
                </div>
              </div>
           
           
  </div>
<br>
 </div>
</div>
            <!-- End Small Stats Blocks -->
             <!-- End Small Stats Blocks -->
            

        <!-- container-scroller -->
    @endsection
