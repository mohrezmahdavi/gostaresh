{{--Table 42 View--}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش تحلیل وضعیت شاخص ھا و برنامه ھای فرھنگی در واحدھای شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    ویرایش تحلیل وضعیت شاخص ھا و برنامه ھای فرھنگی در واحدھای شھرستان ھای استان
@endsection

@section('page-title')
    ویرایش تحلیل وضعیت شاخص ھا و برنامه ھای فرھنگی در واحدھای شھرستان ھای استان
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
                        action="{{ route('cultural-indicators.update', $culturalIndicator) }}"
                        role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $culturalIndicator->province_id }}"
                            county_default="{{ $culturalIndicator->county_id }}"
                            city_default="{{ $culturalIndicator->city_id }}"
                            rural_district_default="{{ $culturalIndicator->rural_district_id }}">
                        </select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unit">
                                <span>واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit"
                                       value="{{ $culturalIndicator->unit }}" class="form-control"
                                       placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="cultural_centers_status_score">
                                <span>نمره وضعیت کانون های فرهنگی واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="cultural_centers_status_score" name="cultural_centers_status_score"
                                       value="{{ $culturalIndicator->cultural_centers_status_score }}" class="form-control"
                                       placeholder=" نمره وضعیت کانون های فرهنگی واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="printed_publications_status_score">
                                <span>نمره وضعیت نشریات چاپی و الکترونیکی واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="printed_publications_status_score" name="printed_publications_status_score"
                                       value="{{ $culturalIndicator->printed_publications_status_score }}" class="form-control"
                                       placeholder=" نمره وضعیت نشریات چاپی و الکترونیکی واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="cultural_organizations_status_score">
                                <span>نمره وضعیت تشکلهای فرهنگی واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="cultural_organizations_status_score" name="cultural_organizations_status_score"
                                       value="{{ $culturalIndicator->cultural_organizations_status_score }}" class="form-control"
                                       placeholder=" نمره وضعیت تشکلهای فرهنگی واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="people_coverage_status_score">
                                <span>نمره وضعیت آراستگی و پوشش دانشجویان، اساتید و کارکنان واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="people_coverage_status_score" name="people_coverage_status_score"
                                       value="{{ $culturalIndicator->people_coverage_status_score }}" class="form-control"
                                       placeholder=" نمره وضعیت آراستگی و پوشش دانشجویان، اساتید و کارکنان واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="free_thinking_status_score">
                                <span>نمره وضعیت کیفی و کمی کرسی های آزاد اندیشی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="free_thinking_status_score" name="free_thinking_status_score"
                                       value="{{ $culturalIndicator->free_thinking_status_score }}" class="form-control"
                                       placeholder=" نمره وضعیت کیفی و کمی کرسی های آزاد اندیشی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="interact_with_cyberspace_status_score">
                                <span>نمره وضعیت تعامل با فضای مجازی در واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="interact_with_cyberspace_status_score" name="interact_with_cyberspace_status_score"
                                       value="{{ $culturalIndicator->interact_with_cyberspace_status_score }}" class="form-control"
                                       placeholder=" نمره وضعیت تعامل با فضای مجازی در واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="fixed_cultural_events_status_score">
                                <span>نمره وضعیت برنامه ها و رویدادهای ثابت فرهنگی واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="fixed_cultural_events_status_score" name="fixed_cultural_events_status_score"
                                       value="{{ $culturalIndicator->fixed_cultural_events_status_score }}" class="form-control"
                                       placeholder=" نمره وضعیت برنامه ها و رویدادهای ثابت فرهنگی واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="amounts_of_honors_and_awards">
                                <span>میزان افتخارات و جوایز فرهنگی کسب شده در واحد در سطوح مختلف منطقه ای و ملی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="amounts_of_honors_and_awards" name="amounts_of_honors_and_awards"
                                       value="{{ $culturalIndicator->amounts_of_honors_and_awards }}" class="form-control"
                                       placeholder=" میزان افتخارات و جوایز فرهنگی کسب شده در واحد در سطوح مختلف منطقه ای و ملی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="cultural_industry_products">
                                <span>میزان تولیدات در صنایع فرهنگی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="cultural_industry_products" name="cultural_industry_products"
                                       value="{{ $culturalIndicator->cultural_industry_products }}" class="form-control"
                                       placeholder=" میزان تولیدات در صنایع فرهنگی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="level_of_initiatives">
                                <span>سطح ابتکارات و نوآوری های فرهنگی در واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="level_of_initiatives" name="level_of_initiatives"
                                       value="{{ $culturalIndicator->level_of_initiatives }}" class="form-control"
                                       placeholder=" سطح ابتکارات و نوآوری های فرهنگی در واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="points_for_running_luxury_programs">
                                <span>امتیاز طراحی و اجرای برنامه های فاخر </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="points_for_running_luxury_programs" name="points_for_running_luxury_programs"
                                       value="{{ $culturalIndicator->points_for_running_luxury_programs }}" class="form-control"
                                       placeholder=" امتیاز طراحی و اجرای برنامه های فاخر را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="election_turnout_score">
                                <span>نمره میزان مشارکت در انتخابات </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="election_turnout_score" name="election_turnout_score"
                                       value="{{ $culturalIndicator->election_turnout_score }}" class="form-control"
                                       placeholder=" نمره میزان مشارکت در انتخابات را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="score_cultural_skills_training_programs">
                                <span>امتیاز برنامه های آموزش مهارت های فرهنگی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="score_cultural_skills_training_programs" name="score_cultural_skills_training_programs"
                                       value="{{ $culturalIndicator->score_cultural_skills_training_programs }}" class="form-control"
                                       placeholder=" امتیاز برنامه های آموزش مهارت های فرهنگی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="score_of_cultural_participation_of_Basiji_professors">
                                <span>نمره مشارکت فرهنگی اساتید بسیجی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="score_of_cultural_participation_of_Basiji_professors" name="score_of_cultural_participation_of_Basiji_professors"
                                       value="{{ $culturalIndicator->score_of_cultural_participation_of_Basiji_professors }}" class="form-control"
                                       placeholder=" نمره مشارکت فرهنگی اساتید بسیجی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="participation_of_unit_professors_in_cultural_counseling">
                                <span>میزان مشارکت اساتید واحد در ارائه مشاوره فرهنگی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="participation_of_unit_professors_in_cultural_counseling" name="participation_of_unit_professors_in_cultural_counseling"
                                       value="{{ $culturalIndicator->participation_of_unit_professors_in_cultural_counseling }}" class="form-control"
                                       placeholder=" میزان مشارکت اساتید واحد در ارائه مشاوره فرهنگی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="position_of_the_university_as_cultural_center">
                                <span>جایگاه دانشگاه بعنوان قطب فرهنگی شهر </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="position_of_the_university_as_cultural_center" name="position_of_the_university_as_cultural_center"
                                       value="{{ $culturalIndicator->position_of_the_university_as_cultural_center }}" class="form-control"
                                       placeholder=" جایگاه دانشگاه بعنوان قطب فرهنگی شهر را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="score_cultural_programs">
                                <span>نمره برنامه های ویژه حل مسایل فرهنگی اختصاصی واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="score_cultural_programs" name="score_cultural_programs"
                                       value="{{ $culturalIndicator->score_cultural_programs }}" class="form-control"
                                       placeholder=" نمره برنامه های ویژه حل مسایل فرهنگی اختصاصی واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="score_Families_of_professors">
                                <span>نمره برنامه های فرهنگی خانواده های اساتید و کارکنان واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="score_Families_of_professors" name="score_Families_of_professors"
                                       value="{{ $culturalIndicator->score_Families_of_professors }}" class="form-control"
                                       placeholder=" نمره برنامه های فرهنگی خانواده های اساتید و کارکنان واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="score_of_professors">
                                <span>نمره برنامه های فرهنگی اساتید واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="score_of_professors" name="score_of_professors"
                                       value="{{ $culturalIndicator->score_of_professors }}" class="form-control"
                                       placeholder=" نمره برنامه های فرهنگی اساتید واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="satisfaction_of_managers_performance">
                                <span>میزان رضایتمندی از عملکرد مدیران در واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="satisfaction_of_managers_performance" name="satisfaction_of_managers_performance"
                                       value="{{ $culturalIndicator->satisfaction_of_managers_performance }}" class="form-control"
                                       placeholder=" میزان رضایتمندی از عملکرد مدیران در واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percentage_of_students_participating_in_sports_competitions">
                                <span>درصد دانشجویان شرکت کننده در مسابقات ورزشی واحد دانشگاهی از کل دانشجویان آن واحد دانشگاهی به تفکیک مقطع تحصیلی و جنسیت </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="percentage_of_students_participating_in_sports_competitions" name="percentage_of_students_participating_in_sports_competitions"
                                       value="{{ $culturalIndicator->percentage_of_students_participating_in_sports_competitions }}" class="form-control"
                                       placeholder=" درصد دانشجویان شرکت کننده در مسابقات ورزشی واحد دانشگاهی از کل دانشجویان آن واحد دانشگاهی به تفکیک مقطع تحصیلی و جنسیت را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percentage_of_students_participating_in_cultural_competitions">
                                <span>درصد دانشجویان شرکت کننده در مسابقات فرهنگی واحد دانشگاهی از کل دانشجویان آن واحد دانشگاهی به تفکیک مقطع تحصیلی و جنسیت </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="percentage_of_students_participating_in_cultural_competitions" name="percentage_of_students_participating_in_cultural_competitions"
                                       value="{{ $culturalIndicator->percentage_of_students_participating_in_cultural_competitions }}" class="form-control"
                                       placeholder=" درصد دانشجویان شرکت کننده در مسابقات فرهنگی واحد دانشگاهی از کل دانشجویان آن واحد دانشگاهی به تفکیک مقطع تحصیلی و جنسیت را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percentage_of_students_in_student_organizations">
                                <span>درصد دانشجویان عضو تشکل های دانشجویی واحد دانشگاهی از کل دانشجویان آن واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="percentage_of_students_in_student_organizations" name="percentage_of_students_in_student_organizations"
                                       value="{{ $culturalIndicator->percentage_of_students_in_student_organizations }}" class="form-control"
                                       placeholder=" درصد دانشجویان عضو تشکل های دانشجویی واحد دانشگاهی از کل دانشجویان آن واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="student_counseling_centers">
                                <span>دنسبت تعداد مراکز راهنمایی و مشاوره دانشجویی واحد دانشگاهی به کل دانشجویان آن واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="student_counseling_centers" name="student_counseling_centers"
                                       value="{{ $culturalIndicator->student_counseling_centers }}" class="form-control"
                                       placeholder=" دنسبت تعداد مراکز راهنمایی و مشاوره دانشجویی واحد دانشگاهی به کل دانشجویان آن واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percentage_of_students_referring_to_student_counseling_centers">
                                <span>درصد دانشجویان مراجعه کننده به مراکز راهنمایی و مشاوره دانشجویی نسبت به کل دانشجویان واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="percentage_of_students_referring_to_student_counseling_centers" name="percentage_of_students_referring_to_student_counseling_centers"
                                       value="{{ $culturalIndicator->percentage_of_students_referring_to_student_counseling_centers }}" class="form-control"
                                       placeholder=" درصد دانشجویان مراجعه کننده به مراکز راهنمایی و مشاوره دانشجویی نسبت به کل دانشجویان واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="general_cultural_rank_of_the_university_unit">
                                <span>رتبه کلی فرهنگی واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="general_cultural_rank_of_the_university_unit" name="general_cultural_rank_of_the_university_unit"
                                       value="{{ $culturalIndicator->general_cultural_rank_of_the_university_unit }}" class="form-control"
                                       placeholder=" رتبه کلی فرهنگی واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$culturalIndicator->year" :required="false" name="year"></x-select-year>

                        <x-select-month :default="$culturalIndicator->month" :required="false" name="month"></x-select-month>
                        
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
