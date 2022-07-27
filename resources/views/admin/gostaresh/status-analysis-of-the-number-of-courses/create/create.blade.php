@extends('layouts.dashboard')

@section('title-tag')
    ایجاد تحلیل وضعیت تعداد دوره های تحصیلی بین المللی
@endsection

@section('breadcrumb-title')
ایجاد تحلیل وضعیت تعداد دوره های تحصیلی بین المللی
@endsection

@section('page-title')
ایجاد تحلیل وضعیت تعداد دوره های تحصیلی بین المللی

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
                        action="{{ route('status.analysis.of.the.number.of.course.store') }}" role="form">
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
                            <label class="col-sm-2 col-form-label" for="unit">
                                <span>واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit" value="{{ old('unit') }}"
                                    class="form-control" placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="total_number_of_courses">
                                <span>تعداد کل دوره های تحصیلی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" style="direction: rtl;" id="total_number_of_courses"
                                    name="total_number_of_courses" value="{{ old('total_number_of_courses') }}"
                                    class="form-control" placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label"
                                for="number_of_international_Persian_language_courses_in_person">
                                <span>تعداد دوره های تحصیلی بین المللی زبان فارسی حضوری </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" style="direction: rtl;"
                                    id="number_of_international_Persian_language_courses_in_person"
                                    name="number_of_international_Persian_language_courses_in_person"
                                    value="{{ old('number_of_international_Persian_language_courses_in_person') }}"
                                    class="form-control" placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label"
                                for="number_of_international_virtual_Persian_language_courses">
                                <span>تعداد دوره های تحصیلی بین المللی برگزار شده به زبان فارسی به صورت مجازی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" style="direction: rtl;"
                                    id="number_of_international_virtual_Persian_language_courses"
                                    name="number_of_international_virtual_Persian_language_courses"
                                    value="{{ old('number_of_international_virtual_Persian_language_courses') }}"
                                    class="form-control" placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label"
                                for="number_of_international_courses_in_the_target_language_in_person">
                                <span>تعداد دوره های تحصیلی بین المللی برگزار شده به زبان های کشورهای هدف به صورت حضوری
                                </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" style="direction: rtl;"
                                    id="number_of_international_courses_in_the_target_language_in_person"
                                    name="number_of_international_courses_in_the_target_language_in_person"
                                    value="{{ old('number_of_international_courses_in_the_target_language_in_person') }}"
                                    class="form-control" placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label"
                                for="number_of_international_courses_in_the_target_language_virtually">
                                <span>تعداد دوره های تحصیلی بین المللی برگزار شده به زبان های کشورهای هدف به صورت مجازی
                                </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" style="direction: rtl;"
                                    id="number_of_international_courses_in_the_target_language_virtually"
                                    name="number_of_international_courses_in_the_target_language_virtually"
                                    value="{{ old('number_of_international_courses_in_the_target_language_virtually') }}"
                                    class="form-control" placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>
                        <x-select-year :default="old('year')" min="1390" max="1400" :required="false" name="year"></x-select-year>

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
