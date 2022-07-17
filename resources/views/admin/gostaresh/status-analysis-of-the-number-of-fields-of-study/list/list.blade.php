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
<span>
    <a href="{{ route('status.analysis.of.the.number.of.fields.of.study.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                    <th>واحد </th>
                                    <th>تعداد کل رشته های تحصیلی</th>
                                    <th>تعداد رشته های تحصیلی بین المللی</th>
                                    <th>تعداد رشته های تحصیلی مجازی</th>
                                    <th>تعداد رشته های فنی و حرفه ای و مهارتی</th>
                                    <th>تعداد رشته های تحصیلی جدید التاسیس</th>
                                    <th>تعداد رشته / محل های فاقد پذیرش</th>
                                    <th>تعداد رشته / محل های فاقد داوطلب</th>
                                    <th>تعدادرشته های تحصیلی مرتبط با حوزه GDP غالب استان</th>
                                    <th>تعداد رشته های تحصیلی منطبق با حوزه های شغلی مورد نیاز در شهرستان</th>
                                    <th>تعداد رشته های تحصیلی منطبق با تخصص های تعیین شده برای شهرستان</th>
                                    <th>تعداد واحدهای درسی ارایه شده به صورت مجازی</th>
                                    <th>تعداد رشته های تحصیلی پر مخاطب (با تعداد کل دانشجوی بیش از 80 درصد ظرفیت)</th>
                                    <th>تعداد رشته های تحصیلی کم مخاطب (با تعداد کل دانشجوی کمتر از 20 درصد ظرفیت)</th>
                                    <th>تعداد رشته های تحصیلی کمتر از 5 نفر</th>
                                    <th>تعداد رشته های تحصیلی بدون پذیرش</th>
                                    <th>تعداد رشته های تحصیلی پر متقاضی</th>
                                    <th>تعداد رشته های تحصیلی کم متقاضی</th>
                                    <th>سال</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($statusAnalysisOfTheNumberOfFieldsOfStudies as $key => $statusAnalysisOfTheNumberOfFieldsOfStudy)
                                    <tr>
                                        <th scope="row">{{ $statusAnalysisOfTheNumberOfFieldsOfStudies?->firstItem() + $key }}</th>

                                        <td>{{ $statusAnalysisOfTheNumberOfFieldsOfStudy?->province?->name . ' - ' . $statusAnalysisOfTheNumberOfFieldsOfStudy->county?->name }}
                                        </td>
                                        <td>{{ $statusAnalysisOfTheNumberOfFieldsOfStudy?->unit }}</td>
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->total_number_of_fields_of_study) }}</td>
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_international_courses) }}</td>
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_virtual_courses) }}</td>
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_technical_disciplines) }}</td>
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_newly_established_courses) }}</td>
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_courses_not_accepted) }}</td>
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_courses_without_volunteers) }}</td>
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_GDP_courses) }}</td>
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_disciplines_corresponding_to_job_fields) }}</td>
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_fields_corresponding_to_the_specified_specialties) }}</td>
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_courses_offered_virtually) }}</td>
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_popular_fields_more_than_eighty_percent_capacity) }}</td>
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_courses_with_low_audience) }}</td>
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_fields_of_less_than_5_people) }}</td>
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_courses_without_admission) }}</td>
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_popular_fields) }}</td>
                                        <td>{{ $statusAnalysisOfTheNumberOfFieldsOfStudy?->low_number_of_applicants }}</td>
                                        <td>{{ $statusAnalysisOfTheNumberOfFieldsOfStudy?->year }}</td>
                                        <td>

                                            <a href="{{ route('status.analysis.of.the.number.of.fields.of.study.edit', $statusAnalysisOfTheNumberOfFieldsOfStudy) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>

                                            <a href="{{ route('status.analysis.of.the.number.of.fields.of.study.destroy', $statusAnalysisOfTheNumberOfFieldsOfStudy) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

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
@endsection
