  @extends('partials.master')
  @section('body')
      <div class="main-panel">
          <div class="content-wrapper" style="position: relative">
              <div class="row">
                  <div class="col-lg-12 grid-margin stretch-card">
                      <div class="card">
                          <div class="card-body">
                              <div class="col-lg-12 col-md-7 col-12 " style="direction:ltr ;margin: right 0px;">
                                  <div class="search-bar-top">
                                      <div class="search-bar">
                                          <h4 class="card-title">عرض بحسب</h4>
                                          <div style="display:flex;flex-direction:row ;padding:1%">
                                              <div class="col-lg-3">
                                                  <select class="form-select progLang" id="filterByCar"
                                                      onchange="searchFilter()">
                                                      <option value="" selected>اسم السيارة</option>
                                                      <option value="توسان">توسان</option>
                                                      <option value="سنتافي">سنتافي</option>
                                                      <option value="برايد">برايد</option>
                                                      <option value="كامري">كامري</option>
                                                      <option value="نافارا">نافارا</option>
                                                      <option value="تورس">تورس</option>
                                                      <option value="النترا">النترا</option>
                                                      <option value="باترول">باترول</option>
                                                      <option value="رافور">رافور</option>
                                                      <option value="اكسنت">اكسنت</option>
                                                      <option value="سوناتا">سوناتا</option>

                                                  </select>
                                              </div>
                                              <div class="col-lg-3">
                                                  <select class="form-select" id="filterByBrand"
                                                      onchange="searchFilterBrand()">
                                                      <option value="" selected>ماركة السيارة</option>
                                                      <option value="هوانداي"> هوانداي</option>
                                                      <option value="تويوتا">تويوتا</option>
                                                      <option value="مرسيدس">مرسيدس</option>
                                                      <option value="كيا">كيا</option>
                                                      <option value="فورد">فورد</option>
                                                      <option value="GMC">GMC</option>
                                                      <option value="نيسان">نيسان</option>
                                                      <option value="BMW">BMW</option>
                                                      <option value="سوزوكي">سوزوكي</option>

                                                  </select>
                                              </div>
                                              <div class="col-lg-3 ">
                                                  <select class="form-select" id="filterByState"
                                                      onchange="searchFilterState()">
                                                      <option value="" selected="selected"> حالة المزاد</option>
                                                      @foreach (\App\Models\Auction::getAuctionStatusValues() as $key => $value)
                                                          <option value="{{ $value }}">
                                                              {{ $value }}
                                                          </option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                          </div>
                                      </div>

                                  </div>
                              </div>
                              <h4 class="card-title">عرض المزادات</h4>
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
                                                  ماركة السيارة
                                              </th>
                                              <th>
                                                  اسم السيارة
                                              </th>
                                              <th>
                                                  تاريخ الانتهاء
                                              </th>
                                              <th>
                                                  حالة المزاد
                                              </th>
                                              <th>
                                                  تفاصيل
                                              </th>
                                              <th>
                                                  عمليات
                                              </th>
                                          </tr>
                                      </thead>
                                      <tbody class="Auction_card">
                                          @foreach ($auctions as $auction)
                                              <tr
                                                  class="series {{ $auction->car->series->name }}  brand {{ $auction->car->brand->name }} state  {{ \App\Models\Auction::matchAuctionStatus($auction->status) }} ">
                                                  <td>
                                                      <h5> {{ $auction->car->brand->name }}</h5>
                                                  </td>
                                                  <td>
                                                      <h5> {{ $auction->car->series->name }} </h5>
                                                  </td>
                                                  <td>
                                                      <h5> {{ $auction->closeDate }}</h5>
                                                  </td>
                                                  <td>
                                                      <h5>
                                                          {{ \App\Models\Auction::matchAuctionStatus($auction->status) }}
                                                      </h5>
                                                  </td>
                                                  <td>
                                                      <a href="{{ route('admin.auction.details', $auction->id) }}"
                                                          class="main-color">
                                                          <h5> المزيد ..<i class="fa-solid fa-angles-left"></i>
                                                          </h5>
                                                      </a>
                                                  </td>
                                                  <td class="status status_filed">
                                                      <form action="{{ route('admin.auction.action', $auction->id) }}"
                                                          method="POST" class="d-flex justify-content-center">
                                                          @csrf
                                                          @if ($auction->status == '0')
                                                              <div class="d-flex">
                                                                  <button type="submit" name="approve"
                                                                      style="color:#71c016;"
                                                                      class="fs-25px btn btn-rounded fa-solid fa-circle-check">
                                                                  </button>
                                                                  <span style="color:#ff4747;"
                                                                      class="fs-25px btn btn-rounded fa-solid fa-circle-xmark"
                                                                      data-bs-target="#rejectReason-{{ $auction->id }}"
                                                                      data-bs-toggle="modal">
                                                                  </span>
                                                                  <div class="modal fade"
                                                                      id="rejectReason-{{ $auction->id }}" tabindex="-1"
                                                                      aria-hidden="true">
                                                                      <div class="modal-dialog" role="document">
                                                                          <div class="modal-content">
                                                                              <div class="modal-header">
                                                                                  <h5 class="modal-title"
                                                                                      id="exampleModalLabel1">بيان سبب
                                                                                      الرفض</h5>
                                                                              </div>
                                                                              <div class="modal-body">
                                                                                  <div class="row">
                                                                                      <div class="col mb-3">
                                                                                          <label for="editTitle"
                                                                                              class="form-label"> اكتب
                                                                                              السبب من فضلك
                                                                                          </label>
                                                                                          <input type="hidden"
                                                                                              name="disapprove">
                                                                                          <textarea name="reject_reason" class="form-control" cols="30" rows="10"></textarea>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="modal-footer">
                                                                                  <button type="button"
                                                                                      class="btn btn-outline-danger"
                                                                                      data-bs-dismiss="modal">إلغاء</button>
                                                                                  <button type="submit"
                                                                                      class="btn btn-warning text-white">حفظ</button>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          @elseif($auction->status == '2')
                                                              <button type="submit" name="disapprove" style="color:#71c016;"
                                                                  class="fs-25px btn btn-rounded fa-solid fa-circle-xmark"
                                                                  value="قبول"></button>
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
          </div>
      </div>
  @endsection
