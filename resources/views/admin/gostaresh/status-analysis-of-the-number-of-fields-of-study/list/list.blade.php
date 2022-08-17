@extends('layouts.dashboard')

@section('title-tag')
    تعداد تحلیل وضعیت تعداد رشته های تحصیلی
@endsection

@section('breadcrumb-title')
    تعداد تحلیل وضعیت تعداد رشته های تحصیلی
@endsection

@section('page-title')
    تعداد تحلیل وضعیت تعداد رشته های تحصیلی

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    @can("create-any-StatusAnalysisOfTheNumberOfFieldsOfStudy")

        <span>
        <a href="{{ route('status.analysis.of.the.number.of.fields.of.study.create') }}" class="btn btn-success btn-sm">افزودن
            رکورد جدید</a>
    </span>
    @endcan
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')



    <x-gostaresh.filter-table-list.filter-table-list-component :filterColumnsCheckBoxes="$filterColumnsCheckBoxes"
                                                               :yearSelectedList="$yearSelectedList"
                                                               :fieldsProvinceSelect="[
        'province' => true,
        'zone' => false,
        'county' => true,
        'city' => false,
    ]"/>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-light">

                            <tr>
                                <th>#</th>
                                @include('admin.gostaresh.status-analysis-of-the-number-of-fields-of-study.list.partials.thead')

                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                            @foreach ($statusAnalysisOfTheNumberOfFieldsOfStudies as $key => $statusAnalysisOfTheNumberOfFieldsOfStudy)
                                <tr>
                                    <th scope="row">
                                        {{ $statusAnalysisOfTheNumberOfFieldsOfStudies?->firstItem() + $key }}</th>

                                    @include('admin.gostaresh.status-analysis-of-the-number-of-fields-of-study.list.partials.tbody')

                                    <td>

                                        @can("edit-any-StatusAnalysisOfTheNumberOfFieldsOfStudy")
                                            <a href="{{ route('status.analysis.of.the.number.of.fields.of.study.edit', $statusAnalysisOfTheNumberOfFieldsOfStudy) }}"
                                               title="{{ __('validation.buttons.edit') }}"
                                               class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        @endcan

                                        @can("delete-any-StatusAnalysisOfTheNumberOfFieldsOfStudy")
                                        <form method="POST"
                                              action="{{ route('status.analysis.of.the.number.of.fields.of.study.destroy', $statusAnalysisOfTheNumberOfFieldsOfStudy) }}"
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
                                excelLink="{{ route('status.analysis.of.the.number.of.fields.of.study.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('status.analysis.of.the.number.of.fields.of.study.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('status.analysis.of.the.number.of.fields.of.study.list.print', request()->query->all()) }}"/>
                        </div>
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $statusAnalysisOfTheNumberOfFieldsOfStudies->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
