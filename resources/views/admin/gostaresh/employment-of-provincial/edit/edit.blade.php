@extends('layouts.dashboard')

@section('title-tag')
    ویرایش وضعیت اشتغال شهرستان های استان به روش ترکیب-سهم
@endsection

@section('breadcrumb-title')
    ویرایش وضعیت اشتغال شهرستان های استان به روش ترکیب-سهم
@endsection

@section('page-title')
    ویرایش وضعیت اشتغال شهرستان های استان به روش ترکیب-سهم

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>

    <span>
        <a href="{{ route('employment.of.provincial.index') }}" class="btn btn-secondary btn-sm">بازگشت به لیست اطلاعات</a>
    </span>
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" id="app">
                    <form class="form-horizontal" method="POST"
                        action="{{ route('employment.of.provincial.update', $employmentOfProvincial) }}" role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $employmentOfProvincial->province_id ?? ''}}"
                            zone_default="{{ $employmentOfProvincial->county->zone ?? ''}}"
                            county_default="{{ $employmentOfProvincial->county_id ?? ''}}"
                            city_default="{{ $employmentOfProvincial->city_id ?? ''}}"
                            rural_district_default="{{ $employmentOfProvincial->rural_district_id ?? ''}}"
                            :fields="{{ json_encode([
                                'province' => true,
                                'zone' => false,
                                'county' => true,
                                'city' => false,
                            ]) }}">
                        </select-province-component>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="agriculture_hunting_forestry">
                                <span>کشاورزی، شکار و جنگلداری </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="agriculture_hunting_forestry" id="agriculture_hunting_forestry" class="form-select">
                                    @foreach (config('gostaresh.employment_status') as $key => $value)
                                        <option {{ $key == $employmentOfProvincial->agriculture_hunting_forestry ? 'selected' : '' }}
                                                value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="mining_construction">
                                <span>استخراج معدن - ساخت </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="mining_construction" id="mining_construction" class="form-select">
                                    @foreach (config('gostaresh.employment_status') as $key => $value)
                                        <option {{ $key == $employmentOfProvincial->mining_construction ? 'selected' : '' }}
                                                value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="water_electricity_natural_gas_supply">
                                <span>تامین آب، برق و گاز طبیعی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="water_electricity_natural_gas_supply" id="water_electricity_natural_gas_supply" class="form-select">
                                    @foreach (config('gostaresh.employment_status') as $key => $value)
                                        <option {{ $key == $employmentOfProvincial->water_electricity_natural_gas_supply ? 'selected' : '' }}
                                                value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="building">
                                <span>ساختمان </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="building" id="building" class="form-select">
                                    @foreach (config('gostaresh.employment_status') as $key => $value)
                                        <option {{ $key == $employmentOfProvincial->building ? 'selected' : '' }}
                                                value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="wholesale_retail_vehicle_repair_supply">
                                <span>عمده فروشی، خرده فروشی، تعمیر وسایل نقلیه و تامین کالا </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="wholesale_retail_vehicle_repair_supply" id="wholesale_retail_vehicle_repair_supply" class="form-select">
                                    @foreach (config('gostaresh.employment_status') as $key => $value)
                                        <option {{ $key == $employmentOfProvincial->wholesale_retail_vehicle_repair_supply ? 'selected' : '' }}
                                                value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="hotel_and_restaurant">
                                <span>هتل و رسنوران </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="hotel_and_restaurant" id="hotel_and_restaurant" class="form-select">
                                    @foreach (config('gostaresh.employment_status') as $key => $value)
                                        <option {{ $key == $employmentOfProvincial->hotel_and_restaurant ? 'selected' : '' }}
                                                value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="transportation_warehousing_communications">
                                <span>حمل و نقل، انبارداری و ارتباطات </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="transportation_warehousing_communications" id="transportation_warehousing_communications" class="form-select">
                                    @foreach (config('gostaresh.employment_status') as $key => $value)
                                        <option {{ $key == $employmentOfProvincial->transportation_warehousing_communications ? 'selected' : '' }}
                                                value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="financial_intermediation">
                                <span>واسطه گری های مالی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="financial_intermediation" id="financial_intermediation" class="form-select">
                                    @foreach (config('gostaresh.employment_status') as $key => $value)
                                        <option {{ $key == $employmentOfProvincial->financial_intermediation ? 'selected' : '' }}
                                                value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="office_of_public_affairs_urban_services">
                                <span>اداره امور عمومی و خدمات شهری، دفاع، و تامین اجتماعی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="office_of_public_affairs_urban_services" id="office_of_public_affairs_urban_services" class="form-select">
                                    @foreach (config('gostaresh.employment_status') as $key => $value)
                                        <option {{ $key == $employmentOfProvincial->office_of_public_affairs_urban_services ? 'selected' : '' }}
                                                value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="education">
                                <span>آموزش </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="education" id="education" class="form-select">
                                    @foreach (config('gostaresh.employment_status') as $key => $value)
                                        <option {{ $key == $employmentOfProvincial->education ? 'selected' : '' }}
                                                value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="health_and_social_work">
                                <span>بهداشت و مددکاری اجتماعی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="health_and_social_work" id="health_and_social_work" class="form-select">
                                    @foreach (config('gostaresh.employment_status') as $key => $value)
                                        <option {{ $key == $employmentOfProvincial->health_and_social_work ? 'selected' : '' }}
                                                value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="activities_of_employed_households">
                                <span>فعالیت های خانوارهای دارای مستخدم </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="activities_of_employed_households" id="activities_of_employed_households" class="form-select">
                                    @foreach (config('gostaresh.employment_status') as $key => $value)
                                        <option {{ $key == $employmentOfProvincial->activities_of_employed_households ? 'selected' : '' }}
                                                value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="overseas_organizations_and_delegations">
                                <span>سازمان ها و هیات های برون مرزی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="overseas_organizations_and_delegations" id="overseas_organizations_and_delegations" class="form-select">
                                    @foreach (config('gostaresh.employment_status') as $key => $value)
                                        <option {{ $key == $employmentOfProvincial->overseas_organizations_and_delegations ? 'selected' : '' }}
                                                value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="real_estates">
                                <span>املاک و مستغلات </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="real_estates" id="real_estates" class="form-select">
                                    @foreach (config('gostaresh.employment_status') as $key => $value)
                                        <option {{ $key == $employmentOfProvincial->real_estates ? 'selected' : '' }}
                                                value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="professional_scientific_technical_activities">
                                <span>فعالیت های حرفه ای ، علمی و فنی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="professional_scientific_technical_activities" id="professional_scientific_technical_activities" class="form-select">
                                    @foreach (config('gostaresh.employment_status') as $key => $value)
                                        <option {{ $key == $employmentOfProvincial->professional_scientific_technical_activities ? 'selected' : '' }}
                                                value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="office_and_support_services">
                                <span>اداری و خدمات پشتیبانی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="office_and_support_services" id="office_and_support_services" class="form-select">
                                    @foreach (config('gostaresh.employment_status') as $key => $value)
                                        <option {{ $key == $employmentOfProvincial->office_and_support_services ? 'selected' : '' }}
                                                value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="art_and_entertainment">
                                <span>هنر و سرگرمی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="art_and_entertainment" id="art_and_entertainment" class="form-select">
                                    @foreach (config('gostaresh.employment_status') as $key => $value)
                                        <option {{ $key == $employmentOfProvincial->art_and_entertainment ? 'selected' : '' }}
                                                value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="other_services">
                                <span>سایر خدمات </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="other_services" id="other_services" class="form-select">
                                    @foreach (config('gostaresh.employment_status') as $key => $value)
                                        <option {{ $key == $employmentOfProvincial->other_services ? 'selected' : '' }}
                                                value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <x-select-year :default="$employmentOfProvincial->year" min="{{ config('gostaresh.year.min', 1370) }}" max="{{ config('gostaresh.year.max', 1405) }}" :required="false" name="year"></x-select-year>

                        {{-- <x-select-month :default="$employmentOfProvincial->month" :required="false" name="month"></x-select-month> --}}




                        <button type="submit" class="btn btn-primary  mt-3">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
