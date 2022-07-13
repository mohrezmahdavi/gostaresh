@extends('layouts.dashboard')

@section('title-tag')
    لیست روند تحولات جمعیتی شهرستان های استان
@endsection

@section('breadcrumb-title')
    لیست روند تحولات جمعیتی شهرستان های استان
@endsection

@section('page-title')
    لیست روند تحولات جمعیتی شهرستان های استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('demographic.changes.city.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
    </span>
@endsection

@section('styles-head')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="{{ asset('assets/datepicker/mds.bs.datetimepicker.style.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/datepicker/mds.bs.datetimepicker.js') }}"></script>
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="get">
                        <div class="row" id="app">
                            <div class="col-md-12">
                                <select-province-inline-component
                                    province_default="{{ auth()->user()->province_id ?? request()->province_id }}"
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
                            <div class="col-md-2">
                                <label class="col-form-label">سال</label>
                                <select name="year" class="form-select" id="year">
                                    <option value="">همه</option>
                                    @foreach ($yearSelectedList as $yearSelected)
                                        <option value="{{ $yearSelected }}">{{ $yearSelected }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="mt-1">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="population">جمعیت</label>
                                        <input class="form-check-input" name="population" type="checkbox"
                                            {{ filterCol('population') == true ? 'checked' : '' }} id="population"
                                            value="1">
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="immigration_rates">نرخ مهاجرت</label>
                                        <input class="form-check-input" name="immigration_rates" type="checkbox"
                                            {{ filterCol('immigration_rates') == true ? 'checked' : '' }}
                                            id="immigration_rates" value="1">

                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="growth_rate">نرخ رشد</label>
                                        <input class="form-check-input" name="growth_rate" type="checkbox"
                                            {{ filterCol('growth_rate') == true ? 'checked' : '' }} id="growth_rate"
                                            value="1">

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
                                    @if (filterCol('population') == true)
                                        <th>جمعیت </th>
                                    @endif
                                    @if (filterCol('immigration_rates') == true)
                                        <th>نرخ مهاجرت</th>
                                    @endif
                                    @if (filterCol('growth_rate') == true)
                                        <th>نرخ رشد</th>
                                    @endif
                                    <th>سال</th>
                                    <th>ماه</th>
                                    <th>موقعیت</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($demographicChangesOfCities as $key => $demographicChangesOfCity)
                                    <tr>
                                        <th scope="row">{{ $demographicChangesOfCities?->firstItem() + $key }}</th>

                                        @if (filterCol('population') == true)
                                            <td>{{ $demographicChangesOfCity?->population }}</td>
                                        @endif
                                        @if (filterCol('immigration_rates') == true)
                                            <td>{{ $demographicChangesOfCity?->immigration_rates }}</td>
                                        @endif
                                        @if (filterCol('growth_rate') == true)
                                            <td>{{ $demographicChangesOfCity?->growth_rate }}</td>
                                        @endif



                                        <td>{{ $demographicChangesOfCity?->year }}</td>
                                        <td>{{ $demographicChangesOfCity?->month }}</td>
                                        <td>{{ $demographicChangesOfCity?->province?->name . ' - ' . $demographicChangesOfCity?->county?->name }}
                                        </td>
                                        <td>

                                            <a href="{{ route('demographic.changes.city.edit', $demographicChangesOfCity) }}"
                                                title="{{ __('validation.buttons.edit') }}"
                                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                                            <a href="{{ route('demographic.changes.city.destroy', $demographicChangesOfCity) }}"
                                                title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <div class="text-end mt-3">
                            <a href="{{ route('demographic.changes.city.list.excel', request()->query->all()) }}"
                                class="btn btn-success ">خروجی اکسل</a>

                        </div>
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $demographicChangesOfCities->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-gostaresh.demographic-changes-of-city.line-chart-by-population-component />
        </div>

        <div class="col-md-6">
            <x-gostaresh.demographic-changes-of-city.line-chart-by-immigration-rate-component />
        </div>

        <div class="col-md-6">
            <x-gostaresh.demographic-changes-of-city.line-chart-by-grow-rate-component />
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
