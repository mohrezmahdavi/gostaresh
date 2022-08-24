@extends('layouts.dashboard')

@section('title-tag')
    وضعیت نرخ بیکاری
@endsection

@section('breadcrumb-title')
    وضعیت نرخ بیکاری
@endsection

@section('page-title')
    وضعیت نرخ بیکاری

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    @can('create-any-UnemploymentRate')
        <span>
            <a href="{{ route('unemployment.rate.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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

                                    @include('admin.gostaresh.unemployment-rate.list.partials.thead')


                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($unemploymentRates as $key => $unemploymentRate)
                                    <tr>
                                        <th scope="row">{{ $unemploymentRates?->firstItem() + $key }}</th>

                                        @include('admin.gostaresh.unemployment-rate.list.partials.tbody')

                                        <td>

                                            @can('edit-any-UnemploymentRate')
                                                <a href="{{ route('unemployment.rate.edit', $unemploymentRate) }}"
                                                    title="{{ __('validation.buttons.edit') }}"
                                                    class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                            @endcan

                                            @can('delete-any-UnemploymentRate')
                                                <form method="POST"
                                                    action="{{ route('unemployment.rate.destroy', $unemploymentRate) }}"
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
                                excelLink="{{ route('unemployment.rate.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('unemployment.rate.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('unemployment.rate.list.print', request()->query->all()) }}" />
                        </div>
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $unemploymentRates->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <x-gostaresh.unemployment-rate.line-chart-by-all-fields-year-component></x-gostaresh.unemployment-rate.line-chart-by-all-fields-year-component>
        </div>

        <div class="col-md-6">
            <x-gostaresh.unemployment-rate.pie-chart-education-id-unemployment-rate-component></x-gostaresh.unemployment-rate.pie-chart-education-id-unemployment-rate-component>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
