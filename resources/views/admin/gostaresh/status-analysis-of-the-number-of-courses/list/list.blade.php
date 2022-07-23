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
                                @foreach ($statusAnalysisOfTheNumberOfCourses as $key => $statusAnalysisOfTheNumberOfCourse)
                                    <tr>
                                        <th scope="row">{{ $statusAnalysisOfTheNumberOfCourses?->firstItem() + $key }}</th>

                                        <td>{{ $statusAnalysisOfTheNumberOfCourse?->province?->name . ' - ' . $statusAnalysisOfTheNumberOfCourse->county?->name }}
                                        </td>
                                       

                                        @if (filterCol('unit') == true)
                                        <td>{{ $statusAnalysisOfTheNumberOfCourse?->unit }}</td>
                                        @endif
                                        @if (filterCol('total_number_of_courses') == true)
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfCourse?->total_number_of_courses) }}</td>
                                        @endif
                                        @if (filterCol('number_of_international_Persian_language_courses_in_person') == true)
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfCourse?->number_of_international_Persian_language_courses_in_person) }}</td>
                                        @endif
                                        @if (filterCol('number_of_international_virtual_Persian_language_courses') == true)
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfCourse?->number_of_international_virtual_Persian_language_courses) }}</td>
                                        @endif
                                        @if (filterCol('number_of_international_courses_in_the_target_language_in_person') == true)
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfCourse?->number_of_international_courses_in_the_target_language_in_person) }}</td>
                                        @endif
                                        @if (filterCol('number_of_international_courses_in_the_target_language_virtually') == true)
                                        <td>{{ number_format($statusAnalysisOfTheNumberOfCourse?->number_of_international_courses_in_the_target_language_virtually) }}</td>
                                        @endif
                                        @if (filterCol('year') == true)
                                        <td>{{ $statusAnalysisOfTheNumberOfCourse?->year }}</td>
                                        @endif
                                        
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

    <script src="{{ mix('/js/app.js') }}"></script>

@endsection
