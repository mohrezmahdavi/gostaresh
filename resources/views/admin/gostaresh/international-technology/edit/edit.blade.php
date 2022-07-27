{{-- Table 41 View --}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش انتقال فناوری و نوآوری در عرصه بین المللی در دوره 10 سال
@endsection

@section('breadcrumb-title')
    ویرایش انتقال فناوری و نوآوری در عرصه بین المللی در دوره 10 سال
@endsection

@section('page-title')
    ویرایش انتقال فناوری و نوآوری در عرصه بین المللی در دوره 10 سال

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
                        action="{{ route('international-technology.update', $internationalTechnology) }}" role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $internationalTechnology->province_id }}"
                            zone_default="{{ $internationalTechnology->county->zone }}"
                            county_default="{{ $internationalTechnology->county_id }}"
                            city_default="{{ $internationalTechnology->city_id }}"
                            rural_district_default="{{ $internationalTechnology->rural_district_id }}"
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
                                    value="{{ $internationalTechnology->unit }}" class="form-control"
                                    placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_participation">
                                <span>تعداد مشارکت در انتقال دانش فنی/ فناوری انتقال یافته از خارج به داخل کشور (با ارائه
                                    گواهی مقام مجاز) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_participation" name="number_of_participation"
                                    value="{{ $internationalTechnology->number_of_participation }}" class="form-control"
                                    placeholder=" تعداد مشارکت در انتقال دانش فنی/ فناوری انتقال یافته از خارج به داخل کشور (با ارائه گواهی مقام مجاز) را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_technical_services">
                                <span>تعداد خدمات فنی و مشاوره ای ارایه شده به موسسات یا شرکت های خارجی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_technical_services" name="number_of_technical_services"
                                    value="{{ $internationalTechnology->number_of_technical_services }}"
                                    class="form-control"
                                    placeholder=" تعداد خدمات فنی و مشاوره ای ارایه شده به موسسات یا شرکت های خارجی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="earnings">
                                <span>میزان کسب درآمد از خدمات فنی و مشاوره ای بین المللی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="earnings" name="earnings"
                                    value="{{ $internationalTechnology->earnings }}" class="form-control"
                                    placeholder=" میزان کسب درآمد از خدمات فنی و مشاوره ای بین المللی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_inventions">
                                <span>تعداد ثبت و یا فایلینگ اختراعات بین المللی (Patent) در ۵ سال اخیر </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_international_inventions"
                                    name="number_of_international_inventions"
                                    value="{{ $internationalTechnology->number_of_international_inventions }}"
                                    class="form-control"
                                    placeholder=" تعداد ثبت و یا فایلینگ اختراعات بین المللی (Patent) در ۵ سال اخیر را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_knowledge_based_companies">
                                <span>تعداد شرکت های دانش بنیان با فعالیت بین المللی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_international_knowledge_based_companies"
                                    name="number_of_international_knowledge_based_companies"
                                    value="{{ $internationalTechnology->number_of_international_knowledge_based_companies }}"
                                    class="form-control"
                                    placeholder=" تعداد شرکت های دانش بنیان با فعالیت بین المللی را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$internationalTechnology->year" min="1390" max="1400" :required="false" name="year"></x-select-year>

                        {{-- <x-select-month :default="$internationalTechnology->month" :required="false" name="month"></x-select-month> --}}

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
