@extends('layouts.dashboard')

@section('title-tag')
    تعداد زیرساخت ھای فناوری و نوآوری واحدھای دانشگاھی استان
@endsection

@section('breadcrumb-title')
    تعداد زیرساخت ھای فناوری و نوآوری واحدھای دانشگاھی استان
@endsection

@section('page-title')
    تعداد زیرساخت ھای فناوری و نوآوری واحدھای دانشگاھی استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('innovation-infrastructures.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                <th>تعداد سرای نوآوری فعال</th>
                                <th>تعداد شتاب دهنده فعال</th>
                                <th>تعداد مراکز رشد فعال</th>
                                <th>تعداد هسته فناور فعال</th>
                                <th>تعداد مدارس عالی مهارتی فعال</th>
                                <th>تعداد مراکز توانمندسازی و آموزش مهارتی</th>
                                <th>تعداد مراکز تحقیقاتی</th>
                                <th>تعداد دفاتر توسعه و انتقال فناوری</th>
                                <th>تعداددفاتر کلینیک صنعت، معدن و تجارت</th>
                                <th>تعداد مراکز کارآفرینی</th>
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                            @foreach ($innovationInfrastructures as $key => $innovationInfrastructure)
                                <tr>
                                    <th scope="row">{{ $innovationInfrastructures?->firstItem() + $key }}</th>
                                    <td>{{ $innovationInfrastructure?->province?->name . ' - ' . $innovationInfrastructure->county?->name }}
                                    <td>{{ $innovationInfrastructure?->unit}}</td>
                                    <td>{{ number_format($innovationInfrastructure?->number_of_active_innovation_houses)}}</td>
                                    <td>{{ number_format($innovationInfrastructure?->number_of_active_accelerators)}}</td>
                                    <td>{{ number_format($innovationInfrastructure?->number_of_active_growth_centers)}}</td>
                                    <td>{{ number_format($innovationInfrastructure?->number_of_active_technology_cores)}}</td>
                                    <td>{{ number_format($innovationInfrastructure?->number_of_active_skill_high_schools)}}</td>
                                    <td>{{ number_format($innovationInfrastructure?->number_of_skill_training_centers)}}</td>
                                    <td>{{ number_format($innovationInfrastructure?->number_of_research_centers)}}</td>
                                    <td>{{ number_format($innovationInfrastructure?->number_of_development_offices)}}</td>
                                    <td>{{ number_format($innovationInfrastructure?->number_of_industry_trade_offices)}}</td>
                                    <td>{{ number_format($innovationInfrastructure?->number_of_entrepreneurship_centers)}}</td>
                                    <td>{{ $innovationInfrastructure?->year }}</td>
                                    <td>

                                        <a href="{{ route('innovation-infrastructures.edit', $innovationInfrastructure) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

{{--                                        <a href="{{ route('research-output-status-analyses.destroy', $innovationInfrastructure) }}" title="{{ __('validation.buttons.delete') }}"--}}
{{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $innovationInfrastructures->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
