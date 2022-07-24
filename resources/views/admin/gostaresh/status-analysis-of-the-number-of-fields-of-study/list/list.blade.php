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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="{{ asset('assets/datepicker/mds.bs.datetimepicker.style.css') }}" rel="stylesheet"/>
    <script src="{{ asset('assets/datepicker/mds.bs.datetimepicker.js') }}"></script>
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
                                    
                                    @foreach($filterColumnsCheckBoxes as $key => $value)
                                    @if( filterCol($key))
                                        <th>{{$value}}</th>
                                    @endif
                                    @endforeach
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($statusAnalysisOfTheNumberOfFieldsOfStudies as $key => $statusAnalysisOfTheNumberOfFieldsOfStudy)
                                    <tr>
                                        <th scope="row">{{ $statusAnalysisOfTheNumberOfFieldsOfStudies?->firstItem() + $key }}</th>

                                        <td>{{ $statusAnalysisOfTheNumberOfFieldsOfStudy?->province?->name . ' - ' . $statusAnalysisOfTheNumberOfFieldsOfStudy->county?->name }}
                                        </td>
                                        
                                        @if (filterCol('unit') == true)
                                        <td>{{ $statusAnalysisOfTheNumberOfFieldsOfStudy?->unit }}</td>
                                        @endif
                                        @if (filterCol('total_number_of_fields_of_study') == true)
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->total_number_of_fields_of_study) }}</td>
                                        @endif
                                        @if (filterCol('number_of_international_courses') == true)
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_international_courses) }}</td>
                                        @endif
                                        @if (filterCol('number_of_virtual_courses') == true)
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_virtual_courses) }}</td>
                                        @endif
                                        @if (filterCol('number_of_technical_disciplines') == true)
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_technical_disciplines) }}</td>
                                        @endif
                                        @if (filterCol('number_of_courses_not_accepted') == true)
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_courses_not_accepted) }}</td>
                                        @endif
                                        @if (filterCol('number_of_courses_without_volunteers') == true)
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_courses_without_volunteers) }}</td>
                                        @endif
                                        @if (filterCol('number_of_GDP_courses') == true)
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_GDP_courses) }}</td>
                                        @endif
                                        @if (filterCol('number_of_disciplines_corresponding_to_job_fields') == true)
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_disciplines_corresponding_to_job_fields) }}</td>
                                        @endif
                                        @if (filterCol('number_of_fields_corresponding_to_the_specified_specialties') == true)
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_fields_corresponding_to_the_specified_specialties) }}</td>
                                        @endif
                                        @if (filterCol('number_of_courses_offered_virtually') == true)
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_courses_offered_virtually) }}</td>
                                        @endif
                                        @if (filterCol('number_of_popular_fields_more_than_eighty_percent_capacity') == true)
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_popular_fields_more_than_eighty_percent_capacity) }}</td>
                                        @endif
                                        @if (filterCol('number_of_courses_with_low_audience') == true)
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_courses_with_low_audience) }}</td>
                                        @endif
                                        @if (filterCol('number_of_fields_of_less_than_5_people') == true)
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_fields_of_less_than_5_people) }}</td>
                                        @endif
                                        @if (filterCol('number_of_courses_without_admission') == true)
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_courses_without_admission) }}</td>
                                        @endif
                                        @if (filterCol('number_of_popular_fields') == true)
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_popular_fields) }}</td>
                                        @endif
                                        @if (filterCol('low_number_of_applicants') == true)
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->low_number_of_applicants) }}</td>
                                        @endif
                                        @if (filterCol('year') == true)
                                        <td>{{ $statusAnalysisOfTheNumberOfFieldsOfStudy?->year }}</td>
                                        @endif
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

    <script src="{{ mix('/js/app.js') }}"></script>

@endsection
