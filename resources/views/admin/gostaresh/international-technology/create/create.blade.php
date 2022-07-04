{{--Table 41 View--}}
@extends('layouts.dashboard')

@section('title-tag')
ایجاد انتقال فناوری و نوآوری در عرصه بین المللی در دوره 10 سال
@endsection

@section('breadcrumb-title')
ایجاد انتقال فناوری و نوآوری در عرصه بین المللی در دوره 10 سال
@endsection

@section('page-title')
ایجاد انتقال فناوری و نوآوری در عرصه بین المللی در دوره 10 سال

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
                    <form class="form-horizontal" method="POST" action="{{ route('international-technology.store') }}" role="form">
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
                            <label class="col-sm-2 col-form-label" for="number_of_participation">
                                <span>تعداد مشارکت در انتقال دانش فنی/ فناوری انتقال یافته از خارج به داخل کشور (با ارائه گواهی مقام مجاز) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_participation" name="number_of_participation"
                                       value="{{ old('number_of_participation') }}" class="form-control"
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
                                       value="{{ old('number_of_technical_services') }}" class="form-control"
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
                                       value="{{ old('earnings') }}" class="form-control"
                                       placeholder=" میزان کسب درآمد از خدمات فنی و مشاوره ای بین المللی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_inventions">
                                <span>تعداد ثبت و یا فایلینگ اختراعات بین المللی (Patent) در ۵ سال اخیر </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_international_inventions" name="number_of_international_inventions"
                                       value="{{ old('number_of_international_inventions') }}" class="form-control"
                                       placeholder=" تعداد ثبت و یا فایلینگ اختراعات بین المللی (Patent) در ۵ سال اخیر را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_knowledge_based_companies">
                                <span>تعداد شرکت های دانش بنیان با فعالیت بین المللی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_international_knowledge_based_companies" name="number_of_international_knowledge_based_companies"
                                       value="{{ old('number_of_international_knowledge_based_companies') }}" class="form-control"
                                       placeholder=" تعداد شرکت های دانش بنیان با فعالیت بین المللی را وارد کنید...">
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
