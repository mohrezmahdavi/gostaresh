{{--Table 48 View--}}
@extends('layouts.dashboard')

@section('title-tag')
ایجاد تحلیل وضعیت درآمد ھای دانشگاه در واحدھای دانشگاھی استان
@endsection

@section('breadcrumb-title')
ایجاد تحلیل وضعیت درآمد ھای دانشگاه در واحدھای دانشگاھی استان
@endsection

@section('page-title')
ایجاد تحلیل وضعیت درآمد ھای دانشگاه در واحدھای دانشگاھی استان
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" id="app">
                    <form class="form-horizontal" method="POST" action="{{ route('revenue-status-analyses.store') }}" role="form">
                        @csrf

                        <select-province-component></select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unit">
                                <span>واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit"
                                       value="{{ old('unit') }}" class="form-control"
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
                                       value="{{ old('total_revenue') }}" class="form-control"
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
                                       value="{{ old('income_from_student_tuition') }}" class="form-control"
                                       placeholder=" درآمد حاصل از شهریه دانشجویان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="income_from_commercialized_technologies">
                                <span>درصد درآمد حاصل از فروش فناوری و طرح های تجاری سازی شده </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="income_from_commercialized_technologies" name="income_from_commercialized_technologies"
                                       value="{{ old('income_from_commercialized_technologies') }}" class="form-control"
                                       placeholder=" درصد درآمد حاصل از فروش فناوری و طرح های تجاری سازی شده را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="income_from_research_activities">
                                <span>درصد درآمد حاصل از فعالیت های تحقیق و توسعه واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="income_from_research_activities" name="income_from_research_activities"
                                       value="{{ old('income_from_research_activities') }}" class="form-control"
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
                                       value="{{ old('income_from_skills_training') }}" class="form-control"
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
                                       value="{{ old('operating_income_growth_rate') }}" class="form-control"
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
                                       value="{{ old('total_non_tuition_income') }}" class="form-control"
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
                                       value="{{ old('total_international_income') }}" class="form-control"
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
                                       value="{{ old('shareholder_income') }}" class="form-control"
                                       placeholder=" درآمد ناشی از سهامداری را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="old('year')" :required="false" name="year"></x-select-year>

                        <x-select-month :default="old('month')" :required="false" name="month"></x-select-month>



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
