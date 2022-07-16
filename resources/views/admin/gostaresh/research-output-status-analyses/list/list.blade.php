{{--Table 35 View--}}
@extends('layouts.dashboard')

@section('title-tag')
    تعداد تحلیل وضعیت برونداد پژوھشی در واحدھای مستقر در شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    تعداد تحلیل وضعیت برونداد پژوھشی در واحدھای مستقر در شھرستان ھای استان
@endsection

@section('page-title')
    تعداد تحلیل وضعیت برونداد پژوھشی در واحدھای مستقر در شھرستان ھای استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('research-output-status-analyses.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
    </span>
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
                                <th>تعداد مقالات معتبر علمی</th>
                                <th>تعداد کتب معتبر</th>
                                <th>تعداد کتب تالیفی</th>
                                <th>تعداد اختراعات ثبت شده داخلی</th>
                                <th>تعداد اختراعات ثبت شده بین المللی</th>
                                <th>تعداد پایان نامه ها</th>
                                <th>تعداد پایان نامه های منجر به مقاله علمی-پژوهشی</th>
                                <th>تعداد پایان نامه های تدوین شده بر اساس نظام موضوعات برنامه های علمی دانشگاه</th>
                                <th>تعداد پایان نامه های منجر به ثبت اختراع</th>
                                <th>تعداد پایان نامه های منجر به محصول</th>
                                <th>تعداد طرح های تحقیقاتی خاتمه یافته</th>
                                <th>تعداد کرسی های نظریه پردازی برگزار شده توسط اساتید واحد دانشگاهی</th>
                                <th>تعداد تفاهمنامه ها با صنایع و سازمان‌های محلی/ملی</th>
                                <th>مبلغ قراردهای منعقد شده با صنایع و سازمان‌های ملی</th>
                                <th>مبلغ قراردهای منعقد شده با صنایع و سازمان‌های محلی</th>
                                <th>تعداد مجلات علمی</th>
                                <th>تعداد پژوهش های معطوف به R &D</th>
                                <th>تعداد طرح ها و ایده های فناورانه و نوآورانه تجاری سازی شده</th>
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                            @foreach ($researchOutputStatusAnalyses as $key => $researchOutputStatusAnalysis)
                                <tr>
                                    <th scope="row">{{ $researchOutputStatusAnalyses?->firstItem() + $key }}</th>
                                    <td>{{ $researchOutputStatusAnalysis?->province?->name . ' - ' . $researchOutputStatusAnalysis->county?->name }}
                                    <td>{{ $researchOutputStatusAnalysis?->unit}}</td>
                                    <td>{{ number_format($researchOutputStatusAnalysis?->number_of_valid_scientific_articles)}}</td>
                                    <td>{{ number_format($researchOutputStatusAnalysis?->number_of_valid_books)}}</td>
                                    <td>{{ number_format($researchOutputStatusAnalysis?->number_of_authored_books)}}</td>
                                    <td>{{ number_format($researchOutputStatusAnalysis?->number_of_internal_inventions)}}</td>
                                    <td>{{ number_format($researchOutputStatusAnalysis?->number_of_international_inventions)}}</td>
                                    <td>{{ number_format($researchOutputStatusAnalysis?->number_of_theses)}}</td>
                                    <td>{{ number_format($researchOutputStatusAnalysis?->number_of_research_dissertations)}}</td>
                                    <td>{{ number_format($researchOutputStatusAnalysis?->number_of_compiled_dissertations)}}</td>
                                    <td>{{ number_format($researchOutputStatusAnalysis?->number_of_invented_dissertations)}}</td>
                                    <td>{{ number_format($researchOutputStatusAnalysis?->number_of_product_dissertations)}}</td>
                                    <td>{{ number_format($researchOutputStatusAnalysis?->number_of_completed_research_projects)}}</td>
                                    <td>{{ number_format($researchOutputStatusAnalysis?->number_of_theorizing_chairs)}}</td>
                                    <td>{{ number_format($researchOutputStatusAnalysis?->number_of_memoranda_of_understanding)}}</td>
                                    <td>{{ number_format($researchOutputStatusAnalysis?->amount_of_national_contracts_concluded)}}</td>
                                    <td>{{ number_format($researchOutputStatusAnalysis?->amount_of_local_contracts_concluded)}}</td>
                                    <td>{{ number_format($researchOutputStatusAnalysis?->number_of_scientific_journals)}}</td>
                                    <td>{{ number_format($researchOutputStatusAnalysis['number_of_R&D_research']) ?? ''}}</td>
                                    <td>{{ number_format($researchOutputStatusAnalysis?->number_of_innovative_ideas)}}</td>
                                    <td>{{ $researchOutputStatusAnalysis?->year }}</td>
                                    <td>

                                        <a href="{{ route('research-output-status-analyses.edit', $researchOutputStatusAnalysis) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

{{--                                        <a href="{{ route('research-output-status-analyses.destroy', $researchOutputStatusAnalysis) }}" title="{{ __('validation.buttons.delete') }}"--}}
{{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $researchOutputStatusAnalyses->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
