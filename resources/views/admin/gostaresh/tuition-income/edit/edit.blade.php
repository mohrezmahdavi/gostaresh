{{--Table 50 View--}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش میانگین درآمدھی شھریه ای در گروه ھا و مقاطع مختلف تحصیلی
@endsection

@section('breadcrumb-title')
    ویرایش میانگین درآمدھی شھریه ای در گروه ھا و مقاطع مختلف تحصیلی
@endsection

@section('page-title')
    ویرایش میانگین درآمدھی شھریه ای در گروه ھا و مقاطع مختلف تحصیلی
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
                        action="{{ route('tuition-income.update', $tuitionIncome) }}"
                        role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $tuitionIncome->province_id }}"
                            county_default="{{ $tuitionIncome->county_id }}"
                            city_default="{{ $tuitionIncome->city_id }}"
                            rural_district_default="{{ $tuitionIncome->rural_district_id }}">
                        </select-province-component>

                        <select-grade-component
                                grade_default="{{ $tuitionIncome->grade_id }}"
                                sub_grade_default="{{ $tuitionIncome->sub_grade_id }}"
                                major_default="{{ $tuitionIncome->major_id }}"
                                minor_default="{{ $tuitionIncome->minor_id }}"
                        >
                        </select-grade-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unit">
                                <span>واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit"
                                       value="{{ $tuitionIncome->unit }}" class="form-control"
                                       placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="university_type">
                                <span>دانشگاه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="university_type" name="university_type"
                                       value="{{ $tuitionIncome->university_type }}" class="form-control"
                                       placeholder=" دانشگاه را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="average_field_performance_income">
                                <span>میانگین درآمد ناشی از اجرای رشته </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="average_field_performance_income" name="average_field_performance_income"
                                       value="{{ $tuitionIncome->average_field_performance_income }}" class="form-control"
                                       placeholder=" میانگین درآمد ناشی از اجرای رشته را وارد کنید...">
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
                                        <option {{ $i == $tuitionIncome->year ? 'selected' : '' }}
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
                                        <option {{ $i == $tuitionIncome->month ? 'selected' : '' }}
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
