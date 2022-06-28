{{--Table 43 View--}}
@extends('layouts.dashboard')

@section('title-tag')
ایجاد تحلیل وضعیت سلامت اجتماعی در طرح سیمای زندگی در واحدھای دانشگاھی استان
@endsection

@section('breadcrumb-title')
ایجاد تحلیل وضعیت سلامت اجتماعی در طرح سیمای زندگی در واحدھای دانشگاھی استان
@endsection

@section('page-title')
ایجاد تحلیل وضعیت سلامت اجتماعی در طرح سیمای زندگی در واحدھای دانشگاھی استان
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
                    <form class="form-horizontal" method="POST" action="{{ route('social-health.store') }}" role="form">
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

                        <select-grade-component></select-grade-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="average_status_of_high_risk_behaviors">
                                <span>میانگین نمره کلی وضعیت رفتارهای پر خطر دانشجویان  براساس طرح سیمای زندگی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="average_status_of_high_risk_behaviors" name="average_status_of_high_risk_behaviors"
                                       value="{{ old('average_status_of_high_risk_behaviors') }}" class="form-control"
                                       placeholder=" میانگین نمره کلی وضعیت رفتارهای پر خطر دانشجویان  براساس طرح سیمای زندگی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="average_of_family_status">
                                <span>میانگین نمره کلی وضعیت خانوادگی دانشجویان  براساس طرح سیمای زندگی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="average_of_family_status" name="average_of_family_status"
                                       value="{{ old('average_of_family_status') }}" class="form-control"
                                       placeholder=" میانگین نمره کلی وضعیت خانوادگی دانشجویان  براساس طرح سیمای زندگی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="average_of_educational_status">
                                <span>میانگین نمره کلی وضعیت تحصیلی و آموزشی دانشجویان براساس طرح سیمای زندگی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="average_of_educational_status" name="average_of_educational_status"
                                       value="{{ old('average_of_educational_status') }}" class="form-control"
                                       placeholder=" میانگین نمره کلی وضعیت تحصیلی و آموزشی دانشجویان براساس طرح سیمای زندگی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="average_of_attitudes_status">
                                <span>میانگین نمره کلی وضعیت نگرش ها و باورهای دانشجویان براساس طرح سیمای زندگی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="average_of_attitudes_status" name="average_of_attitudes_status"
                                       value="{{ old('average_of_attitudes_status') }}" class="form-control"
                                       placeholder=" میانگین نمره کلی وضعیت نگرش ها و باورهای دانشجویان براساس طرح سیمای زندگی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="average_of_life_style_status">
                                <span>میانگین نمره کلی وضعیت سبک زندگی دانشجویان  براساس طرح سیمای زندگی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="average_of_life_style_status" name="average_of_life_style_status"
                                       value="{{ old('average_of_life_style_status') }}" class="form-control"
                                       placeholder=" میانگین نمره کلی وضعیت سبک زندگی دانشجویان  براساس طرح سیمای زندگی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="average_of_attitude_towards_marriage_status">
                                <span>میانگین نمره کلی وضعیت نگرش دانشجویان نسبت به ازدواج براساس طرح سیمای زندگی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="average_of_attitude_towards_marriage_status" name="average_of_attitude_towards_marriage_status"
                                       value="{{ old('average_of_attitude_towards_marriage_status') }}" class="form-control"
                                       placeholder=" میانگین نمره کلی وضعیت نگرش دانشجویان نسبت به ازدواج براساس طرح سیمای زندگی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="average_of_addiction_status">
                                <span>میانگین نمره کلی وضعیت اعتیاد دانشجویان براساس طرح سیمای زندگی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="average_of_addiction_status" name="average_of_addiction_status"
                                       value="{{ old('average_of_addiction_status') }}" class="form-control"
                                       placeholder=" میانگین نمره کلی وضعیت اعتیاد دانشجویان براساس طرح سیمای زندگی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="average_of_addiction_to_internet_status">
                                <span>میانگین نمره کلی وضعیت ریتم زیستی (اعتیاد به اینترنت) دانشجویان براساس طرح سیمای زندگی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="average_of_addiction_to_internet_status" name="average_of_addiction_to_internet_status"
                                       value="{{ old('average_of_addiction_to_internet_status') }}" class="form-control"
                                       placeholder=" میانگین نمره کلی وضعیت ریتم زیستی (اعتیاد به اینترنت) دانشجویان براساس طرح سیمای زندگی را وارد کنید...">
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
