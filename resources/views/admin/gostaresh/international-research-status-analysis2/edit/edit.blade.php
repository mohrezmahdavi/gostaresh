{{-- Table 36,37 View --}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش تحلیل وضعیت پژوھش بین المللی در واحدھای مستقر در شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    ویرایش تحلیل وضعیت پژوھش بین المللی در واحدھای مستقر در شھرستان ھای استان
@endsection

@section('page-title')
    ویرایش تحلیل وضعیت پژوھش بین المللی در واحدھای مستقر در شھرستان ھای استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('international-research2.index') }}" class="btn btn-secondary btn-sm">بازگشت به لیست اطلاعات</a>
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
                        action="{{ route('international-research2.update', $internationalResearch2) }}" role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $internationalResearch2->province_id ?? ''}}"
                            zone_default="{{ $internationalResearch2->county->zone ?? ''}}"
                            county_default="{{ $internationalResearch2->county_id ?? ''}}"
                            city_default="{{ $internationalResearch2->city_id ?? ''}}"
                            rural_district_default="{{ $internationalResearch2->rural_district_id ?? ''}}"
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
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit"
                                    value="{{ $internationalResearch2->unit }}" class="form-control"
                                    placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="average_H_index_of_faculty_members">
                                <span>متوسط H-index اعضای هیات علمی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="average_H_index_of_faculty_members"
                                    name="average_H_index_of_faculty_members"
                                    value="{{ $internationalResearch2->average_H_index_of_faculty_members }}"
                                    class="form-control" placeholder=" متوسط H-index اعضای هیات علمی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_articles_science_and_nature">
                                <span>تعداد مقالات در دو مجله Science و Nature </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_articles_science_and_nature"
                                    name="number_of_articles_science_and_nature"
                                    value="{{ $internationalResearch2->number_of_articles_science_and_nature }}"
                                    class="form-control"
                                    placeholder=" تعداد مقالات در دو مجله Science  و Nature را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="print_ISI_articles">
                                <span>سرانه چاپ مقالات ISI </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="print_ISI_articles" name="print_ISI_articles"
                                    value="{{ $internationalResearch2->print_ISI_articles }}" class="form-control"
                                    placeholder=" سرانه چاپ مقالات ISI را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percentage_of_quality_articles">
                                <span>درصد مقالات کیفی در ۲۵ درصد بالای فهرست JCR (Q1) </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="percentage_of_quality_articles"
                                    name="percentage_of_quality_articles"
                                    value="{{ $internationalResearch2->percentage_of_quality_articles }}"
                                    class="form-control"
                                    placeholder=" درصد مقالات کیفی در ۲۵ درصد بالای فهرست JCR (Q1) را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_faculty_members_of_world_scientists">
                                <span>تعداد اعضای هیات علمی با بیش از ۱۰۰۰ استناد یا در ردیف دانشمندان برتر جهان بر اساس
                                    نظام‌های رتبه بندی مصوب </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_faculty_members_of_world_scientists"
                                    name="number_of_faculty_members_of_world_scientists"
                                    value="{{ $internationalResearch2->number_of_faculty_members_of_world_scientists }}"
                                    class="form-control"
                                    placeholder=" تعداد اعضای هیات علمی با بیش از ۱۰۰۰ استناد یا در ردیف دانشمندان برتر جهان بر اساس نظام‌های رتبه بندی مصوب را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label"
                                for="number_of_faculty_members_of_international_journals">
                                <span>تعداد اعضای هیات علمی عضو هیات تحریریه مجلات معتبر بین المللی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_faculty_members_of_international_journals"
                                    name="number_of_faculty_members_of_international_journals"
                                    value="{{ $internationalResearch2->number_of_faculty_members_of_international_journals }}"
                                    class="form-control"
                                    placeholder=" تعداد اعضای هیات علمی عضو هیات تحریریه مجلات معتبر بین المللی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_conferences_held">
                                <span>تعداد همایش های بین المللی برگزار شده مصوب هیات امنا در ۵ سال اخیر </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_international_conferences_held"
                                    name="number_of_international_conferences_held"
                                    value="{{ $internationalResearch2->number_of_international_conferences_held }}"
                                    class="form-control"
                                    placeholder=" تعداد همایش های بین المللی برگزار شده مصوب هیات امنا در ۵ سال اخیر را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_scientific_books">
                                <span>تعداد کتب علمی بین المللی و چاپ فصلی از کتاب های علمی بین المللی با Affiliation
                                    دانشگاه آزاد اسلامی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_international_scientific_books"
                                    name="number_of_international_scientific_books"
                                    value="{{ $internationalResearch2->number_of_international_scientific_books }}"
                                    class="form-control"
                                    placeholder=" تعداد کتب علمی بین المللی و چاپ فصلی از کتاب های علمی بین المللی با Affiliation دانشگاه آزاد اسلامی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_agreements_implemented">
                                <span>تعداد تفاهم نامه های بین المللی اجرایی شده </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_international_agreements_implemented"
                                    name="number_of_international_agreements_implemented"
                                    value="{{ $internationalResearch2->number_of_international_agreements_implemented }}"
                                    class="form-control"
                                    placeholder=" تعداد تفاهم نامه های بین المللی اجرایی شده را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="amount_of_international_research_credits">
                                <span>میزان اعتبارات پژوهشی (گرنت) بین المللی اخذ شده </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="amount_of_international_research_credits"
                                    name="amount_of_international_research_credits"
                                    value="{{ $internationalResearch2->amount_of_international_research_credits }}"
                                    class="form-control"
                                    placeholder=" میزان اعتبارات پژوهشی (گرنت) بین المللی اخذ شده را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_publications">
                                <span>تعداد نشریه های دارای نمایه های استنادی بین المللی از جمله (ISI) و (Scopus)
                                </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_international_publications"
                                    name="number_of_international_publications"
                                    value="{{ $internationalResearch2->number_of_international_publications }}"
                                    class="form-control"
                                    placeholder=" تعداد نشریه های دارای نمایه های استنادی بین المللی از جمله (ISI) و (Scopus) را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$internationalResearch2->year" min="1390" max="1400" :required="false" name="year"></x-select-year>

                        {{-- <x-select-month :default="$internationalResearch2->month" :required="false" name="month"></x-select-month> --}}



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
