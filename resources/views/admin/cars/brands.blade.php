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
                            <h4 class="card-title">عرض البراندات</h4>
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
                                    <ul class="m-0">
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
                                                اللوجو
                                            </th>
                                            <th>
                                                اسم البراند
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $brand)
                                            <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{ route('admin.brand.update', $brand->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel1">عدل
                                                                    البراند </h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col mb-3">
                                                                        <label for="editName" class="form-label">إسم
                                                                            البراند</label>
                                                                        <input type="text" id="editName"
                                                                            class="form-control" name="name"
                                                                            value="{{ old('name') }} {{ $brand->name ?? '' }}"
                                                                            placeholder="اسم البراند">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col md-3">
                                                                        <label for="editLogo" class="form-label">أيقونة
                                                                            الخدمة</label>
                                                                        <input type="file" id="editLogo"
                                                                            class="form-control previewImage" id="idImg"
                                                                            name="logo" placeholder="">
                                                                        <img src="/images/brands/{{ $brand->logo }}"
                                                                            width="100px" height="100px"
                                                                            class="mt-2">
                                                                        <div class="d-inline mx-auto mt-2 previewFrames alert alert-dismissible"
                                                                            style="position: relative;"></div>
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
                                                    <img src="/images/brands/{{ $brand->logo }}" alt="image" />
                                                </td>
                                                <td>
                                                    {{ $brand->name }}
                                                </td>
                                                <td>
                                                    <a href="editBrand" style="width: fit-content"
                                                        class="
                                                        btn d-flex align-items-center
                                                         btn-inverse-secondary
                                                         btn-fw btn-rounded "
                                                        data-bs-target="#editModal" data-bs-toggle="modal">
                                                        تعديل
                                                        <i class="fa-solid fa-edit pe-2" style="font-size: 12px ;"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.brand.destroy', $brand->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button style="width: fit-content"
                                                            class="
                                                        btn d-flex align-items-center
                                                         btn-inverse-danger
                                                         btn-fw btn-rounded ">
                                                            @if ($brand->is_active == 1)
                                                                إلغاء التفعيل
                                                                <i class="fa-solid fa-trash pe-2"
                                                                    style="font-size: 12px ;"></i>
                                                            @else
                                                                تفعيل
                                                                <i class="fas fa-trash-restore"
                                                                    style="font-size: 12px ;"></i>
                                                            @endif

                                                        </button>
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
                class="btn btn-primary btn-rounded btn-icon add">
                <i class="mdi mdi-plus text-white"></i>
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">اضف براند</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="name" class="form-label">اسم البراند</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        value="{{ old('name') }}" placeholder="اسم البراند">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col md-3">
                                    <label for="logo" class="form-label">أيقونة البراند</label>
                                    <input type="file" id="logo" class="form-control previewImage" name="logo"
                                        placeholder="">
                                    @error('logo')
                                        {{ $message }}
                                    @enderror
                                    <div class="d-inline mx-auto mt-2 previewFrames alert alert-dismissible"
                                        style="position: relative;"></div>
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
