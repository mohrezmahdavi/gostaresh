@extends('layouts.dashboard')

@section('title-tag')
تحلیل وضعیت تعداد دوره های تحصیلی بین المللی
@endsection

@section('breadcrumb-title')
تحلیل وضعیت تعداد دوره های تحصیلی بین المللی
@endsection

@section('page-title')
تحلیل وضعیت تعداد دوره های تحصیلی بین المللی	

<span>
    <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
</span>
<span>
    <a href="{{ route('status.analysis.of.the.number.of.course.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                    <th>واحد</th>
                                    <th>تعداد کل دوره های تحصیلی</th>
                                    <th>تعداد دوره های تحصیلی بین المللی برگزار شده به زبان فارسی به صورت حضوری</th>
                                    <th>داد دوره های تحصیلی بین المللی برگزار شده به زبان فارسی به صورت مجازی</th>
                                    <th>تعداد دوره های تحصیلی بین المللی برگزار شده به زبان های کشورهای هدف به صورت حضوری</th>
                                    <th>تعداد دوره های تحصیلی بین المللی برگزار شده به زبان های کشورهای هدف به صورت مجازی</th>
                                    <th>سال</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($statusAnalysisOfTheNumberOfCourses as $key => $statusAnalysisOfTheNumberOfCourse)
                                    <tr>
                                        <th scope="row">{{ $statusAnalysisOfTheNumberOfCourses?->firstItem() + $key }}</th>

                                        <td>{{ $statusAnalysisOfTheNumberOfCourse?->province?->name . ' - ' . $statusAnalysisOfTheNumberOfCourse->county?->name }}
                                        </td>
                                        <td>{{ $statusAnalysisOfTheNumberOfCourse?->unit }}</td>
                                        <td>{{ $statusAnalysisOfTheNumberOfCourse?->total_number_of_courses }}</td>
                                        <td>{{ $statusAnalysisOfTheNumberOfCourse?->number_of_international_Persian_language_courses_in_person }}</td>
                                        <td>{{ $statusAnalysisOfTheNumberOfCourse?->number_of_international_virtual_Persian_language_courses }}</td>
                                        <td>{{ $statusAnalysisOfTheNumberOfCourse?->number_of_international_courses_in_the_target_language_in_person }}</td>
                                        <td>{{ $statusAnalysisOfTheNumberOfCourse?->number_of_international_courses_in_the_target_language_virtually }}</td>

                                        <td>{{ $statusAnalysisOfTheNumberOfCourse?->year }}</td>
                                        <td>

                                            <a href="{{ route('status.analysis.of.the.number.of.course.edit', $statusAnalysisOfTheNumberOfCourse) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>

                                            <a href="{{ route('status.analysis.of.the.number.of.course.destroy', $statusAnalysisOfTheNumberOfCourse) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $statusAnalysisOfTheNumberOfCourses->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
