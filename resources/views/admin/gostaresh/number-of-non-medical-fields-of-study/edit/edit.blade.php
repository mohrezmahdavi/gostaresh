@extends('layouts.dashboard')

@section('title-tag')
    ویرایش تعداد رشته/گرایشهای تحصیلی غیر پزشکی
@endsection

@section('breadcrumb-title')
    ویرایش تعداد رشته/گرایشهای تحصیلی غیر پزشکی
@endsection

@section('page-title')
    تعداد رشته/گرایشهای تحصیلی غیر پزشکی

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>

    <span>
        <a href="{{ route('number.of.non.medical.fields.of.study.index') }}" class="btn btn-secondary btn-sm">بازگشت به لیست اطلاعات</a>
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
                        action="{{ route('number.of.non.medical.fields.of.study.update', $numberOfNonMedicalFieldsOfStudy) }}"
                        role="form">
                        @csrf
                        @method('PUT')


                        <select-province-component
                            province_default="{{ $numberOfNonMedicalFieldsOfStudy->province_id ?? '' }}"
                            zone_default="{{ $numberOfNonMedicalFieldsOfStudy->county->zone ?? ''}}"
                            county_default="{{ $numberOfNonMedicalFieldsOfStudy->county_id ?? '' }}"
                            city_default="{{ $numberOfNonMedicalFieldsOfStudy->city_id ?? '' }}"
                            rural_district_default="{{ $numberOfNonMedicalFieldsOfStudy->rural_district_id ?? '' }}"
                            :fields="{{ json_encode([
                                'province' => true,
                                'zone' => false,
                                'county' => true,
                                'city' => false,
                            ]) }}">
                        </select-province-component>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="department_of_education">
                                <span> گروه تحصیلی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <select name="department_of_education" id="department_of_education" class="form-select">
                                    @foreach (config('gostaresh.department_of_education') as $key => $value)
                                        <option
                                            {{ $key == $numberOfNonMedicalFieldsOfStudy->department_of_education ? 'selected' : '' }}
                                            value="{{ $key }}">
                                            {{ $value }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="kardani_peyvaste_count">
                                <span>تعداد کاردانی پیوسته </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" style="direction: rtl" id="kardani_peyvaste_count"
                                    name="kardani_peyvaste_count"
                                    value="{{ $numberOfNonMedicalFieldsOfStudy->kardani_peyvaste_count }}"
                                    class="form-control" placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="kardani_na_peyvaste_count">
                                <span>تعداد کاردانی ناپیوسته </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" style="direction: rtl" id="kardani_na_peyvaste_count"
                                    name="kardani_na_peyvaste_count"
                                    value="{{ $numberOfNonMedicalFieldsOfStudy->kardani_na_peyvaste_count }}"
                                    class="form-control" placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="karshenasi_peyvaste_count">
                                <span>تعداد کارشناسی پیوسته </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" style="direction: rtl" id="karshenasi_peyvaste_count"
                                    name="karshenasi_peyvaste_count"
                                    value="{{ $numberOfNonMedicalFieldsOfStudy->karshenasi_peyvaste_count }}"
                                    class="form-control" placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="karshenasi_na_peyvaste_count">
                                <span>تعداد کارشناسی ناپیوسته </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" style="direction: rtl" id="karshenasi_na_peyvaste_count"
                                    name="karshenasi_na_peyvaste_count"
                                    value="{{ $numberOfNonMedicalFieldsOfStudy->karshenasi_na_peyvaste_count }}"
                                    class="form-control" placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="karshenasi_arshad_count">
                                <span>تعداد کارشناسی ارشد </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" style="direction: rtl" id="karshenasi_arshad_count"
                                    name="karshenasi_arshad_count"
                                    value="{{ $numberOfNonMedicalFieldsOfStudy->karshenasi_arshad_count }}"
                                    class="form-control" placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="docktora_herfei_count">
                                <span>تعداد دکتری حرفه ای </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" style="direction: rtl" id="docktora_herfei_count"
                                    name="docktora_herfei_count"
                                    value="{{ $numberOfNonMedicalFieldsOfStudy->docktora_herfei_count }}"
                                    class="form-control" placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="docktora_takhasosi_count">
                                <span>تعداد دکتری تخصصی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" style="direction: rtl" id="docktora_takhasosi_count"
                                    name="docktora_takhasosi_count"
                                    value="{{ $numberOfNonMedicalFieldsOfStudy->docktora_takhasosi_count }}"
                                    class="form-control" placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$numberOfNonMedicalFieldsOfStudy->year" min="{{ config('gostaresh.year.min', 1370) }}" max="{{ config('gostaresh.year.max', 1405) }}" :required="false" name="year"></x-select-year>

                        {{-- <x-select-month :default="$numberOfNonMedicalFieldsOfStudy->month" :required="false" name="month"></x-select-month> --}}




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
