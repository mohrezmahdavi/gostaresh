@extends('layouts.dashboard')

@section('title-tag')
@endsection

@section('breadcrumb-title')
    تعداد تحلیل وضعیت شاخص ھا و برنامه ھای فرھنگی در واحدھای شھرستان ھای استان
@endsection

@section('page-title')
    تعداد تحلیل وضعیت شاخص ھا و برنامه ھای فرھنگی در واحدھای شھرستان ھای استان
@endsection

@section('styles-head')
    تعداد تحلیل وضعیت شاخص ھا و برنامه ھای فرھنگی در واحدھای شھرستان ھای استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('cultural-indicators.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
    </span>
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
                                <th>نمره وضعیت کانون های فرهنگی واحد دانشگاهی</th>
                                <th>نمره وضعیت نشریات چاپی و الکترونیکی واحد</th>
                                <th>نمره وضعیت تشکلهای فرهنگی واحد</th>
                                <th>نمره وضعیت آراستگی و پوشش دانشجویان، اساتید و کارکنان واحد</th>
                                <th>نمره وضعیت کیفی و کمی کرسی های آزاد اندیشی</th>
                                <th>نمره وضعیت تعامل با فضای مجازی در واحد دانشگاهی</th>
                                <th>نمره وضعیت برنامه ها و رویدادهای ثابت فرهنگی واحد</th>
                                <th>میزان افتخارات و جوایز فرهنگی کسب شده در واحد در سطوح مختلف منطقه ای و ملی</th>
                                <th>میزان تولیدات در صنایع فرهنگی</th>
                                <th>سطح ابتکارات و نوآوری های فرهنگی در واحد دانشگاهی</th>
                                <th>امتیاز طراحی و اجرای برنامه های فاخر</th>
                                <th>نمره میزان مشارکت در انتخابات</th>
                                <th>امتیاز برنامه های آموزش مهارت های فرهنگی</th>
                                <th>نمره مشارکت فرهنگی اساتید بسیجی</th>
                                <th>میزان مشارکت اساتید واحد در ارائه مشاوره فرهنگی</th>
                                <th>جایگاه دانشگاه بعنوان قطب فرهنگی شهر</th>
                                <th>نمره برنامه های ویژه حل مسایل فرهنگی اختصاصی واحد دانشگاهی</th>
                                <th>نمره برنامه های فرهنگی خانواده های اساتید و کارکنان واحد دانشگاهی</th>
                                <th>نمره برنامه های فرهنگی اساتید واحد دانشگاهی</th>
                                <th>میزان رضایتمندی از عملکرد مدیران در واحد دانشگاهی</th>
                                <th>درصد دانشجویان شرکت کننده در مسابقات ورزشی</th>
                                <th>درصد دانشجویان شرکت کننده در مسابقات فرهنگی واحد دانشگاهی</th>
                                <th>درصد دانشجویان عضو تشکل های دانشجویی</th>
                                <th>نسبت تعداد مراکز راهنمایی و مشاوره دانشجویی واحد دانشگاهی به کل دانشجویان آن واحد</th>
                                <th>درصد دانشجویان مراجعه کننده به مراکز راهنمایی و مشاوره</th>
                                <th>رتبه کلی فرهنگی واحد دانشگاهی</th>
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($culturalIndicators as $key => $culturalIndicator)
                                <tr>
                                    <th scope="row">{{ $culturalIndicators?->firstItem() + $key }}</th>
                                    <td>{{ $culturalIndicator?->province?->name . ' - ' . $culturalIndicator->county?->name }}
                                    <td>{{ $culturalIndicator?->unit}}</td>
                                    <td>{{ $culturalIndicator?->cultural_centers_status_score}}</td>
                                    <td>{{ $culturalIndicator?->printed_publications_status_score}}</td>
                                    <td>{{ $culturalIndicator?->cultural_organizations_status_score}}</td>
                                    <td>{{ $culturalIndicator?->people_coverage_status_score}}</td>
                                    <td>{{ $culturalIndicator?->free_thinking_status_score}}</td>
                                    <td>{{ $culturalIndicator?->interact_with_cyberspace_status_score}}</td>
                                    <td>{{ $culturalIndicator?->fixed_cultural_events_status_score}}</td>
                                    <td>{{ $culturalIndicator?->amounts_of_honors_and_awards}}</td>
                                    <td>{{ $culturalIndicator?->cultural_industry_products}}</td>
                                    <td>{{ $culturalIndicator?->level_of_initiatives}}</td>
                                    <td>{{ $culturalIndicator?->points_for_running_luxury_programs}}</td>
                                    <td>{{ $culturalIndicator?->election_turnout_score}}</td>
                                    <td>{{ $culturalIndicator?->score_cultural_skills_training_programs}}</td>
                                    <td>{{ $culturalIndicator?->score_of_cultural_participation_of_Basiji_professors}}</td>
                                    <td>{{ $culturalIndicator?->participation_of_unit_professors_in_cultural_counseling}}</td>
                                    <td>{{ $culturalIndicator?->position_of_the_university_as_cultural_center}}</td>
                                    <td>{{ $culturalIndicator?->score_cultural_programs}}</td>
                                    <td>{{ $culturalIndicator?->score_Families_of_professors}}</td>
                                    <td>{{ $culturalIndicator?->score_of_professors}}</td>
                                    <td>{{ $culturalIndicator?->satisfaction_of_managers_performance}}</td>
                                    <td>{{ $culturalIndicator?->percentage_of_students_participating_in_sports_competitions}}</td>
                                    <td>{{ $culturalIndicator?->percentage_of_students_participating_in_cultural_competitions}}</td>
                                    <td>{{ $culturalIndicator?->percentage_of_students_in_student_organizations}}</td>
                                    <td>{{ $culturalIndicator?->student_counseling_centers}}</td>
                                    <td>{{ $culturalIndicator?->percentage_of_students_referring_to_student_counseling_centers}}</td>
                                    <td>{{ $culturalIndicator?->general_cultural_rank_of_the_university_unit}}</td>
                                    <td>{{ $culturalIndicator?->year }}</td>
                                    <td>

                                        <a href="{{ route('cultural-indicators.edit', $culturalIndicator) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        {{--                                        <a href="{{ route('research-output-status-analyses.destroy', $culturalIndicator) }}" title="{{ __('validation.buttons.delete') }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $culturalIndicators->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
