{{-- Table 42 View --}}
@extends('layouts.dashboard')

@section('title-tag')
    افزودن تحلیل وضعیت شاخص ها و برنامه های فرهنگی
@endsection

@section('breadcrumb-title')
    افزودن تحلیل وضعیت شاخص ها و برنامه های فرهنگی
@endsection

@section('page-title')
    افزودن تحلیل وضعیت شاخص ها و برنامه های فرهنگی

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
                    <form class="form-horizontal" method="POST" action="{{ route('cultural-indicators.store') }}"
                        role="form">
                        @csrf

                        <select-province-component province_default="{{ auth()->user()->province_id ?? '' }}"
                            zone_default="{{ auth()->user()->county->zone ?? '' }}"
                            county_default="{{ auth()->user()->county_id ?? '' }}"
                            city_default="{{ auth()->user()->city_id ?? '' }}"
                            rural_district_default="{{ auth()->user()->rural_district_id ?? '' }}"
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
                                <input type="text" id="unit" name="unit" value="{{ old('unit') }}"
                                    class="form-control" placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="cultural_centers_status_score">
                                <span>نمره وضعیت کانون های فرهنگی واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="cultural_centers_status_score"
                                    name="cultural_centers_status_score" value="{{ old('cultural_centers_status_score') }}"
                                    class="form-control"
                                    placeholder=" نمره وضعیت کانون های فرهنگی واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="printed_publications_status_score">
                                <span>نمره وضعیت نشریات چاپی و الکترونیکی واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="printed_publications_status_score"
                                    name="printed_publications_status_score"
                                    value="{{ old('printed_publications_status_score') }}" class="form-control"
                                    placeholder=" نمره وضعیت نشریات چاپی و الکترونیکی واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="cultural_organizations_status_score">
                                <span>نمره وضعیت تشکلهای فرهنگی واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="cultural_organizations_status_score"
                                    name="cultural_organizations_status_score"
                                    value="{{ old('cultural_organizations_status_score') }}" class="form-control"
                                    placeholder=" نمره وضعیت تشکلهای فرهنگی واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="people_coverage_status_score">
                                <span>نمره وضعیت آراستگی و پوشش دانشجویان، اساتید و کارکنان واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="people_coverage_status_score" name="people_coverage_status_score"
                                    value="{{ old('people_coverage_status_score') }}" class="form-control"
                                    placeholder=" نمره وضعیت آراستگی و پوشش دانشجویان، اساتید و کارکنان واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="free_thinking_status_score">
                                <span>نمره وضعیت کیفی و کمی کرسی های آزاد اندیشی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="free_thinking_status_score" name="free_thinking_status_score"
                                    value="{{ old('free_thinking_status_score') }}" class="form-control"
                                    placeholder=" نمره وضعیت کیفی و کمی کرسی های آزاد اندیشی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="interact_with_cyberspace_status_score">
                                <span>نمره وضعیت تعامل با فضای مجازی در واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="interact_with_cyberspace_status_score"
                                    name="interact_with_cyberspace_status_score"
                                    value="{{ old('interact_with_cyberspace_status_score') }}" class="form-control"
                                    placeholder=" نمره وضعیت تعامل با فضای مجازی در واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="fixed_cultural_events_status_score">
                                <span>نمره وضعیت برنامه ها و رویدادهای ثابت فرهنگی واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="fixed_cultural_events_status_score"
                                    name="fixed_cultural_events_status_score"
                                    value="{{ old('fixed_cultural_events_status_score') }}" class="form-control"
                                    placeholder=" نمره وضعیت برنامه ها و رویدادهای ثابت فرهنگی واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="amounts_of_honors_and_awards">
                                <span>میزان افتخارات و جوایز فرهنگی کسب شده در واحد در سطوح مختلف منطقه ای و ملی
                                </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="amounts_of_honors_and_awards"
                                    name="amounts_of_honors_and_awards" value="{{ old('amounts_of_honors_and_awards') }}"
                                    class="form-control"
                                    placeholder=" میزان افتخارات و جوایز فرهنگی کسب شده در واحد در سطوح مختلف منطقه ای و ملی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="cultural_industry_products">
                                <span>میزان تولیدات در صنایع فرهنگی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="cultural_industry_products" name="cultural_industry_products"
                                    value="{{ old('cultural_industry_products') }}" class="form-control"
                                    placeholder=" میزان تولیدات در صنایع فرهنگی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="level_of_initiatives">
                                <span>سطح ابتکارات و نوآوری های فرهنگی در واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="level_of_initiatives" name="level_of_initiatives"
                                    value="{{ old('level_of_initiatives') }}" class="form-control"
                                    placeholder=" سطح ابتکارات و نوآوری های فرهنگی در واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="points_for_running_luxury_programs">
                                <span>امتیاز طراحی و اجرای برنامه های فاخر </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="points_for_running_luxury_programs"
                                    name="points_for_running_luxury_programs"
                                    value="{{ old('points_for_running_luxury_programs') }}" class="form-control"
                                    placeholder=" امتیاز طراحی و اجرای برنامه های فاخر را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="election_turnout_score">
                                <span>نمره میزان مشارکت در انتخابات </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="election_turnout_score" name="election_turnout_score"
                                    value="{{ old('election_turnout_score') }}" class="form-control"
                                    placeholder=" نمره میزان مشارکت در انتخابات را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="score_cultural_skills_training_programs">
                                <span>امتیاز برنامه های آموزش مهارت های فرهنگی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="score_cultural_skills_training_programs"
                                    name="score_cultural_skills_training_programs"
                                    value="{{ old('score_cultural_skills_training_programs') }}" class="form-control"
                                    placeholder=" امتیاز برنامه های آموزش مهارت های فرهنگی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label"
                                for="score_of_cultural_participation_of_Basiji_professors">
                                <span>نمره مشارکت فرهنگی اساتید بسیجی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="score_of_cultural_participation_of_Basiji_professors"
                                    name="score_of_cultural_participation_of_Basiji_professors"
                                    value="{{ old('score_of_cultural_participation_of_Basiji_professors') }}"
                                    class="form-control" placeholder=" نمره مشارکت فرهنگی اساتید بسیجی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label"
                                for="participation_of_unit_professors_in_cultural_counseling">
                                <span>میزان مشارکت اساتید واحد در ارائه مشاوره فرهنگی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="participation_of_unit_professors_in_cultural_counseling"
                                    name="participation_of_unit_professors_in_cultural_counseling"
                                    value="{{ old('participation_of_unit_professors_in_cultural_counseling') }}"
                                    class="form-control"
                                    placeholder=" میزان مشارکت اساتید واحد در ارائه مشاوره فرهنگی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="position_of_the_university_as_cultural_center">
                                <span>جایگاه دانشگاه بعنوان قطب فرهنگی شهر </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="position_of_the_university_as_cultural_center"
                                    name="position_of_the_university_as_cultural_center"
                                    value="{{ old('position_of_the_university_as_cultural_center') }}"
                                    class="form-control"
                                    placeholder=" جایگاه دانشگاه بعنوان قطب فرهنگی شهر را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="score_cultural_programs">
                                <span>نمره برنامه های ویژه حل مسایل فرهنگی اختصاصی واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="score_cultural_programs" name="score_cultural_programs"
                                    value="{{ old('score_cultural_programs') }}" class="form-control"
                                    placeholder=" نمره برنامه های ویژه حل مسایل فرهنگی اختصاصی واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="score_Families_of_professors">
                                <span>نمره برنامه های فرهنگی خانواده های اساتید و کارکنان واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="score_Families_of_professors"
                                    name="score_Families_of_professors" value="{{ old('score_Families_of_professors') }}"
                                    class="form-control"
                                    placeholder=" نمره برنامه های فرهنگی خانواده های اساتید و کارکنان واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="score_of_professors">
                                <span>نمره برنامه های فرهنگی اساتید واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="score_of_professors" name="score_of_professors"
                                    value="{{ old('score_of_professors') }}" class="form-control"
                                    placeholder=" نمره برنامه های فرهنگی اساتید واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="satisfaction_of_managers_performance">
                                <span>میزان رضایتمندی از عملکرد مدیران در واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="satisfaction_of_managers_performance"
                                    name="satisfaction_of_managers_performance"
                                    value="{{ old('satisfaction_of_managers_performance') }}" class="form-control"
                                    placeholder=" میزان رضایتمندی از عملکرد مدیران در واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label"
                                for="percentage_of_students_participating_in_sports_competitions">
                                <span>درصد دانشجویان شرکت کننده در مسابقات ورزشی واحد دانشگاهی از کل دانشجویان آن واحد
                                    دانشگاهی به تفکیک مقطع تحصیلی و جنسیت </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="percentage_of_students_participating_in_sports_competitions"
                                    name="percentage_of_students_participating_in_sports_competitions"
                                    value="{{ old('percentage_of_students_participating_in_sports_competitions') }}"
                                    class="form-control"
                                    placeholder=" درصد دانشجویان شرکت کننده در مسابقات ورزشی واحد دانشگاهی از کل دانشجویان آن واحد دانشگاهی به تفکیک مقطع تحصیلی و جنسیت را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label"
                                for="percentage_of_students_participating_in_cultural_competitions">
                                <span>درصد دانشجویان شرکت کننده در مسابقات فرهنگی واحد دانشگاهی از کل دانشجویان آن واحد
                                    دانشگاهی به تفکیک مقطع تحصیلی و جنسیت </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="percentage_of_students_participating_in_cultural_competitions"
                                    name="percentage_of_students_participating_in_cultural_competitions"
                                    value="{{ old('percentage_of_students_participating_in_cultural_competitions') }}"
                                    class="form-control"
                                    placeholder=" درصد دانشجویان شرکت کننده در مسابقات فرهنگی واحد دانشگاهی از کل دانشجویان آن واحد دانشگاهی به تفکیک مقطع تحصیلی و جنسیت را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percentage_of_students_in_student_organizations">
                                <span>درصد دانشجویان عضو تشکل های دانشجویی واحد دانشگاهی از کل دانشجویان آن واحد دانشگاهی
                                </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="percentage_of_students_in_student_organizations"
                                    name="percentage_of_students_in_student_organizations"
                                    value="{{ old('percentage_of_students_in_student_organizations') }}"
                                    class="form-control"
                                    placeholder=" درصد دانشجویان عضو تشکل های دانشجویی واحد دانشگاهی از کل دانشجویان آن واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="student_counseling_centers">
                                <span>دنسبت تعداد مراکز راهنمایی و مشاوره دانشجویی واحد دانشگاهی به کل دانشجویان آن واحد
                                </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="student_counseling_centers" name="student_counseling_centers"
                                    value="{{ old('student_counseling_centers') }}" class="form-control"
                                    placeholder=" دنسبت تعداد مراکز راهنمایی و مشاوره دانشجویی واحد دانشگاهی به کل دانشجویان آن واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label"
                                for="percentage_of_students_referring_to_student_counseling_centers">
                                <span>درصد دانشجویان مراجعه کننده به مراکز راهنمایی و مشاوره دانشجویی نسبت به کل دانشجویان
                                    واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="percentage_of_students_referring_to_student_counseling_centers"
                                    name="percentage_of_students_referring_to_student_counseling_centers"
                                    value="{{ old('percentage_of_students_referring_to_student_counseling_centers') }}"
                                    class="form-control"
                                    placeholder=" درصد دانشجویان مراجعه کننده به مراکز راهنمایی و مشاوره دانشجویی نسبت به کل دانشجویان واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="general_cultural_rank_of_the_university_unit">
                                <span>رتبه کلی فرهنگی واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="general_cultural_rank_of_the_university_unit"
                                    name="general_cultural_rank_of_the_university_unit"
                                    value="{{ old('general_cultural_rank_of_the_university_unit') }}"
                                    class="form-control" placeholder=" رتبه کلی فرهنگی واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="old('year')" min="1390" max="1400" :required="false" name="year"></x-select-year>

                        {{-- <x-select-month :default="old('month')" :required="false" name="month"></x-select-month> --}}

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
