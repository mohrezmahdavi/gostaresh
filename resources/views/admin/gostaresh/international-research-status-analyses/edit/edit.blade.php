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
        <a href="{{ route('international-research.index') }}" class="btn btn-secondary btn-sm">بازگشت به لیست اطلاعات</a>
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
                        action="{{ route('international-research.update', $internationalResearch) }}" role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $internationalResearch->province_id ?? ''}}"
                            zone_default="{{ $internationalResearch->county->zone ?? ''}}"
                            county_default="{{ $internationalResearch->county_id ?? ''}}"
                            city_default="{{ $internationalResearch->city_id ?? ''}}"
                            rural_district_default="{{ $internationalResearch->rural_district_id ?? ''}}"
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
                                    value="{{ $internationalResearch->unit }}" class="form-control"
                                    placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_laboratories">
                                <span>تعداد آزمایشگاه ها و کارگاه های دارای استاندارد بین المللی مصوب </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_laboratories" name="number_of_laboratories"
                                    value="{{ $internationalResearch->number_of_laboratories }}" class="form-control"
                                    placeholder=" تعداد آزمایشگاه ها و کارگاه های دارای استاندارد بین المللی مصوب را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_research_projects">
                                <span>تعداد طرح های تحقیقاتی مشترک با محققان خارجی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_research_projects" name="number_of_research_projects"
                                    value="{{ $internationalResearch->number_of_research_projects }}" class="form-control"
                                    placeholder=" تعداد طرح های تحقیقاتی مشترک با محققان خارجی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_shared_articles">
                                <span>تعداد مقالات مشترک با محققان خارجی و متخصصان ایرانی مقیم خارج از کشور </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_shared_articles" name="number_of_shared_articles"
                                    value="{{ $internationalResearch->number_of_shared_articles }}" class="form-control"
                                    placeholder=" تعداد مقالات مشترک با محققان خارجی و متخصصان ایرانی مقیم خارج از کشور را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_research_projects">
                                <span>تعداد طرح های تحقیقاتی بین المللی با ارزش بالای ۱۰۰ هزار دلار </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_international_research_projects"
                                    name="number_of_international_research_projects"
                                    value="{{ $internationalResearch->number_of_international_research_projects }}"
                                    class="form-control"
                                    placeholder=" تعداد طرح های تحقیقاتی بین المللی با ارزش بالای ۱۰۰ هزار دلار را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_faculty_members_using_study_abroad">
                                <span>تعداد اعضای هیات علمی استفاده کننده از فرصت های مطالعاتی خارج از کشور در هر سال تحصیلی
                                </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_faculty_members_using_study_abroad"
                                    name="number_of_faculty_members_using_study_abroad"
                                    value="{{ $internationalResearch->number_of_faculty_members_using_study_abroad }}"
                                    class="form-control"
                                    placeholder=" تعداد اعضای هیات علمی استفاده کننده از فرصت های مطالعاتی خارج از کشور در هر سال تحصیلی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label"
                                for="number_of_graduate_students_with_opportunities_abroad">
                                <span>تعداد دانشجویان تحصیلات تکمیلی دارای فرصت های مطالعاتی و تحقیقاتی خارج از کشور
                                </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_graduate_students_with_opportunities_abroad"
                                    name="number_of_graduate_students_with_opportunities_abroad"
                                    value="{{ $internationalResearch->number_of_graduate_students_with_opportunities_abroad }}"
                                    class="form-control"
                                    placeholder=" تعداد دانشجویان تحصیلات تکمیلی دارای فرصت های مطالعاتی و تحقیقاتی خارج از کشور را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_research_opportunities_presented">
                                <span>تعداد فرصت های تحقیقاتی و پسادکتری ارایه شده به محققان و دانشجویان کشورهای خارجی و
                                    محققان ایرانی خارج از کشور </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_research_opportunities_presented"
                                    name="number_of_research_opportunities_presented"
                                    value="{{ $internationalResearch->number_of_research_opportunities_presented }}"
                                    class="form-control"
                                    placeholder=" تعداد فرصت های تحقیقاتی و پسادکتری ارایه شده به محققان و دانشجویان کشورهای خارجی و محققان ایرانی خارج از کشور را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_foreign_workshops_held">
                                <span>تعداد کارگاهها، دوره های آموزشی و تدریس بین المللی برگزار شده توسط اساتید خارجی و
                                    متخصصان ایرانی غیر مقیم </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_foreign_workshops_held"
                                    name="number_of_foreign_workshops_held"
                                    value="{{ $internationalResearch->number_of_foreign_workshops_held }}"
                                    class="form-control"
                                    placeholder=" تعداد کارگاهها، دوره های آموزشی و تدریس بین المللی برگزار شده توسط اساتید خارجی و متخصصان ایرانی غیر مقیم را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_lectures_held">
                                <span>تعدادسخنرانی وسمینارهای علمی بین المللی برگزارشده توسط اساتیدخارجی و متخصصان ایرانی
                                    غیر مقیم </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_international_lectures_held"
                                    name="number_of_international_lectures_held"
                                    value="{{ $internationalResearch->number_of_international_lectures_held }}"
                                    class="form-control"
                                    placeholder=" تعدادسخنرانی وسمینارهای علمی بین المللی برگزارشده توسط اساتیدخارجی و متخصصان ایرانی غیر مقیم را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_awards">
                                <span>تعداد جوایز بین المللی کسب شده در ۵ سال اخیر </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_international_awards"
                                    name="number_of_international_awards"
                                    value="{{ $internationalResearch->number_of_international_awards }}"
                                    class="form-control"
                                    placeholder=" تعداد جوایز بین المللی کسب شده در ۵ سال اخیر را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$internationalResearch->year" min="{{ config('gostaresh.year.min', 1370) }}" max="{{ config('gostaresh.year.max', 1405) }}" :required="false" name="year"></x-select-year>

                        {{-- <x-select-month :default="$internationalResearch->month" :required="false" name="month"></x-select-month> --}}



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
