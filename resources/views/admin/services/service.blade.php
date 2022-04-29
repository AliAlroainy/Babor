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
                            <div class="search-bar">
                            <h4 class="card-title">عرض بحسب</h4>
                                <select>
                                    <option selected="selected"> الكل</option>
                                    <option>اسم السيارة</option>
                                    <option>تاريخ البدء</option>
                                    <option>اقل قيمة للمزايدة</option>
                                    <option>  حالة المزاد</option>
                                    
                                </select>
                               
                            </div>
                        </div>
                    </div>
                            <h4 class="card-title">عرض المزادات</h4>
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
                                                  الصورة
                                            </th>  
                                        <th>
                                                 اسم السيارة
                                            </th>
                                            <th>
                                                  الموديل
                                            </th>
                                            <th>
                                                السعر الابتدائي
                                            </th>
                                            <th>
                                                 تاريخ البدء
                                            </th>
                                            <th>
تاريخ الانتهاء                                            </th>
                                            <th>
اخر سعر للمزاد                                            </th>
<th>
اقل قيمة للمزايدة                                          </th>
<th>
الفائز بالمزاد                                              </th>
<th>
   نسبة الموقع                                              </th>
<th>
مبلغ التأمين
                                               </th>

<th>
حالة المزاد                                              </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $service)
                                           
                                            <tr>
                                                <td class="py-1">
                                                    <img src="/images/cars/{{ $car->imge }}" alt="image" />
                                                </td>
                                                <td>
                                                {{ $car->name }}
                                                </td>
                                                <td>
                                                {{ $car->model }}
                                                   </td>
                                                   <td>
                                                   {{ $auction->startingPrice }} 
                                                   </td>
                                                   <td>
                                                   {{ $auction->startingDate }} 
                                                   </td>
                                                   <td>
                                                   {{ $auction->closeDate }} 
                                                   </td>
                                                   <td>
                                                   {{ $auction->winnerPrice }} 
                                                   </td>
                                                   <td>
                                                   {{ $auction->minic }} 
                                                   </td>
                                                   <td>
                                                   {{ $auction->winner }} 
                                                   </td>
                                                   <td>
                                                   {{ $auction->commission }} 
                                                   </td>
                                                   <td>
                                                   {{ $auction->securityDeposit }} 
                                                   </td>
                                                <td>
                                                {{ $auction->status }} 
                                                </td>
                                                
                                               
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
           
               
           
        </div>
       
        <!-- container-scroller -->
    @endsection
