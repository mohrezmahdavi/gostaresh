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
@can("create-any-GeographicalLocationOfUnit")
    <span>
        <a href="{{ route('geographical.location.unit.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
    </span>
 @endcan

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
                                    province_default="{{ request()->province_id ?? auth()->user()->province_id ?? ''}}"
                                    zone_default="{{ request()->zone_id ?? auth()->user()->county->zone ?? ''}}"
                                    county_default="{{ request()->county_id ?? auth()->user()->county_id ?? ''}}"
                                    city_default="{{ request()->city_id ?? auth()->user()->city_id ?? ''}}"
                                    rural_district_default="{{ request()->rural_district_id ?? auth()->user()->rural_district_id ?? ''}}"
                                    :fields="{{ json_encode([
                                        'province' => true,
                                        'zone' => false,
                                        'county' => true,
                                        'city' => false,
                                    ]) }}">
                                </select-province-inline-component>
                            </div>
                        </div>
                        <div class="row mt-2">
                            {{-- <div class="col-md-4">
                                <x-search-date name="date" startDate="{{ request()->input('start_date') }}"
                                    endDate="{{ request()->input('end_date') }}">
                                </x-search-date>
                            </div> --}}
                            <div class="col-md-2">
                                <x-gostaresh.filter-table-list.select-year title="از سال" :default="request()->start_year"
                                    min="{{ config('gostaresh.year.min', 1370) }}"
                                    max="{{ config('gostaresh.year.max', 1405) }}" name="start_year">
                                </x-gostaresh.filter-table-list.select-year>
                            </div>

                            <div class="col-md-2">
                                <x-gostaresh.filter-table-list.select-year title="تا سال" :default="request()->end_year"
                                    min="{{ config('gostaresh.year.min', 1370) }}"
                                    max="{{ config('gostaresh.year.max', 1405) }}" name="end_year">
                                </x-gostaresh.filter-table-list.select-year>
                            </div>
                            <div class="col-md-8 mt-4">
                                <div class="mt-1">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="unit_university">واحد دانشگاهی</label>
                                        <input class="form-check-input" name="unit_university"
                                            type="checkbox"
                                            {{ filterCol('unit_university') == true ? 'checked' : '' }}
                                            id="unit_university" value="1">
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="university_building">ساختمان واحد دانشگاهی</label>
                                        <input class="form-check-input" name="university_building"
                                            type="checkbox"
                                            {{ filterCol('university_building') == true ? 'checked' : '' }}
                                            id="university_building" value="1">
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="land_area">مساحت زمین</label>
                                        <input class="form-check-input" name="land_area"
                                            type="checkbox"
                                            {{ filterCol('land_area') == true ? 'checked' : '' }}
                                            id="land_area" value="1">
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="the_size_of_the_building">متراژ ساختمانهای ملکی</label>
                                        <input class="form-check-input" name="the_size_of_the_building"
                                            type="checkbox"
                                            {{ filterCol('the_size_of_the_building') == true ? 'checked' : '' }}
                                            id="the_size_of_the_building" value="1">
                                    </div>
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

@can("edit-any-GeographicalLocationOfUnit")
                                            <a href="{{ route('geographical.location.unit.edit', $geographicalLocationOfUnit) }}"
                                                title="{{ __('validation.buttons.edit') }}"
                                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                   @endcan

@can("delete-any-GeographicalLocationOfUnit")
                                    <form method="POST" action="{{ route('geographical.location.unit.destroy', $geographicalLocationOfUnit) }}" role="form">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button  type="submit" class="btn btn-danger btn-sm" title="{{ __('validation.buttons.delete') }}">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </form>
 @endcan
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
