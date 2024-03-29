@extends('layouts.dashboard')

@section('title-tag')
    میانگین رتبه آزمون سراسری 30 درصد اول پذیرفته شدگان
@endsection

@section('breadcrumb-title')
    میانگین رتبه آزمون سراسری 30 درصد اول پذیرفته شدگان
@endsection

@section('page-title')
    میانگین رتبه آزمون سراسری 30 درصد اول پذیرفته شدگان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    @can("create-any-AverageTestScoreOfTheFirstThirtyPercentOfAdmitted")
        <span>
        <a href="{{ route('average.test.score.of.the.first.thirty.percent.of.admitted.create')  }}"
           class="btn btn-success btn-sm">افزودن رکوردجدید</a>
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
                                @include('admin.gostaresh.average-test-score-of-the-first-thirty-percent-of-admitted.list.partials.thead')
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                            @foreach ($averageTestScoreOfTheFirstThirtyPercentOfAdmitteds as $key => $averageTestScoreOfTheFirstThirtyPercentOfAdmitted)
                                <tr>
                                    <th scope="row">
                                        {{ $averageTestScoreOfTheFirstThirtyPercentOfAdmitteds?->firstItem() + $key }}
                                    </th>


                                    @include('admin.gostaresh.average-test-score-of-the-first-thirty-percent-of-admitted.list.partials.tbody')
                                    <td>

                                        @can("edit-any-AverageTestScoreOfTheFirstThirtyPercentOfAdmitted")
                                            <a href="{{ route('average.test.score.of.the.first.thirty.percent.of.admitted.edit', $averageTestScoreOfTheFirstThirtyPercentOfAdmitted) }}"
                                               title="{{ __('validation.buttons.edit') }}"
                                               class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        @endcan

                                        @can("delete-any-AverageTestScoreOfTheFirstThirtyPercentOfAdmitted")
                                            <form method="POST"
                                                  action="{{ route('average.test.score.of.the.first.thirty.percent.of.admitted.destroy', $averageTestScoreOfTheFirstThirtyPercentOfAdmitted) }}"
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
                                excelLink="{{ route('average.test.score.of.the.first.thirty.percent.of.admitted.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('average.test.score.of.the.first.thirty.percent.of.admitted.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('average.test.score.of.the.first.thirty.percent.of.admitted.list.print', request()->query->all()) }}"/>
                        </div>
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $averageTestScoreOfTheFirstThirtyPercentOfAdmitteds->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <x-gostaresh.average-test-score-of-the-first-thirty-percent-of-admitted.line-chart-all-fields-by-year-component/>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
