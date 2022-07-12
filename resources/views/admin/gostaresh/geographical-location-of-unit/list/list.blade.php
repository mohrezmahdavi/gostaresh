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
                                <select-province-inline-component province_default="{{ request()->province_id }}"
                                    county_default="{{ request()->county_id }}" city_default="{{ request()->city_id }}"
                                    rural_district_default="{{ request()->rural_district_id }}">
                                </select-province-inline-component>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <x-search-date name="date" startDate="{{ request()->input('start_date') }}"
                                    endDate="{{ request()->input('end_date') }}">
                                </x-search-date>
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
                                    <th>شهرستان </th>
                                    <th>واحد دانشگاهی</th>
                                    <th>ساختمان واحد دانشگاهی</th>
                                    <th>فاصله از تراکم جمعیتی شهر</th>
                                    <th>فاصله از مرکز استان</th>
                                    <th>نوع اقلیم و شرایط آب و هوایی</th>
                                    <th>فاصله تا نزدیکترین مرکز آموزش عالی</th>
                                    <th>فاصله تا نزدیکترین واحد دانشگاه آزاد</th>
                                    <th>سطح و کیفیت دسترسی</th>
                                    <th>فرصت های بین الملی موقعیت جغرافیایی</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($geographicalLocationOfUnits as $key => $geographicalLocationOfUnit)
                                    <tr>
                                        <th scope="row">{{ $geographicalLocationOfUnits?->firstItem() + $key }}</th>

                                        <td>{{ $geographicalLocationOfUnit?->province?->name . ' - ' . $geographicalLocationOfUnit->county?->name }}
                                        </td>
                                        <td>{{ $geographicalLocationOfUnit?->unit_university }}</td>
                                        <td>{{ $geographicalLocationOfUnit?->university_building }}</td>
                                        <td>{{ $geographicalLocationOfUnit?->distance_from_population_density_of_city }}
                                        </td>
                                        <td>{{ $geographicalLocationOfUnit?->distance_from_center_of_province }}</td>
                                        <td>{{ $geographicalLocationOfUnit?->climate_type_and_weather_conditions_title }}
                                        </td>
                                        <td>{{ $geographicalLocationOfUnit?->distance_to_the_nearest_higher_education_center }}
                                        </td>
                                        <td>{{ $geographicalLocationOfUnit?->distance_to_the_nearest_unit_of_azad_university }}
                                        </td>
                                        <td>{{ $geographicalLocationOfUnit?->level_and_quality_of_access_title }}</td>
                                        <td>{{ $geographicalLocationOfUnit?->international_opportunities_geographical_location_title }}
                                        </td>
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
                            <a href="{{ route('geographical.location.unit.list.excel', request()->query->all()) }}"
                                class="btn btn-success ">خروجی اکسل</a>
    
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
