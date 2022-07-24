@extends('layouts.dashboard')

@section('title-tag')
    افزودن وضعیت جغرافیایی واحد و دسترسی به آن در استان
@endsection

@section('breadcrumb-title')
افزودن وضعیت جغرافیایی واحد و دسترسی به آن در استان
@endsection

@section('page-title')
افزودن وضعیت جغرافیایی واحد و دسترسی به آن در استان
<span>
    <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
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
                    <form class="form-horizontal" method="POST" action="{{ route('geographical.location.unit.store') }}" role="form">
                        @csrf

                        <select-province-component
                            province_default="{{ auth()->user()->province_id ?? '' }}"
                            zone_default="{{ auth()->user()->county->zone ?? ''}}"
                            county_default="{{ auth()->user()->county_id ?? '' }}"
                            city_default="{{ auth()->user()->city_id ?? '' }}"
                            rural_district_default="{{ auth()->user()->rural_district_id ?? '' }}">
                        </select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unit_university">
                                <span> واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit_university" name="unit_university" value="{{ old('unit_university') }}"
                                    class="form-control" placeholder="واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="university_building">
                                <span> ساختمان واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="university_building" name="university_building" value="{{ old('university_building') }}"
                                    class="form-control" placeholder="ساختمان واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="land_area">
                                <span> مساحت زمین </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" style="direction: rtl" id="land_area" name="land_area" value="{{ old('land_area') }}"
                                    class="form-control" placeholder="مساحت زمین را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="the_size_of_the_building">
                                <span> متراز ساختمانهای ملکی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" style="direction: rtl" id="the_size_of_the_building" name="the_size_of_the_building" value="{{ old('the_size_of_the_building') }}"
                                    class="form-control" placeholder="متراز ساختمانهای ملکی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="distance_from_population_density_of_city">
                                <span> فاصله از تراکم جمعیتی شهر </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" style="direction: rtl" id="distance_from_population_density_of_city" name="distance_from_population_density_of_city" value="{{ old('distance_from_population_density_of_city') }}"
                                    class="form-control" placeholder="فاصله از تراکم جمعیتی شهر را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="distance_from_center_of_province">
                                <span> فاصله از مرکز استان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" style="direction: rtl" id="distance_from_center_of_province" name="distance_from_center_of_province" value="{{ old('distance_from_center_of_province') }}"
                                    class="form-control" placeholder="فاصله از مرکز استان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="climate_type_and_weather_conditions">
                                <span> نوع اقلیم و شرایط آب و هوایی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="climate_type_and_weather_conditions" id="climate_type_and_weather_conditions" class="form-select" >
                                    @foreach (config('gostaresh.climates') as $key => $value)
                                    <option {{ ($key == old('climate_type_and_weather_conditions') ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="distance_to_the_nearest_higher_education_center">
                                <span> فاصله تا نزدیکترین مرکز آموزش عالی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="distance_to_the_nearest_higher_education_center" name="distance_to_the_nearest_higher_education_center" value="{{ old('distance_to_the_nearest_higher_education_center') }}"
                                    class="form-control" placeholder="فاصله تا نزدیکترین مرکز آموزش عالی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="distance_to_the_nearest_unit_of_azad_university">
                                <span> فاصله تا نزدیکترین واحد دانشگاه آزاد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="distance_to_the_nearest_unit_of_azad_university" name="distance_to_the_nearest_unit_of_azad_university" value="{{ old('distance_to_the_nearest_higher_education_center') }}"
                                    class="form-control" placeholder="فاصله تا نزدیکترین واحد دانشگاه آزاد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="level_and_quality_of_access">
                                <span> سطح و کیفیت دسترسی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="level_and_quality_of_access" id="level_and_quality_of_access" class="form-select" >
                                    @foreach (config('gostaresh.qualities') as $key => $value)
                                    <option {{ ($key == old('level_and_quality_of_access') ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="international_opportunities_geographical_location">
                                <span> فرصت های بین الملی موقعیت جغرافیایی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="international_opportunities_geographical_location" id="international_opportunities_geographical_location" class="form-select" >
                                    @foreach (config('gostaresh.qualities') as $key => $value)
                                    <option {{ ($key == old('international_opportunities_geographical_location') ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <x-select-year :default="old('year')" :required="false" name="year"></x-select-year>

                        <x-select-month :default="old('month')" :required="false" name="month"></x-select-month>


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
