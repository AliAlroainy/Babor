@extends('partials.usermaster')
@section('body')

    <!-- MultiStep Form -->
    <div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="col-lg-10 col-md-8 col-sm-12 col text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3 shadow">
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
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform" action="{{ route('user.save.auction') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="auction"><strong>المزاد</strong></li>
                                    <li id="car"><strong>السيارة</strong></li>
                                    <li id="ensure"><strong>التاكيد</strong></li>
                                    <li id="confirm"><strong>تم</strong></li>
                                </ul> <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card row">
                                        <h2 class="fs-title">بيانات المزاد</h2>
                                        <div class="end-date col-12 col-md-5">
                                            <input type="date" name="closeDate" class="dark-placeholder form-control  mb-2"
                                            value="{{ old('name') }}"  placeholder="تاريخ الإنتهاء" />
                                        </div>
                                        <div class="col-md-5">
                                            <input type="number" name="startPrice"
                                            value="{{ old('startPrice') }}" class="dark-placeholder form-control mb-2" placeholder="السعر الإبتدائي" />
                                        </div>
                                        <div class="col-md-5">
                                            <input type="number" name="minInc" class="dark-placeholder form-control mb-2"
                                            value="{{ old('minInc') }}"  placeholder="الحد الادنى للمزايدة" />
                                        </div>
                                    </div>
                                    <input type="button" name="next"
                                        class="next action-button btn btn-warning w-auto fw-bold" value=" التالي" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">بيانات السيارة</h2>
                                        <div class="col-12 d-flex justify-content-between flex-wrap">
                                            <div class="col-sm-12 col-md-5 col-lg-2">
                                                <select id="brand" name="brand_id"
                                                    class="w-100 select dark-placeholder mb-2">
                                                    <option selected disabled>اختر البراند</option>
                                                    @if (isset($brands) && $brands->count() > 0)
                                                        @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}">{{ $brand->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-5 col-lg-3">
                                                <select id="series" name="series_id"
                                                    class="w-100 select dark-placeholder mb-2">
                                                    <option selected disabled>اختر سلسلة للبراند</option>
                                                </select>
                                            </div>
                                            {{-- <div class="col-sm-12 col-md-5 col-lg-3">
                                                <select name="jear" class="w-100 select dark-placeholder mb-2" id="">
                                                    <option value="" disabled selected>الجير</option>
                                                    <option value="">Toyota</option>
                                                    <option value="">Lexus</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-5 col-lg-3">
                                                <select name="cylinder_number" class="w-100  select dark-placeholder  mb-2"
                                                    id="">
                                                    <option value="" disabled selected>عدد البستونات</option>
                                                    <option value="">Toyota</option>
                                                    <option value="">Lexus</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-5 col-lg-2">
                                                <select name="fuel_type" class="w-100  select dark-placeholder  mb-2" id="">
                                                    <option value="" disabled selected>نوع الوقود</option>
                                                    <option value="">غاز</option>
                                                    <option value="">بترول</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-5 col-lg-3">
                                                <select name="engine_type" class="w-100 select dark-placeholder mb-2" id="">
                                                    <option value="" disabled selected>نوع المحرك</option>
                                                    <option value="">غاز</option>
                                                    <option value="">بترول</option>
                                                </select>
                                            </div> --}}
                                            <div class="col-sm-12 col-md-5 col-lg-2">
                                                <input type="text" class="form-control dark-placeholder py-10" name="model"
                                                value="{{ old('model') }}" placeholder="الموديل">
                                            </div>
                                            <div class="col-sm-12 col-md-5 col-lg-2">
                                                <input type="text" class="form-control dark-placeholder py-10" name="color"
                                                value="{{ old('color') }}" placeholder="اللون">
                                            </div>
                                            <div class="col-sm-12 col-md-5 col-lg-2">
                                                <input type="text" class="form-control dark-placeholder py-10"
                                                value="{{ old('numberOfKillos') }}"  name="numberOfKillos" placeholder="كم مشت كيلو">
                                            </div>
                                            <div class="col-sm-12 col-md-8">
                                                <textarea type="text" class="form-control dark-placeholder" row="20" name="carPosition"
                                                value="{{ old('carPosition') }}"    placeholder="موقع السيارة"></textarea>
                                            </div>
                                            <div class="col-12 col-md-5 col-lg-3">
                                                <div class="input-group control-group">
                                                    <input type="file" name="thumbnail"
                                                    value="{{ old('thumbnail') }}"  class="form-control dark-placeholder py-13">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-5 col-lg-3">
                                                <div class="input-group control-group">
                                                    <input type="file" name="car_images[]"
                                                  ض class="form-control dark-placeholder py-13" multiple>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-evenly flex-wrap gap-1">
                                           <div class="col-sm-12 col-md-5 col-lg-2 ">
                                               <select name="fuel_type" class="w-100  select dark-placeholder  mb-2" id="">
                                                   <option value="" disabled selected >نوع الوقود</option>
                                                   <option value="">غاز</option>
                                                   <option value="">بترول</option>
                                               </select>
                                           </div>
                                           <div class="col-sm-12 col-md-5 col-lg-2 ">
                                               <select name="engine_type" class="w-100  select dark-placeholder  mb-2" id="">
                                                   <option value="" disabled selected >نوع المحرك</option>
                                                   <option value="">غاز</option>
                                                   <option value="">بترول</option>
                                               </select>
                                           </div>
                                           <div class="col-sm-12 col-md-5 col-lg-2 ">
                                               <input type="color" name="carColor" id="carColor">
                                               <span id="color"></span>
                                           </div>
                                       </div>
                                    </div>
                                    <input type="button" name="previous"
                                        class="previous action-button-previous btn btn-secondary w-auto ms-3"
                                        value="السابق" />
                                    <input type="button" name="next"
                                        class="next action-button btn btn-warning w-auto fw-bold" value=" التالي" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">تأكيد صحة المدخلات</h2>
                                        <p class="text-center">هل انت متأكد من جميع البيانات المدخلة للمزاد</p>
                                    </div>
                                    <input type="button" name="previous"
                                        class="previous action-button-previous btn btn-secondary w-auto ms-3"
                                        value="السابق" />
                                    <input type="submit" name="next"
                                        class="next action-button btn btn-warning w-auto fw-bold" value=" التالي" />
                                </fieldset>
                                {{-- <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Payment Information</h2>
                                        <div class="radio-group">
                                            <div class='radio' data-value="credit">
                                                <img src="https://i.imgur.com/XzOzVHZ.jpg" width="200px" height="100px">
                                            </div>
                                            <div class='radio' data-value="paypal">
                                                <img src="https://i.imgur.com/jXjwZlj.jpg" width="200px" height="100px">
                                            </div>
                                            <br>
                                        </div>
                                        <label class="pay">Card Holder Name*</label>
                                        <input type="text" name="holdername" placeholder="" />
                                        <div class="row">
                                            <div class="col-9"> <label class="pay">Card Number*</label> <input type="text" name="cardno" placeholder="" /> </div>
                                            <div class="col-3"> <label class="pay">CVC*</label> <input type="password" name="cvcpwd" placeholder="***" /> </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3"> <label class="pay">Expiry Date*</label> </div>
                                            <div class="col-9"> <select class="list-dt" id="month" name="expmonth">
                                                    <option selected>Month</option>
                                                    <option>January</option>
                                                    <option>February</option>
                                                    <option>March</option>
                                                    <option>April</option>
                                                    <option>May</option>
                                                    <option>June</option>
                                                    <option>July</option>
                                                    <option>August</option>
                                                    <option>September</option>
                                                    <option>October</option>
                                                    <option>November</option>
                                                    <option>December</option>
                                                </select> <select class="list-dt" id="year" name="expyear">
                                                    <option selected>Year</option>
                                                </select> </div>
                                        </div>
                                    </div> <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> <input type="button" name="make_payment" class="next action-button" value="Confirm" />
                                </fieldset> --}}
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">تم بنجاح</h2> <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-3"> <img
                                                    src="https://img.icons8.com/color/96/000000/ok--v2.png"
                                                    class="fit-image"> </div>
                                        </div> <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-7 text-center">
                                                <h5>لقد انشأت مزادا جديدا</h5>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
