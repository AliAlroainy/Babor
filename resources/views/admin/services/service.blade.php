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
                                    <h4 class="card-title">عرض الخدمات</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th>
                                                    الصورة
                                                </th>
                                                <th>
                                                    إسم الخدمة
                                                </th>
                                                <th>
                                                    الوصف
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="py-1">
                                                    <img src="{{@asset('assets/images/faces/face2.jpg')}}" alt="image"/>
                                                </td>
                                                <td>
                                                    الإعلانات
                                                </td>
                                                <td>
                                                    عرض اعلانات للشركات ومعارض ووكالات السيارات في الموقع
                                                </td>
                                                <td>
                                                    <a href="editService"
                                                       style="width: fit-content"
                                                       class="
                                                        btn d-flex align-items-center
                                                         btn-inverse-secondary
                                                         btn-fw btn-rounded "
                                                       data-bs-target="#editModal"  data-bs-toggle="modal"
                                                    >

                                                        تعديل
                                                        <i class="fa-solid fa-edit pe-2 " style="font-size: 12px ;"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="deleteService"
                                                       style="width: fit-content"
                                                       class="
                                                        btn d-flex align-items-center
                                                         btn-inverse-danger
                                                         btn-fw btn-rounded ">
                                                        حذف
                                                        <i class="fa-solid fa-trash pe-2 " style="font-size: 12px ;"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button type="button" data-bs-target="#addModal"  data-bs-toggle="modal" class="btn btn-primary btn-rounded btn-icon add">
                        <i class="mdi mdi-plus text-white"></i>
                    </button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="{{ route('admin.service.store') }}" method="post">
                            @csrf
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">أضف خدمة</h5>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="nameBasic" class="form-label">إسم الخدمة</label>
                                        <input type="text" id="nameBasic" class="form-control" name="serviceName" placeholder="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="emailBasic" class="form-label">الوصف</label>
                                        <input type="text" id="emailBasic" class="form-control" name="serviceContent" placeholder="">
                                    </div>
                                </div>
                                <div class="row">
                                   <div class="col md-3">
                                       <label for="dobBasic" class="form-label">أيقونة الخدمة</label>
                                       <input type="file" id="dobBasic" class="form-control" name="serviceIcon" placeholder="">
                                   </div>
                                </div>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button>
                                <button type="submit" class="btn btn-primary">إضافة</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

                <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="{{ }}" method="POST">
                            @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">عدل الخدمة</h5>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="nameBasic" class="form-label">إسم الخدمة</label>
                                        <input type="text" id="nameBasic" class="form-control" name="serviceName" placeholder="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="emailBasic" class="form-label">الوصف</label>
                                        <input type="text" id="emailBasic" class="form-control" name="serviceContent" placeholder="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col md-3">
                                        <label for="dobBasic" class="form-label">أيقونة الخدمة</label>
                                        <input type="file" id="dobBasic" class="form-control" name="serviceIcon" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button>
                                    <button type="submit" class="btn btn-primary">تعديل</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>



                <!-- container-scroller -->
@endsection
