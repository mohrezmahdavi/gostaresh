@extends('layouts.dashboard')

@section('title-tag')
    ایجاد نرخ رشد سالانه ثبت نام دانشجو
@endsection

@section('breadcrumb-title')
    ایجاد نرخ رشد سالانه ثبت نام دانشجو
@endsection

@section('page-title')
    ایجاد نرخ رشد سالانه ثبت نام دانشجو

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>

    <span>
        <a href="{{ route('annual.growth.rate.of.student.enrollment.index') }}" class="btn btn-secondary btn-sm">بازگشت به لیست اطلاعات</a>
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
                        action="{{ route('annual.growth.rate.of.student.enrollment.store') }}" role="form">
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

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="gender_id">
                                <span> جنسیت </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="gender_id" id="gender_id" class="form-select">
                                    @foreach (config('gostaresh.gender') as $key => $value)
                                        <option {{ $key == old('gender_id') ? 'selected' : '' }}
                                            value="{{ $key }}">
                                            {{ $value }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="department_of_education">
                                <span> گروه تحصیلی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="department_of_education" id="department_of_education" class="form-select">
                                    @foreach (config('gostaresh.department_of_education') as $key => $value)
                                        <option {{ $key == old('department_of_education') ? 'selected' : '' }}
                                            value="{{ $key }}">
                                            {{ $value }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <select-grade-component></select-grade-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="university_type">
                                <span>نوع دانشگاه </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="university_type" id="university_type" class="form-select">
                                    @foreach (config('gostaresh.university_type') as $key => $value)
                                        <option {{ $key == old('university_type') ? 'selected' : '' }}
                                            value="{{ $key }}">
                                            {{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="grade_id">
                                <span>مقطع</span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="grade_id" id="grade_id" class="form-select">
                                    <option value="">انتخاب کنید...</option>
                                    @foreach (\App\Models\Grade::all() as $grade)
                                        <option {{ $grade->id == old('grade_id') ? ' selected' : '' }} value="{{ $grade->id}}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="annual_growth_rate_of_student_enrollment">
                                <span>نرخ رشد سالانه ثبت نام دانشجو</span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="annual_growth_rate_of_student_enrollment"
                                    name="annual_growth_rate_of_student_enrollment"
                                    value="{{ old('annual_growth_rate_of_student_enrollment') }}" class="form-control"
                                    placeholder=" نرخ رشد را وارد کنید...">
                            </div>
                        </div>


                        <x-select-year :default="old('year')" min="1370" max="1405" :required="false" name="year">
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
