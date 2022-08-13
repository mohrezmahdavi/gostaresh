@extends('layouts.dashboard')

@section('title-tag')
    ایجاد نرخ پوشش تحصیلی
@endsection

@section('breadcrumb-title')
    ایجاد نرخ پوشش تحصیلی
@endsection

@section('page-title')
    ایجاد نرخ پوشش تحصیلی
    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('academic.major.educational.index') }}" class="btn btn-secondary btn-sm">بازگشت به لیست اطلاعات</a>
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
                        action="{{ route('academic.major.educational.store') }}" role="form">
                        @csrf

                        <select-province-component
                            province_default="{{ auth()->user()->province_id ?? '' }}"
                            zone_default="{{ auth()->user()->county->zone ?? ''}}"
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
                            <label class="col-sm-2 col-form-label" for="department_of_education">
                                <span> گروه تحصیلی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="department_of_education" id="department_of_education"
                                    class="form-select">
                                    @foreach (config('gostaresh.department_of_education') as $key => $value)
                                        <option {{ $key == old('department_of_education') ? 'selected' : '' }} value="{{ $key }}">
                                            {{ $value }}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="azad_eslami_count">
                                <span>دانشگاه آزاد اسلامی(تعداد) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="azad_eslami_count" name="azad_eslami_count"
                                    value="{{ old('azad_eslami_count') }}" class="form-control"
                                    placeholder=" دانشگاه آزاد اسلامی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="azad_eslami_percent">
                                <span>دانشگاه آزاد اسلامی(درصد) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="azad_eslami_percent" name="azad_eslami_percent"
                                    value="{{ old('azad_eslami_percent') }}" class="form-control"
                                    placeholder=" دانشگاه آزاد اسلامی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="dolati_count">
                                <span>دانشگاه دولتی(تعداد) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="dolati_count" name="dolati_count"
                                    value="{{ old('dolati_count') }}" class="form-control"
                                    placeholder=" دانشگاه آزاد اسلامی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="dolati_percent">
                                <span>دانشگاه دولتی(درصد) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="dolati_percent" name="dolati_percent"
                                    value="{{ old('dolati_percent') }}" class="form-control"
                                    placeholder=" دانشگاه آزاد اسلامی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="medical_sciences_count">
                                <span>علوم پزشکی(تعداد) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="medical_sciences_count" name="medical_sciences_count"
                                    value="{{ old('medical_sciences_count') }}" class="form-control"
                                    placeholder=" دانشگاه آزاد اسلامی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="medical_sciences_percent">
                                <span>علوم پزشکی(درصد) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="medical_sciences_percent" name="medical_sciences_percent"
                                    value="{{ old('medical_sciences_percent') }}" class="form-control"
                                    placeholder=" دانشگاه آزاد اسلامی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="farhangian_count">
                                <span>فرهنگیان(تعداد) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="farhangian_count" name="farhangian_count"
                                    value="{{ old('farhangian_count') }}" class="form-control"
                                    placeholder=" دانشگاه آزاد اسلامی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="farhangian_percent">
                                <span>فرهنگیان(درصد) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="farhangian_percent" name="farhangian_percent"
                                    value="{{ old('farhangian_percent') }}" class="form-control"
                                    placeholder=" دانشگاه آزاد اسلامی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="fani_herfei_count">
                                <span> فنی حرفه ای(تعداد) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="fani_herfei_count" name="fani_herfei_count"
                                    value="{{ old('fani_herfei_count') }}" class="form-control"
                                    placeholder=" دانشگاه آزاد اسلامی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="fani_herfei_percent">
                                <span> فنی حرفه ای(درصد) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="fani_herfei_percent" name="fani_herfei_percent"
                                    value="{{ old('fani_herfei_percent') }}" class="form-control"
                                    placeholder=" دانشگاه آزاد اسلامی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="payam_noor_count">
                                <span>دانشگاه پیام نور(تعداد) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="payam_noor_count" name="payam_noor_count"
                                    value="{{ old('payam_noor_count') }}" class="form-control"
                                    placeholder=" دانشگاه پیام نور را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="payam_noor_percent">
                                <span>دانشگاه پیام نور(درصد) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="payam_noor_percent" name="payam_noor_percent"
                                    value="{{ old('payam_noor_percent') }}" class="form-control"
                                    placeholder=" دانشگاه پیام نور را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="gheir_entefai_count">
                                <span>دانشگاه غیر انتفاعی(تعداد) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="gheir_entefai_count" name="gheir_entefai_count"
                                    value="{{ old('gheir_entefai_count') }}" class="form-control"
                                    placeholder=" دانشگاه غیر انتفاعی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="gheir_entefai_percent">
                                <span>دانشگاه غیر انتفاعی(درصد) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="gheir_entefai_percent" name="gheir_entefai_percent"
                                    value="{{ old('gheir_entefai_percent') }}" class="form-control"
                                    placeholder=" دانشگاه غیر انتفاعی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="elmi_karbordi_count">
                                <span>دانشگاه علمی کاربردی(تعداد) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="elmi_karbordi_count" name="elmi_karbordi_count"
                                    value="{{ old('elmi_karbordi_count') }}" class="form-control"
                                    placeholder=" دانشگاه علمی کاربردی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="elmi_karbordi_percent">
                                <span>دانشگاه علمی کاربردی(درصد) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="elmi_karbordi_percent" name="elmi_karbordi_percent"
                                    value="{{ old('elmi_karbordi_percent') }}" class="form-control"
                                    placeholder=" دانشگاه علمی کاربردی را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="old('year')" min="{{ config('gostaresh.year.min', 1370) }}" max="{{ config('gostaresh.year.max', 1405) }}" :required="false" name="year"></x-select-year>

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
