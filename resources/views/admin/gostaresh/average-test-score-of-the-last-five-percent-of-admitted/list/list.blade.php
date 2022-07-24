@extends('layouts.dashboard')

@section('title-tag')
میانگین رتبه آزمون سراسری 5 درصد آخر پذیرفته شدگان
@endsection

@section('breadcrumb-title')
میانگین رتبه آزمون سراسری 5 درصد آخر پذیرفته شدگان
@endsection

@section('page-title')
میانگین رتبه آزمون سراسری 5 درصد آخر پذیرفته شدگان

<span>
    <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
</span>
<span>
    <a href="{{ route('average.test.score.of.the.last.five.percent.of.admitted.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
</span>
@endsection

@section('styles-head')

@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')

    <x-gostaresh.filter-table-list.filter-table-list-component :filterColumnsCheckBoxes="$filterColumnsCheckBoxes"
    :yearSelectedList="$yearSelectedList"/>

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
                                    @if (filterCol('university_type_title') == true)
                                    <th>دانشگاه</th>
                                    @endif
                                    @if (filterCol('gender_title') == true)
                                    <th>جنسیت</th>
                                    @endif
                                    @if (filterCol('department_of_education_title') == true)
                                    <th>گروه عمده تحصیلی</th>
                                    @endif
                                    @if (filterCol('average_test_score_of_the_last_five_percent_of_admitted') == true)
                                    <th>مقدار</th>
                                    @endif
                                    @if (filterCol('year') == true)
                                        <th>سال</th>
                                    @endif
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($averageTestScoreOfTheLastFivePercentOfAdmitteds as $key => $averageTestScoreOfTheLastFivePercentOfAdmitted)
                                    <tr>
                                        <th scope="row">{{ $averageTestScoreOfTheLastFivePercentOfAdmitteds?->firstItem() + $key }}</th>

                                        <td>{{ $averageTestScoreOfTheLastFivePercentOfAdmitted?->province?->name . ' - ' . $averageTestScoreOfTheLastFivePercentOfAdmitted->county?->name }}
                                        </td>

                                        @if (filterCol('university_type_title') == true)
                                        <td>{{ $averageTestScoreOfTheLastFivePercentOfAdmitted?->university_type_title }}</td>
                                        @endif
                                        @if (filterCol('gender_title') == true)
                                        <td>{{ $averageTestScoreOfTheLastFivePercentOfAdmitted?->gender_title }}</td>
                                        @endif
                                        @if (filterCol('department_of_education_title') == true)
                                        <td>{{ $averageTestScoreOfTheLastFivePercentOfAdmitted?->department_of_education_title }}</td>
                                        @endif
                                        @if (filterCol('average_test_score_of_the_last_five_percent_of_admitted') == true)
                                        <td>{{ number_format($averageTestScoreOfTheLastFivePercentOfAdmitted?->average_test_score_of_the_last_five_percent_of_admitted) }}</td>
                                        @endif
                                        @if (filterCol('year') == true)
                                        <td>{{ $averageTestScoreOfTheLastFivePercentOfAdmitted?->year }}</td>
                                        @endif
                                        <td>

                                            <a href="{{ route('average.test.score.of.the.last.five.percent.of.admitted.edit', $averageTestScoreOfTheLastFivePercentOfAdmitted) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>

                                            <a href="{{ route('average.test.score.of.the.last.five.percent.of.admitted.destroy', $averageTestScoreOfTheLastFivePercentOfAdmitted) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $averageTestScoreOfTheLastFivePercentOfAdmitteds->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
