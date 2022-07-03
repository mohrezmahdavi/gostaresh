@extends('layouts.dashboard')

@section('title-tag')
ویرایش میانگین رتبه آزمون 5 درصد آخر پذیرفته شدگان
@endsection

@section('breadcrumb-title')
ویرایش میانگین رتبه آزمون 5 درصد آخر پذیرفته شدگان
@endsection

@section('page-title')
ویرایش میانگین رتبه آزمون 5 درصد آخر پذیرفته شدگان
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" id="app">
                    <form class="form-horizontal" method="POST" action="{{ route('average.test.score.of.the.last.five.percent.of.admitted.update', $avgTstScOfLastFivePctOfAdmitted) }}" role="form">
                        @csrf
                        @method('PUT')
                        
                        <select-province-component province_default="{{ $avgTstScOfLastFivePctOfAdmitted->province_id }}"
                            county_default="{{ $avgTstScOfLastFivePctOfAdmitted->county_id }}" city_default="{{ $avgTstScOfLastFivePctOfAdmitted->city_id }}"
                            rural_district_default="{{ $avgTstScOfLastFivePctOfAdmitted->rural_district_id }}">
                        </select-province-component>
                        
                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="gender_id">
                                <span> جنسیت </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="gender_id" id="gender_id" class="form-select">
                                    @foreach (config('gostaresh.gender') as $key => $value)
                                        <option {{ $key == $avgTstScOfLastFivePctOfAdmitted->gender_id ? 'selected' : '' }} value="{{ $key }}">
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
                                        <option {{ $key == $avgTstScOfLastFivePctOfAdmitted->department_of_education ? 'selected' : '' }} value="{{ $key }}">
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
                                        <option {{ $key == $avgTstScOfLastFivePctOfAdmitted->university_type ? 'selected' : '' }} value="{{ $key }}">
                                            {{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="average_test_score_of_the_last_five_percent_of_admitted">
                                <span>تعداد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="average_test_score_of_the_last_five_percent_of_admitted" name="average_test_score_of_the_last_five_percent_of_admitted"
                                    value="{{ $avgTstScOfLastFivePctOfAdmitted->average_test_score_of_the_last_five_percent_of_admitted }}" class="form-control"
                                    placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        

                        <x-select-year :default="$avgTstScOfLastFivePctOfAdmitted->year" :required="false" name="year"></x-select-year>

                        <x-select-month :default="$avgTstScOfLastFivePctOfAdmitted->month" :required="false" name="month"></x-select-month>


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
