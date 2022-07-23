{{--Table 55 View--}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش میانگین ھزینه ناشی از اجرای رشته ھای تحصیلی در گروه ھا و مقاطع مختلف تحصیلی
@endsection

@section('breadcrumb-title')
    ویرایش میانگین ھزینه ناشی از اجرای رشته ھای تحصیلی در گروه ھا و مقاطع مختلف تحصیلی
@endsection

@section('page-title')
    ویرایش میانگین ھزینه ناشی از اجرای رشته ھای تحصیلی در گروه ھا و مقاطع مختلف تحصیلی

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
                        action="{{ route('cost-of-majors.update', $costOfMajor) }}"
                        role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $costOfMajor->province_id }}"
                            zone_default="{{ $costOfMajor->county->zone }}"
                            county_default="{{ $costOfMajor->county_id }}"
                            city_default="{{ $costOfMajor->city_id }}"
                            rural_district_default="{{ $costOfMajor->rural_district_id }}">
                        </select-province-component>

                        <select-grade-component
                                grade_default="{{ $costOfMajor->grade_id }}"
                                sub_grade_default="{{ $costOfMajor->sub_grade_id }}"
                                major_default="{{ $costOfMajor->major_id }}"
                                minor_default="{{ $costOfMajor->minor_id }}"
                        >
                        </select-grade-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="university_type">
                                <span>دانشگاه  </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="university_type" id="university_type" class="form-select" >
                                    @foreach (config('gostaresh.university_type') as $key => $value)
                                        <option {{ ($key == $costOfMajor->university_type ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>

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
                                        <option {{ ($key == $costOfMajor->gender_id ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
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
                                        <option {{ ($key == $costOfMajor->department_of_education ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
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
                                <input type="text" id="associate_degree" name="associate_degree"
                                       value="{{ $costOfMajor->associate_degree }}" class="form-control"
                                       placeholder=" کاردانی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="bachelor_degree">
                                <span>کارشناسی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="bachelor_degree" name="bachelor_degree"
                                       value="{{ $costOfMajor->bachelor_degree }}" class="form-control"
                                       placeholder=" کارشناسی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="masters">
                                <span>کارشناسی ارشد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="masters" name="masters"
                                       value="{{ $costOfMajor->masters }}" class="form-control"
                                       placeholder=" کارشناسی ارشد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="phd">
                                <span>دکتری </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="phd" name="phd"
                                       value="{{ $costOfMajor->phd }}" class="form-control"
                                       placeholder=" دکتری را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$costOfMajor->year" :required="false" name="year"></x-select-year>

                        <x-select-month :default="$costOfMajor->month" :required="false" name="month"></x-select-month>

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
