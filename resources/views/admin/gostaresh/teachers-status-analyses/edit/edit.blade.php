{{-- Table 34 View --}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش تحلیل وضعیت اعضای ھیات علمی و مدرسین در شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    ویرایش تحلیل وضعیت اعضای ھیات علمی و مدرسین در شھرستان ھای استان
@endsection

@section('page-title')
    ویرایش تحلیل وضعیت اعضای ھیات علمی و مدرسین در شھرستان ھای استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" id="app">
                    <form class="form-horizontal" method="POST"
                        action="{{ route('teachers-status-analyses.update', $teachersStatusAnalysis) }}" role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $teachersStatusAnalysis->province_id }}"
                            zone_default="{{ $teachersStatusAnalysis->county->zone }}"
                            county_default="{{ $teachersStatusAnalysis->county_id }}"
                            city_default="{{ $teachersStatusAnalysis->city_id }}"
                            rural_district_default="{{ $teachersStatusAnalysis->rural_district_id }}"
                            :fields="{{ json_encode([
                                'province' => true,
                                'zone' => false,
                                'county' => true,
                                'city' => false,
                            ]) }}">
                        </select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unit">
                                <span>واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit"
                                    value="{{ $teachersStatusAnalysis->unit }}" class="form-control"
                                    placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_faculty_members">
                                <span>تعداد اعضای هیات علمی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_faculty_members" name="number_of_faculty_members"
                                    value="{{ $teachersStatusAnalysis->number_of_faculty_members }}" class="form-control"
                                    placeholder=" تعداد اعضای هیات علمی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="scientific_programs_faculty_members">
                                <span>تعداد اعضای هیئت علمی مشارکت کننده در برنامه های علمی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="scientific_programs_faculty_members"
                                    name="scientific_programs_faculty_members"
                                    value="{{ $teachersStatusAnalysis->scientific_programs_faculty_members }}"
                                    class="form-control"
                                    placeholder=" تعداد اعضای هیئت علمی مشارکت کننده در برنامه های علمی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="upgraded_faculty_members">
                                <span>تعداد اعضای هیات علمی ارتقا یافته </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="upgraded_faculty_members" name="upgraded_faculty_members"
                                    value="{{ $teachersStatusAnalysis->upgraded_faculty_members }}" class="form-control"
                                    placeholder=" تعداد اعضای هیات علمی ارتقا یافته را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_tuition_teachers">
                                <span>تعداد مدرسین حق التدریس و اساتید مدعو </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_tuition_teachers" name="number_of_tuition_teachers"
                                    value="{{ $teachersStatusAnalysis->number_of_tuition_teachers }}" class="form-control"
                                    placeholder=" تعداد مدرسین حق التدریس و اساتید مدعو را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_officer_faculty_members_in_other_unit">
                                <span>تعداد اعضای هیات علمی مامور در سایر واحدها </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_officer_faculty_members_in_other_unit"
                                    name="number_of_officer_faculty_members_in_other_unit"
                                    value="{{ $teachersStatusAnalysis->number_of_officer_faculty_members_in_other_unit }}"
                                    class="form-control"
                                    placeholder=" تعداد اعضای هیات علمی مامور در سایر واحدها را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label"
                                for="number_of_officer_faculty_members_in_central_organization">
                                <span>تعداد اعضای هیات علمی مامور در سازمان مرکزی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_officer_faculty_members_in_central_organization"
                                    name="number_of_officer_faculty_members_in_central_organization"
                                    value="{{ $teachersStatusAnalysis->number_of_officer_faculty_members_in_central_organization }}"
                                    class="form-control"
                                    placeholder=" تعداد اعضای هیات علمی مامور در سازمان مرکزی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label"
                                for="number_of_participant_faculty_members_in_cooperation_plan">
                                <span>تعداد اعضای هیات علمی شرکت کننده در طرح تعاون </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_participant_faculty_members_in_cooperation_plan"
                                    name="number_of_participant_faculty_members_in_cooperation_plan"
                                    value="{{ $teachersStatusAnalysis->number_of_participant_faculty_members_in_cooperation_plan }}"
                                    class="form-control"
                                    placeholder=" تعداد اعضای هیات علمی شرکت کننده در طرح تعاون را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_transfer_faculty_members">
                                <span>تعداد اعضای هیات علمی انتقالی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_transfer_faculty_members"
                                    name="number_of_transfer_faculty_members"
                                    value="{{ $teachersStatusAnalysis->number_of_transfer_faculty_members }}"
                                    class="form-control" placeholder=" تعداد اعضای هیات علمی انتقالی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_instructor_faculty_members">
                                <span>تعداد اعضای هیات علمی با درجه مربی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_instructor_faculty_members"
                                    name="number_of_instructor_faculty_members"
                                    value="{{ $teachersStatusAnalysis->number_of_instructor_faculty_members }}"
                                    class="form-control"
                                    placeholder=" تعداد اعضای هیات علمی با درجه مربی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_assistant_professor_faculty_members">
                                <span>تعداد اعضای هیات علمی با درجه استادیار </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_assistant_professor_faculty_members"
                                    name="number_of_assistant_professor_faculty_members"
                                    value="{{ $teachersStatusAnalysis->number_of_assistant_professor_faculty_members }}"
                                    class="form-control"
                                    placeholder=" تعداد اعضای هیات علمی با درجه استادیار را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_associate_professor_faculty_members">
                                <span>تعداد اعضای هیات علمی با درجه دانشیار </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_associate_professor_faculty_members"
                                    name="number_of_associate_professor_faculty_members"
                                    value="{{ $teachersStatusAnalysis->number_of_associate_professor_faculty_members }}"
                                    class="form-control"
                                    placeholder=" تعداد اعضای هیات علمی با درجه دانشیار را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_full_professor_faculty_members">
                                <span>تعداد اعضای هیات علمی با درجه استاد تمام </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_full_professor_faculty_members"
                                    name="number_of_full_professor_faculty_members"
                                    value="{{ $teachersStatusAnalysis->number_of_full_professor_faculty_members }}"
                                    class="form-control"
                                    placeholder=" تعداد اعضای هیات علمی با درجه استاد تمام را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_faculty_members_smaller_50_years_old">
                                <span>تعداد اعضای هیات علمی دارای سن کمتر از 50 سال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_faculty_members_smaller_50_years_old"
                                    name="number_of_faculty_members_smaller_50_years_old"
                                    value="{{ $teachersStatusAnalysis->number_of_faculty_members_smaller_50_years_old }}"
                                    class="form-control"
                                    placeholder=" تعداد اعضای هیات علمی دارای سن کمتر از 50 سال را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_technology_faculty_members">
                                <span>تعداد اعضای هیات علمی فناور </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_technology_faculty_members"
                                    name="number_of_technology_faculty_members"
                                    value="{{ $teachersStatusAnalysis->number_of_technology_faculty_members }}"
                                    class="form-control" placeholder=" تعداد اعضای هیات علمی فناور را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_faculty_members_type_a">
                                <span>تعداد اعضای هیات علمی نوع الف </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_faculty_members_type_a"
                                    name="number_of_faculty_members_type_a"
                                    value="{{ $teachersStatusAnalysis->number_of_faculty_members_type_a }}"
                                    class="form-control" placeholder=" تعداد اعضای هیات علمی نوع الف را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_faculty_members_type_b">
                                <span>تعداد اعضای هیات علمی نوع ب </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_faculty_members_type_b"
                                    name="number_of_faculty_members_type_b"
                                    value="{{ $teachersStatusAnalysis->number_of_faculty_members_type_b }}"
                                    class="form-control" placeholder=" تعداد اعضای هیات علمی نوع ب را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_top_scientific_faculty_members">
                                <span>تعداد اعضای هیات علمی سرآمد علمی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_top_scientific_faculty_members"
                                    name="number_of_top_scientific_faculty_members"
                                    value="{{ $teachersStatusAnalysis->number_of_top_scientific_faculty_members }}"
                                    class="form-control" placeholder=" تعداد اعضای هیات علمی سرآمد علمی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label"
                                for="average_level_of_research_productivity_of_faculty_members">
                                <span>متوسط سطح بهره وری پژوهشی اعضای هیات علمی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="average_level_of_research_productivity_of_faculty_members"
                                    name="average_level_of_research_productivity_of_faculty_members"
                                    value="{{ $teachersStatusAnalysis->average_level_of_research_productivity_of_faculty_members }}"
                                    class="form-control"
                                    placeholder=" متوسط سطح بهره وری پژوهشی اعضای هیات علمی را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$teachersStatusAnalysis->year" min="1390" max="1400" :required="false" name="year"></x-select-year>

                        {{-- <x-select-month :default="$teachersStatusAnalysis->month" :required="false" name="month"></x-select-month> --}}



                        <button type="submit" class="btn btn-primary  mt-3">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
