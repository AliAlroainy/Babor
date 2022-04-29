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
                            <h4 class="card-title">عرض الخدمات</h4>
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
                                            <div class="modal fade" id="editModal-{{ $service->id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{ route('admin.service.update', $service->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel1">عدل
                                                                    الخدمة</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col mb-3">
                                                                        <label for="editTitle" class="form-label">إسم
                                                                            الخدمة</label>
                                                                        <input type="text" id="editTitle"
                                                                            class="form-control" name="title"
                                                                            value="{{ $service->title ?? '' }}"
                                                                            placeholder="اسم الخدمة">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col mb-3">
                                                                        <label for="editDesc"
                                                                            class="form-label">الوصف</label>
                                                                        <input type="text" id="editDesc"
                                                                            class="form-control" name="description"
                                                                            value="{{ $service->description ?? '' }}"
                                                                            placeholder="وصف الخدمة">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col md-3">
                                                                        <label for="editPic" class="form-label">أيقونة
                                                                            الخدمة</label>
                                                                        <input type="file" id="editPic"
                                                                            class="form-control" name="pic"
                                                                            placeholder="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary"
                                                                    data-bs-dismiss="modal">إلغاء</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary text-white">تعديل</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <tr>
                                                <td class="py-1">
                                                    <img src="/images/services/{{ $service->pic }}" alt="image" />
                                                </td>
                                                <td>
                                                   
                                                </td>
                                                <td>
                                                   
                                                   </td>
                                                   <td>
                                                   
                                                   </td>
                                                   <td>
                                                   
                                                   </td>
                                                   <td>
                                                   
                                                   </td>
                                                   <td>
                                                   
                                                   </td>
                                                   <td>
                                                   
                                                   </td>
                                                   <td>
                                                   
                                                   </td>
                                                   <td>
                                                   
                                                   </td>
                                                   <td>
                                                   
                                                   </td>
                                                <td>
                                                   
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
