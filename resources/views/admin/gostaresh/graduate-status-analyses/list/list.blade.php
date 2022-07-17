{{--Table 33 View--}}
@extends('layouts.dashboard')

@section('title-tag')
    تعداد تحلیل وضعیت فارغ التحصیلان (از سال 1395 به بعد) از واحدھای شھرستانی در استان
@endsection

@section('breadcrumb-title')
    تعداد تحلیل وضعیت فارغ التحصیلان (از سال 1395 به بعد) از واحدھای شھرستانی در استان
@endsection

@section('page-title')
    تعداد تحلیل وضعیت فارغ التحصیلان (از سال 1395 به بعد) از واحدھای شھرستانی در استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('graduate-status-analyses.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                <th>تعداد کل فارغ التحصیلان</th>
                                <th>تعداد فارغ التحصیلان شاغل</th>
                                <th>نرخ رشد فارغ التحصیلان</th>
                                <th>تعداد فارغ التحصیلان شاغل در مشاغل مرتبط با رشته تحصیلی</th>
                                <th>تعداد فارغ التحصیلان دارای گواهینامه مهارتی و صلاحیت حرفه ای</th>
                                <th>تعداد فارغ التحصیلان دارای شغل در مدت 6 ماه بعد از فراغت از تحصیل</th>
                                <th>متوسط درآمد ماهیانه فارغ التحصیلان دارای شغل مرتبط با رشته تحصیلی</th>
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                            @foreach ($graduateStatusAnalyses as $key => $graduateStatusAnalysis)
                                <tr>
                                    <th scope="row">{{ $graduateStatusAnalyses?->firstItem() + $key }}</th>
                                    <td>{{ $graduateStatusAnalysis?->province?->name . ' - ' . $graduateStatusAnalysis->county?->name }}
                                    <td>{{ $graduateStatusAnalysis?->unit}}</td>
                                    <td>{{ number_format($graduateStatusAnalysis?->total_graduates)}}</td>
                                    <td>{{ number_format($graduateStatusAnalysis?->employed_graduates)}}</td>
                                    <td>{{ number_format($graduateStatusAnalysis?->graduate_growth_rate) }}</td>
                                    <td>{{ number_format($graduateStatusAnalysis?->related_employed_graduates) }}</td>
                                    <td>{{ number_format($graduateStatusAnalysis?->skill_certification_graduates) }}</td>
                                    <td>{{ number_format($graduateStatusAnalysis?->employed_graduates_6_months_after_graduation) }}</td>
                                    <td>{{ number_format($graduateStatusAnalysis?->average_monthly_income_employed_graduates) }}</td>
                                    <td>{{ $graduateStatusAnalysis?->year }}</td>
                                    <td>

                                        <a href="{{ route('graduate-status-analyses.edit', $graduateStatusAnalysis) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        {{--                                        <a href="{{ route('graduates-of-higher-education.destroy', $graduateStatusAnalysis) }}" title="{{ __('validation.buttons.delete') }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $graduateStatusAnalyses->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
