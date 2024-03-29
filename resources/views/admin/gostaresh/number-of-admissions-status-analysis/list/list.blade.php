@extends('layouts.dashboard')

@section('title-tag')
    تعداد پذیرفته شدگان
@endsection

@section('breadcrumb-title')
    تعداد پذیرفته شدگان
@endsection

@section('page-title')
    تعداد پذیرفته شدگان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    @can("create-any-NumberOfAdmissionsStatusAnalysis")
        <span>
        <a href="{{ route('number.of.admissions.status.analysis.create')  }}" class="btn btn-success btn-sm">افزودن رکورد
            جدید</a>
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
                                @include('admin.gostaresh.number-of-admissions-status-analysis.list.partials.thead')
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                            @foreach ($numberOfAdmissionsStatusAnalysises as $key => $numberOfAdmissionsStatusAnalysis)
                                <tr>
                                    <th scope="row">{{ $numberOfAdmissionsStatusAnalysises?->firstItem() + $key }}
                                    </th>
                                    @include('admin.gostaresh.number-of-admissions-status-analysis.list.partials.tbody')

                                    <td>

                                        @can("edit-any-NumberOfAdmissionsStatusAnalysis")
                                            <a href="{{ route('number.of.admissions.status.analysis.edit', $numberOfAdmissionsStatusAnalysis) }}"
                                               title="{{ __('validation.buttons.edit') }}"
                                               class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        @endcan

                                        @can("delete-any-NumberOfAdmissionsStatusAnalysis")
                                            <form method="POST"
                                                  action="{{ route('number.of.admissions.status.analysis.destroy', $numberOfAdmissionsStatusAnalysis) }}"
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
                                excelLink="{{ route('number.of.admissions.status.analysis.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('number.of.admissions.status.analysis.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('number.of.admissions.status.analysis.list.print', request()->query->all()) }}"/>
                        </div>
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $numberOfAdmissionsStatusAnalysises->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <x-gostaresh.number-of-admissions-status-analysis.line-chart-all-fields-by-year-component/>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
