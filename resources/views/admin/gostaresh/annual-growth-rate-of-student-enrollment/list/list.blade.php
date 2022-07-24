@extends('layouts.dashboard')

@section('title-tag')
نرخ رشد سالانه ثبت نام دانشجو
@endsection

@section('breadcrumb-title')
نرخ رشد سالانه ثبت نام دانشجو
@endsection

@section('page-title')
نرخ رشد سالانه ثبت نام دانشجو

<span>
    <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
</span>
<span>
    <a href="{{ route('annual.growth.rate.of.student.enrollment.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                    @if (filterCol('annual_growth_rate_of_student_enrollment') == true)
                                    <th>مقدار</th>
                                    @endif
                                    @if (filterCol('year') == true)
                                        <th>سال</th>
                                    @endif
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($annualGrowthRateOfStudentEnrollments as $key => $annualGrowthRateOfStudentEnrollment)
                                    <tr>
                                        <th scope="row">{{ $annualGrowthRateOfStudentEnrollments?->firstItem() + $key }}</th>
        
                                        <td>{{ $annualGrowthRateOfStudentEnrollment?->province?->name . ' - ' . $annualGrowthRateOfStudentEnrollment->county?->name }}
                                        </td>

                                        @if (filterCol('university_type_title') == true)
                                        <td>{{ $annualGrowthRateOfStudentEnrollment?->university_type_title }}</td>
                                        @endif
                                        @if (filterCol('gender_title') == true)
                                        <td>{{ $annualGrowthRateOfStudentEnrollment?->gender_title }}</td>
                                        @endif
                                        @if (filterCol('department_of_education_title') == true)
                                        <td>{{ $annualGrowthRateOfStudentEnrollment?->department_of_education_title }}</td>
                                        @endif
                                        @if (filterCol('annual_growth_rate_of_student_enrollment') == true)
                                        <td>{{ number_format($annualGrowthRateOfStudentEnrollment?->annual_growth_rate_of_student_enrollment) }}</td>
                                        @endif
                                        @if (filterCol('year') == true)
                                        <td>{{ $annualGrowthRateOfStudentEnrollment?->year }}</td>
                                        @endif

                                        <td>
        
                                            <a href="{{ route('annual.growth.rate.of.student.enrollment.edit', $annualGrowthRateOfStudentEnrollment) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>
        
                                            <a href="{{ route('annual.growth.rate.of.student.enrollment.destroy', $annualGrowthRateOfStudentEnrollment) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>
        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
        
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $annualGrowthRateOfStudentEnrollments->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
