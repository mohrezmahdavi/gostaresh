{{--Table 33 View--}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش تحلیل وضعیت فارغ التحصیلان (از سال 1395 بھ بعد) از واحدھای شھرستانی در استان
@endsection

@section('breadcrumb-title')
    ویرایش تحلیل وضعیت فارغ التحصیلان (از سال 1395 بھ بعد) از واحدھای شھرستانی در استان
@endsection

@section('page-title')
    ویرایش تحلیل وضعیت فارغ التحصیلان (از سال 1395 بھ بعد) از واحدھای شھرستانی در استان
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" id="app">
                    @include('admin.partials.row-notifiy-col')
                    <form class="form-horizontal" method="POST"
                        action="{{ route('graduate-status-analyses.update', $graduateStatusAnalysis) }}"
                        role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $graduateStatusAnalysis->province_id }}"
                            county_default="{{ $graduateStatusAnalysis->county_id }}"
                            city_default="{{ $graduateStatusAnalysis->city_id }}"
                            rural_district_default="{{ $graduateStatusAnalysis->rural_district_id }}">
                        </select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unit">
                                <span>واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit"
                                       value="{{ $graduateStatusAnalysis->unit }}" class="form-control"
                                       placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="total_graduates">
                                <span>تعداد کل فارغ التحصیلان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="total_graduates" name="total_graduates"
                                       value="{{ $graduateStatusAnalysis->total_graduates }}" class="form-control"
                                       placeholder=" تعداد کل فارغ التحصیلان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="employed_graduates">
                                <span>تعداد فارغ التحصیلان شاغل </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="employed_graduates" name="employed_graduates"
                                       value="{{ $graduateStatusAnalysis->employed_graduates }}" class="form-control"
                                       placeholder=" تعداد فارغ التحصیلان شاغل را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="graduate_growth_rate">
                                <span>نرخ رشد فارغ التحصیلان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="graduate_growth_rate" name="graduate_growth_rate"
                                       value="{{ $graduateStatusAnalysis->graduate_growth_rate }}" class="form-control"
                                       placeholder=" نرخ رشد فارغ التحصیلان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="related_employed_graduates">
                                <span>تعداد فارغ التحصیلان شاغل در مشاغل مرتبط با رشته تحصیلی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="related_employed_graduates" name="related_employed_graduates"
                                       value="{{ $graduateStatusAnalysis->related_employed_graduates }}" class="form-control"
                                       placeholder=" تعداد فارغ التحصیلان شاغل در مشاغل مرتبط با رشته تحصیلی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="skill_certification_graduates">
                                <span>تعداد فارغ التحصیلان دارای گواهینامه مهارتی و صلاحیت حرفه ای </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="skill_certification_graduates" name="skill_certification_graduates"
                                       value="{{ $graduateStatusAnalysis->skill_certification_graduates }}" class="form-control"
                                       placeholder=" تعداد فارغ التحصیلان دارای گواهینامه مهارتی و صلاحیت حرفه ای را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="employed_graduates_6_months_after_graduation">
                                <span>تعداد فارغ التحصیلان دارای شغل در مدت 6 ماه بعد از فراغت از تحصیل </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="employed_graduates_6_months_after_graduation" name="employed_graduates_6_months_after_graduation"
                                       value="{{ $graduateStatusAnalysis->employed_graduates_6_months_after_graduation }}" class="form-control"
                                       placeholder=" تعداد فارغ التحصیلان دارای شغل در مدت 6 ماه بعد از فراغت از تحصیل را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="average_monthly_income_employed_graduates">
                                <span>متوسط درآمد ماهیانه فارغ التحصیلان دارای شغل مرتبط با رشته تحصیلی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="average_monthly_income_employed_graduates" name="average_monthly_income_employed_graduates"
                                       value="{{ $graduateStatusAnalysis->average_monthly_income_employed_graduates }}" class="form-control"
                                       placeholder=" متوسط درآمد ماهیانه فارغ التحصیلان دارای شغل مرتبط با رشته تحصیلی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="year">
                                <span> سال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="year" id="year" class="form-select">
                                    @for ($i = 1250; $i <= 1405; $i++)
                                        <option {{ $i == $graduateStatusAnalysis->year ? 'selected' : '' }}
                                            value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor

                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="month">
                                <span> ماه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="month" id="month" class="form-select">
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option {{ $i == $graduateStatusAnalysis->month ? 'selected' : '' }}
                                            value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor

                                </select>

                            </div>
                        </div>

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
