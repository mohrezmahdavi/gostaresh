@extends('layouts.dashboard')

@section('title-tag')
    وضعیت نرخ مشارکت اقتصادی
@endsection

@section('breadcrumb-title')
    وضعیت نرخ مشارکت اقتصادی
@endsection

@section('page-title')
    وضعیت نرخ مشارکت اقتصادی

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    @can('create-any-EconomicParticipationRate')
        <span>
            <a href="{{ route('economic.participation.rate.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
        </span>
    @endcan
@endsection

@section('styles-head')
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
                                    @include('admin.gostaresh.economic-participation-rate.list.partials.thead')


                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($economicParticipationRates as $key => $economicParticipationRate)
                                    <tr>
                                        <th scope="row">{{ $economicParticipationRates?->firstItem() + $key }}</th>

                                        @include('admin.gostaresh.economic-participation-rate.list.partials.tbody')

                                        <td>

                                            @can('edit-any-EconomicParticipationRate')
                                                <a href="{{ route('economic.participation.rate.edit', $economicParticipationRate) }}"
                                                    title="{{ __('validation.buttons.edit') }}"
                                                    class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                            @endcan

                                            @can('delete-any-EconomicParticipationRate')
                                                <form method="POST"
                                                    action="{{ route('economic.participation.rate.destroy', $economicParticipationRate) }}"
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
                                excelLink="{{ route('economic.participation.rate.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('economic.participation.rate.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('economic.participation.rate.list.print', request()->query->all()) }}" />
                        </div>
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $economicParticipationRates->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-gostaresh.economic-participation-rate.line-chart-by-all-fields-year-component></x-gostaresh.economic-participation-rate.line-chart-by-all-fields-year-component>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
