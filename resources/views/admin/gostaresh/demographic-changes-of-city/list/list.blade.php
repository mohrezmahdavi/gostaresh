@extends('layouts.dashboard')

@section('title-tag')
    لیست روند تحولات جمعیتی شهرستان های استان
@endsection

@section('breadcrumb-title')
    لیست روند تحولات جمعیتی شهرستان های استان
@endsection

@section('page-title')
    لیست روند تحولات جمعیتی شهرستان های استان
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
                                    <th>جمعیت </th>
                                    <th>نرخ مهاجرت</th>
                                    <th> نرخ رشد</th>
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

                                        <td>{{ $demographicChangesOfCity?->population }}</td>
                                        <td>{{ $demographicChangesOfCity?->immigration_rates }}</td>
                                        <td>{{ $demographicChangesOfCity?->growth_rate }}</td>
                                        <td>{{ $demographicChangesOfCity?->year }}</td>
                                        <td>{{ $demographicChangesOfCity?->month }}</td>
                                        <td>{{ $demographicChangesOfCity?->province->name . " - " . $demographicChangesOfCity?->county->name }}</td>
                                        <td>

                                            <a href="{{ route('demographic.changes.city.edit', $demographicChangesOfCity) }}"
                                                title="{{ __('validation.buttons.edit') }}"
                                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                            
                                            <a href="{{ route('demographic.changes.city.destroy', $demographicChangesOfCity) }}" }}"
                                                title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $demographicChangesOfCities->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')

@endsection