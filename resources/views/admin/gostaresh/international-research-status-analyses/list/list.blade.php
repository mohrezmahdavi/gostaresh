{{--Table 36,37 View--}}
@extends('layouts.dashboard')

@section('title-tag')
    تعداد تحلیل وضعیت پژوھش بین المللی در واحدھای مستقر در شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    تعداد تحلیل وضعیت پژوھش بین المللی در واحدھای مستقر در شھرستان ھای استان
@endsection

@section('page-title')
    تعداد تحلیل وضعیت پژوھش بین المللی در واحدھای مستقر در شھرستان ھای استان
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-light">

                            <tr>
                                <th>#</th>
                                <th>شهرستان</th>
                                <th>واحد</th>
                                <th>تعداد آزمایشگاه ها و کارگاه های دارای استاندارد بین المللی مصوب</th>
                                <th>تعداد طرح های تحقیقاتی مشترک با محققان خارجی</th>
                                <th>تعداد مقالات مشترک با محققان خارجی و متخصصان ایرانی مقیم خارج از کشور</th>
                                <th>تعداد طرح های تحقیقاتی بین المللی با ارزش بالای ۱۰۰ هزار دلار</th>
                                <th>تعداد اعضای هیات علمی استفاده کننده از فرصت های مطالعاتی خارج از کشور در هر سال تحصیلی</th>
                                <th>تعداد دانشجویان تحصیلات تکمیلی دارای فرصت های مطالعاتی و تحقیقاتی خارج از کشور</th>
                                <th>تعداد فرصت های تحقیقاتی و پسادکتری ارایه شده به محققان و دانشجویان کشورهای خارجی و محققان ایرانی خارج از کشور</th>
                                <th>تعداد کارگاهها، دوره های آموزشی و تدریس بین المللی برگزار شده توسط اساتید خارجی و متخصصان ایرانی غیر مقیم</th>
                                <th>تعدادسخنرانی وسمینارهای علمی بین المللی برگزارشده توسط اساتیدخارجی و متخصصان ایرانی غیر مقیم</th>
                                <th>تعداد جوایز بین المللی کسب شده در ۵ سال اخیر</th>
                                <th>متوسط H-index اعضای هیات علمی</th>
                                <th>تعداد مقالات در دو مجله Science  و Nature</th>
                                <th>سرانه چاپ مقالات ISI</th>
                                <th>درصد مقالات کیفی در ۲۵ درصد بالای فهرست JCR (Q1)</th>
                                <th>تعداد اعضای هیات علمی با بیش از ۱۰۰۰ استناد یا در ردیف دانشمندان برتر جهان بر اساس نظام‌های رتبه بندی مصوب</th>
                                <th>تعداد اعضای هیات علمی عضو هیات تحریریه مجلات معتبر بین المللی </th>
                                <th>تعداد همایش های بین المللی برگزار شده مصوب هیات امنا در ۵ سال اخیر</th>
                                <th>تعداد کتب علمی بین المللی و چاپ فصلی از کتاب های علمی بین المللی با Affiliation دانشگاه آزاد اسلامی</th>
                                <th>تعداد تفاهم نامه های بین المللی اجرایی شده</th>
                                <th>میزان اعتبارات پژوهشی (گرنت) بین المللی اخذ شده</th>
                                <th>تعداد نشریه های دارای نمایه های استنادی بین المللی</th>
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($internationalResearchStatusAnalyses as $key => $internationalResearchStatusAnalysis)
                                <tr>
                                    <th scope="row">{{ $internationalResearchStatusAnalyses?->firstItem() + $key }}</th>
                                    <td>{{ $internationalResearchStatusAnalysis?->province?->name . ' - ' . $internationalResearchStatusAnalysis->county?->name }}
                                    <td>{{ $internationalResearchStatusAnalysis?->unit}}</td>
                                    <td>{{ $internationalResearchStatusAnalysis?->number_of_laboratories}}</td>
                                    <td>{{ $internationalResearchStatusAnalysis?->number_of_research_projects}}</td>
                                    <td>{{ $internationalResearchStatusAnalysis?->number_of_shared_articles}}</td>
                                    <td>{{ $internationalResearchStatusAnalysis?->number_of_international_research_projects}}</td>
                                    <td>{{ $internationalResearchStatusAnalysis?->number_of_faculty_members_using_study_abroad}}</td>
                                    <td>{{ $internationalResearchStatusAnalysis?->number_of_graduate_students_with_opportunities_abroad}}</td>
                                    <td>{{ $internationalResearchStatusAnalysis?->number_of_research_opportunities_presented}}</td>
                                    <td>{{ $internationalResearchStatusAnalysis?->number_of_foreign_workshops_held}}</td>
                                    <td>{{ $internationalResearchStatusAnalysis?->number_of_international_lectures_held}}</td>
                                    <td>{{ $internationalResearchStatusAnalysis?->number_of_international_awards}}</td>
                                    <td>{{ $internationalResearchStatusAnalysis?->average_H_index_of_faculty_members}}</td>
                                    <td>{{ $internationalResearchStatusAnalysis?->number_of_articles_science_and_nature}}</td>
                                    <td>{{ $internationalResearchStatusAnalysis?->print_ISI_articles}}</td>
                                    <td>{{ $internationalResearchStatusAnalysis?->percentage_of_quality_articles}}</td>
                                    <td>{{ $internationalResearchStatusAnalysis?->number_of_faculty_members_of_world_scientists}}</td>
                                    <td>{{ $internationalResearchStatusAnalysis?->number_of_faculty_members_of_international_journals}}</td>
                                    <td>{{ $internationalResearchStatusAnalysis?->number_of_international_conferences_held}}</td>
                                    <td>{{ $internationalResearchStatusAnalysis?->number_of_international_scientific_books}}</td>
                                    <td>{{ $internationalResearchStatusAnalysis?->number_of_international_agreements_implemented}}</td>
                                    <td>{{ $internationalResearchStatusAnalysis?->amount_of_international_research_credits}}</td>
                                    <td>{{ $internationalResearchStatusAnalysis?->number_of_international_publications}}</td>
                                    <td>{{ $internationalResearchStatusAnalysis?->year }}</td>
                                    <td>

                                        <a href="{{ route('international-research.edit', $internationalResearchStatusAnalysis) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

{{--                                        <a href="{{ route('research-output-status-analyses.destroy', $internationalResearchStatusAnalysis) }}" title="{{ __('validation.buttons.delete') }}"--}}
{{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $internationalResearchStatusAnalyses->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
