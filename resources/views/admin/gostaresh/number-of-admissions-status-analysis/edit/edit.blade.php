@extends('layouts.dashboard')

@section('title-tag')
    ویرایش تعداد پذیرفته شدگان
@endsection

@section('breadcrumb-title')
    ویرایش تعداد پذیرفته شدگان
@endsection

@section('page-title')
    ویرایش تعداد پذیرفته شدگان

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
                        action="{{ route('number.of.admissions.status.analysis.update', $numberOfAdmissionsStatusAnalysis) }}"
                        role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $numberOfAdmissionsStatusAnalysis->province_id }}"
                            zone_default="{{ $numberOfAdmissionsStatusAnalysis->county->zone }}"
                            county_default="{{ $numberOfAdmissionsStatusAnalysis->county_id }}"
                            city_default="{{ $numberOfAdmissionsStatusAnalysis->city_id }}"
                            rural_district_default="{{ $numberOfAdmissionsStatusAnalysis->rural_district_id }}"
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
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="gender_id" id="gender_id" class="form-select">
                                    @foreach (config('gostaresh.gender') as $key => $value)
                                        <option {{ $key == $numberOfAdmissionsStatusAnalysis->gender_id ? 'selected' : '' }}
                                            value="{{ $key }}">
                                            {{ $value }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="department_of_education">
                                <span> گروه تحصیلی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="department_of_education" id="department_of_education" class="form-select">
                                    @foreach (config('gostaresh.department_of_education') as $key => $value)
                                        <option
                                            {{ $key == $numberOfAdmissionsStatusAnalysis->department_of_education ? 'selected' : '' }}
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
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="university_type" id="university_type" class="form-select">
                                    @foreach (config('gostaresh.university_type') as $key => $value)
                                        <option
                                            {{ $key == $numberOfAdmissionsStatusAnalysis->university_type ? 'selected' : '' }}
                                            value="{{ $key }}">
                                            {{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_admissions">
                                <span>تعداد پذیرفته شدگان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_admissions" name="number_of_admissions"
                                    value="{{ $numberOfAdmissionsStatusAnalysis->number_of_admissions }}"
                                    class="form-control" placeholder=" تعداد پذیرفته شدگان را وارد کنید...">
                            </div>
                        </div>


                        <x-select-year :default="$numberOfAdmissionsStatusAnalysis->year" min="1390" max="1400" :required="false" name="year"></x-select-year>

                        {{-- <x-select-month :default="$numberOfAdmissionsStatusAnalysis->month" :required="false" name="month"></x-select-month> --}}




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
