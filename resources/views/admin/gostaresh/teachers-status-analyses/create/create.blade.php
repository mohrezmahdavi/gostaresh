{{--Table 34 View--}}
@extends('layouts.dashboard')

@section('title-tag')
ایجاد تحلیل وضعیت اعضای ھیات علمی و مدرسین در شھرستان ھای استان
@endsection

@section('breadcrumb-title')
ایجاد تحلیل وضعیت اعضای ھیات علمی و مدرسین در شھرستان ھای استان
@endsection

@section('page-title')
ایجاد تحلیل وضعیت اعضای ھیات علمی و مدرسین در شھرستان ھای استان
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" id="app">
                    @include('admin.partials.row-notifiy-col')
                    <form class="form-horizontal" method="POST" action="{{ route('teachers-status-analyses.store') }}" role="form">
                        @csrf

                        <select-province-component></select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unit">
                                <span>واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit"
                                       value="{{ old('unit') }}" class="form-control"
                                       placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_faculty_members">
                                <span>تعداد اعضای هیات علمی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_faculty_members" name="number_of_faculty_members"
                                       value="{{ old('number_of_faculty_members') }}" class="form-control"
                                       placeholder=" تعداد اعضای هیات علمی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="scientific_programs_faculty_members">
                                <span>تعداد اعضای هیئت علمی مشارکت کننده در برنامه های علمی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="scientific_programs_faculty_members" name="scientific_programs_faculty_members"
                                       value="{{ old('scientific_programs_faculty_members') }}" class="form-control"
                                       placeholder=" تعداد اعضای هیئت علمی مشارکت کننده در برنامه های علمی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="upgraded_faculty_members">
                                <span>تعداد اعضای هیات علمی ارتقا یافته </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="upgraded_faculty_members" name="upgraded_faculty_members"
                                       value="{{ old('upgraded_faculty_members') }}" class="form-control"
                                       placeholder=" تعداد اعضای هیات علمی ارتقا یافته را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_tuition_teachers">
                                <span>تعداد مدرسین حق التدریس و اساتید مدعو </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_tuition_teachers" name="number_of_tuition_teachers"
                                       value="{{ old('number_of_tuition_teachers') }}" class="form-control"
                                       placeholder=" تعداد مدرسین حق التدریس و اساتید مدعو را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_officer_faculty_members_in_other_unit">
                                <span>تعداد اعضای هیات علمی مامور در سایر واحدها </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_officer_faculty_members_in_other_unit" name="number_of_officer_faculty_members_in_other_unit"
                                       value="{{ old('number_of_officer_faculty_members_in_other_unit') }}" class="form-control"
                                       placeholder=" تعداد اعضای هیات علمی مامور در سایر واحدها را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_officer_faculty_members_in_central_organization">
                                <span>تعداد اعضای هیات علمی مامور در سازمان مرکزی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_officer_faculty_members_in_central_organization" name="number_of_officer_faculty_members_in_central_organization"
                                       value="{{ old('number_of_officer_faculty_members_in_central_organization') }}" class="form-control"
                                       placeholder=" تعداد اعضای هیات علمی مامور در سازمان مرکزی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_participant_faculty_members_in_cooperation_plan">
                                <span>تعداد اعضای هیات علمی شرکت کننده در طرح تعاون </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_participant_faculty_members_in_cooperation_plan" name="number_of_participant_faculty_members_in_cooperation_plan"
                                       value="{{ old('number_of_participant_faculty_members_in_cooperation_plan') }}" class="form-control"
                                       placeholder=" تعداد اعضای هیات علمی شرکت کننده در طرح تعاون را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_transfer_faculty_members">
                                <span>تعداد اعضای هیات علمی انتقالی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_transfer_faculty_members" name="number_of_transfer_faculty_members"
                                       value="{{ old('number_of_transfer_faculty_members') }}" class="form-control"
                                       placeholder=" تعداد اعضای هیات علمی انتقالی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_instructor_faculty_members">
                                <span>تعداد اعضای هیات علمی با درجه مربی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_instructor_faculty_members" name="number_of_instructor_faculty_members"
                                       value="{{ old('number_of_instructor_faculty_members') }}" class="form-control"
                                       placeholder=" تعداد اعضای هیات علمی با درجه مربی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_assistant_professor_faculty_members">
                                <span>تعداد اعضای هیات علمی با درجه استادیار </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_assistant_professor_faculty_members" name="number_of_assistant_professor_faculty_members"
                                       value="{{ old('number_of_assistant_professor_faculty_members') }}" class="form-control"
                                       placeholder=" تعداد اعضای هیات علمی با درجه استادیار را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_associate_professor_faculty_members">
                                <span>تعداد اعضای هیات علمی با درجه دانشیار </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_associate_professor_faculty_members" name="number_of_associate_professor_faculty_members"
                                       value="{{ old('number_of_associate_professor_faculty_members') }}" class="form-control"
                                       placeholder=" تعداد اعضای هیات علمی با درجه دانشیار را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_full_professor_faculty_members">
                                <span>تعداد اعضای هیات علمی با درجه استاد تمام </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_full_professor_faculty_members" name="number_of_full_professor_faculty_members"
                                       value="{{ old('number_of_full_professor_faculty_members') }}" class="form-control"
                                       placeholder=" تعداد اعضای هیات علمی با درجه استاد تمام را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_faculty_members_smaller_50_years_old">
                                <span>تعداد اعضای هیات علمی دارای سن کمتر از 50 سال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_faculty_members_smaller_50_years_old" name="number_of_faculty_members_smaller_50_years_old"
                                       value="{{ old('number_of_faculty_members_smaller_50_years_old') }}" class="form-control"
                                       placeholder=" تعداد اعضای هیات علمی دارای سن کمتر از 50 سال را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_technology_faculty_members">
                                <span>تعداد اعضای هیات علمی فناور </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_technology_faculty_members" name="number_of_technology_faculty_members"
                                       value="{{ old('number_of_technology_faculty_members') }}" class="form-control"
                                       placeholder=" تعداد اعضای هیات علمی فناور را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_faculty_members_type_a">
                                <span>تعداد اعضای هیات علمی نوع الف </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_faculty_members_type_a" name="number_of_faculty_members_type_a"
                                       value="{{ old('number_of_faculty_members_type_a') }}" class="form-control"
                                       placeholder=" تعداد اعضای هیات علمی نوع الف را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_faculty_members_type_b">
                                <span>تعداد اعضای هیات علمی نوع ب </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_faculty_members_type_b" name="number_of_faculty_members_type_b"
                                       value="{{ old('number_of_faculty_members_type_b') }}" class="form-control"
                                       placeholder=" تعداد اعضای هیات علمی نوع ب را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_top_scientific_faculty_members">
                                <span>تعداد اعضای هیات علمی سرآمد علمی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_top_scientific_faculty_members" name="number_of_top_scientific_faculty_members"
                                       value="{{ old('number_of_top_scientific_faculty_members') }}" class="form-control"
                                       placeholder=" تعداد اعضای هیات علمی سرآمد علمی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="average_level_of_research_productivity_of_faculty_members">
                                <span>متوسط سطح بهره وری پژوهشی اعضای هیات علمی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="average_level_of_research_productivity_of_faculty_members" name="average_level_of_research_productivity_of_faculty_members"
                                       value="{{ old('average_level_of_research_productivity_of_faculty_members') }}" class="form-control"
                                       placeholder=" متوسط سطح بهره وری پژوهشی اعضای هیات علمی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="year">
                                <span> سال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="year" id="year" class="form-select">
                                    @for ($i = 1250; $i <= 1405; $i++)
                                        <option {{ $i == old('year') ? 'selected' : '' }} value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor

                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="month">
                                <span> ماه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="month" id="month" class="form-select">
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option {{ $i == old('month') ? 'selected' : '' }} value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor

                                </select>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary  mt-3">افزودن</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
