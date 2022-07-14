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
<span>
    <a href="{{ route('average.test.score.of.the.first.thirty.percent.of.admitted.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
</span>
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
                                    <th>دانشگاه </th>
                                    <th>جنسیت</th>
                                    <th>گروه عمده تحصیلی</th>
                                    <th>مقدار</th>
                                    <th>سال</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($averageTestScoreOfTheFirstThirtyPercentOfAdmitteds as $key => $averageTestScoreOfTheFirstThirtyPercentOfAdmitted)
                                    <tr>
                                        <th scope="row">{{ $averageTestScoreOfTheFirstThirtyPercentOfAdmitteds?->firstItem() + $key }}</th>
        
                                        <td>{{ $averageTestScoreOfTheFirstThirtyPercentOfAdmitted?->province?->name . ' - ' . $averageTestScoreOfTheFirstThirtyPercentOfAdmitted->county?->name }}
                                        </td>
                                        <td>{{ $averageTestScoreOfTheFirstThirtyPercentOfAdmitted?->university_type_title }}</td>
                                        <td>{{ $averageTestScoreOfTheFirstThirtyPercentOfAdmitted?->gender_title }}</td>
                                        <td>{{ $averageTestScoreOfTheFirstThirtyPercentOfAdmitted?->department_of_education_title }}</td>
                                        <td>{{ $averageTestScoreOfTheFirstThirtyPercentOfAdmitted?->average_test_score_of_the_first_thirty_percent_of_admitted }}</td>
                                        <td>{{ $averageTestScoreOfTheFirstThirtyPercentOfAdmitted?->year }}</td>
                                        <td>
        
                                            <a href="{{ route('average.test.score.of.the.first.thirty.percent.of.admitted.edit', $averageTestScoreOfTheFirstThirtyPercentOfAdmitted) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>
        
                                            <a href="{{ route('average.test.score.of.the.first.thirty.percent.of.admitted.destroy', $averageTestScoreOfTheFirstThirtyPercentOfAdmitted) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>
        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
        
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $averageTestScoreOfTheFirstThirtyPercentOfAdmitteds->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
