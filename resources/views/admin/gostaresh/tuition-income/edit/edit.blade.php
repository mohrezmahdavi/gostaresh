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
                                <span>دانشگاه  </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="university_type" id="university_type" class="form-select" >
                                    @foreach (config('gostaresh.university_type') as $key => $value)
                                        <option {{ ($key == $tuitionIncome->university_type ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
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
                                        <option {{ ($key == $tuitionIncome->department_of_education ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
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
                                       value="{{ $tuitionIncome->associate_degree }}" class="form-control"
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
                                       value="{{ $tuitionIncome->bachelor_degree }}" class="form-control"
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
                                       value="{{ $tuitionIncome->masters }}" class="form-control"
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
                                       value="{{ $tuitionIncome->phd }}" class="form-control"
                                       placeholder=" دکتری را وارد کنید...">
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
