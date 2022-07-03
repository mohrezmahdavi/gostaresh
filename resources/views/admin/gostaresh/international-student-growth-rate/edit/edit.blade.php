@extends('layouts.dashboard')

@section('title-tag')
    ویرایش تعداد دانشجویان غیرایرانی و بین الملل واحدهای دانشگاهی
@endsection

@section('breadcrumb-title')
    ویرایش تعداد دانشجویان غیرایرانی و بین الملل واحدهای دانشگاهی
@endsection

@section('page-title')
    ویرایش تعداد دانشجویان غیرایرانی و بین الملل واحدهای دانشگاهی
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
                        action="{{ route('international.student.growth.rate.update', $internationalStudentGrowthRate) }}"
                        role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $internationalStudentGrowthRate->province_id }}"
                            county_default="{{ $internationalStudentGrowthRate->county_id }}"
                            city_default="{{ $internationalStudentGrowthRate->city_id }}"
                            rural_district_default="{{ $internationalStudentGrowthRate->rural_district_id }}">
                        </select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unit">
                                <span>واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit"
                                    value="{{ $internationalStudentGrowthRate->unit }}" class="form-control"
                                    placeholder=" واحد را وارد کنید...">
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
                                            {{ $key == $internationalStudentGrowthRate->department_of_education ? 'selected' : '' }}
                                            value="{{ $key }}">
                                            {{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="kardani_count">
                                <span>تعداد کاردانی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="kardani_count" name="kardani_count"
                                    value="{{ $internationalStudentGrowthRate->kardani_count }}" class="form-control"
                                    placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="karshenasi_count">
                                <span>تعداد کارشناسی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="karshenasi_count" name="karshenasi_count"
                                    value="{{ $internationalStudentGrowthRate->karshenasi_count }}" class="form-control"
                                    placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="karshenasi_arshad_count">
                                <span>تعداد کارشناسی ارشد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="karshenasi_arshad_count" name="karshenasi_arshad_count"
                                    value="{{ $internationalStudentGrowthRate->karshenasi_arshad_count }}"
                                    class="form-control" placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="docktora_count">
                                <span>تعداد دکتری </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="docktora_count" name="docktora_count"
                                    value="{{ $internationalStudentGrowthRate->docktora_count }}" class="form-control"
                                    placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$internationalStudentGrowthRate->year" :required="false" name="year"></x-select-year>

                        <x-select-month :default="$internationalStudentGrowthRate->month" :required="false" name="month"></x-select-month>
                        

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
