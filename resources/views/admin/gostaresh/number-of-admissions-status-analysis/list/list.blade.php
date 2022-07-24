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
<span>
    <a href="{{ route('number.of.admissions.status.analysis.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                    @if (filterCol('number_of_admissions') == true)
                                    <th>مقدار</th>
                                    @endif
                                    @if (filterCol('year') == true)
                                        <th>سال</th>
                                    @endif
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($numberOfAdmissionsStatusAnalysises as $key => $numberOfAdmissionsStatusAnalysis)
                                    <tr>
                                        <th scope="row">{{ $numberOfAdmissionsStatusAnalysises?->firstItem() + $key }}</th>

                                        <td>{{ $numberOfAdmissionsStatusAnalysis?->province?->name . ' - ' . $numberOfAdmissionsStatusAnalysis->county?->name }}
                                        </td>
                                        @if (filterCol('university_type_title') == true)
                                        <td>{{ $numberOfAdmissionsStatusAnalysis?->university_type_title }}</td>
                                        @endif
                                        @if (filterCol('gender_title') == true)
                                        <td>{{ $numberOfAdmissionsStatusAnalysis?->gender_title }}</td>
                                        @endif
                                        @if (filterCol('department_of_education_title') == true)
                                        <td>{{ $numberOfAdmissionsStatusAnalysis?->department_of_education_title }}</td>
                                        @endif
                                        @if (filterCol('number_of_admissions') == true)
                                        <td>{{ number_format($numberOfAdmissionsStatusAnalysis?->number_of_admissions) }}</td>
                                        @endif
                                        @if (filterCol('year') == true)
                                        <td>{{ $numberOfAdmissionsStatusAnalysis?->year }}</td>
                                        @endif
                                        <td>

                                            <a href="{{ route('number.of.admissions.status.analysis.edit', $numberOfAdmissionsStatusAnalysis) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>

                                            <a href="{{ route('number.of.admissions.status.analysis.destroy', $numberOfAdmissionsStatusAnalysis) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $numberOfAdmissionsStatusAnalysises->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
