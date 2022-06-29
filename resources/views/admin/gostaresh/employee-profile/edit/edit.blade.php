{{--Table 45 View--}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش تحلیل وضعیت و مشخصات کارمندان دانشگاه در ھر یک از واحدھای شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    ویرایش تحلیل وضعیت و مشخصات کارمندان دانشگاه در ھر یک از واحدھای شھرستان ھای استان
@endsection

@section('page-title')
    ویرایش تحلیل وضعیت و مشخصات کارمندان دانشگاه در ھر یک از واحدھای شھرستان ھای استان
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
                    <form class="form-horizontal" method="POST"
                        action="{{ route('employee-profile.update', $employeeProfile) }}"
                        role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $employeeProfile->province_id }}"
                            county_default="{{ $employeeProfile->county_id }}"
                            city_default="{{ $employeeProfile->city_id }}"
                            rural_district_default="{{ $employeeProfile->rural_district_id }}">
                        </select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="higher_education_subsystems">
                                <span>زیرنظام های آموزش عالی شهرستان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="higher_education_subsystems" name="higher_education_subsystems"
                                       value="{{ $employeeProfile->higher_education_subsystems }}" class="form-control"
                                       placeholder=" زیرنظام های آموزش عالی شهرستان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_non_faculty_staff">
                                <span>تعداد کارکنان غیر هیات علمی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_non_faculty_staff" name="number_of_non_faculty_staff"
                                       value="{{ $employeeProfile->number_of_non_faculty_staff }}" class="form-control"
                                       placeholder=" تعداد کارکنان غیر هیات علمی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="average_age_of_employees">
                                <span>میانگین سنی کارمندان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="average_age_of_employees" name="average_age_of_employees"
                                       value="{{ $employeeProfile->average_age_of_employees }}" class="form-control"
                                       placeholder=" میانگین سنی کارمندان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_male_employees">
                                <span>تعداد کارمندان مرد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_male_employees" name="number_of_male_employees"
                                       value="{{ $employeeProfile->number_of_male_employees }}" class="form-control"
                                       placeholder=" تعداد کارمندان مرد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_female_employees">
                                <span>تعداد کارمندان زن </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_female_employees" name="number_of_female_employees"
                                       value="{{ $employeeProfile->number_of_female_employees }}" class="form-control"
                                       placeholder=" تعداد کارمندان زن را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_administrative_staff">
                                <span>تعداد کارمندان اداری </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_administrative_staff" name="number_of_administrative_staff"
                                       value="{{ $employeeProfile->number_of_administrative_staff }}" class="form-control"
                                       placeholder=" تعداد کارمندان اداری را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_training_staff">
                                <span>تعداد کارمندان بخش آموزشی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_training_staff" name="number_of_training_staff"
                                       value="{{ $employeeProfile->number_of_training_staff }}" class="form-control"
                                       placeholder=" تعداد کارمندان بخش آموزشی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_research_staff">
                                <span>تعداد کارمندان بخش پژوهش و فناوری </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_research_staff" name="number_of_research_staff"
                                       value="{{ $employeeProfile->number_of_research_staff }}" class="form-control"
                                       placeholder=" تعداد کارمندان بخش پژوهش و فناوری را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_PhD_staff">
                                <span>تعداد کارمندان با مدرک دکترا </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_PhD_staff" name="number_of_PhD_staff"
                                       value="{{ $employeeProfile->number_of_PhD_staff }}" class="form-control"
                                       placeholder=" تعداد کارمندان با مدرک دکترا را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_master_staff">
                                <span>تعداد کارمندان با مدرک کارشناسی ارشد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_master_staff" name="number_of_master_staff"
                                       value="{{ $employeeProfile->number_of_master_staff }}" class="form-control"
                                       placeholder=" تعداد کارمندان با مدرک کارشناسی ارشد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_expert_staff">
                                <span>تعداد کارمندان با مدرک کارشناسی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_expert_staff" name="number_of_expert_staff"
                                       value="{{ $employeeProfile->number_of_expert_staff }}" class="form-control"
                                       placeholder=" تعداد کارمندان با مدرک کارشناسی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_diploma_and_sub_diploma_employees">
                                <span>تعداد کارمندان با مدرک دیپلم و زیر دیپلم </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_diploma_and_sub_diploma_employees" name="number_of_diploma_and_sub_diploma_employees"
                                       value="{{ $employeeProfile->number_of_diploma_and_sub_diploma_employees }}" class="form-control"
                                       placeholder=" تعداد کارمندان با مدرک دیپلم و زیر دیپلم را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_employees_studying">
                                <span>تعداد کارمندان در حال تحصیل </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_employees_studying" name="number_of_employees_studying"
                                       value="{{ $employeeProfile->number_of_employees_studying }}" class="form-control"
                                       placeholder=" تعداد کارمندان در حال تحصیل را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="growth_rate">
                                <span>نرخ رشد کارمندان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="growth_rate" name="growth_rate"
                                       value="{{ $employeeProfile->growth_rate }}" class="form-control"
                                       placeholder=" نرخ رشد کارمندان را وارد کنید...">
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
                                        <option {{ $i == $employeeProfile->year ? 'selected' : '' }}
                                            value="{{ $i }}">
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
                                        <option {{ $i == $employeeProfile->month ? 'selected' : '' }}
                                            value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor

                                </select>

                            </div>
                        </div>

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