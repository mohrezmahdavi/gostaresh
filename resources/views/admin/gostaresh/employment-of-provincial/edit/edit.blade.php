@extends('layouts.dashboard')

@section('title-tag')
ویرایش وضعیت اشتغال شهرستان های استان به روش ترکیب-سهم
@endsection

@section('breadcrumb-title')
ویرایش وضعیت اشتغال شهرستان های استان به روش ترکیب-سهم
@endsection

@section('page-title')
ویرایش وضعیت اشتغال شهرستان های استان به روش ترکیب-سهم
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" id="app">
                    @include('admin.partials.row-notifiy-col')
                    <form class="form-horizontal" method="POST" action="{{ route('employment.of.provincial.update', $employmentOfProvincial) }}" role="form">
                        @csrf
                        <select-province-component province_default="{{ $employmentOfProvincial->province_id }}"
                            county_default="{{ $employmentOfProvincial->county_id }}"
                            city_default="{{ $employmentOfProvincial->city_id }}"
                            rural_district_default="{{ $employmentOfProvincial->rural_district_id }}">
                        </select-province-component>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="agriculture_hunting_forestry">
                                <span>کشاورزی، شکار و جنگلداری </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="agriculture_hunting_forestry" name="agriculture_hunting_forestry"
                                    value="{{ $employmentOfProvincial->agriculture_hunting_forestry }}" class="form-control"
                                    placeholder=" کشاورزی، شکار و جنگلداری را وارد کنید...">
                            </div>
                        </div>

                        
                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="mining_construction">
                                <span>استخراج معدن - ساخت </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="mining_construction" name="mining_construction"
                                    value="{{ $employmentOfProvincial->mining_construction }}" class="form-control"
                                    placeholder="  استخراج معدن - ساخت را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="water_electricity_natural_gas_supply">
                                <span>تامین آب، برق و گاز طبیعی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="water_electricity_natural_gas_supply" name="water_electricity_natural_gas_supply"
                                    value="{{ $employmentOfProvincial->water_electricity_natural_gas_supply }}" class="form-control"
                                    placeholder="  تامین آب، برق و گاز طبیعی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="building">
                                <span>ساختمان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="building" name="building"
                                    value="{{ $employmentOfProvincial->building }}" class="form-control"
                                    placeholder="  ساختمان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="wholesale_retail_vehicle_repair_supply">
                                <span>عمده فروشی، خرده فروشی، تعمیر وسایل نقلیه و تامین کالا </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="wholesale_retail_vehicle_repair_supply" name="wholesale_retail_vehicle_repair_supply"
                                    value="{{ $employmentOfProvincial->wholesale_retail_vehicle_repair_supply }}" class="form-control"
                                    placeholder="  عمده فروشی، خرده فروشی، تعمیر وسایل نقلیه و تامین کالا را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="hotel_and_restaurant">
                                <span>هتل و رسنوران </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="hotel_and_restaurant" name="hotel_and_restaurant"
                                    value="{{ $employmentOfProvincial->hotel_and_restaurant }}" class="form-control"
                                    placeholder="  هتل و رسنوران را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="transportation_warehousing_communications">
                                <span>حمل و نقل، انبارداری و ارتباطات </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="transportation_warehousing_communications" name="transportation_warehousing_communications"
                                    value="{{ $employmentOfProvincial->transportation_warehousing_communications }}" class="form-control"
                                    placeholder="  حمل و نقل، انبارداری و ارتباطات را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="financial_intermediation">
                                <span>واسطه گری های مالی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="financial_intermediation" name="financial_intermediation"
                                    value="{{ $employmentOfProvincial->financial_intermediation }}" class="form-control"
                                    placeholder="  واسطه گری های مالی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="office_of_public_affairs_urban_services">
                                <span>اداره امور عمومی و خدمات شهری، دفاع، و تامین اجتماعی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="office_of_public_affairs_urban_services" name="office_of_public_affairs_urban_services"
                                    value="{{ $employmentOfProvincial->office_of_public_affairs_urban_services }}" class="form-control"
                                    placeholder="  اداره امور عمومی و خدمات شهری، دفاع، و تامین اجتماعی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="education">
                                <span>آموزش </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="education" name="education"
                                    value="{{ $employmentOfProvincial->education }}" class="form-control"
                                    placeholder="   آموزش را وارد کنید...">
                            </div>
                        </div>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="health_and_social_work">
                                <span>بهداشت و مددکاری اجتماعی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="health_and_social_work" name="health_and_social_work"
                                    value="{{ $employmentOfProvincial->health_and_social_work }}" class="form-control"
                                    placeholder="   بهداشت و مددکاری اجتماعی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="activities_of_employed_households">
                                <span>فعالیت های خانوارهای دارای مستخدم </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="activities_of_employed_households" name="activities_of_employed_households"
                                    value="{{ $employmentOfProvincial->activities_of_employed_households }}" class="form-control"
                                    placeholder="   فعالیت های خانوارهای دارای مستخدم را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="overseas_organizations_and_delegations">
                                <span>سازمان ها و هیات های برون مرزی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="overseas_organizations_and_delegations" name="overseas_organizations_and_delegations"
                                    value="{{ $employmentOfProvincial->overseas_organizations_and_delegations }}" class="form-control"
                                    placeholder="   سازمان ها و هیات های برون مرزی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="real_estates">
                                <span>املاک و مستغلات </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="real_estates" name="real_estates"
                                    value="{{ $employmentOfProvincial->real_estates }}" class="form-control"
                                    placeholder="   املاک و مستغلات را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="professional_scientific_technical_activities">
                                <span>فعالیت های حرفه ای ، علمی و فنی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="professional_scientific_technical_activities" name="professional_scientific_technical_activities"
                                    value="{{ $employmentOfProvincial->professional_scientific_technical_activities }}" class="form-control"
                                    placeholder="   فعالیت های حرفه ای ، علمی و فنی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="office_and_support_services">
                                <span>اداری و خدمات پشتیبانی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="office_and_support_services" name="office_and_support_services"
                                    value="{{ $employmentOfProvincial->office_and_support_services }}" class="form-control"
                                    placeholder="   اداری و خدمات پشتیبانی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="art_and_entertainment">
                                <span>هنر  و سرگرمی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="art_and_entertainment" name="art_and_entertainment"
                                    value="{{ $employmentOfProvincial->art_and_entertainment }}" class="form-control"
                                    placeholder="   هنر  و سرگرمی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="other_services">
                                <span>سایر خدمات </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="other_services" name="other_services"
                                    value="{{ $employmentOfProvincial->other_services }}" class="form-control"
                                    placeholder="   سایر خدمات را وارد کنید...">
                            </div>
                        </div>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="year">
                                <span> سال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="year" id="year" class="form-select">
                                    @for ($i = 1250; $i <= 1405; $i++)
                                        <option {{ $i == $employmentOfProvincial->year ? 'selected' : '' }} value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor

                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="month">
                                <span> ماه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="month" id="month" class="form-select">
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option {{ $i == $employmentOfProvincial->month ? 'selected' : '' }} value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor

                                </select>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary  mt-3">افزودن</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
