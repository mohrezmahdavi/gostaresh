{{-- Table 47 View --}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش تحلیل وضعیت شاخص میزان بھره وری از دارایی ھای دانشگاه در واحدھای شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    ویرایش تحلیل وضعیت شاخص میزان بھره وری از دارایی ھای دانشگاه در واحدھای شھرستان ھای استان
@endsection

@section('page-title')
    ویرایش تحلیل وضعیت شاخص میزان بھره وری از دارایی ھای دانشگاه در واحدھای شھرستان ھای استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>

    <span>
        <a href="{{ route('asset-productivity.index') }}" class="btn btn-secondary btn-sm">بازگشت به لیست اطلاعات</a>
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
                        action="{{ route('asset-productivity.update', $assetProductivity) }}" role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $assetProductivity->province_id }}"
                            zone_default="{{ $assetProductivity->county->zone }}"
                            county_default="{{ $assetProductivity->county_id }}"
                            city_default="{{ $assetProductivity->city_id }}"
                            rural_district_default="{{ $assetProductivity->rural_district_id }}"
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
                                <input type="text" id="unit" name="unit" value="{{ $assetProductivity->unit }}"
                                    class="form-control" placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="office_space_utilization_rate">
                                <span>نرخ بهره برداری از فضای اداری </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="office_space_utilization_rate"
                                    name="office_space_utilization_rate"
                                    value="{{ $assetProductivity->office_space_utilization_rate }}" class="form-control"
                                    placeholder=" نرخ بهره برداری از فضای اداری را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="utilization_rate_of_educational_equipment">
                                <span>نرخ بهره برداری از فضا و تجهیزات آموزشی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="utilization_rate_of_educational_equipment"
                                    name="utilization_rate_of_educational_equipment"
                                    value="{{ $assetProductivity->utilization_rate_of_educational_equipment }}"
                                    class="form-control"
                                    placeholder=" نرخ بهره برداری از فضا و تجهیزات آموزشی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="utilization_rate_of_technology_equipment">
                                <span>نرخ بهره برداری از فضای و تجهیزات فناوری و نوآوری </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="utilization_rate_of_technology_equipment"
                                    name="utilization_rate_of_technology_equipment"
                                    value="{{ $assetProductivity->utilization_rate_of_technology_equipment }}"
                                    class="form-control"
                                    placeholder=" نرخ بهره برداری از فضای و تجهیزات فناوری و نوآوری را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="utilization_rate_of_cultural_equipment">
                                <span>سرانه نرخ بهره برداری از فضا و تجهیزات فرهنگی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="utilization_rate_of_cultural_equipment"
                                    name="utilization_rate_of_cultural_equipment"
                                    value="{{ $assetProductivity->utilization_rate_of_cultural_equipment }}"
                                    class="form-control"
                                    placeholder=" سرانه نرخ بهره برداری از فضا و تجهیزات فرهنگی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="utilization_rate_of_sports_equipment">
                                <span>نرخ بهره برداری از فضا و تجهیزات ورزشی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="utilization_rate_of_sports_equipment"
                                    name="utilization_rate_of_sports_equipment"
                                    value="{{ $assetProductivity->utilization_rate_of_sports_equipment }}"
                                    class="form-control"
                                    placeholder=" نرخ بهره برداری از فضا و تجهیزات ورزشی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="operation_rate_of_agricultural_equipment">
                                <span>نرخ بهره برداری از تجهیزات و فضای کشاورزی و زراعی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="operation_rate_of_agricultural_equipment"
                                    name="operation_rate_of_agricultural_equipment"
                                    value="{{ $assetProductivity->operation_rate_of_agricultural_equipment }}"
                                    class="form-control"
                                    placeholder=" نرخ بهره برداری از تجهیزات و فضای کشاورزی و زراعی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="operation_rate_of_workshop_equipment">
                                <span>ﻧـﺮخﺑﻬـﺮهﺑـﺮداری ازتجهیزات و فضای کارگاهی و آزمایشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="operation_rate_of_workshop_equipment"
                                    name="operation_rate_of_workshop_equipment"
                                    value="{{ $assetProductivity->operation_rate_of_workshop_equipment }}"
                                    class="form-control"
                                    placeholder=" ﻧـﺮخﺑﻬـﺮهﺑـﺮداری ازتجهیزات و فضای کارگاهی و آزمایشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="faculty_capacity_utilization_rate">
                                <span>نرخ بهره برداری از ظرفیت اعضای هیات علمی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="faculty_capacity_utilization_rate"
                                    name="faculty_capacity_utilization_rate"
                                    value="{{ $assetProductivity->faculty_capacity_utilization_rate }}"
                                    class="form-control"
                                    placeholder=" نرخ بهره برداری از ظرفیت اعضای هیات علمی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="employee_capacity_utilization_rate">
                                <span>نرخ بهره برداری از ظرفیت کارمندان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="employee_capacity_utilization_rate"
                                    name="employee_capacity_utilization_rate"
                                    value="{{ $assetProductivity->employee_capacity_utilization_rate }}"
                                    class="form-control" placeholder=" نرخ بهره برداری از ظرفیت کارمندان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="graduate_capacity_utilization_rate">
                                <span>نرخ بهره برداری از ظرفیت فارغ التحصیلان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="graduate_capacity_utilization_rate"
                                    name="graduate_capacity_utilization_rate"
                                    value="{{ $assetProductivity->graduate_capacity_utilization_rate }}"
                                    class="form-control"
                                    placeholder=" نرخ بهره برداری از ظرفیت فارغ التحصیلان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="student_capacity_utilization_rate">
                                <span>نرخ بهره برداری از ظرفیت دانشجویان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="student_capacity_utilization_rate"
                                    name="student_capacity_utilization_rate"
                                    value="{{ $assetProductivity->student_capacity_utilization_rate }}"
                                    class="form-control"
                                    placeholder=" نرخ بهره برداری از ظرفیت دانشجویان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="ratio_of_faculty_members_to_students">
                                <span>نسبت تعداد اعضای هیات علمی به دانشجویان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="ratio_of_faculty_members_to_students"
                                    name="ratio_of_faculty_members_to_students"
                                    value="{{ $assetProductivity->ratio_of_faculty_members_to_students }}"
                                    class="form-control"
                                    placeholder=" نسبت تعداد اعضای هیات علمی به دانشجویان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="ratio_of_staff_to_students">
                                <span>نسبت تعداد کارمندان به دانشجویان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="ratio_of_staff_to_students" name="ratio_of_staff_to_students"
                                    value="{{ $assetProductivity->ratio_of_staff_to_students }}" class="form-control"
                                    placeholder=" نسبت تعداد کارمندان به دانشجویان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="ratio_of_faculty_members_to_teaching_professors">
                                <span>نسبت تعداد اعضای هیات علمی به تعداد اساتید مدعو و حق التدریس </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="ratio_of_faculty_members_to_teaching_professors"
                                    name="ratio_of_faculty_members_to_teaching_professors"
                                    value="{{ $assetProductivity->ratio_of_faculty_members_to_teaching_professors }}"
                                    class="form-control"
                                    placeholder=" نسبت تعداد اعضای هیات علمی به تعداد اساتید مدعو و حق التدریس را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="ratio_of_faculty_members_to_employees">
                                <span>نسبت تعداد اعضای هیات علمی به کارمندان واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="ratio_of_faculty_members_to_employees"
                                    name="ratio_of_faculty_members_to_employees"
                                    value="{{ $assetProductivity->ratio_of_faculty_members_to_employees }}"
                                    class="form-control"
                                    placeholder=" نسبت تعداد اعضای هیات علمی به کارمندان واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label"
                                for="ratio_of_unit_faculty_members_to_faculty_members_of_the_province">
                                <span>نسبت تعداد اعضای هیات علمی به میانگین تعداد اعضای هیات علمی استان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number"
                                    id="ratio_of_unit_faculty_members_to_faculty_members_of_the_province"
                                    name="ratio_of_unit_faculty_members_to_faculty_members_of_the_province"
                                    value="{{ $assetProductivity->ratio_of_unit_faculty_members_to_faculty_members_of_the_province }}"
                                    class="form-control"
                                    placeholder=" نسبت تعداد اعضای هیات علمی به میانگین تعداد اعضای هیات علمی استان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label"
                                for="ratio_of_unit_students_to_students_of_the_province">
                                <span>نسبت تعداد دانشجویان به میانگین تعداد دانشجویان استان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="ratio_of_unit_students_to_students_of_the_province"
                                    name="ratio_of_unit_students_to_students_of_the_province"
                                    value="{{ $assetProductivity->ratio_of_unit_students_to_students_of_the_province }}"
                                    class="form-control"
                                    placeholder=" نسبت تعداد دانشجویان به میانگین تعداد دانشجویان استان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="ratio_of_unit_employees_to_provincial_employees">
                                <span>نسبت تعداد کارمندان به میانگین تعداد کارمندان استان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="ratio_of_unit_employees_to_provincial_employees"
                                    name="ratio_of_unit_employees_to_provincial_employees"
                                    value="{{ $assetProductivity->ratio_of_unit_employees_to_provincial_employees }}"
                                    class="form-control"
                                    placeholder=" نسبت تعداد کارمندان به میانگین تعداد کارمندان استان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label"
                                for="unit_teaching_professors_to_teaching_professors_province">
                                <span>نسبت تعداد اساتید مدعو و حق التدریس به میانگین تعداد اساتید مدعو و حق التدریس استان
                                </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="unit_teaching_professors_to_teaching_professors_province"
                                    name="unit_teaching_professors_to_teaching_professors_province"
                                    value="{{ $assetProductivity->unit_teaching_professors_to_teaching_professors_province }}"
                                    class="form-control"
                                    placeholder=" نسبت تعداد اساتید مدعو و حق التدریس به میانگین تعداد اساتید مدعو و حق التدریس استان را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$assetProductivity->year" min="{{ config('gostaresh.year.min', 1370) }}" max="{{ config('gostaresh.year.max', 1405) }}" :required="false" name="year"></x-select-year>

                        {{-- <x-select-month :default="$assetProductivity->month" :required="false" name="month"></x-select-month> --}}


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
