<div class="search-bar-top">
                                    <div class="search-bar">
                                        <h4 class="card-title">عرض بحسب</h4>
                                        <div style="display:flex;flex-direction:row ;padding:1%">
                                            <div class="col-lg-3">
                                                <select  class="form-select progLang" id="filterByCar"
                                                    onchange="searchFilter()">
                                                    <option value="" selected>اسم السيارة</option>

                                                    @foreach ($series as $item)
                                                        <option value="{{ $item->name }}">{{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-3">
                                                <select  class="form-select" id="filterByBrand"
                                                    onchange="searchFilterBrand()" >

                                                    <option value="" selected>ماركة السيارة</option>

                                                    @foreach ($brands as $item)
                                                        <option value="{{ $item->name }}">{{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-3 ">
                                                <select  class="form-select" id="filterByState"
                                                    onchange="searchFilterState()">
                                                    <option value="" selected="selected"> حالة المزاد</option>
                                                    @foreach (\App\Models\Auction::getAuctionStatusValues() as $key => $value)
                                                        <option value="{{ $value }}">
                                                            {{ $value }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input wire:model="search" type="text">
                                        </div>
                                    </div>

                                </div>