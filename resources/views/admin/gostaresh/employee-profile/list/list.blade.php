@extends('layouts.dashboard')

@section('title-tag')
    تعداد تحلیل وضعیت و مشخصات کارمندان دانشگاه در ھر یک از واحدھای شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    تعداد تحلیل وضعیت و مشخصات کارمندان دانشگاه در ھر یک از واحدھای شھرستان ھای استان
@endsection

@section('page-title')
    تعداد تحلیل وضعیت و مشخصات کارمندان دانشگاه در ھر یک از واحدھای شھرستان ھای استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('employee-profile.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                <th>شهرستان</th>
                                <th>زیرنظام های آموزش عالی شهرستان</th>
                                <th>تعداد کارکنان غیر هیات علمی</th>
                                <th>میانگین سنی کارمندان</th>
                                <th>تعداد کارمندان مرد</th>
                                <th>تعداد کارمندان زن</th>
                                <th>تعداد کارمندان اداری</th>
                                <th>تعداد کارمندان بخش آموزشی</th>
                                <th>تعداد کارمندان بخش پژوهش</th>
                                <th>تعداد کارمندان با مدرک دکترا</th>
                                <th>تعداد کارمندان با مدرک کارشناسی ارشد</th>
                                <th>تعداد کارمندان با مدرک کارشناسی</th>
                                <th>تعداد کارمندان با مدرک دیپلم و زیر دیپلم</th>
                                <th>تعداد کارمندان در حال تحصیل</th>
                                <th>نرخ رشد کارمندان</th>
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                            @foreach ($employeeProfiles as $key => $employeeProfile)
                                <tr>
                                    <th scope="row">{{ $employeeProfiles?->firstItem() + $key }}</th>
                                    <td>{{ $employeeProfile?->province?->name . ' - ' . $employeeProfile->county?->name }}
                                    <td>{{ $employeeProfile?->department_of_education_title}}</td>
                                    <td>{{ number_format($employeeProfile?->number_of_non_faculty_staff)}}</td>
                                    <td>{{ $employeeProfile?->average_age_of_employees}}</td>
                                    <td>{{ number_format($employeeProfile?->number_of_male_employees)}}</td>
                                    <td>{{ number_format($employeeProfile?->number_of_female_employees)}}</td>
                                    <td>{{ number_format($employeeProfile?->number_of_administrative_staff)}}</td>
                                    <td>{{ number_format($employeeProfile?->number_of_training_staff)}}</td>
                                    <td>{{ number_format($employeeProfile?->number_of_research_staff)}}</td>
                                    <td>{{ number_format($employeeProfile?->number_of_PhD_staff)}}</td>
                                    <td>{{ number_format($employeeProfile?->number_of_master_staff)}}</td>
                                    <td>{{ number_format($employeeProfile?->number_of_expert_staff)}}</td>
                                    <td>{{ number_format($employeeProfile?->number_of_diploma_and_sub_diploma_employees)}}</td>
                                    <td>{{ number_format($employeeProfile?->number_of_employees_studying)}}</td>
                                    <td>{{ $employeeProfile?->growth_rate}}</td>
                                    <td>{{ $employeeProfile?->year }}</td>
                                    <td>

                                        <a href="{{ route('employee-profile.edit', $employeeProfile) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        {{--                                        <a href="{{ route('research-output-status-analyses.destroy', $employeeProfile) }}" title="{{ __('validation.buttons.delete') }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $employeeProfiles->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
