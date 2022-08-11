@extends('layouts.dashboard')

@section('title-tag')
ویرایش تحلیل وضعیت تعداد دانشجویان
@endsection

@section('breadcrumb-title')
ویرایش تحلیل وضعیت تعداد دانشجویان
@endsection

@section('page-title')
ویرایش تحلیل وضعیت تعداد دانشجویان

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
                        action="{{ route('number.of.students.status.by-grade.analysis.update', $numberOfStudentsStatusAnalysis) }}"
                        role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $numberOfStudentsStatusAnalysis->province_id }}"
                            zone_default="{{ $numberOfStudentsStatusAnalysis->county->zone }}"
                            county_default="{{ $numberOfStudentsStatusAnalysis->county_id }}"
                            city_default="{{ $numberOfStudentsStatusAnalysis->city_id }}"
                            rural_district_default="{{ $numberOfStudentsStatusAnalysis->rural_district_id }}"
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
                                        <option {{ $key == $numberOfStudentsStatusAnalysis->gender_id ? 'selected' : '' }}
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
                                            {{ $key == $numberOfStudentsStatusAnalysis->department_of_education ? 'selected' : '' }}
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
                                            {{ $key == $numberOfStudentsStatusAnalysis->university_type ? 'selected' : '' }}
                                            value="{{ $key }}">
                                            {{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_students">
                                <span>تعداد دانشجویان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_students" name="number_of_students"
                                    value="{{ $numberOfStudentsStatusAnalysis->number_of_students }}" class="form-control"
                                    placeholder=" تعداد دانشجویان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="grade_id">
                                <span>مقطع</span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="grade_id" id="grade_id" class="form-select">
                                    <option value="">انتخاب کنید...</option>
                                    @foreach ($grades as $grade)
                                        <option {{ $grade->id == $numberOfStudentsStatusAnalysis->grade_id ? ' selected' : '' }} value="{{ $grade->id}}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="major_id">
                                <span>رشته</span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="major_id" id="major_id" class="form-select">
                                    <option value="">انتخاب کنید...</option>
                                    @foreach ($majors as $major)
                                        <option {{ $major->id == $numberOfStudentsStatusAnalysis->major_id ? ' selected' : '' }} value="{{ $major->id}}">{{ $major->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="minor_id">
                                <span>گرایش</span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="minor_id" id="minor_id" class="form-select">
                                    <option value="">انتخاب کنید...</option>
                                    @foreach ($minors as $minor)
                                        <option {{ $minor->id == $numberOfStudentsStatusAnalysis->minor_id ? ' selected' : '' }} value="{{ $minor->id}}">{{ $minor->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>


                        <x-select-year :default="$numberOfStudentsStatusAnalysis->year" min="{{ config('gostaresh.year.min', 1370) }}" max="{{ config('gostaresh.year.max', 1405) }}" :required="false" name="year"></x-select-year>

                        {{-- <x-select-month :default="$numberOfStudentsStatusAnalysis->month" :required="false" name="month"></x-select-month> --}}


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
