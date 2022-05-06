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
                                                إسم الخدمة
                                            </th>
                                            <th>
                                                الوصف
                                            </th>
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
                                                                   class="btn btn-warning text-white">تعديل</button>
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
                                                        data-bs-target="#editModal-{{ $service->id }}"
                                                        data-bs-toggle="modal">
                                                        تعديل
                                                        <i class="fa-solid fa-edit pe-2" style="font-size: 12px ;"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.service.destroy', $service->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        @if ($service->is_active == 1)
                                                            <button style="width: fit-content"
                                                                class="
                                                        btn d-flex align-items-center
                                                         btn-inverse-success
                                                         btn-fw btn-rounded ">
                                                                إلغاء التفعيل
                                                                <i class="fa-solid fa-trash pe-2"
                                                                    style="font-size: 12px ;"></i>
                                                            </button>
                                                        @else
                                                            <button style="width: fit-content"
                                                                class="
                                                        btn d-flex align-items-center
                                                         btn-inverse-danger
                                                         btn-fw btn-rounded ">
                                                                تفعيل
                                                                <i class="fas fa-trash-restore pe-2"
                                                                    style="font-size: 12px ;"></i>
                                                            </button>

                                                        @endif
                                                    </form>
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
                class="btn btn-warning btn-rounded btn-icon add">
                <i class="mdi mdi-plus text-white"></i>
            </button>
        </div>



        <!-- Modal -->

        {{-- <div class="modal fade" id="editModal-{{ $service->id }}" tabindex="-1"
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
                                    class="btn btn-warning text-white">تعديل</button>
                        </div>
                    </div>
                </form>
            </div>
        </div> --}}


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
                            <button type="submit" class="btn btn-warning text-white">إضافة</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- container-scroller -->
    @endsection
