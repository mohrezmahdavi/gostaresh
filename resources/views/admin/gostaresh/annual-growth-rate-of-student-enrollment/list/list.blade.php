@extends('layouts.dashboard')

@section('title-tag')
نرخ رشد سالانه ثبت نام دانشجو
@endsection

@section('breadcrumb-title')
نرخ رشد سالانه ثبت نام دانشجو
@endsection

@section('page-title')
نرخ رشد سالانه ثبت نام دانشجو
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
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($annualGrowthRateOfStudentEnrollments as $key => $annualGrowthRateOfStudentEnrollment)
                                    <tr>
                                        <th scope="row">{{ $annualGrowthRateOfStudentEnrollments?->firstItem() + $key }}</th>
        
                                        <td>{{ $annualGrowthRateOfStudentEnrollment?->province?->name . ' - ' . $annualGrowthRateOfStudentEnrollment->county?->name }}
                                        </td>
                                        <td>{{ $annualGrowthRateOfStudentEnrollment?->university_type_title }}</td>
                                        <td>{{ $annualGrowthRateOfStudentEnrollment?->gender_title }}</td>
                                        <td>{{ $annualGrowthRateOfStudentEnrollment?->department_of_education_title }}</td>
                                        <td>{{ $annualGrowthRateOfStudentEnrollment?->annual_growth_rate_of_student_enrollment }}</td>
                                        <td>{{ $annualGrowthRateOfStudentEnrollment?->year }}</td>
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
@endsection
