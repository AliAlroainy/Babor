@extends('partials.master')
@section('body')

{{-- style --}}
@include('Front.user.style.style')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row ">

                <div class="col-lg-12 grid-margin stretch-card" style="width: 100%">
                    <div class="cardp d-flex align-items-center justify-content-center">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <h1 class="card-title">
                                <i class="bi bi-people-fill"></i>
                                    عمليات المزايدين</h1>

                         
                        </div>
                    </div>
                </div>

            </div>

<div class="container ">

    <table class="table table-borderless table-responsive card-1 p-4" dir="rtl">
<thead>
<tr class="border-bottom">
<th>
  <span class="ml-2 d-flex flex-column text-muted ">
    <i class="bi bi-calendar-date mb-2 " style="color: #F7941D"></i> 
    التاريخ</span>
</th>
<th>
  <span class="ml-2 d-flex flex-column text-muted">
    <i class="bi bi-file-person mb-2" style="color: #F7941D"></i>
    المشتري</span>
</th>
<th>
  <span class="ml-2 d-flex flex-column text-muted">
    <i class="bi bi-person-badge mb-2" style="color: #F7941D"></i>
    البائع</span>
</th>
<th>
  <span class="ml-2 d-flex flex-column text-muted">
    <i class="bi bi-geo-alt mb-2" style="color: #F7941D"></i>
    الموقع</span>
</th>
<th>
    <span class="ml-2 d-flex flex-column text-muted">
        <i class="bi bi-coin mb-2" style="color: #F7941D"></i>
        السعر</span>
  </th>
<th>
  <span class="ml-2  d-flex flex-column text-muted">
    <i class="bi bi-app-indicator mb-2" style="color: #F7941D"></i>
    الحالة</span>
</th>
<th>
    <span class="ml-2 d-flex flex-column text-muted">
        <i class="bi bi-hand-index  mb-2" style="color: #F7941D"></i>
        اجراء</span>
  </th>
  <th>
    <span class="ml-2 d-flex flex-column text-muted">
        <i class="bi bi-window mb-2" style="color: #F7941D"></i>
        التفاصيل</span>
  </th>
</tr>
</thead>
<tbody>

<tr class="border-bottom">
<td>
  <div class="p-2">
      <span class="d-block font-weight-bold">اليوم</span>
      <small>2:30PM</small>
  </div>
</td>
<td>
   <div class="p-2 d-flex flex-row align-items-center mb-2">
      <img src="/img/ali.jpg" width="40" class="rounded-circle" />
      <div class="d-flex flex-column ml-2">
          <span class="d-block font-weight-bold">علي الرعيني </span>
      </div>
  </div>

</td>
<td>
    <div class="p-2 d-flex flex-row align-items-center mb-2">
        <img src="/img/jihad.jpg" width="40" class="rounded-circle">
        <div class="d-flex flex-column ml-2">
            <span class="d-block font-weight-bold"> ابرار الخرساني </span>
        </div>
    </div>
</td>
<td>
  <div class="p-2 d-flex flex-column">
      <span> حي المسبح - تعز ,اليمن</span>
  </div>
</td>
<td>
    <div class="p-2 ">
        <p class="font-weight-bold"> 345345 <span style="color: #F7941D">$</span> </P>
    </div>
  </td>
<td>
  <div class="p-2 text-warning d-flex">
    <i class="bi bi-hourglass-split"></i>
    قيد الانتظار
  </div>
</td>
<td>
    <div class="p-2 ">
        <button class=" btn  alert-warning  d-flex align-items-center justify-content-center " style="width: 150px"> تحويل المبلغ للبائع</button>
      <button class="btn alert-secondary  mt-2 d-flex align-items-center justify-content-center " style="width: 150px"> ارجاع المبلغ للمشتري </button>
    </div>
  </td>

  <td>
    <a href="#" class="p-2 font-warining ">
        عرض التفاصيل 
        <i class="bi bi-eye"></i>
      </a>
  </td>

</tr>


<tr class="border-bottom">
    <td>
      <div class="p-2">
          <span class="d-block font-weight-bold">اليوم</span>
          <small>2:30PM</small>
      </div>
    </td>
    <td>
       <div class="p-2 d-flex flex-row align-items-center mb-2">
          <img src="/img/ali.jpg" width="40" class="rounded-circle" />
          <div class="d-flex flex-column ml-2">
              <span class="d-block font-weight-bold">علي الرعيني </span>
          </div>
      </div>
    
    </td>
    <td>
        <div class="p-2 d-flex flex-row align-items-center mb-2">
            <img src="/img/jihad.jpg" width="40" class="rounded-circle">
            <div class="d-flex flex-column ml-2">
                <span class="d-block font-weight-bold"> ابرار الخرساني </span>
            </div>
        </div>
    </td>
    <td>
      <div class="p-2 d-flex flex-column">
          <span> حي المسبح - تعز ,اليمن</span>
      </div>
    </td>
    <td>
        <div class="p-2 ">
            <p class="font-weight-bold"> 345345 <span style="color: #F7941D">$</span> </P>
        </div>
      </td>
    <td>
      <div class="p-2 text-success d-flex ">
        <i class="bi bi-check-all"></i>
       مكتملة
      </div>
    </td>
    <td>
        <div class="p-2 ">
            <div class="alert alert-success  d-flex align-items-center justify-content-center " style="width: 150px">
                <i class="bi bi-check-all"></i>
                تم البيع</div>
        </div>
      </td>
    
      <td>
        <a href="#" class="p-2 font-warining ">
          عرض التفاصيل 
          <i class="bi bi-eye"></i>
        </a>
      </td>
    
    </tr>







</tbody>
</table>

 
</div>



</div>          
</div>



<style>

.card-1{

border: none;
  border-radius: 10px;
  width: 100%;
  background-color: #fff;
}


.icons i {

margin-left: 20px;

}
    </style>
@endsection
