@extends('layouts.dashboard')

@section('title-tag')
وضعیت جغرافیایی واحد و دسترسی به آن در استان
@endsection

@section('breadcrumb-title')
وضعیت جغرافیایی واحد و دسترسی به آن در استان
@endsection

@section('page-title')
وضعیت جغرافیایی واحد و دسترسی به آن در استان
@endsection

@section('styles-head')

@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')

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
                                        <th scope="row">{{ $geographicalLocationOfUnit?->firstItem() + $key }}</th>

                                        <td>{{ $geographicalLocationOfUnit?->province?->name . ' - ' . $geographicalLocationOfUnit->county?->name }}</td>
                                        <td>{{ $geographicalLocationOfUnit?->unit_university }}</td>
                                        <td>{{ $geographicalLocationOfUnit?->university_building }}</td>
                                        <td>{{ $geographicalLocationOfUnit?->distance_from_population_density_of_city }}</td>
                                        <td>{{ $geographicalLocationOfUnit?->distance_from_center_of_province }}</td>
                                        <td>{{ $geographicalLocationOfUnit?->climate_type_and_weather_conditions }}</td>
                                        <td>{{ $geographicalLocationOfUnit?->distance_to_the_nearest_higher_education_center }}</td>
                                        <td>{{ $geographicalLocationOfUnit?->distance_to_the_nearest_unit_of_azad_university }}</td>
                                        <td>{{ $geographicalLocationOfUnit?->level_and_quality_of_access }}</td>
                                        <td>{{ $geographicalLocationOfUnit?->international_opportunities_geographical_location }}</td>
                                        <td>

                                            <a href="{{ route('geographical.location.unit.edit', $geographicalLocationOfUnit) }}"
                                                title="{{ __('validation.buttons.edit') }}"
                                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                            
                                            <a href="{{ route('geographical.location.unit.destroy', $geographicalLocationOfUnit) }}" }}"
                                                title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $geographicalLocationOfUnits->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')

@endsection