@extends('layouts.dashboard')

@section('title-tag')
تحلیل وضعیت تعداد دانشجویان
@endsection

@section('breadcrumb-title')
تحلیل وضعیت تعداد دانشجویان
@endsection

@section('page-title')
تحلیل وضعیت تعداد دانشجویان

<span>
    <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
</span>
<span>
    <a href="{{ route('number.of.students.status.analysis.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
</span>
@endsection

@section('styles-head')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="{{ asset('assets/datepicker/mds.bs.datetimepicker.style.css') }}" rel="stylesheet" />
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
                                    @if (filterCol('university_type_title') == true)
                                    <th>دانشگاه</th>
                                    @endif
                                    @if (filterCol('gender_title') == true)
                                    <th>جنسیت</th>
                                    @endif
                                    @if (filterCol('department_of_education_title') == true)
                                    <th>گروه عمده تحصیلی</th>
                                    @endif
                                    @if (filterCol('number_of_students') == true)
                                    <th>مقدار</th>
                                    @endif
                                    @if (filterCol('year') == true)
                                        <th>سال</th>
                                    @endif
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($numberOfStudentsStatusAnalysises as $key => $numberOfStudentsStatusAnalysis)
                                    <tr>
                                        <th scope="row">{{ $numberOfStudentsStatusAnalysises?->firstItem() + $key }}</th>

                                        <td>{{ $numberOfStudentsStatusAnalysis?->province?->name . ' - ' . $numberOfStudentsStatusAnalysis->county?->name }}
                                        </td>
                                        @if (filterCol('university_type_title') == true)
                                        <td>{{ $numberOfStudentsStatusAnalysis?->university_type_title }}</td>
                                        @endif
                                        @if (filterCol('gender_title') == true)
                                        <td>{{ $numberOfStudentsStatusAnalysis?->gender_title }}</td>
                                        @endif
                                        @if (filterCol('department_of_education_title') == true)
                                        <td>{{ $numberOfStudentsStatusAnalysis?->department_of_education_title }}</td>
                                        @endif
                                        @if (filterCol('number_of_students') == true)
                                        <td>{{ number_format($numberOfStudentsStatusAnalysis?->number_of_students) }}</td>
                                        @endif
                                        @if (filterCol('year') == true)
                                        <td>{{ $numberOfStudentsStatusAnalysis?->year }}</td>
                                        @endif
                                        <td>

                                            <a href="{{ route('number.of.students.status.analysis.edit', $numberOfStudentsStatusAnalysis) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>

                                            <a href="{{ route('number.of.students.status.analysis.destroy', $numberOfStudentsStatusAnalysis) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $numberOfStudentsStatusAnalysises->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
