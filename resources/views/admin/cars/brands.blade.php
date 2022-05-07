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
                                <div class="alert alert-danger alert-dismissible fade show">
                                    {{ session()->get('errorEdit') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session()->has('successAdd'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{ session()->get('successAdd') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session()->has('errorAdd'))
                                <div class="alert alert-danger alert-dismissible fade show">
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
                                                اللوجو
                                            </th>
                                            <th>
                                                اسم البراند
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $brand)
                                            <div class="modal fade" id="editModal-{{ $brand->id }}" tabindex="-1"
                                                aria-hidden="true">
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
                                                                        <label for="editName-{{ $brand->id }}"
                                                                            class="form-label">إسم
                                                                            البراند</label>
                                                                        <input type="text" id="editName-{{ $brand->id }}"
                                                                            class="form-control" name="name"
                                                                            value="{{ old('name') }} {{ $brand->name ?? '' }}"
                                                                            placeholder="اسم البراند">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col md-3">
                                                                        <label for="editLogo-{{ $brand->id }}"
                                                                            class="form-label">أيقونة
                                                                            البراند</label>
                                                                        <input type="file"
                                                                            id="editLogo-{{ $brand->id }}"
                                                                            class="form-control previewImage" name="logo"
                                                                            placeholder="">
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
                                                                    class="btn btn-warning text-white">تعديل</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <tr>
                                                <td class="py-1">
                                                    @if (isset($brand->logo))
                                                        <img src="/images/brands/{{ $brand->logo }}" alt="logo"
                                                            class="img-lg rounded-circle" />
                                                    @else
                                                        <img src="/images/brands/default.png" alt="logo"
                                                            class="img-lg rounded-circle" />
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $brand->name }}
                                                </td>
                                                <td>
                                                    <a href="editBrand" style="width: fit-content; font-size: 25px ;color:#686868"
                                                        class="fa-solid fa-edit pe-2  btn-fw btn-rounded "
                                                        data-bs-target="#editModal-{{ $brand->id }}"
                                                        data-bs-toggle="modal">

                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.brand.destroy', $brand->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        @if ($brand->is_active == 1)
                                                        <button 
                                                                    class=" btn d-flex align-items-center
                                                                    font-weight-inverse-success
                                                              btn-rounded  fa-solid fa-trash pe-2
                                                           " style="color:#71c016;font-size:25px ;">
                                                                      
                                                                   
                                                                </button>
                                                               
                                                            @else
                                                                <button style="color:#ff4747;font-size: 25px ;"
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
                            <button type="submit" class="btn btn-warning text-white">إضافة</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- container-scroller -->
    @endsection
