{{--Table 32 View--}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش کل دانش آموختگان از مراکز آموزش عالی موجود در شھرستان محل استقرار واحد دانشگاھی (فارغ التحصیلان کل زیرنظام ھا) به تفکیک مقطع و گروه عمده تحصیلی و جنسیت
@endsection

@section('breadcrumb-title')
    ویرایش کل دانش آموختگان از مراکز آموزش عالی موجود در شھرستان محل استقرار واحد دانشگاھی (فارغ التحصیلان کل زیرنظام ھا) به تفکیک مقطع و گروه عمده تحصیلی و جنسیت
@endsection

@section('page-title')
    ویرایش کل دانش آموختگان از مراکز آموزش عالی موجود در شھرستان محل استقرار واحد دانشگاھی (فارغ التحصیلان کل زیرنظام ھا) به تفکیک مقطع و گروه عمده تحصیلی و جنسیت

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
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
                        action="{{ route('graduates-of-higher-education.update', $graduatesOfHigherEducation) }}"
                        role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $graduatesOfHigherEducation->province_id }}"
                            county_default="{{ $graduatesOfHigherEducation->county_id }}"
                            city_default="{{ $graduatesOfHigherEducation->city_id }}"
                            rural_district_default="{{ $graduatesOfHigherEducation->rural_district_id }}">
                        </select-province-component>

                        <select-grade-component
                                grade_default="{{ $graduatesOfHigherEducation->grade_id }}"
                                sub_grade_default="{{ $graduatesOfHigherEducation->sub_grade_id }}"
                                major_default="{{ $graduatesOfHigherEducation->major_id }}"
                                minor_default="{{ $graduatesOfHigherEducation->minor_id }}"
                        >
                        </select-grade-component>

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

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="gender_id">
                                <span>جنسیت  </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="gender_id" id="gender_id" class="form-select" >
                                    @foreach (config('gostaresh.gender') as $key => $value)
                                        <option {{ ($key == $graduatesOfHigherEducation->gender_id ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="department_of_education">
                                <span>گروه عمده تحصیلی  </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="department_of_education" id="department_of_education" class="form-select" >
                                    @foreach (config('gostaresh.department_of_education') as $key => $value)
                                        <option {{ ($key == $graduatesOfHigherEducation->department_of_education ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="associate_degree">
                                <span>کاردانی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="associate_degree" name="associate_degree"
                                       value="{{ $graduatesOfHigherEducation->associate_degree }}" class="form-control"
                                       placeholder=" کاردانی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="bachelor_degree">
                                <span>کارشناسی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="bachelor_degree" name="bachelor_degree"
                                       value="{{ $graduatesOfHigherEducation->bachelor_degree }}" class="form-control"
                                       placeholder=" کارشناسی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="masters">
                                <span>کارشناسی ارشد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="masters" name="masters"
                                       value="{{ $graduatesOfHigherEducation->masters }}" class="form-control"
                                       placeholder=" کارشناسی ارشد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="phd">
                                <span>دکتری </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="phd" name="phd"
                                       value="{{ $graduatesOfHigherEducation->phd }}" class="form-control"
                                       placeholder=" دکتری را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$graduatesOfHigherEducation->year" :required="false" name="year"></x-select-year>

                        <x-select-month :default="$graduatesOfHigherEducation->month" :required="false" name="month"></x-select-month>

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
