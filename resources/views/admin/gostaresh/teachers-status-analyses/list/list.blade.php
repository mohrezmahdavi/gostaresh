{{--Table 34 View--}}
@extends('layouts.dashboard')

@section('title-tag')
    تعداد تحلیل وضعیت اعضای ھیات علمی و مدرسین در شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    تعداد تحلیل وضعیت اعضای ھیات علمی و مدرسین در شھرستان ھای استان
@endsection

@section('page-title')
    تعداد تحلیل وضعیت اعضای ھیات علمی و مدرسین در شھرستان ھای استان
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
                                <th>تعداد اعضای هیات علمی</th>
                                <th>تعداد اعضای هیئت علمی مشارکت کننده در برنامه های علمی</th>
                                <th>تعداد اعضای هیات علمی ارتقا یافته</th>
                                <th>تعداد مدرسین حق التدریس و اساتید مدعو</th>
                                <th>تعداد اعضای هیات علمی مامور در سایر واحدها</th>
                                <th>تعداد اعضای هیات علمی مامور در سازمان مرکزی</th>
                                <th>تعداد اعضای هیات علمی شرکت کننده در طرح تعاون</th>
                                <th>تعداد اعضای هیات علمی انتقالی</th>
                                <th>تعداد اعضای هیات علمی با درجه مربی</th>
                                <th>تعداد اعضای هیات علمی با درجه استادیار</th>
                                <th>تعداد اعضای هیات علمی با درجه دانشیار</th>
                                <th>تعداد اعضای هیات علمی با درجه استاد تمام</th>
                                <th>تعداد اعضای هیات علمی دارای سن کمتر از 50 سال</th>
                                <th>تعداد اعضای هیات علمی فناور</th>
                                <th>تعداد اعضای هیات علمی نوع الف</th>
                                <th>تعداد اعضای هیات علمی نوع ب</th>
                                <th>تعداد اعضای هیات علمی سرآمد علمی</th>
                                <th>متوسط سطح بهره وری پژوهشی اعضای هیات علمی</th>
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($teachersStatusAnalyses as $key => $teachersStatusAnalysis)
                                <tr>
                                    <th scope="row">{{ $teachersStatusAnalyses?->firstItem() + $key }}</th>
                                    <td>{{ $teachersStatusAnalysis?->province?->name . ' - ' . $teachersStatusAnalysis->county?->name }}
                                    <td>{{ $teachersStatusAnalysis?->unit}}</td>
                                    <td>{{ $teachersStatusAnalysis?->number_of_faculty_members}}</td>
                                    <td>{{ $teachersStatusAnalysis?->scientific_programs_faculty_members}}</td>
                                    <td>{{ $teachersStatusAnalysis?->upgraded_faculty_members}}</td>
                                    <td>{{ $teachersStatusAnalysis?->number_of_tuition_teachers}}</td>
                                    <td>{{ $teachersStatusAnalysis?->number_of_officer_faculty_members_in_other_unit}}</td>
                                    <td>{{ $teachersStatusAnalysis?->number_of_officer_faculty_members_in_central_organization}}</td>
                                    <td>{{ $teachersStatusAnalysis?->number_of_participant_faculty_members_in_cooperation_plan}}</td>
                                    <td>{{ $teachersStatusAnalysis?->number_of_transfer_faculty_members}}</td>
                                    <td>{{ $teachersStatusAnalysis?->number_of_instructor_faculty_members}}</td>
                                    <td>{{ $teachersStatusAnalysis?->number_of_assistant_professor_faculty_members}}</td>
                                    <td>{{ $teachersStatusAnalysis?->number_of_associate_professor_faculty_members}}</td>
                                    <td>{{ $teachersStatusAnalysis?->number_of_full_professor_faculty_members}}</td>
                                    <td>{{ $teachersStatusAnalysis?->number_of_faculty_members_smaller_50_years_old}}</td>
                                    <td>{{ $teachersStatusAnalysis?->number_of_technology_faculty_members}}</td>
                                    <td>{{ $teachersStatusAnalysis?->number_of_faculty_members_type_a}}</td>
                                    <td>{{ $teachersStatusAnalysis?->number_of_faculty_members_type_b}}</td>
                                    <td>{{ $teachersStatusAnalysis?->number_of_top_scientific_faculty_members}}</td>
                                    <td>{{ $teachersStatusAnalysis?->average_level_of_research_productivity_of_faculty_members}}</td>
                                    <td>{{ $teachersStatusAnalysis?->year }}</td>
                                    <td>

                                        <a href="{{ route('teachers-status-analyses.edit', $teachersStatusAnalysis) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        {{--                                        <a href="{{ route('graduates-of-higher-education.destroy', $teachersStatusAnalysis) }}" title="{{ __('validation.buttons.delete') }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $teachersStatusAnalyses->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
