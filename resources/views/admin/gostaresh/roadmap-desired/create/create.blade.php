{{--Table 58 View--}}
@extends('layouts.dashboard')

@section('title-tag')
ایجاد نقشه راه دستیابی بھ وضع مطلوب در واحد دانشگاھی X
@endsection

@section('breadcrumb-title')
ایجاد نقشه راه دستیابی بھ وضع مطلوب در واحد دانشگاھی X
@endsection

@section('page-title')
ایجاد نقشه راه دستیابی بھ وضع مطلوب در واحد دانشگاھی X
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
                    <form class="form-horizontal" method="POST" action="{{ route('roadmap-desired.store') }}" role="form">
                        @csrf

                        <select-province-component></select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="experimental_policy_title">
                                <span>عنوان سیاست آزمایشی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="experimental_policy_title" name="experimental_policy_title"
                                       value="{{ old('experimental_policy_title') }}" class="form-control"
                                       placeholder=" عنوان سیاست آزمایشی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="title_axis">
                                <span>عنوان محور </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="title_axis" name="title_axis"
                                       value="{{ old('title_axis') }}" class="form-control"
                                       placeholder=" عنوان محور را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="project_title">
                                <span>عنوان پروژه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="project_title" name="project_title"
                                       value="{{ old('project_title') }}" class="form-control"
                                       placeholder=" عنوان پروژه را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="quantitative_goal">
                                <span>هدف کمی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="quantitative_goal" name="quantitative_goal"
                                       value="{{ old('quantitative_goal') }}" class="form-control"
                                       placeholder=" هدف کمی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="test">
                                <span>سنجش </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="test" name="test"
                                       value="{{ old('test') }}" class="form-control"
                                       placeholder=" سنجش را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="annual_progress_level">
                                <span>سطح پیشرفت و تحقق سالانه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="annual_progress_level" name="annual_progress_level"
                                       value="{{ old('annual_progress_level') }}" class="form-control"
                                       placeholder=" سطح پیشرفت و تحقق سالانه را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="responsible_for_track">
                                <span>مسئول پیگیری </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="responsible_for_track" name="responsible_for_track"
                                       value="{{ old('responsible_for_track') }}" class="form-control"
                                       placeholder=" مسئول پیگیری را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="considerations">
                                <span>ملاحظات </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="considerations" name="considerations"
                                       value="{{ old('considerations') }}" class="form-control"
                                       placeholder=" ملاحظات را وارد کنید...">
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
