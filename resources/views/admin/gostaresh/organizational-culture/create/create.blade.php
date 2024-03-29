{{-- Table 44 View --}}
@extends('layouts.dashboard')

@section('title-tag')
    ایجاد تحلیل وضعیت فرھنگ سازمانی در واحدھای شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    ایجاد تحلیل وضعیت فرھنگ سازمانی در واحدھای شھرستان ھای استان
@endsection

@section('page-title')
    ایجاد تحلیل وضعیت فرھنگ سازمانی در واحدھای شھرستان ھای استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>

    <span>
        <a href="{{ route('organizational-culture.index') }}" class="btn btn-secondary btn-sm">بازگشت به لیست اطلاعات</a>
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
                    <form class="form-horizontal" method="POST" action="{{ route('organizational-culture.store') }}"
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
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit" value="{{ old('unit') }}"
                                    class="form-control" placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="student_satisfaction">
                                <span>میزان رضایت دانشجویان و فارغ التحصیلان واحد از خدمات دانشگاه </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="student_satisfaction"
                                       name="student_satisfaction"
                                       value="{{ old('student_satisfaction') }}" class="form-control"
                                       placeholder=" میزان رضایت دانشجویان و فارغ التحصیلان واحد از خدمات دانشگاه...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unique_organizational_learning_capability">
                                <span>قابلیت یادگیری سازمانی واحد </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unique_organizational_learning_capability"
                                       name="unique_organizational_learning_capability"
                                       value="{{ old('unique_organizational_learning_capability') }}" class="form-control"
                                       placeholder=" قابلیت یادگیری سازمانی واحد...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="students_religious_beliefs">
                                <span>میزان پایبندی به فضایل اخلاقی و باورهای دینی در میان دانشجویان واحد دانشگاهی
                                </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="students_religious_beliefs"
                                       name="students_religious_beliefs"
                                       value="{{ old('students_religious_beliefs') }}" class="form-control"
                                       placeholder=" میزان پایبندی به فضایل اخلاقی و باورهای دینی در میان دانشجویان واحد دانشگاهی...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="student_study_research_culture">
                                <span>میزان پایبندی به فرهنگ تحقیق مطالعه، تتبع و تحقیق در میان دانشجویان واحد </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="student_study_research_culture"
                                       name="student_study_research_culture"
                                       value="{{ old('student_study_research_culture') }}" class="form-control"
                                       placeholder=" میزان پایبندی به فرهنگ تحقیق مطالعه، تتبع و تحقیق در میان دانشجویان واحد...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="hijab_culture_of_students">
                                <span>میزان پایبندی به فرهنگ عفاف و حجاب و سبک پوشش اسلامی در میان دانشجویان واحد
                                </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="hijab_culture_of_students"
                                       name="hijab_culture_of_students"
                                       value="{{ old('hijab_culture_of_students') }}" class="form-control"
                                       placeholder=" میزان پایبندی به فرهنگ عفاف و حجاب و سبک پوشش اسلامی در میان دانشجویان واحد...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="culture_of_participation">
                                <span>سطح فرهنگ مشارکت پذیری و کار گروهی در واحد </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="culture_of_participation"
                                       name="culture_of_participation"
                                       value="{{ old('culture_of_participation') }}" class="form-control"
                                       placeholder=" سطح فرهنگ مشارکت پذیری و کار گروهی در واحد...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="faculty_members_self_confidence">
                                <span>سطح خودباوری و تعلق سازمانی در میان اعضای هیات علمی و کارکنان واحد </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="faculty_members_self_confidence"
                                       name="faculty_members_self_confidence"
                                       value="{{ old('faculty_members_self_confidence') }}" class="form-control"
                                       placeholder=" سطح خودباوری و تعلق سازمانی در میان اعضای هیات علمی و کارکنان واحد...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="amount_of_physical_elements">
                                <span>میزان المان های فیزیکی و نمایه های بصری هویت دار در واحد دانشگاهی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="amount_of_physical_elements"
                                       name="amount_of_physical_elements"
                                       value="{{ old('amount_of_physical_elements') }}" class="form-control"
                                       placeholder=" میزان المان های فیزیکی و نمایه های بصری هویت دار در واحد دانشگاهی...">

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percentage_of_sample_professors_in_unit">
                                <span>درصد اساتید نمونه واحد دانشگاهی از کل اساتید نمونه دانشگاه آزاد اسلامی استان
                                </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="percentage_of_sample_professors_in_unit"
                                    name="percentage_of_sample_professors_in_unit"
                                    value="{{ old('percentage_of_sample_professors_in_unit') }}" class="form-control"
                                    placeholder=" درصد اساتید نمونه واحد دانشگاهی از کل اساتید نمونه دانشگاه آزاد اسلامی استان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percentage_of_sample_professors_in_province">
                                <span>درصد اساتید نمونه دانشگاه آزاد اسلامی استان از کل اساتید نمونه دانشگاه آزاد اسلامی
                                </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="percentage_of_sample_professors_in_province"
                                    name="percentage_of_sample_professors_in_province"
                                    value="{{ old('percentage_of_sample_professors_in_province') }}" class="form-control"
                                    placeholder=" درصد اساتید نمونه دانشگاه آزاد اسلامی استان از کل اساتید نمونه دانشگاه آزاد اسلامی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percentage_of_sample_students_in_unit">
                                <span>درصد دانشجویان نمونه واحد دانشگاهی از کل دانشجویان نمونه دانشگاه آزاد اسلامی استان
                                </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="percentage_of_sample_students_in_unit"
                                    name="percentage_of_sample_students_in_unit"
                                    value="{{ old('percentage_of_sample_students_in_unit') }}" class="form-control"
                                    placeholder=" درصد دانشجویان نمونه واحد دانشگاهی از کل دانشجویان نمونه دانشگاه آزاد اسلامی استان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percentage_of_sample_students_in_province">
                                <span>درصد دانشجویان نمونه دانشگاه آزاد اسلامی استان از کل دانشجویان نمونه دانشگاه آزاد
                                    اسلامی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="percentage_of_sample_students_in_province"
                                    name="percentage_of_sample_students_in_province"
                                    value="{{ old('percentage_of_sample_students_in_province') }}" class="form-control"
                                    placeholder=" درصد دانشجویان نمونه دانشگاه آزاد اسلامی استان از کل دانشجویان نمونه دانشگاه آزاد اسلامی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="brand_influence_in_the_province">
                                <span>میزان نفوذ برند دانشگاه آزاد اسلامی و هویت بصری آن در سطح شهرستان/استان </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="brand_influence_in_the_province"
                                       name="brand_influence_in_the_province"
                                       value="{{ old('brand_influence_in_the_province') }}" class="form-control"
                                       placeholder=" میزان نفوذ برند دانشگاه آزاد اسلامی و هویت بصری آن در سطح شهرستان/استان...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="level_of_intelligence">
                                <span>میزان سامانه سپاری و هوشمندسازی ساختار تشکیلاتی، فرایندها و نظام های مدیریت در واحد
                                </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="level_of_intelligence"
                                       name="level_of_intelligence"
                                       value="{{ old('level_of_intelligence') }}" class="form-control"
                                       placeholder=" میزان سامانه سپاری و هوشمندسازی ساختار تشکیلاتی، فرایندها و نظام های مدیریت در واحد...">

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="axial_program">
                                <span>برنامه محوری (وجود برنامه راهبردی-عملیاتی در سطح واحد/استان مبتنی بر طرح آمایش)
                                </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="axial_program"
                                       name="axial_program"
                                       value="{{ old('axial_program') }}" class="form-control"
                                       placeholder=" برنامه محوری (وجود برنامه راهبردی-عملیاتی در سطح واحد/استان مبتنی بر طرح آمایش)...">

                            </div>
                        </div>

                        <x-select-year :default="old('year')" min="{{ config('gostaresh.year.min', 1370) }}" max="{{ config('gostaresh.year.max', 1405) }}" :required="false" name="year"></x-select-year>

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
