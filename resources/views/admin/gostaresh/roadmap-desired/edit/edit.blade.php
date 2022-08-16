{{-- Table 58 View --}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش نقشه راه دستیابی به وضع مطلوب در واحد دانشگاھی
@endsection

@section('breadcrumb-title')
    ویرایش نقشه راه دستیابی به وضع مطلوب در واحد دانشگاھی
@endsection

@section('page-title')
    ویرایش نقشه راه دستیابی به وضع مطلوب در واحد دانشگاھی

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
                    <form class="form-horizontal" method="POST"
                        action="{{ route('roadmap-desired.update', $roadmapDesired) }}" role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $roadmapDesired->province_id ?? ''}}"
                            zone_default="{{ $roadmapDesired->county->zone ?? ''}}"
                            county_default="{{ $roadmapDesired->county_id ?? ''}}" city_default="{{ $roadmapDesired->city_id ?? ''}}"
                            rural_district_default="{{ $roadmapDesired->rural_district_id ?? ''}}"
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
                                {{--{{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}--}}
                            {{--</label>--}}
                            {{--<div class="col-sm-10">--}}
                                {{--<input type="text" id="experimental_policy_title" name="experimental_policy_title"--}}
                                    {{--value="{{ $roadmapDesired->experimental_policy_title }}" class="form-control"--}}
                                    {{--placeholder=" عنوان سیاست آزمایشی را وارد کنید...">--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="title_axis">
                                <span>عنوان محور </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="title_axis" name="title_axis"
                                    value="{{ $roadmapDesired->title_axis }}" class="form-control"
                                    placeholder=" عنوان محور را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="project_title">
                                <span>عنوان پروژه </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="project_title" name="project_title"
                                    value="{{ $roadmapDesired->project_title }}" class="form-control"
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
                                       value="{{ $roadmapDesired->package_number }}" class="form-control"
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
                                       value="{{ $roadmapDesired->transformation_document }}" class="form-control"
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
                                    value="{{ $roadmapDesired->quantitative_goal }}" class="form-control"
                                    placeholder=" هدف کمی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="test">
                                <span> سنجه </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="test" name="test" value="{{ $roadmapDesired->test }}"
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
                                    value="{{ $roadmapDesired->annual_progress_level }}" class="form-control"
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
                                    value="{{ $roadmapDesired->responsible_for_track }}" class="form-control"
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
                                    value="{{ $roadmapDesired->considerations }}" class="form-control"
                                    placeholder=" ملاحظات را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$roadmapDesired->year" min="{{ config('gostaresh.year.min', 1370) }}" max="{{ config('gostaresh.year.max', 1405) }}" :required="false" name="year">
                        </x-select-year>

                        {{-- <x-select-month :default="$roadmapDesired->month" :required="false" name="month"></x-select-month> --}}


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
