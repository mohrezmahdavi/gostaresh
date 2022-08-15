{{-- Table 48 View --}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش تحلیل وضعیت درآمد ھای دانشگاه در واحدھای دانشگاھی استان
@endsection

@section('breadcrumb-title')
    ویرایش تحلیل وضعیت درآمد ھای دانشگاه در واحدھای دانشگاھی استان
@endsection

@section('page-title')
    ویرایش تحلیل وضعیت درآمد ھای دانشگاه در واحدھای دانشگاھی استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>

    <span>
        <a href="{{ route('revenue-status-analyses.index') }}" class="btn btn-secondary btn-sm">بازگشت به لیست اطلاعات</a>
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
                        action="{{ route('revenue-status-analyses.update', $revenueStatusAnalysis) }}" role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $revenueStatusAnalysis->province_id ?? ''}}"
                            zone_default="{{ $revenueStatusAnalysis->county->zone ?? ''}}"
                            county_default="{{ $revenueStatusAnalysis->county_id ?? ''}}"
                            city_default="{{ $revenueStatusAnalysis->city_id ?? ''}}"
                            rural_district_default="{{ $revenueStatusAnalysis->rural_district_id ?? ''}}"
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
                                <input type="text" id="unit" name="unit"
                                    value="{{ $revenueStatusAnalysis->unit }}" class="form-control"
                                    placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="total_revenue">
                                <span>کل درآمد ها </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="total_revenue" name="total_revenue"
                                    value="{{ $revenueStatusAnalysis->total_revenue }}" class="form-control"
                                    placeholder=" کل درآمد ها را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="income_from_student_tuition">
                                <span>درآمد حاصل از شهریه دانشجویان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="income_from_student_tuition" name="income_from_student_tuition"
                                    value="{{ $revenueStatusAnalysis->income_from_student_tuition }}" class="form-control"
                                    placeholder=" درآمد حاصل از شهریه دانشجویان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="income_from_commercialized_technologies">
                                <span>درصد درآمد حاصل از فروش فناوری و طرح های تجاری سازی شده </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="income_from_commercialized_technologies"
                                    name="income_from_commercialized_technologies"
                                    value="{{ $revenueStatusAnalysis->income_from_commercialized_technologies }}"
                                    class="form-control"
                                    placeholder=" درصد درآمد حاصل از فروش فناوری و طرح های تجاری سازی شده را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="income_from_research_activities">
                                <span>درصد درآمد حاصل از فعالیت های تحقیق و توسعه واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="income_from_research_activities"
                                    name="income_from_research_activities"
                                    value="{{ $revenueStatusAnalysis->income_from_research_activities }}"
                                    class="form-control"
                                    placeholder=" درصد درآمد حاصل از فعالیت های تحقیق و توسعه واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="income_from_skills_training">
                                <span>درآمدهای حاصل از مهارت آموزی، فعالیت های کاربنیان و کارآفرینی واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="income_from_skills_training" name="income_from_skills_training"
                                    value="{{ $revenueStatusAnalysis->income_from_skills_training }}" class="form-control"
                                    placeholder=" درآمدهای حاصل از مهارت آموزی، فعالیت های کاربنیان و کارآفرینی واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="operating_income_growth_rate">
                                <span>نرخ رشد درآمدهای عملیاتی واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="operating_income_growth_rate" name="operating_income_growth_rate"
                                    value="{{ $revenueStatusAnalysis->operating_income_growth_rate }}" class="form-control"
                                    placeholder=" نرخ رشد درآمدهای عملیاتی واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="total_non_tuition_income">
                                <span>مجموع درآمدهای غیر شهریه ای واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="total_non_tuition_income" name="total_non_tuition_income"
                                    value="{{ $revenueStatusAnalysis->total_non_tuition_income }}" class="form-control"
                                    placeholder=" مجموع درآمدهای غیر شهریه ای واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="total_international_income">
                                <span>مجموع درآمد های ناشی از فعالیت های بین المللی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="total_international_income" name="total_international_income"
                                    value="{{ $revenueStatusAnalysis->total_international_income }}" class="form-control"
                                    placeholder=" مجموع درآمد های ناشی از فعالیت های بین المللی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="shareholder_income">
                                <span>درآمد ناشی از سهامداری </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="shareholder_income" name="shareholder_income"
                                    value="{{ $revenueStatusAnalysis->shareholder_income }}" class="form-control"
                                    placeholder=" درآمد ناشی از سهامداری را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$revenueStatusAnalysis->year" min="{{ config('gostaresh.year.min', 1370) }}" max="{{ config('gostaresh.year.max', 1405) }}" :required="false" name="year"></x-select-year>

                        {{-- <x-select-month :default="$revenueStatusAnalysis->month" :required="false" name="month"></x-select-month> --}}


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
