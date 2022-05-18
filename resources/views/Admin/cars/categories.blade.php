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
                                                اسم التصنيف
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($categorie as $category)
                                            <div class="modal fade" id="editModal-{{ $category->id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{ route('admin.category.update', $category->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel1">عدل
                                                                    التصنيف</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col mb-3">
                                                                        <label for="editTitle" class="form-label">إسم
                                                                            التصنيف</label>
                                                                        <input type="text" id="editTitle"
                                                                            class="form-control" name="name"
                                                                            value="{{ $category->name ?? '' }}"
                                                                            placeholder="اسم التصنيف">
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col md-3">
                                                                        <label for="editPic" class="form-label">أيقونة
                                                                            التصنيف</label>
                                                                        <input type="file" id="editPic"
                                                                            class="form-control" name="pic"
                                                                            placeholder="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-danger"
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
                                                    <img src="/images/categories/{{ $category->image }}" alt="image" />
                                                </td>
                                                <td>
                                                    {{ $category->name }}
                                                </td>

                                                <td>
                                                    <a href="editCategory"
                                                        style="width: fit-content;font-size:18px;color:#686868"
                                                        class="fa-solid fa-edit pe-2  btn-fw btn-rounded "
                                                        data-bs-target="#editModal-{{ $category->id }}"
                                                        data-bs-toggle="modal">
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.category.destroy', $category->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        @if ($category->is_active == 1)
                                                            <button
                                                                class=" btn d-flex align-items-center
                                                                    font-weight-inverse-success
                                                              btn-rounded  fa-solid fa-trash pe-2
                                                           "
                                                                style="color:#71c016;font-size:18px;">
                                                            </button>
                                                        @else
                                                            <button style="color:#ff4747;font-size:18px;"
                                                                class="
                                                            btn d-flex align-items-center fas fa-trash-restore pe-2
                                                             ">
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
        <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">أضف تصنيف</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="name" class="form-label">إسم التصنيف</label>
                                    <input type="text" id="title" class="form-control" name="name"
                                        placeholder="عنوان التصنيف" value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col md-3">
                                    <label for="Image" class="form-label">أيقونة التصنيف</label>
                                    <input type="file" id="image" class="dropify" name="image" placeholder=""
                                        value="{{ old('image') }}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">إلغاء</button>
                            <button type="submit" class="btn btn-warning text-white">إضافة</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- container-scroller -->
    @endsection
