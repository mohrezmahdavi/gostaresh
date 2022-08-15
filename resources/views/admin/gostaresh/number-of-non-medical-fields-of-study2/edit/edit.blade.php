@extends('layouts.dashboard')

@section('title-tag')
    ویرایش تعداد رشته/گرایشهای تحصیلی غیر پزشکی ۲
@endsection

@section('breadcrumb-title')
    ویرایش تعداد رشته/گرایشهای تحصیلی غیر پزشکی ۲
@endsection

@section('page-title')
    تعداد رشته/گرایشهای تحصیلی غیر پزشکی ۲

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>

    <span>
        <a href="{{ route('number.of.non.medical.fields.of.study.2.index') }}" class="btn btn-secondary btn-sm">بازگشت به لیست اطلاعات</a>
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
                        action="{{ route('number.of.non.medical.fields.of.study.2.update', $numberOfNonMedicalFieldsOfStudy2) }}"
                        role="form">
                        @csrf
                        @method('PUT')


                        <select-province-component
                            province_default="{{ $numberOfNonMedicalFieldsOfStudy2->province_id ?? '' }}"
                            zone_default="{{ $numberOfNonMedicalFieldsOfStudy2->county->zone ?? ''}}"
                            county_default="{{ $numberOfNonMedicalFieldsOfStudy2->county_id ?? '' }}"
                            city_default="{{ $numberOfNonMedicalFieldsOfStudy2->city_id ?? '' }}"
                            rural_district_default="{{ $numberOfNonMedicalFieldsOfStudy2->rural_district_id ?? '' }}"
                            :fields="{{ json_encode([
                                'province' => true,
                                'zone' => false,
                                'county' => true,
                                'city' => false,
                            ]) }}">
                        </select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="major">
                                <span>گروه فرعی تحصیلی</span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="major" id="major" class="form-select">
                                    @foreach ($majors as $major)
                                        <option {{ $major->id == $numberOfNonMedicalFieldsOfStudy2->major ? 'selected' : '' }} value="{{ $major->id }}">
                                            {{ $major->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="kardani_peyvaste_count">
                                <span>تعداد کاردانی پیوسته </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" style="direction: rtl" id="kardani_peyvaste_count"
                                    name="kardani_peyvaste_count"
                                    value="{{ $numberOfNonMedicalFieldsOfStudy2->kardani_peyvaste_count }}"
                                    class="form-control" placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="kardani_na_peyvaste_count">
                                <span>تعداد کاردانی ناپیوسته </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" style="direction: rtl" id="kardani_na_peyvaste_count"
                                    name="kardani_na_peyvaste_count"
                                    value="{{ $numberOfNonMedicalFieldsOfStudy2->kardani_na_peyvaste_count }}"
                                    class="form-control" placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="karshenasi_peyvaste_count">
                                <span>تعداد کارشناسی پیوسته </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" style="direction: rtl" id="karshenasi_peyvaste_count"
                                    name="karshenasi_peyvaste_count"
                                    value="{{ $numberOfNonMedicalFieldsOfStudy2->karshenasi_peyvaste_count }}"
                                    class="form-control" placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="karshenasi_na_peyvaste_count">
                                <span>تعداد کارشناسی ناپیوسته </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" style="direction: rtl" id="karshenasi_na_peyvaste_count"
                                    name="karshenasi_na_peyvaste_count"
                                    value="{{ $numberOfNonMedicalFieldsOfStudy2->karshenasi_na_peyvaste_count }}"
                                    class="form-control" placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="karshenasi_arshad_count">
                                <span>تعداد کارشناسی ارشد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" style="direction: rtl" id="karshenasi_arshad_count"
                                    name="karshenasi_arshad_count"
                                    value="{{ $numberOfNonMedicalFieldsOfStudy2->karshenasi_arshad_count }}"
                                    class="form-control" placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="docktora_herfei_count">
                                <span>تعداد دکتری حرفه ای </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" style="direction: rtl" id="docktora_herfei_count"
                                    name="docktora_herfei_count"
                                    value="{{ $numberOfNonMedicalFieldsOfStudy2->docktora_herfei_count }}"
                                    class="form-control" placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="docktora_takhasosi_count">
                                <span>تعداد دکتری تخصصی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" style="direction: rtl" id="docktora_takhasosi_count"
                                    name="docktora_takhasosi_count"
                                    value="{{ $numberOfNonMedicalFieldsOfStudy2->docktora_takhasosi_count }}"
                                    class="form-control" placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$numberOfNonMedicalFieldsOfStudy2->year" min="1390" max="1400" :required="false" name="year"></x-select-year>

                        {{-- <x-select-month :default="$numberOfNonMedicalFieldsOfStudy2->month" :required="false" name="month"></x-select-month> --}}




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
