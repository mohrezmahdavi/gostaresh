@extends('layouts.dashboard')

@section('title-tag')
ایجاد تحلیل وضعیت تعداد رشته های تحصیلی 
@endsection

@section('breadcrumb-title')
ایجاد تحلیل وضعیت تعداد رشته های تحصیلی
@endsection

@section('page-title')
ایجاد تحلیل وضعیت تعداد رشته های تحصیلی
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
                    <form class="form-horizontal" method="POST" action="{{ route('status.analysis.of.the.number.of.fields.of.study.store') }}" role="form">
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
                            <label class="col-sm-2 col-form-label" for="total_number_of_fields_of_study">
                                <span>تعداد کل رشته های تحصیلی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="total_number_of_fields_of_study" name="total_number_of_fields_of_study"
                                    value="{{ old('total_number_of_fields_of_study') }}" class="form-control"
                                    placeholder=" تعداد کل رشته های تحصیلی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_courses">
                                <span>تعداد رشته های تحصیلی بین المللی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_international_courses" name="number_of_international_courses"
                                    value="{{ old('number_of_international_courses') }}" class="form-control"
                                    placeholder=" تعداد رشته های تحصیلی بین المللی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_virtual_courses">
                                <span>تعداد رشته های تحصیلی مجازی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_virtual_courses" name="number_of_virtual_courses"
                                    value="{{ old('number_of_virtual_courses') }}" class="form-control"
                                    placeholder=" تعداد رشته های تحصیلی مجازی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_technical_disciplines">
                                <span>تعداد رشته های فنی و حرفه ای و مهارتی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_technical_disciplines" name="number_of_technical_disciplines"
                                    value="{{ old('number_of_technical_disciplines') }}" class="form-control"
                                    placeholder=" تعداد رشته های فنی و حرفه ای و مهارتی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_newly_established_courses">
                                <span>تعداد رشته های تحصیلی جدید التاسیس </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_newly_established_courses" name="number_of_newly_established_courses"
                                    value="{{ old('number_of_newly_established_courses') }}" class="form-control"
                                    placeholder=" تعداد رشته های تحصیلی جدید التاسیس را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_courses_not_accepted">
                                <span>تعداد رشته / محل های فاقد پذیرش </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_courses_not_accepted" name="number_of_courses_not_accepted"
                                    value="{{ old('number_of_courses_not_accepted') }}" class="form-control"
                                    placeholder=" تعداد رشته / محل های فاقد پذیرش را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_courses_without_volunteers">
                                <span>تعداد رشته / محل های فاقد داوطلب </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_courses_without_volunteers" name="number_of_courses_without_volunteers"
                                    value="{{ old('number_of_courses_without_volunteers') }}" class="form-control"
                                    placeholder=" تعداد رشته / محل های فاقد داوطلب را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_GDP_courses">
                                <span>تعداد تعدادرشته های تحصیلی مرتبط با حوزه GDP غالب استان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_GDP_courses" name="number_of_GDP_courses"
                                    value="{{ old('number_of_GDP_courses') }}" class="form-control"
                                    placeholder=" تعدادرشته های تحصیلی مرتبط با حوزه GDP غالب استان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_disciplines_corresponding_to_job_fields">
                                <span>تعداد رشته های تحصیلی منطبق با حوزه های شغلی مورد نیاز در شهرستان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_disciplines_corresponding_to_job_fields" name="number_of_disciplines_corresponding_to_job_fields"
                                    value="{{ old('number_of_disciplines_corresponding_to_job_fields') }}" class="form-control"
                                    placeholder=" تعداد رشته های تحصیلی منطبق با حوزه های شغلی مورد نیاز در شهرستان وارد کنید...">
                            </div>
                        </div>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_fields_corresponding_to_the_specified_specialties">
                                <span>تعداد رشته های تحصیلی منطبق با تخصص های تعیین شده برای شهرستان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_fields_corresponding_to_the_specified_specialties" name="number_of_fields_corresponding_to_the_specified_specialties"
                                    value="{{ old('number_of_fields_corresponding_to_the_specified_specialties') }}" class="form-control"
                                    placeholder="تعداد رشته های تحصیلی منطبق با تخصص های تعیین شده برای شهرستان">
                            </div>
                        </div>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_courses_offered_virtually">
                                <span>تعداد واحدهای درسی ارایه شده به صورت مجازی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_courses_offered_virtually" name="number_of_courses_offered_virtually"
                                    value="{{ old('number_of_courses_offered_virtually') }}" class="form-control"
                                    placeholder="تعداد واحدهای درسی ارایه شده به صورت مجازی">
                            </div>
                        </div>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_popular_fields_more_than_eighty_percent_capacity">
                                <span>تعداد رشته های تحصیلی پر مخاطب (با تعداد کل دانشجوی بیش از 80 درصد ظرفیت) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_popular_fields_more_than_eighty_percent_capacity" name="number_of_popular_fields_more_than_eighty_percent_capacity"
                                    value="{{ old('number_of_popular_fields_more_than_eighty_percent_capacity') }}" class="form-control"
                                    placeholder="تعداد رشته های تحصیلی پر مخاطب (با تعداد کل دانشجوی بیش از 80 درصد ظرفیت)">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_courses_with_low_audience">
                                <span>تعداد رشته های تحصیلی کم مخاطب (با تعداد کل دانشجوی کمتر از 20 درصد ظرفیت) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_courses_with_low_audience" name="number_of_courses_with_low_audience"
                                    value="{{ old('number_of_courses_with_low_audience') }}" class="form-control"
                                    placeholder="تعداد رشته های تحصیلی کم مخاطب (با تعداد کل دانشجوی کمتر از 20 درصد ظرفیت)">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_fields_of_less_than_5_people">
                                <span>تعداد رشته های تحصیلی کمتر از 5 نفر </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_fields_of_less_than_5_people" name="number_of_fields_of_less_than_5_people"
                                    value="{{ old('number_of_fields_of_less_than_5_people') }}" class="form-control"
                                    placeholder="تعداد رشته های تحصیلی کمتر از 5 نفر">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_courses_without_admission">
                                <span>تعداد رشته های تحصیلی بدون پذیرش </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_courses_without_admission" name="number_of_courses_without_admission"
                                    value="{{ old('number_of_courses_without_admission') }}" class="form-control"
                                    placeholder="تعداد رشته های تحصیلی بدون پذیرش">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_popular_fields">
                                <span>تعداد رشته های تحصیلی پر متقاضی (با تعداد دانشجوی پذیرفته شده در سال 1399 بیش از 80 درصد ظرفیت) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_popular_fields" name="number_of_popular_fields"
                                    value="{{ old('number_of_popular_fields') }}" class="form-control"
                                    placeholder="تعداد رشته های تحصیلی پر متقاضی (با تعداد دانشجوی پذیرفته شده در سال 1399 بیش از 80 درصد ظرفیت)">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="low_number_of_applicants">
                                <span>تعداد رشته های تحصیلی کم متقاضی ( با تعداد دانشجوی پذیرفته شده در سال 1399 کمتر از 20 درصد ظرفیت)</span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="low_number_of_applicants" name="low_number_of_applicants"
                                    value="{{ old('low_number_of_applicants') }}" class="form-control"
                                    placeholder="تعداد رشته های تحصیلی کم متقاضی ( با تعداد دانشجوی پذیرفته شده در سال 1399 کمتر از 20 درصد ظرفیت)">
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