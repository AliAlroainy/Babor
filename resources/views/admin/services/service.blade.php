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
                            @if (session()->has('successEdit'))
                                <p class="alert alert-success">{{ session()->get('successEdit') }}</p>
                            @endif
                            @if (session()->has('errorEdit'))
                                <p class="alert alert-danger">{{ session()->get('errorEdit') }}</p>
                            @endif
                            @if (session()->has('successAdd'))
                                <p class="alert alert-success">{{ session()->get('successAdd') }}</p>
                            @endif
                            @if (session()->has('errorAdd'))
                                <p class="alert alert-success">{{ session()->get('errorAdd') }}</p>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
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
                                                إسم الخدمة
                                            </th>
                                            <th>
                                                الوصف
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $service)
                                            <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
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
                                                                <button type="submit" class="btn btn-primary">تعديل</button>
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
                                                    {{ $service->title }}
                                                </td>
                                                <td>
                                                    {{ $service->description }}
                                                </td>
                                                <td>
                                                    <a href="editService" style="width: fit-content"
                                                        class="
                                                        btn d-flex align-items-center
                                                         btn-inverse-secondary
                                                         btn-fw btn-rounded "
                                                        data-bs-target="#editModal" data-bs-toggle="modal">

                                                        تعديل
                                                        <i class="fa-solid fa-edit pe-2 " style="font-size: 12px ;"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="deleteService" style="width: fit-content"
                                                        class="
                                                        btn d-flex align-items-center
                                                         btn-inverse-danger
                                                         btn-fw btn-rounded ">
                                                        حذف
                                                        <i class="fa-solid fa-trash pe-2 " style="font-size: 12px ;"></i>
                                                    </a>
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
            <button type="button" data-bs-target="#addModal" data-bs-toggle="modal"
                class="btn btn-primary btn-rounded btn-icon add">
                <i class="mdi mdi-plus text-white"></i>
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">أضف خدمة</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="title" class="form-label">إسم الخدمة</label>
                                    <input type="text" id="title" class="form-control" name="title"
                                        placeholder="عنوان الخدمة">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="description" class="form-label">الوصف</label>
                                    <input type="text" id="description" class="form-control" name="description"
                                        placeholder="الوصف">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col md-3">
                                    <label for="pic" class="form-label">أيقونة الخدمة</label>
                                    <input type="file" id="pic" class="form-control" name="pic" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button>
                            <button type="submit" class="btn btn-primary text-white">إضافة</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- container-scroller -->
    @endsection
