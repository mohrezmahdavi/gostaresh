@extends('layouts.dashboard')

@section('title-tag')
    روند تغییرات درصد هزینه‌کرد بخش صنعت در تحقیق‌ و توسعه
@endsection

@section('breadcrumb-title')
    روند تغییرات درصد هزینه‌کرد بخش صنعت در تحقیق‌ و توسعه
@endsection

@section('page-title')
    روند تغییرات درصد هزینه‌کرد بخش صنعت در تحقیق‌ و توسعه

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    @can('create-any-IndustrialExpenditureResearch')
        <span>
            <a href="{{ route('industrial.expenditure.research.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                    @include('admin.gostaresh.industrial-expenditure-research.list.partials.thead')
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($industrialExpenditureResearches as $key => $industrialExpenditureResearch)
                                    <tr>
                                        <th scope="row">{{ $industrialExpenditureResearches?->firstItem() + $key }}</th>
                                        @include('admin.gostaresh.industrial-expenditure-research.list.partials.tbody')

                                        <td class="d-flex">
                                            @can('edit-any-IndustrialExpenditureResearch')
                                                <a href="{{ route('industrial.expenditure.research.edit', $industrialExpenditureResearch) }}"
                                                    title="{{ __('validation.buttons.edit') }}"
                                                    class="btn btn-warning btn-sm me-1"><i class="fa fa-edit"></i></a>
                                            @endcan

                                            @can('delete-any-IndustrialExpenditureResearch')
                                                <form method="POST"
                                                    action="{{ route('industrial.expenditure.research.destroy', $industrialExpenditureResearch) }}"
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
                                excelLink="{{ route('industrial.expenditure.research.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('industrial.expenditure.research.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('industrial.expenditure.research.list.print', request()->query->all()) }}" />
                        </div>
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $industrialExpenditureResearches->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <x-gostaresh.industrial-expenditure-research.line-chart-by-all-fields-year-component></x-gostaresh.industrial-expenditure-research.line-chart-by-all-fields-year-component>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
