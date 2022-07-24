@extends('layouts.dashboard')

@section('title-tag')
    وضعیت جغرافیایی واحد و دسترسی به آن در استان
@endsection

@section('breadcrumb-title')
    وضعیت جغرافیایی واحد و دسترسی به آن در استان
@endsection

@section('page-title')
    وضعیت جغرافیایی واحد و دسترسی به آن در استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('geographical.location.unit.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
    </span>
@endsection

@section('styles-head')

@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="get" id="app">
                        <div class="row">
                            <div class="col-md-12">
                                <select-province-inline-component
                                    province_default="{{ auth()->user()->province_id ?? request()->province_id }}"
                                    zone_default="{{ auth()->user()->county->zone ?? request()->zone_id }}"
                                    county_default="{{ auth()->user()->county_id ?? request()->county_id }}"
                                    city_default="{{ auth()->user()->city_id ?? request()->city_id }}"
                                    rural_district_default="{{ auth()->user()->rural_district_id ?? request()->rural_district_id }}">
                                </select-province-inline-component>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <x-search-date name="date" startDate="{{ request()->input('start_date') }}"
                                    endDate="{{ request()->input('end_date') }}">
                                </x-search-date>
                            </div>
                            <div class="col-md-8 mt-4">
                                <div class="mt-1">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="distance_from_population_density_of_city">فاصله
                                            از تراکم جمعیتی شهر</label>
                                        <input class="form-check-input" name="distance_from_population_density_of_city"
                                            type="checkbox"
                                            {{ filterCol('distance_from_population_density_of_city') == true ? 'checked' : '' }}
                                            id="distance_from_population_density_of_city" value="1">
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="distance_from_center_of_province">فاصله از مرکز
                                            استان</label>
                                        <input class="form-check-input" name="distance_from_center_of_province"
                                            type="checkbox"
                                            {{ filterCol('distance_from_center_of_province') == true ? 'checked' : '' }}
                                            id="distance_from_center_of_province" value="1">

                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="climate_type_and_weather_conditions_title">نوع
                                            اقلیم و شرایط آب و هوایی</label>
                                        <input class="form-check-input" name="climate_type_and_weather_conditions_title"
                                            type="checkbox"
                                            {{ filterCol('climate_type_and_weather_conditions_title') == true ? 'checked' : '' }}
                                            id="climate_type_and_weather_conditions_title" value="1">

                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label"
                                            for="distance_to_the_nearest_higher_education_center">فاصله تا نزدیکترین مرکز
                                            آموزش عالی</label>
                                        <input class="form-check-input"
                                            name="distance_to_the_nearest_higher_education_center" type="checkbox"
                                            {{ filterCol('distance_to_the_nearest_higher_education_center') == true ? 'checked' : '' }}
                                            id="distance_to_the_nearest_higher_education_center" value="1">

                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label"
                                            for="distance_to_the_nearest_unit_of_azad_university">فاصله تا نزدیکترین واحد
                                            دانشگاه آزاد</label>
                                        <input class="form-check-input"
                                            name="distance_to_the_nearest_unit_of_azad_university" type="checkbox"
                                            {{ filterCol('distance_to_the_nearest_unit_of_azad_university') == true ? 'checked' : '' }}
                                            id="distance_to_the_nearest_unit_of_azad_university" value="1">

                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="level_and_quality_of_access_title">سطح و کیفیت
                                            دسترسی</label>
                                        <input class="form-check-input" name="level_and_quality_of_access_title"
                                            type="checkbox"
                                            {{ filterCol('level_and_quality_of_access_title') == true ? 'checked' : '' }}
                                            id="level_and_quality_of_access_title" value="1">

                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label"
                                            for="international_opportunities_geographical_location_title">فرصت های بین الملی
                                            موقعیت جغرافیایی</label>
                                        <input class="form-check-input"
                                            name="international_opportunities_geographical_location_title" type="checkbox"
                                            {{ filterCol('international_opportunities_geographical_location_title') == true ? 'checked' : '' }}
                                            id="international_opportunities_geographical_location_title" value="1">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">جستجو</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-light">

                                <tr>
                                    <th>#</th>

                                    @include('admin.gostaresh.geographical-location-of-unit.list.partials.thead')
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($geographicalLocationOfUnits as $key => $geographicalLocationOfUnit)
                                    <tr>
                                        <th scope="row">{{ $geographicalLocationOfUnits?->firstItem() + $key }}</th>
                                        @include('admin.gostaresh.geographical-location-of-unit.list.partials.tbody')
                                        <td>

                                            <a href="{{ route('geographical.location.unit.edit', $geographicalLocationOfUnit) }}"
                                                title="{{ __('validation.buttons.edit') }}"
                                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                                            <a href="{{ route('geographical.location.unit.destroy', $geographicalLocationOfUnit) }}"
                                                title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-end mt-3">
                            <x-exports.export-links 
                                excelLink="{{ route('geographical.location.unit.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('geographical.location.unit.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('geographical.location.unit.list.print', request()->query->all()) }}"
                            />
                        </div>
                    </div> <!-- end table-responsive-->


                    <div class="mt-3">
                        {{ $geographicalLocationOfUnits->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <x-gostaresh.geographical-location-of-unit.line-chart-by-level-and-quality-of-access-component />
        </div>

        <div class="col-md-6">
            <x-gostaresh.geographical-location-of-unit.line-chart-by-international-opportunities-geographical-location-component />
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
