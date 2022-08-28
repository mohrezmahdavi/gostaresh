@extends('layouts.dashboard')

@section('title-tag')
    وضعیت اشتغال شهرستان های استان
@endsection

@section('breadcrumb-title')
    وضعیت اشتغال شهرستان های استان
@endsection

@section('page-title')
    وضعیت اشتغال شهرستان های استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    @can('create-any-EmploymentOfProvincial')
        <span>
            <a href="{{ route('employment.of.provincial.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
        </span>
    @endcan
@endsection

@section('styles-head')
<!-- Apex js-->
<script src="{{ asset('assets/admin/libs/apexcharts/apexcharts.min.js') }}"></script>
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')

    <x-gostaresh.filter-table-list.filter-table-list-component :filterColumnsCheckBoxes="$filterColumnsCheckBoxes" :yearSelectedList="$yearSelectedList" :fieldsProvinceSelect="[
        'province' => true,
        'zone' => false,
        'county' => true,
        'city' => false,
    ]" />

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-light">

                                <tr>
                                    <th>#</th>
                                    @include('admin.gostaresh.employment-of-provincial.list.partials.thead')

                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($employmentOfProvincials as $key => $employmentOfProvincial)
                                    <tr>
                                        <th scope="row">{{ $employmentOfProvincials?->firstItem() + $key }}</th>

                                        @include('admin.gostaresh.employment-of-provincial.list.partials.tbody')
                                        <td>

                                            @can('edit-any-EmploymentOfProvincial')
                                                <a href="{{ route('employment.of.provincial.edit', $employmentOfProvincial) }}"
                                                    title="{{ __('validation.buttons.edit') }}"
                                                    class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                            @endcan

                                            @can('delete-any-EmploymentOfProvincial')
                                                <form method="POST"
                                                    action="{{ route('employment.of.provincial.destroy', $employmentOfProvincial) }}"
                                                    role="form">
                                                    @csrf
                                                    {{ method_field('delete') }}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="{{ __('validation.buttons.delete') }}">
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
                                excelLink="{{ route('employment.of.provincial.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('employment.of.provincial.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('employment.of.provincial.list.print', request()->query->all()) }}" />
                        </div>
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $employmentOfProvincials->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        {{-- <div class="col-md-12">
            <x-gostaresh.employment-of-provincial.line-chart-by-all-fields-year-component></x-gostaresh.employment-of-provincial.line-chart-by-all-fields-year-component>
        </div> --}}

        <div class="col-md-3">
            <x-gostaresh.employment-of-provincial.pie-chart-agriculture-hunting-forestry-employment-of-provincial-component></x-gostaresh.employment-of-provincial.pie-chart-agriculture-hunting-forestry-employment-of-provincial-component>
        </div>

        <div class="col-md-3">
            <x-gostaresh.employment-of-provincial.pie-chart-mining-construction-employment-of-provincial-component></x-gostaresh.employment-of-provincial.pie-chart-mining-construction-employment-of-provincial-component>
        </div>

        <div class="col-md-3">
            <x-gostaresh.employment-of-provincial.pie-chart-water-electricity-natural-gas-supply-employment-of-provincial-component></x-gostaresh.employment-of-provincial.pie-chart-water-electricity-natural-gas-supply-employment-of-provincial-component>
        </div>

        <div class="col-md-3">
            <x-gostaresh.employment-of-provincial.pie-chart-building-employment-of-provincial-component></x-gostaresh.employment-of-provincial.pie-chart-building-employment-of-provincial-component>
        </div>

        <div class="col-md-3">
            <x-gostaresh.employment-of-provincial.pie-chart-wholesale-retail-vehicle-repair-supply-employment-of-provincial-component></x-gostaresh.employment-of-provincial.pie-chart-wholesale-retail-vehicle-repair-supply-employment-of-provincial-component>
        </div>

        <div class="col-md-3">
            <x-gostaresh.employment-of-provincial.pie-chart-hotel-and-restaurant-employment-of-provincial-component></x-gostaresh.employment-of-provincial.pie-chart-hotel-and-restaurant-employment-of-provincial-component>
        </div>

        <div class="col-md-3">
            <x-gostaresh.employment-of-provincial.pie-chart-transportation-warehousing-communications-employment-of-provincial-component></x-gostaresh.employment-of-provincial.pie-chart-transportation-warehousing-communications-employment-of-provincial-component>
        </div>

        <div class="col-md-3">
            <x-gostaresh.employment-of-provincial.pie-chart-financial-intermediation-employment-of-provincial-component></x-gostaresh.employment-of-provincial.pie-chart-financial-intermediation-employment-of-provincial-component>
        </div>

        <div class="col-md-3">
            <x-gostaresh.employment-of-provincial.pie-chart-office-of-public-affairs-urban-services-employment-of-provincial-component></x-gostaresh.employment-of-provincial.pie-chart-office-of-public-affairs-urban-services-employment-of-provincial-component>
        </div>

        <div class="col-md-3">
            <x-gostaresh.employment-of-provincial.pie-chart-education-employment-of-provincial-component></x-gostaresh.employment-of-provincial.pie-chart-education-employment-of-provincial-component>
        </div>

        <div class="col-md-3">
            <x-gostaresh.employment-of-provincial.pie-chart-health-and-social-work-employment-of-provincial-component></x-gostaresh.employment-of-provincial.pie-chart-health-and-social-work-employment-of-provincial-component>
        </div>

        <div class="col-md-3">
            <x-gostaresh.employment-of-provincial.pie-chart-activities-of-employed-households-employment-of-provincial-component></x-gostaresh.employment-of-provincial.pie-chart-activities-of-employed-households-employment-of-provincial-component>
        </div>

        <div class="col-md-3">
            <x-gostaresh.employment-of-provincial.pie-chart-overseas-organizations-and-delegations-employment-of-provincial-component></x-gostaresh.employment-of-provincial.pie-chart-overseas-organizations-and-delegations-employment-of-provincial-component>
        </div>

        <div class="col-md-3">
            <x-gostaresh.employment-of-provincial.pie-chart-real-estates-employment-of-provincial-component></x-gostaresh.employment-of-provincial.pie-chart-real-estates-employment-of-provincial-component>
        </div>

        <div class="col-md-3">
            <x-gostaresh.employment-of-provincial.pie-chart-professional-scientific-technical-activities-employment-of-provincial-component></x-gostaresh.employment-of-provincial.pie-chart-professional-scientific-technical-activities-employment-of-provincial-component>
        </div>

        <div class="col-md-3">
            <x-gostaresh.employment-of-provincial.pie-chart-office-and-support-services-employment-of-provincial-component></x-gostaresh.employment-of-provincial.pie-chart-office-and-support-services-employment-of-provincial-component>
        </div>

        <div class="col-md-3">
            <x-gostaresh.employment-of-provincial.pie-chart-art-and-entertainment-employment-of-provincial-component></x-gostaresh.employment-of-provincial.pie-chart-art-and-entertainment-employment-of-provincial-component>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
