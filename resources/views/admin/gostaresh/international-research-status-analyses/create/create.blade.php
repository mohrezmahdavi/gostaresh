{{--Table 36,37 View--}}
@extends('layouts.dashboard')

@section('title-tag')
ایجاد تحلیل وضعیت پژوھش بین المللی در واحدھای مستقر در شھرستان ھای استان
@endsection

@section('breadcrumb-title')
ایجاد تحلیل وضعیت پژوھش بین المللی در واحدھای مستقر در شھرستان ھای استان
@endsection

@section('page-title')
ایجاد تحلیل وضعیت پژوھش بین المللی در واحدھای مستقر در شھرستان ھای استان

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
                    <form class="form-horizontal" method="POST" action="{{ route('international-research.store') }}" role="form">
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
                            <label class="col-sm-2 col-form-label" for="number_of_laboratories">
                                <span>تعداد آزمایشگاه ها و کارگاه های دارای استاندارد بین المللی مصوب </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_laboratories" name="number_of_laboratories"
                                       value="{{ old('number_of_laboratories') }}" class="form-control"
                                       placeholder=" تعداد آزمایشگاه ها و کارگاه های دارای استاندارد بین المللی مصوب را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_research_projects">
                                <span>تعداد طرح های تحقیقاتی مشترک با محققان خارجی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_research_projects" name="number_of_research_projects"
                                       value="{{ old('number_of_research_projects') }}" class="form-control"
                                       placeholder=" تعداد طرح های تحقیقاتی مشترک با محققان خارجی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_shared_articles">
                                <span>تعداد مقالات مشترک با محققان خارجی و متخصصان ایرانی مقیم خارج از کشور </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_shared_articles" name="number_of_shared_articles"
                                       value="{{ old('number_of_shared_articles') }}" class="form-control"
                                       placeholder=" تعداد مقالات مشترک با محققان خارجی و متخصصان ایرانی مقیم خارج از کشور را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_research_projects">
                                <span>تعداد طرح های تحقیقاتی بین المللی با ارزش بالای ۱۰۰ هزار دلار </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_international_research_projects" name="number_of_international_research_projects"
                                       value="{{ old('number_of_international_research_projects') }}" class="form-control"
                                       placeholder=" تعداد طرح های تحقیقاتی بین المللی با ارزش بالای ۱۰۰ هزار دلار را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_faculty_members_using_study_abroad">
                                <span>تعداد اعضای هیات علمی استفاده کننده از فرصت های مطالعاتی خارج از کشور در هر سال تحصیلی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_faculty_members_using_study_abroad" name="number_of_faculty_members_using_study_abroad"
                                       value="{{ old('number_of_faculty_members_using_study_abroad') }}" class="form-control"
                                       placeholder=" تعداد اعضای هیات علمی استفاده کننده از فرصت های مطالعاتی خارج از کشور در هر سال تحصیلی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_graduate_students_with_opportunities_abroad">
                                <span>تعداد دانشجویان تحصیلات تکمیلی دارای فرصت های مطالعاتی و تحقیقاتی خارج از کشور </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_graduate_students_with_opportunities_abroad" name="number_of_graduate_students_with_opportunities_abroad"
                                       value="{{ old('number_of_graduate_students_with_opportunities_abroad') }}" class="form-control"
                                       placeholder=" تعداد دانشجویان تحصیلات تکمیلی دارای فرصت های مطالعاتی و تحقیقاتی خارج از کشور را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_research_opportunities_presented">
                                <span>تعداد فرصت های تحقیقاتی و پسادکتری ارایه شده به محققان و دانشجویان کشورهای خارجی و محققان ایرانی خارج از کشور </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_research_opportunities_presented" name="number_of_research_opportunities_presented"
                                       value="{{ old('number_of_research_opportunities_presented') }}" class="form-control"
                                       placeholder=" تعداد فرصت های تحقیقاتی و پسادکتری ارایه شده به محققان و دانشجویان کشورهای خارجی و محققان ایرانی خارج از کشور را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_foreign_workshops_held">
                                <span>تعداد کارگاهها، دوره های آموزشی و تدریس بین المللی برگزار شده توسط اساتید خارجی و متخصصان ایرانی غیر مقیم </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_foreign_workshops_held" name="number_of_foreign_workshops_held"
                                       value="{{ old('number_of_foreign_workshops_held') }}" class="form-control"
                                       placeholder=" تعداد کارگاهها، دوره های آموزشی و تدریس بین المللی برگزار شده توسط اساتید خارجی و متخصصان ایرانی غیر مقیم را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_lectures_held">
                                <span>تعدادسخنرانی وسمینارهای علمی بین المللی برگزارشده توسط اساتیدخارجی و متخصصان ایرانی غیر مقیم </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_international_lectures_held" name="number_of_international_lectures_held"
                                       value="{{ old('number_of_international_lectures_held') }}" class="form-control"
                                       placeholder=" تعدادسخنرانی وسمینارهای علمی بین المللی برگزارشده توسط اساتیدخارجی و متخصصان ایرانی غیر مقیم را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_awards">
                                <span>تعداد جوایز بین المللی کسب شده در ۵ سال اخیر </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_international_awards" name="number_of_international_awards"
                                       value="{{ old('number_of_international_awards') }}" class="form-control"
                                       placeholder=" تعداد جوایز بین المللی کسب شده در ۵ سال اخیر را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="average_H_index_of_faculty_members">
                                <span>متوسط H-index اعضای هیات علمی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="average_H_index_of_faculty_members" name="average_H_index_of_faculty_members"
                                       value="{{ old('average_H_index_of_faculty_members') }}" class="form-control"
                                       placeholder=" متوسط H-index اعضای هیات علمی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_articles_science_and_nature">
                                <span>تعداد مقالات در دو مجله Science  و Nature </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_articles_science_and_nature" name="number_of_articles_science_and_nature"
                                       value="{{ old('number_of_articles_science_and_nature') }}" class="form-control"
                                       placeholder=" تعداد مقالات در دو مجله Science  و Nature را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="print_ISI_articles">
                                <span>سرانه چاپ مقالات ISI </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="print_ISI_articles" name="print_ISI_articles"
                                       value="{{ old('print_ISI_articles') }}" class="form-control"
                                       placeholder=" سرانه چاپ مقالات ISI را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percentage_of_quality_articles">
                                <span>درصد مقالات کیفی در ۲۵ درصد بالای فهرست JCR (Q1) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="percentage_of_quality_articles" name="percentage_of_quality_articles"
                                       value="{{ old('percentage_of_quality_articles') }}" class="form-control"
                                       placeholder=" درصد مقالات کیفی در ۲۵ درصد بالای فهرست JCR (Q1) را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_faculty_members_of_world_scientists">
                                <span>تعداد اعضای هیات علمی با بیش از ۱۰۰۰ استناد یا در ردیف دانشمندان برتر جهان بر اساس نظام‌های رتبه بندی مصوب </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_faculty_members_of_world_scientists" name="number_of_faculty_members_of_world_scientists"
                                       value="{{ old('number_of_faculty_members_of_world_scientists') }}" class="form-control"
                                       placeholder=" تعداد اعضای هیات علمی با بیش از ۱۰۰۰ استناد یا در ردیف دانشمندان برتر جهان بر اساس نظام‌های رتبه بندی مصوب را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_faculty_members_of_international_journals">
                                <span>تعداد اعضای هیات علمی عضو هیات تحریریه مجلات معتبر بین المللی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_faculty_members_of_international_journals" name="number_of_faculty_members_of_international_journals"
                                       value="{{ old('number_of_faculty_members_of_international_journals') }}" class="form-control"
                                       placeholder=" تعداد اعضای هیات علمی عضو هیات تحریریه مجلات معتبر بین المللی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_conferences_held">
                                <span>تعداد همایش های بین المللی برگزار شده مصوب هیات امنا در ۵ سال اخیر </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_international_conferences_held" name="number_of_international_conferences_held"
                                       value="{{ old('number_of_international_conferences_held') }}" class="form-control"
                                       placeholder=" تعداد همایش های بین المللی برگزار شده مصوب هیات امنا در ۵ سال اخیر را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_scientific_books">
                                <span>تعداد کتب علمی بین المللی و چاپ فصلی از کتاب های علمی بین المللی با Affiliation دانشگاه آزاد اسلامی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_international_scientific_books" name="number_of_international_scientific_books"
                                       value="{{ old('number_of_international_scientific_books') }}" class="form-control"
                                       placeholder=" تعداد کتب علمی بین المللی و چاپ فصلی از کتاب های علمی بین المللی با Affiliation دانشگاه آزاد اسلامی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_agreements_implemented">
                                <span>تعداد تفاهم نامه های بین المللی اجرایی شده </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_international_agreements_implemented" name="number_of_international_agreements_implemented"
                                       value="{{ old('number_of_international_agreements_implemented') }}" class="form-control"
                                       placeholder=" تعداد تفاهم نامه های بین المللی اجرایی شده را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="amount_of_international_research_credits">
                                <span>میزان اعتبارات پژوهشی (گرنت) بین المللی اخذ شده </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="amount_of_international_research_credits" name="amount_of_international_research_credits"
                                       value="{{ old('amount_of_international_research_credits') }}" class="form-control"
                                       placeholder=" میزان اعتبارات پژوهشی (گرنت) بین المللی اخذ شده را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_publications">
                                <span>تعداد نشریه های دارای نمایه های استنادی بین المللی از جمله (ISI) و (Scopus) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_international_publications" name="number_of_international_publications"
                                       value="{{ old('number_of_international_publications') }}" class="form-control"
                                       placeholder=" تعداد نشریه های دارای نمایه های استنادی بین المللی از جمله (ISI) و (Scopus) را وارد کنید...">
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
