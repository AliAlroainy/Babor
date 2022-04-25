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
                            <h4 class="card-title">عرض سلاسل البراند</h4>
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
                                                اسم السلسلة
                                            </th>
                                            <th>
                                                نوع البراند
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($series as $item)
                                            <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
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
                                                                            value="{{ old('name') }}"
                                                                            value="{{ $item->name ?? '' }}"
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
                                                                    class="btn btn-primary text-white">تعديل</button>
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
                                                    <a href="editSeries" style="width: fit-content"
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
                                                    <form action="{{ route('admin.series.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button style="width: fit-content"
                                                            class="
                                                        btn d-flex align-items-center
                                                         btn-inverse-danger
                                                         btn-fw btn-rounded ">
                                                            @if ($item->is_active == 1)
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
                            <button type="submit" class="btn btn-primary text-white">إضافة</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- container-scroller -->
    @endsection
