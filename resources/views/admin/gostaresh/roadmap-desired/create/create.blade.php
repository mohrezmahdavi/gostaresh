{{-- Table 58 View --}}
@extends('layouts.dashboard')

@section('title-tag')
    ایجاد نقشه راه دستیابی به وضع مطلوب در واحد دانشگاھی
@endsection

@section('breadcrumb-title')
    ایجاد نقشه راه دستیابی به وضع مطلوب در واحد دانشگاھی
@endsection

@section('page-title')
    ایجاد نقشه راه دستیابی به وضع مطلوب در واحد دانشگاھی

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>

    <span>
        <a href="{{ route('roadmap-desired.index') }}" class="btn btn-secondary btn-sm">بازگشت به لیست اطلاعات</a>
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
                    <form class="form-horizontal" method="POST" action="{{ route('roadmap-desired.store') }}" role="form">
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

                        {{--<div class="form-group row mt-2">--}}
                            {{--<label class="col-sm-2 col-form-label" for="experimental_policy_title">--}}
                                {{--<span>عنوان سیاست آزمایشی </span>&nbsp--}}
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            {{--</label>--}}
                            {{--<div class="col-sm-10">--}}
                                {{--<input type="text" id="experimental_policy_title" name="experimental_policy_title"--}}
                                    {{--value="{{ old('experimental_policy_title') }}" class="form-control"--}}
                                    {{--placeholder=" عنوان سیاست آزمایشی را وارد کنید...">--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="title_axis">
                                <span>عنوان محور </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="title_axis" name="title_axis" value="{{ old('title_axis') }}"
                                    class="form-control" placeholder=" عنوان محور را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="project_title">
                                <span>عنوان پروژه </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="project_title" name="project_title"
                                    value="{{ old('project_title') }}" class="form-control"
                                    placeholder=" عنوان پروژه را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="package_number">
                                <span>شماره بسته متناظر از سند تحول دانشگاه </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="package_number" name="package_number"
                                    value="{{ old('package_number') }}" class="form-control"
                                    placeholder=" شماره بسته متناظر از سند تحول دانشگاه را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="transformation_document">
                                <span>شماره راهکنش متناظر از سند تحول دانشگاه </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="transformation_document" name="transformation_document"
                                    value="{{ old('transformation_document') }}" class="form-control"
                                    placeholder=" شماره راهکنش متناظر از سند تحول دانشگاه را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="quantitative_goal">
                                <span>هدف کمی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="quantitative_goal" name="quantitative_goal"
                                    value="{{ old('quantitative_goal') }}" class="form-control"
                                    placeholder=" هدف کمی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="test">
                                <span> سنجه </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="test" name="test" value="{{ old('test') }}"
                                    class="form-control" placeholder=" سنجش را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="annual_progress_level">
                                <span>سطح پیشرفت و تحقق سالانه </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
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
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
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
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="considerations" name="considerations"
                                    value="{{ old('considerations') }}" class="form-control"
                                    placeholder=" ملاحظات را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="old('year')" min="{{ config('gostaresh.year.min', 1370) }}" max="{{ config('gostaresh.year.max', 1405) }}" :required="false" name="year">
                        </x-select-year>

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
