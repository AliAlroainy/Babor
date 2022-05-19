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
                                                اسم السلسلة
                                            </th>
                                            <th>
                                                نوع البراند
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($series as $item)
                                            <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{ route('admin.series.update', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel1"> عدل
                                                                    السلسلة</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col mb-3">
                                                                        <label for="editName" class="form-label">اسم
                                                                            السلسلة</label>
                                                                        <input type="text" id="editName"
                                                                            class="form-control" name="name"
                                                                            value="{{ old('name') }} {{ $item->name ?? '' }}"
                                                                            placeholder="اسم السلسلة">
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <select class="form-select"
                                                                            aria-label="Default select example"
                                                                            name="brand_id">
                                                                            <option selected disabled>
                                                                                {{ $item->brand->name }}
                                                                            </option>
                                                                            @if (isset($brands) && $brands->count() > 0)
                                                                                @foreach ($brands as $brand)
                                                                                    <option value="{{ $brand->id }}">
                                                                                        {{ $brand->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary"
                                                                    data-bs-dismiss="modal">إلغاء</button>
                                                                <button type="submit"
                                                                    class="btn  text-white" style="background:#f79827">تعديل</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <tr>
                                                <td>
                                                    {{ $item->name }}
                                                </td>
                                                <td>
                                                    {{ $item->brand->name }}
                                                </td>
                                                <td>
                                                    <a href="editSeries" style="width: fit-content; font-size:18px;color:#686868"
                                                        class="fa-solid fa-edit pe-2 btn-fw btn-rounded "
                                                        data-bs-target="#editModal-{{ $item->id }}"
                                                        data-bs-toggle="modal">
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.series.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        @if ($item->is_active == 1)
                                                        <button  class=" btn d-flex align-items-center
                                                                    font-weight-inverse-success
                                                              btn-rounded  fa-solid fa-trash pe-2
                                                           " style="color:#71c016;font-size:18px;">
                                                                      
                                                                   
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
                class="btn btn-rounded btn-icon add"  style="background:#f79827;margin-top:-20px;margin-left:8%">
                <i class="mdi mdi-plus text-white"></i>
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('admin.series.store') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">اضف سلسلة</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="name" class="form-label">اسم السلسلة</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        value="{{ old('name') }}" placeholder="اسم السلسلة">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <select class="form-select" aria-label="Default select example" name="brand_id">
                                        <option selected disabled>اختر البراند</option>
                                        @if (isset($brands) && $brands->count() > 0)
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('brand_id')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button>
                            <button type="submit" class="btn text-white" style="background:#f79827">إضافة</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- container-scroller -->
    @endsection
