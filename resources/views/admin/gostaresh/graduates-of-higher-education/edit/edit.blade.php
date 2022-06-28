{{--Table 32 View--}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش وضعیت نرخ بیکاری (به تفکیک جمعیت تحصیل کرده/فاقد تحصیلات)
@endsection

@section('breadcrumb-title')
    ویرایش وضعیت نرخ بیکاری (به تفکیک جمعیت تحصیل کرده/فاقد تحصیلات)
@endsection

@section('page-title')
    ویرایش وضعیت نرخ بیکاری (به تفکیک جمعیت تحصیل کرده/فاقد تحصیلات)
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
                        action="{{ route('graduates-of-higher-education.update', $graduatesOfHigherEducation) }}"
                        role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $graduatesOfHigherEducation->province_id }}"
                            county_default="{{ $graduatesOfHigherEducation->county_id }}"
                            city_default="{{ $graduatesOfHigherEducation->city_id }}"
                            rural_district_default="{{ $graduatesOfHigherEducation->rural_district_id }}">
                        </select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="university">
                                <span>دانشگاه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="university" name="university"
                                    value="{{ $graduatesOfHigherEducation->university }}" class="form-control"
                                    placeholder=" دانشگاه را وارد کنید...">
                            </div>
                        </div>

                        <select-grade-component
                                grade_default="{{ $graduatesOfHigherEducation->grade_id }}"
                                sub_grade_default="{{ $graduatesOfHigherEducation->sub_grade_id }}"
                                major_default="{{ $graduatesOfHigherEducation->major_id }}"
                                minor_default="{{ $graduatesOfHigherEducation->minor_id }}"
                        >
                        </select-grade-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="total_graduates">
                                <span>کل دانش آموختگان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="total_graduates" name="total_graduates"
                                       value="{{ $graduatesOfHigherEducation->total_graduates }}" class="form-control"
                                       placeholder=" کل دانش آموختگان را وارد کنید...">
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
                                        <option {{ $i == $graduatesOfHigherEducation->year ? 'selected' : '' }}
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
                                        <option {{ $i == $graduatesOfHigherEducation->month ? 'selected' : '' }}
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
