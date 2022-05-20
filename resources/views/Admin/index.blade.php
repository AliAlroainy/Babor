<script src="https://d3js.org/d3.v4.min.js"></script>
  <script src=
"https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.js"></script>
  <link
    rel="stylesheet"
    href=
"https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.css"
  />
  <link
    rel=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
    type="text/css"
  />
  
  <script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
  </script>
  <script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
  </script>
  
  <script src=
"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.1/Chart.min.js">
  </script>
@extends('partials.master')
@section('body')

{{-- style --}}
@include('Front.user.style.style')


    <!-- partial -->
 <!-- Small Stats Blocks -->
 <div class="main-panel">
        <div class="content-wrapper" style="position: relative">
 <div style="display:flex;flex-direction:row">

 <div class="row">
 
              <div class="  col-lg-2 col-md-6 col-sm-6 mb-4  ml-2">
                <div class="stats-small stats-small--1 card card-small">
                  
                <div class="card-body cardp d-flex align-items-center justify-content-center  " >
                    <div class="d-flex flex-column align-items-center justify-content-center m-auto ">
                      <div class="stats-small__data text-center mt-2">
                        <span class=" text-uppercase  " style="font-size:30px">المزادات</span>
                        <h2 class="stats-small__value count my-3"style="font-size:40px">{{$auction}}</h2>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--increase">{{$prec}}%</span>
                      </div>
                      
                    </div>
                   
                  </div>
                 
                </div>
              </div>

              <div class="col-lg-2 col-md-6 col-sm-6 mb-4  ml-2">
                <div class="stats-small stats-small--1 card card-small">
                  
                <div class=" card-body cardp d-flex align-items-center justify-content-center" >
                  <div class="d-flex flex-column align-items-center justify-content-center m-auto ">
                    <div class="stats-small__data text-center mt-2">
                        <span class=" text-uppercase "  style="font-size:30px" >المزايدات</span>
                        <h2 class="stats-small__value count my-3"style="font-size:30px">{{$bids}}</h2>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--increase">{{$bidsprs}}%</span>
                      </div>
                      
                    </div>
                   
                  </div>
                 
                </div>
              </div>


              <div class="col-lg-2 col-md-6 col-sm-6 mb-4 ml-2 mr-2">
                <div class="stats-small stats-small--1 card card-small">

            <div class=" card-body cardp d-flex align-items-center justify-content-center" >
              <div class="d-flex flex-column align-items-center justify-content-center m-auto ">
                <div class="stats-small__data text-center mt-2">
                        <span class="stats-small__label text-uppercase"style="font-size:30px">الخدمات</span>
                        <h2 class="stats-small__value count my-3" style="font-size:30px">{{$service}}</h2>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--decrease">{{$serviceprec}}%</span>
                      </div>
                    </div>
                 
                  </div>
                 
                </div>
              </div>
              <div class="col-lg-2 col-md-6 col-sm-6 mb-4 ml-2 mr-2">
                <div class="stats-small stats-small--1 card card-small">
           
                  <div class=" card-body cardp d-flex align-items-center justify-content-center" >
                    <div class="d-flex flex-column align-items-center justify-content-center m-auto ">
                      <div class="stats-small__data text-center mt-2">
                        <span class="stats-small__label text-uppercase"style="font-size:30px">التقييمات</span>
                        <h2 class="stats-small__value count my-3" style="font-size:30px">{{$stars}}</h2>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--decrease">{{$starper}}%</span>
                      </div>
                    </div>
                 
                  </div>
                 
                </div>
              </div>

              <div class="col-lg-2 col-md-6 col-sm-6 mb-4 ml-2 mr-2">
                <div class="stats-small stats-small--1 card card-small">
           
                  <div class=" card-body cardp d-flex align-items-center justify-content-center" >
                    <div class="d-flex flex-column align-items-center justify-content-center m-auto ">
                      <div class="stats-small__data text-center mt-2">
                        <span class="stats-small__label text-uppercase"style="font-size:30px">رسائل الزوار</span>
                        <h2 class="stats-small__value count my-3" style="font-size:30px">{{$messages}}</h2>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--decrease">{{$messagesprs}}%</span>
                      </div>
                    </div>
                 
                  </div>
                 
                </div>
              </div>

              <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class=" card-body cardp d-flex align-items-center justify-content-center" >
                    <div class="d-flex flex-column align-items-center justify-content-center m-auto ">
                      <div class="stats-small__data mt-2">
                        <span class="stats-small__label text-uppercase " style="font-size:30px">المستخدمين</span>
                        <h2 class="stats-small__value count my-3 text-center" style="font-size:30px">{{$user}}</h2>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--increase">{{$userper}}%</span>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
              
              <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card ">
                  <div class=" card-body cardp d-flex align-items-center justify-content-center" >
                    <div class="d-flex flex-column align-items-center justify-content-center m-auto ">
                      <div class="stats-small__data mt-2">
                        <span class="stats-small__label text-uppercase " style="font-size: 30px">الاقسام</span>
                        <h6 class="stats-small__value text-center count my-3"style="font-size:30px">{{$category}}</h6>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--increase">{{$categoryper}}%</span>
                      </div>
                    </div>
                   
                  </div>
                 
                </div>
              </div>

              <div class="col-lg-2 col-md-4 col-sm-12 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class=" card-body cardp d-flex align-items-center justify-content-center" >
                    <div class="d-flex flex-column align-items-center justify-content-center m-auto ">
                      <div class="stats-small__data text-center mt-2">
                        <span class="stats-small__label text-uppercase" style="font-size: 30px">الماركات </span>
                        <h6 class="stats-small__value count my-3" style="font-size:30px">{{$brands}}</h6>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--decrease" >{{$brandsper}}%</span>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
              <div class="col-lg-2 col-md-4 col-sm-12 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class=" card-body cardp d-flex align-items-center justify-content-center" >
                    <div class="d-flex flex-column align-items-center justify-content-center m-auto ">
                      <div class="stats-small__data text-center mt-2">
                        <span class="stats-small__label text-uppercase" style="font-size: 30px"> السيارات</span>
                        <h6 class="stats-small__value count my-3" style="font-size:30px">{{$seris}}</h6>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--decrease" >{{$serisper}}%</span>
                        
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
              <div style="display:flex;flex-direction:row;width:90%;">
              <div style="width:60% ;direction:rtl">
              <canvas style="width:20px" id="myChart"></canvas>
</div>
<div style="width:40%;direction:rtl">
              <div id="donut-chart"></div>
</div>
</div>
              <div>
       
      </div>
    </div>
           
  </div>
<br>
 </div>
 <script>
    var ctx = document.getElementById("myChart").getContext("2d");
    var myChart = new Chart(ctx, {
      type: "line",
      data: {
        labels: [
          "المزادات",
          "المزايدات",
          "المستخدمين",
          "الخدمات",
          "الاقسام",
          "الماركات",
          "السيارات",
          "رسائل الزوار",
          "التقييمات",
        ],
        datasets: [
          {
            label: "work load",
            data: [{{$auction}},{{$bids}},{{$user}},{{$service}},{{$category}},{{$brands}},{{$seris}},{{$messages}},{{$stars}}],
            backgroundColor: "#d98a2c",
          },
          {
            label: "free ",
            data: [100-{{$auction}},100-{{$bids}},100-{{$service}},100-{{$category}},100-{{$brands}},100-{{$user}},100-{{$seris}},100-{{$messages}},100-{{$stars}}],
            backgroundColor: "#e9ecef",
          },
        ],
      },
    });
  </script>

  <script>
      var chart = bb.generate({
        data: {
          columns: [ 
            ["المزادات",  {{$auction}}],
            ["المزايدات", {{$bids}}],
            ["المستخدمين",{{$user}}],
            ["الخدمات", {{$service}}],
            ["الاقسام",{{$category}}],
            ["الماركات", {{$brands}}],
            ["السيارات", {{$seris}}],
            ["رسائل الزوار",{{$messages}}],
            [" التقييمات", {{$stars}}],


          ],
          type: "donut",
          onclick: function (d, i) {
            console.log("onclick", d, i);
          },
          onover: function (d, i) {
            console.log("onover", d, i);
          },
          onout: function (d, i) {
            console.log("onout", d, i);
          },
        },
        donut: {
          title: "احصائيات الموقع",
        },
        bindto: "#donut-chart",
      });
    </script>
</div>
            <!-- End Small Stats Blocks -->
             <!-- End Small Stats Blocks -->
            

        <!-- container-scroller -->
    @endsection
