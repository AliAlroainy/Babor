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
                                            الشعار
                                        </th>
                                        <th>
                                            إسم الشركة
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="py-1">
                                            <img src="{{@asset('assets/images/faces/face2.jpg')}}" alt="image"/>
                                        </td>
                                        <td>
                                            ford
                                        </td>

                                        <td>
                                            <a href="editBrand"
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
                                            <a href="deleteBrand"
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
                <i class="mdi mdi-plus"></i>
            </button>

        </div>


        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="addBrand" method="post">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">أضف شركة سيارات</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">إسم الشركة</label>
                                    <input type="text" id="nameBasic" class="form-control" name="brandName" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col md-3">
                                    <label for="dobBasic" class="form-label">أيقونة الشركة</label>
                                    <input type="file" id="dobBasic" class="form-control" name="brandIcon" placeholder="">
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
                <form action="editBrand" method="post">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">عدل بيانات الشركة</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">إسم الشركة</label>
                                    <input type="text" id="nameBasic" class="form-control" name="brandName" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col md-3">
                                    <label for="dobBasic" class="form-label">أيقونة الشركة</label>
                                    <input type="file" id="dobBasic" class="form-control" name="brandIcon" placeholder="">
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
