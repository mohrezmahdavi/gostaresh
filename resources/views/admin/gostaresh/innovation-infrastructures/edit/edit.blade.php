{{-- Table 39 View --}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش تعداد زیرساخت ھای فناوری و نوآوری واحدھای دانشگاھی استان
@endsection

@section('breadcrumb-title')
    ویرایش تعداد زیرساخت ھای فناوری و نوآوری واحدھای دانشگاھی استان
@endsection

@section('page-title')
    ویرایش تعداد زیرساخت ھای فناوری و نوآوری واحدھای دانشگاھی استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>

    <span>
        <a href="{{ route('innovation-infrastructures.index') }}" class="btn btn-secondary btn-sm">بازگشت به لیست اطلاعات</a>
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
                        action="{{ route('innovation-infrastructures.update', $innovationInfrastructure) }}" role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $innovationInfrastructure->province_id ?? ''}}"
                            zone_default="{{ $innovationInfrastructure->county->zone ?? ''}}"
                            county_default="{{ $innovationInfrastructure->county_id ?? ''}}"
                            city_default="{{ $innovationInfrastructure->city_id ?? ''}}"
                            rural_district_default="{{ $innovationInfrastructure->rural_district_id ?? ''}}"
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
                                    value="{{ $innovationInfrastructure->unit }}" class="form-control"
                                    placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_active_innovation_houses">
                                <span>تعداد سرای نوآوری فعال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_active_innovation_houses"
                                    name="number_of_active_innovation_houses"
                                    value="{{ $innovationInfrastructure->number_of_active_innovation_houses }}"
                                    class="form-control" placeholder=" تعداد سرای نوآوری فعال را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_active_accelerators">
                                <span>تعداد شتاب دهنده فعال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_active_accelerators"
                                    name="number_of_active_accelerators"
                                    value="{{ $innovationInfrastructure->number_of_active_accelerators }}"
                                    class="form-control" placeholder=" تعداد شتاب دهنده فعال را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_active_growth_centers">
                                <span>تعداد مراکز رشد فعال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_active_growth_centers"
                                    name="number_of_active_growth_centers"
                                    value="{{ $innovationInfrastructure->number_of_active_growth_centers }}"
                                    class="form-control" placeholder=" تعداد مراکز رشد فعال را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_active_technology_cores">
                                <span>تعداد هسته فناور فعال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_active_technology_cores"
                                    name="number_of_active_technology_cores"
                                    value="{{ $innovationInfrastructure->number_of_active_technology_cores }}"
                                    class="form-control" placeholder=" تعداد هسته فناور فعال را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_active_skill_high_schools">
                                <span>تعداد مدارس عالی مهارتی فعال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_active_skill_high_schools"
                                    name="number_of_active_skill_high_schools"
                                    value="{{ $innovationInfrastructure->number_of_active_skill_high_schools }}"
                                    class="form-control" placeholder=" تعداد مدارس عالی مهارتی فعال را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_skill_training_centers">
                                <span>تعداد مراکز توانمندسازی و آموزش مهارتی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_skill_training_centers"
                                    name="number_of_skill_training_centers"
                                    value="{{ $innovationInfrastructure->number_of_skill_training_centers }}"
                                    class="form-control"
                                    placeholder=" تعداد مراکز توانمندسازی و آموزش مهارتی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_research_centers">
                                <span>تعداد مراکز تحقیقاتی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_research_centers" name="number_of_research_centers"
                                    value="{{ $innovationInfrastructure->number_of_research_centers }}"
                                    class="form-control" placeholder=" تعداد مراکز تحقیقاتی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_development_offices">
                                <span>تعداد دفاتر توسعه و انتقال فناوری </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_development_offices"
                                    name="number_of_development_offices"
                                    value="{{ $innovationInfrastructure->number_of_development_offices }}"
                                    class="form-control" placeholder=" تعداد دفاتر توسعه و انتقال فناوری را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_industry_trade_offices">
                                <span>تعداددفاتر کلینیک صنعت، معدن و تجارت </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_industry_trade_offices"
                                    name="number_of_industry_trade_offices"
                                    value="{{ $innovationInfrastructure->number_of_industry_trade_offices }}"
                                    class="form-control"
                                    placeholder=" تعداددفاتر کلینیک صنعت، معدن و تجارت را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_entrepreneurship_centers">
                                <span>تعداد مراکز کارآفرینی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_entrepreneurship_centers"
                                    name="number_of_entrepreneurship_centers"
                                    value="{{ $innovationInfrastructure->number_of_entrepreneurship_centers }}"
                                    class="form-control" placeholder=" تعداد مراکز کارآفرینی را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$innovationInfrastructure->year" min="{{ config('gostaresh.year.min', 1370) }}" max="{{ config('gostaresh.year.max', 1405) }}" :required="false" name="year"></x-select-year>

                        {{-- <x-select-month :default="$innovationInfrastructure->month" :required="false" name="month"></x-select-month> --}}

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
