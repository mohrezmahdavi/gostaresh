@extends('layouts.dashboard')

@section('title-tag')
    تعداد تحلیل وضعیت درآمد ھای دانشگاه در واحدھای دانشگاھی استان
@endsection

@section('breadcrumb-title')
    تعداد تحلیل وضعیت درآمد ھای دانشگاه در واحدھای دانشگاھی استان
@endsection

@section('page-title')
    تعداد تحلیل وضعیت درآمد ھای دانشگاه در واحدھای دانشگاھی استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('revenue-status-analyses.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                <th>کل درآمد ها</th>
                                <th>درآمد حاصل از شهریه دانشجویان</th>
                                <th>درصد درآمد حاصل از فروش فناوری و طرح های تجاری سازی شده</th>
                                <th>درصد درآمد حاصل از فعالیت های تحقیق و توسعه واحد</th>
                                <th>درآمدهای حاصل از مهارت آموزی، فعالیت های کاربنیان و کارآفرینی واحد</th>
                                <th>نرخ رشد درآمدهای عملیاتی واحد</th>
                                <th>مجموع درآمدهای غیر شهریه ای واحد</th>
                                <th>مجموع درآمد های ناشی از فعالیت های بین المللی</th>
                                <th>درآمد ناشی از سهامداری</th>
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                            @foreach ($revenueStatusAnalyses as $key => $revenueStatusAnalysis)
                                <tr>
                                    <th scope="row">{{ $revenueStatusAnalyses?->firstItem() + $key }}</th>
                                    <td>{{ $revenueStatusAnalysis?->province?->name . ' - ' . $revenueStatusAnalysis->county?->name }}
                                    <td>{{ $revenueStatusAnalysis?->unit}}</td>
                                    <td>{{ number_format($revenueStatusAnalysis?->total_revenue)}}</td>
                                    <td>{{ number_format($revenueStatusAnalysis?->income_from_student_tuition)}}</td>
                                    <td>{{ number_format($revenueStatusAnalysis?->income_from_commercialized_technologies)}}</td>
                                    <td>{{ number_format($revenueStatusAnalysis?->income_from_research_activities)}}</td>
                                    <td>{{ number_format($revenueStatusAnalysis?->income_from_skills_training)}}</td>
                                    <td>{{ number_format($revenueStatusAnalysis?->operating_income_growth_rate)}}</td>
                                    <td>{{ number_format($revenueStatusAnalysis?->total_non_tuition_income)}}</td>
                                    <td>{{ number_format($revenueStatusAnalysis?->total_international_income)}}</td>
                                    <td>{{ number_format($revenueStatusAnalysis?->shareholder_income)}}</td>
                                    <td>{{ $revenueStatusAnalysis?->year }}</td>
                                    <td>

                                        <a href="{{ route('revenue-status-analyses.edit', $revenueStatusAnalysis) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        {{--                                        <a href="{{ route('research-output-status-analyses.destroy', $revenueStatusAnalysis) }}" title="{{ __('validation.buttons.delete') }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $revenueStatusAnalyses->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
