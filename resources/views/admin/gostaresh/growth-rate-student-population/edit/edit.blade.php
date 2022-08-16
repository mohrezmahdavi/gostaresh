@extends('layouts.dashboard')

@section('title-tag')
    ویرایش نرخ رشد و ترکیب جمعیت دانش آموزی
@endsection

@section('breadcrumb-title')
    ویرایش نرخ رشد و ترکیب جمعیت دانش آموزی
@endsection

@section('page-title')
    ویرایش نرخ رشد و ترکیب جمعیت دانش آموزی
    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('growth.rate.student.population.index') }}" class="btn btn-secondary btn-sm">بازگشت به لیست اطلاعات</a>
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
                        action="{{ route('growth.rate.student.population.update', $growthRateStudentPopulation) }}"
                        role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $growthRateStudentPopulation->province_id ?? ''}}"
                            zone_default="{{ $growthRateStudentPopulation->county->zone ?? ''}}"
                            county_default="{{ $growthRateStudentPopulation->county_id ?? ''}}"
                            city_default="{{ $growthRateStudentPopulation->city_id ?? ''}}"
                            rural_district_default="{{ $growthRateStudentPopulation->rural_district_id ?? ''}}"
                            :fields="{{ json_encode([
                                'province' => true,
                                'zone' => false,
                                'county' => true,
                                'city' => false,
                            ]) }}">
                        </select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="gender_id">
                                <span>جنسیت </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="gender_id" id="gender_id" class="form-select">
                                    @foreach (config('gostaresh.gender') as $key => $value)
                                        <option {{ $key == $growthRateStudentPopulation->gender_id ? 'selected' : '' }}
                                            value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <select-grade-component grade_default="{{ $growthRateStudentPopulation->grade_id }}"
                            sub_grade_default="{{ $growthRateStudentPopulation->sub_grade_id }}"
                            major_default="{{ $growthRateStudentPopulation->major_id }}"
                            minor_default="{{ $growthRateStudentPopulation->minor_id }}">
                        </select-grade-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="ebtedai">
                                <span> ابتدایی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="ebtedai" name="ebtedai"
                                    value="{{ $growthRateStudentPopulation->ebtedai }}" class="form-control"
                                    placeholder="تعداد ابتدایی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="motevasete_1">
                                <span> متوسطه اول </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="motevasete_1" name="motevasete_1"
                                    value="{{ $growthRateStudentPopulation->motevasete_1 }}" class="form-control"
                                    placeholder="تعداد متوسطه اول را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="motevasete_2_ensani">
                                <span> متوسطه دوم (علوم انسانی) </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="motevasete_2_ensani" name="motevasete_2_ensani"
                                    value="{{ $growthRateStudentPopulation->motevasete_2_ensani }}" class="form-control"
                                    placeholder="تعداد  را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="motevasete_2_math">
                                <span> متوسطه دوم (ریاضی) </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="motevasete_2_math" name="motevasete_2_math"
                                    value="{{ $growthRateStudentPopulation->motevasete_2_math }}" class="form-control"
                                    placeholder="تعداد  را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="motevasete_2_science">
                                <span> متوسطه دوم (علوم تجربی) </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="motevasete_2_science" name="motevasete_2_science"
                                    value="{{ $growthRateStudentPopulation->motevasete_2_science }}" class="form-control"
                                    placeholder="تعداد  را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="motevasete_2_kar_danesh">
                                <span> متوسطه دوم (کار و دانش و فنی حرفه ای) </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="motevasete_2_kar_danesh" name="motevasete_2_kar_danesh"
                                    value="{{ $growthRateStudentPopulation->motevasete_2_kar_danesh }}"
                                    class="form-control" placeholder="تعداد  را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$growthRateStudentPopulation->year" min="{{ config('gostaresh.year.min', 1370) }}" max="{{ config('gostaresh.year.max', 1405) }}" :required="false" name="year"></x-select-year>

                        {{-- <x-select-month :default="$growthRateStudentPopulation->month" :required="false" name="month"></x-select-month> --}}


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
