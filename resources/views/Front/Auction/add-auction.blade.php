@extends('partials.usermaster')
@section('body')
    <!-- MultiStep Form -->
    <div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="col-lg-10 col-md-8 col-sm-12 col text-center p-0 mt-3 mb-2">
                <div class="card p-4 p-lg-5 mt-3 mb-3 shadow">
                    <h2><strong>أنشئ مزادا جديدا</strong></h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session()->has('successSubmit'))
                        <div class="alert alert-warning alert-dismissible fade show">
                            {{ session()->get('successSubmit') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form class="msform" action="{{ route('user.save.auction') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <div class="form-card text-center row">
                                        <h2 class="fs-title mb-2 text-end text-muted">بيانات المزاد</h2>
                                        <div class="end-date col-12 col-md-5 mb-4">
                                            <input type="date" name="closeDate"
                                                class="bg-transparent dark-placeholder form-control"
                                                value="{{ old('closeDate', $car->closeDate ?? null) }}"
                                                placeholder="تاريخ الإنتهاء" />
                                        </div>
                                        <div class="col-md-5 mb-4">
                                            <input type="text" name="openingBid"
                                                value="{{ old('openingBid', $car->openingBid ?? null) }}"
                                                class="bg-transparent dark-placeholder form-control"
                                                placeholder="السعر الإبتدائي" />
                                        </div>
                                        <div class="col-md-5 mb-4">
                                            <input type="text" name="minInc"
                                                class="bg-transparent dark-placeholder form-control"
                                                value="{{ old('minInc', $car->minInc ?? null) }}"
                                                placeholder="الحد الادنى للمزايدة" />
                                        </div>
                                        <div class="col-md-5 mb-4">
                                            <input type="text" name="reservePrice"
                                                value="{{ old('reservePrice', $car->reservePrice ?? null) }}"
                                                class="bg-transparent dark-placeholder form-control"
                                                placeholder="السعر الاحتياطي" />
                                        </div>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div>
                                    <div class="form-card text-center row">
                                        <h2 class="fs-title text-end text-muted">بيانات السيارة</h2>
                                        <div class="col-sm-12 col-md-5 col-lg-3 mb-4">
                                            <select id="category" name="category_id"
                                                class="w-100 bg-transparent dark-placeholder select px-2">
                                                <option selected disabled>اختر التصنيف</option>
                                                @if (isset($categories) && $categories->count() > 0)
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-md-5 col-lg-3 mb-4">
                                            <select id="brand" name="brand_id"
                                                class="w-100 bg-transparent dark-placeholder select px-2">
                                                <option selected disabled>اختر البراند</option>
                                                @if (isset($brands) && $brands->count() > 0)
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}"
                                                            {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                                            {{ $brand->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-md-5 col-lg-4 mb-4">
                                            <select id="series" name="series_id"
                                                class="w-100 bg-transparent dark-placeholder select px-2">
                                                <option selected disabled>اختر سلسلة للبراند</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-md-5 col-lg-4 mb-4">
                                            <input type="text" class="bg-transparent dark-placeholder form-control"
                                                name="model" value="{{ old('model', $car->model ?? null) }}"
                                                placeholder="الموديل">
                                        </div>
                                        <div class="col-sm-12 col-md-5 col-lg-2 mb-4">
                                            <input type="text" class="bg-transparent dark-placeholder form-control"
                                                name="color" value="{{ old('color', $car->color ?? null) }}"
                                                placeholder="اللون">
                                        </div>
                                        <div class="col-sm-12 col-md-5 col-lg-2 mb-4">
                                            <input type="text" class="bg-transparent dark-placeholder form-control"
                                                value="{{ old('numberOfKillos', $car->numberOfKillos ?? null) }}"
                                                name="numberOfKillos" placeholder="كم مشت كيلو">
                                        </div>
                                        <div class="col-sm-12 col-md-6 mb-4">
                                            <textarea type="text" class="bg-transparent dark-placeholder form-control" row="20" name="description"
                                                placeholder="وصف السيارة">{{ old('description', $car->description ?? null) }}</textarea>
                                        </div>
                                        <div class="col-sm-12 col-md-6 mb-4">
                                            <textarea type="text" class="bg-transparent dark-placeholder form-control" row="20" name="carPosition"
                                                placeholder="موقع السيارة">{{ old('carPosition', $car->carPosition ?? null) }}</textarea>
                                        </div>
                                        <div class="col-12 col-md-5 col-lg-3 mb-4">
                                            <select id="sizOfDamage" name="sizOfDamage"
                                                class="w-100 bg-transparent dark-placeholder select px-2">
                                                <option selected disabled>اختر حجم الضرر</option>
                                                @foreach (App\Models\Car::getSizOfDamageValues() as $key => $value)
                                                    <option value="{{ $key }}"
                                                        {{ old('sizOfDamage') == $key ? 'selected' : '' }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-5 col-lg-3 mb-4">
                                            <p class="text-end">حالة السيارة</p>
                                            <div class="d-flex">
                                                <div class="form-check">
                                                    <input type="radio" name="status" id="used" value="0">
                                                    <label class="form-check-label" for="used">
                                                        {{ App\Models\Car::getStatus('0') }}
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="status" id="new" value="1">
                                                    <label class="form-check-label" for="new">
                                                        {{ App\Models\Car::getStatus('1') }}
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-md-5 col-lg-3 mb-4">
                                            <div class="input-group control-group">
                                                <input type="file" name="thumbnail" value="{{ old('thumbnail') }}"
                                                    class="bg-transparent dark-placeholder form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-5 col-lg-3 mb-4">
                                            <div class="input-group control-group">
                                                <input type="file" name="car_images[]"
                                                    class="form-control dark-placeholder py-13" multiple>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-warning w-auto fw-bold" value="حفظ" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
