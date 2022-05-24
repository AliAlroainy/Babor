@extends('partials.usermaster')
@section('body')
{{-- style --}}
@include('Front.user.style.style')


     

    <div class="content-wrapper" >

        <div class="row  ">

            <div class="col-lg-12 grid-margin stretch-card" style="width: 100%">
                <div class="cardp d-flex align-items-center justify-content-center">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">

                        <i class="mdi mdi-car menu-icon mb-0 " style="font-size: 6em"></i>
                        <h1 style="margin-top:-40px">
                            إنشاء مزاد جديد
                        </h1>
        
                     
                    </div>
                </div>
            </div>
        
        </div>
        

        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col text-center p-0 mt-3 mb-2">
                <div class="card p-4 p-lg-5 mt-0 mb-3 shadow">
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

                                        <h2 class="fs-title  text-end  " style="color: #F7941D ">
                                            <i class="bi bi-megaphone" style="color: #000"></i>
                                            بيانات المزاد:</h2>


                                        <div
                                            class=" col-sm-12 col-md-6 mb-4 d-flex flex-column justify-content-center align-items-start h-100">
                                            <p >
                                                <i class="bi bi-calendar2-date " style="color: #F7941D "></i>
                                                تاريخ إنتهاء المزاد:</p>
                                            <input type="date" name="closeDate"
                                                class="bg-transparent input dark-placeholder form-control  "
                                                placeholder="تاريخ انتهاء المزاد"
                                                value="{{ old('closeDate', $car->closeDate ?? null) }}" />
                                        </div> 

                                      


                                       

                                  
                                        <div
                                        class=" col-sm-12 col-md-6 mb-4 d-flex flex-column justify-content-center align-items-start h-100">
                                        <p >
                                            <i class="bi bi-cash-coin" style="color: #F7941D "></i>
                                             السعر الابتدائي للمزاد:</p>

                                            <input type="text" name="openingBid"
                                                value="{{ old('openingBid', $car->openingBid ?? null) }}"
                                                placeholder=" $5,000"
                                                class="bg-transparent input dark-placeholder form-control" placeholder="" />
                                        </div>
                                        <div
                                        class=" col-sm-12 col-md-6 mb-4 d-flex flex-column justify-content-center align-items-start h-100">
                                        <p >
                                            <i class="bi bi-coin" style="color: #F7941D "></i>
                                            الحد الادنى للمزايدة:</p>
    
                                        <input type="text" name="minInc"
                                            placeholder="$200"
                                                class="bg-transparent input dark-placeholder form-control"
                                                value="{{ old('minInc', $car->minInc ?? null) }}" placeholder="" />
                                        </div>
                                        <div
                                        class=" col-sm-12 col-md-6 mb-4 d-flex flex-column justify-content-center align-items-start h-100">
                                        <p >
                                            <i class="bi bi-cash-stack" style="color: #F7941D "></i>
                                            السعر المرغوب:</p>
                                        <input type="text" name="reservePrice"
                                            placeholder="$7000"
                                                value="{{ old('reservePrice', $car->reservePrice ?? null) }}"
                                                class="bg-transparent input dark-placeholder form-control" placeholder="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="m-5"></div>
                                <div>
                                    <div class="form-card text-center row">
                                        <h2 class="fs-title  text-end  " style="color: #F7941D">
                                            <i class="bi bi-truck" style="color: #000;"></i>

                                            بيانات السيارة:</h2>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-3 mb-4 d-flex flex-column justify-content-center align-items-start">
                                            <p>
                                                <i class="bi bi-truck-flatbed" style="color: #F7941D"></i>
                                                التصنيف:</p>

                                            <select id="category" name="category_id"
                                                class="w-100 input dark-placeholder select px-2">
                                                @if (isset($categories) && $categories->count() > 0)
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-3 mb-4  d-flex flex-column justify-content-center align-items-start">
                                            <p>
                                                <i class="bi bi-brightness-alt-high" style="color: #F7941D"></i>
                                                البراند:</p>

                                            <select id="brand" name="brand_id"
                                                class="w-100 dark-placeholder input select px-2">
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
                                        <div
                                            class="col-sm-12 col-md-6  mb-4  d-flex flex-column justify-content-center align-items-start">
                                            <p>
                                                <i class="bi bi-boxes" style="color: #F7941D"></i>
                                                سلسلة البراند:</p>
                                            <select id="series" name="series_id"
                                                class="w-100  dark-placeholder input select ">
                                            </select>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-3 mb-4 d-flex flex-column justify-content-center align-items-start">
                                            <p>
                                                <i class="bi bi-x-diamond" style="color: #F7941D"></i>
                                                المودل:</p>

                                            <input type="text" class="bg-transparent input dark-placeholder form-control"
                                            placeholder="2020"
                                                name="model" value="{{ old('model', $car->model ?? null) }}"
                                                placeholder="مثال 2013">
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-3 mb-4 d-flex flex-column justify-content-center align-items-start">
                                            <p>
                                                <i class="bi bi-palette" style="color: #F7941D"></i> 
                                                اللون:</p>
                                            <input type="text" class="bg-transparent dark-placeholder form-control input"
                                                name="color" value="{{ old('color', $car->color ?? null) }}"
                                                placeholder="احمر">
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-6 mb-4 d-flex flex-column justify-content-center align-items-start">
                                            <p>
                                                <i class="bi bi-speedometer2" style="color: #F7941D"></i>
                                                المسافة المقطوعة:</p>

                                            <input type="text" class="bg-transparent input dark-placeholder form-control"
                                                value="{{ old('numberOfKillos', $car->numberOfKillos ?? null) }}"
                                                name="numberOfKillos" placeholder="2321 كيلو متر">
                                        </div>

                                        <div class="col-12 col-md-3 mb-4 d-flex flex-column justify-content-center align-items-start">
                                            <p>
                                                <i class="bi bi-tools" style="color: #F7941D"></i>
                                                حجم الضرر:</p>

                                            <select id="sizOfDamage" name="sizOfDamage"
                                                class="w-100 bg-transparent dark-placeholder input select px-2">

                                                @foreach (App\Models\Car::getSizOfDamageValues() as $key => $value)
                                                    <option value="{{ $key }}"
                                                        {{ old('sizOfDamage') == $key ? 'selected' : '' }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-6 mb-4 d-flex flex-column justify-content-center align-items-start">
                                            <p>
                                                <i class="bi bi-geo-alt" style="color: #F7941D"></i>
                                                موقع السيارة:</p>

                                            <input type="text" class="bg-transparent dark-placeholder form-control input"
                                                row="15" name="carPosition" placeholder=" اليمن - تعز - حي المسبح"
                                                {{ old('carPosition', $car->carPosition ?? null) }}>
                                        </div>

                                        <br>
                                        <div
                                            class="col-12 col-md-3 mb-4  d-flex flex-column  justify-content-center align-items-start " style="height: 100px">
                                            
                                            <p class="mb-0">
                                                <i class="bi bi-server" style="color: #F7941D"></i>
                                                حالة السيارة:</p>
                                            </p>
                                            <div class="d-flex gap-3 align-items-end alert alert-warning input select mt-0">
                                                <div class="form-check d-flex justify-content-center align-items-center ">
                                                    <input type="radio" name="status" id="used" value="0">
                                                    <label class="form-check-label me-2" for="used">
                                                        {{ App\Models\Car::getStatus('0') }}
                                                    </label>
                                                </div>
                                                <div class="form-check d-flex justify-content-center align-items-center">
                                                    <input type="radio" name="status" id="new" value="1">
                                                    <label class="form-check-label me-2" for="new">
                                                        {{ App\Models\Car::getStatus('1') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-100 d-flex align-items-end mb-3">
                                            <i class="bi bi-images ms-2" style="color: #F7941D"></i>
                                            صور السيارة: </div>

                                        <div
                                            class="col-md-12 col-lg-6 mb-4 d-flex justify-content-center align-items-center flex-column ">
                                            <label class="label image w-100">الصورة الرئيسية </label>
                                            <input type="file" name="thumbnail" value="{{ old('thumbnail') }}"
                                                class="dropify" data-height="200" data-show-errors="true">
                                        </div>
                                        <div
                                            class="col-md-12 col-lg-6 mb-4 d-flex justify-content-center flex-column align-items-center">
                                            <label class="label image w-100 ">صور السيارة</label>
                                            <input type="file" name="car_images[]" class="dropify" multiple>
                                        </div>
                                       
                                        <div class="w-100 d-flex align-items-end mb-3">
                                            <i class="bi bi-journal-text ms-2" style="color: #F7941D"></i>
                                        تفاصيل اضافية عن السيارة: </div>

                                        <div
                                       
                                        <div class="col-12 w-100  mb-4 d-flex justify-content-center align-items-center">
                                            <textarea type="text"  class="bg-transparent dark-placeholder form-control myTextarea" row="20" name="description"
                                                placeholder="وصف السيارة" dir="rtl"
                                                {{ old('description', $car->description ?? null) }}></textarea>
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                    <input type="submit" class="btn  w-75 fw-bold ms-2" style="background-color: #F7941D;" value="اضافة الى المزاد" />
                                    <input type="reset" class="btn btn-dark w-25 fw-bold" value="الغاء" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
