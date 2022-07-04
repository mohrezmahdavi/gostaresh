@extends('layouts.dashboard')

@section('title-tag')
    تعداد تحلیل وضعیت شاخص میزان بھره وری از دارایی ھای دانشگاه در واحدھای شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    تعداد تحلیل وضعیت شاخص میزان بھره وری از دارایی ھای دانشگاه در واحدھای شھرستان ھای استان
@endsection

@section('page-title')
    تعداد تحلیل وضعیت شاخص میزان بھره وری از دارایی ھای دانشگاه در واحدھای شھرستان ھای استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('asset-productivity.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                <th>واحد</th>
                                <th>نرخ بهره برداری از فضای اداری</th>
                                <th>نرخ بهره برداری از فضا و تجهیزات آموزشی</th>
                                <th>نرخ بهره برداری از فضای و تجهیزات فناوری و نوآوری</th>
                                <th>سرانه نرخ بهره برداری از فضا و تجهیزات فرهنگی</th>
                                <th>نرخ بهره برداری از فضا و تجهیزات ورزشی</th>
                                <th>نرخ بهره برداری از تجهیزات و فضای کشاورزی و زراعی</th>
                                <th>ﻧـﺮخﺑﻬـﺮهﺑـﺮداری ازتجهیزات و فضای کارگاهی و آزمایشگاهی</th>
                                <th>نرخ بهره برداری از ظرفیت اعضای هیات علمی</th>
                                <th>نرخ بهره برداری از ظرفیت کارمندان</th>
                                <th>نرخ بهره برداری از ظرفیت فارغ التحصیلان</th>
                                <th>نرخ بهره برداری از ظرفیت دانشجویان</th>
                                <th>نسبت تعداد اعضای هیات علمی به دانشجویان</th>
                                <th>نسبت تعداد کارمندان به دانشجویان</th>
                                <th>نسبت تعداد اعضای هیات علمی به تعداد اساتید مدعو و حق التدریس</th>
                                <th>نسبت تعداد اعضای هیات علمی به کارمندان واحد</th>
                                <th>نسبت تعداد اعضای هیات علمی به میانگین تعداد اعضای هیات علمی استان</th>
                                <th>نسبت تعداد دانشجویان به میانگین تعداد دانشجویان استان</th>
                                <th>نسبت تعداد کارمندان به میانگین تعداد کارمندان استان</th>
                                <th>نسبت تعداد اساتید مدعو و حق التدریس به میانگین تعداد اساتید مدعو و حق التدریس استان</th>
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($assetProductivity as $key => $value)
                                <tr>
                                    <th scope="row">{{ $assetProductivity?->firstItem() + $key }}</th>
                                    <td>{{ $value?->province?->name . ' - ' . $value->county?->name }}
                                    <td>{{ $value?->unit}}</td>
                                    <td>{{ $value?->office_space_utilization_rate}}</td>
                                    <td>{{ $value?->utilization_rate_of_educational_equipment}}</td>
                                    <td>{{ $value?->utilization_rate_of_technology_equipment}}</td>
                                    <td>{{ $value?->utilization_rate_of_cultural_equipment}}</td>
                                    <td>{{ $value?->utilization_rate_of_sports_equipment}}</td>
                                    <td>{{ $value?->operation_rate_of_agricultural_equipment}}</td>
                                    <td>{{ $value?->operation_rate_of_workshop_equipment}}</td>
                                    <td>{{ $value?->faculty_capacity_utilization_rate}}</td>
                                    <td>{{ $value?->employee_capacity_utilization_rate}}</td>
                                    <td>{{ $value?->graduate_capacity_utilization_rate}}</td>
                                    <td>{{ $value?->student_capacity_utilization_rate}}</td>
                                    <td>{{ $value?->ratio_of_faculty_members_to_students}}</td>
                                    <td>{{ $value?->ratio_of_staff_to_students}}</td>
                                    <td>{{ $value?->ratio_of_faculty_members_to_teaching_professors}}</td>
                                    <td>{{ $value?->ratio_of_faculty_members_to_employees}}</td>
                                    <td>{{ $value?->ratio_of_unit_faculty_members_to_faculty_members_of_the_province}}</td>
                                    <td>{{ $value?->ratio_of_unit_students_to_students_of_the_province}}</td>
                                    <td>{{ $value?->ratio_of_unit_employees_to_provincial_employees}}</td>
                                    <td>{{ $value?->unit_teaching_professors_to_teaching_professors_province}}</td>
                                    <td>{{ $value?->year }}</td>
                                    <td>

                                        <a href="{{ route('asset-productivity.edit', $value) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        {{--                                        <a href="{{ route('research-output-status-analyses.destroy', $value) }}" title="{{ __('validation.buttons.delete') }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $assetProductivity->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
