@extends('layouts.dashboard')

@section('title-tag')
    تعداد تحلیل وضعیت سرانه فضای دانشگاھی برای دانشجویان در واحدھای شھرستانی در استان
@endsection

@section('breadcrumb-title')
    تعداد تحلیل وضعیت سرانه فضای دانشگاھی برای دانشجویان در واحدھای شھرستانی در استان
@endsection

@section('page-title')
    تعداد تحلیل وضعیت سرانه فضای دانشگاھی برای دانشجویان در واحدھای شھرستانی در استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('percapita-status-analyses.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                <th>سرانه فضای اداری</th>
                                <th>سرانه فضای آموزشی</th>
                                <th>سرانه فضای فناوری و نوآوری</th>
                                <th>سرانه فضای فرهنگی</th>
                                <th>سرانه فضای عمرانی</th>
                                <th>ساختمان در دست احداث</th>
                                <th>سرانه اقامتی</th>
                                <th>سرانه ساختمان های بهره بردار</th>
                                <th>سرانه فضای ورزشی</th>
                                <th>سرانه فضای اعیانی</th>
                                <th>سرانه فضای عرصه</th>
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                            @foreach ($percapitaStatusAnalyses as $key => $percapitaStatusAnalysis)
                                <tr>
                                    <th scope="row">{{ $percapitaStatusAnalyses?->firstItem() + $key }}</th>
                                    <td>{{ $percapitaStatusAnalysis?->province?->name . ' - ' . $percapitaStatusAnalysis->county?->name }}
                                    <td>{{ $percapitaStatusAnalysis?->unit}}</td>
                                    <td>{{ $percapitaStatusAnalysis?->percapita_office_space}}</td>
                                    <td>{{ $percapitaStatusAnalysis?->percapita_educational_space}}</td>
                                    <td>{{ $percapitaStatusAnalysis?->percapita_innovation_space}}</td>
                                    <td>{{ $percapitaStatusAnalysis?->percapita_cultural_space}}</td>
                                    <td>{{ $percapitaStatusAnalysis?->percapita_civil_space}}</td>
                                    <td>{{ $percapitaStatusAnalysis?->building_under_construction}}</td>
                                    <td>{{ $percapitaStatusAnalysis?->percapita_residential}}</td>
                                    <td>{{ $percapitaStatusAnalysis?->percapita_operating_buildings}}</td>
                                    <td>{{ $percapitaStatusAnalysis?->percapita_sports_space}}</td>
                                    <td>{{ $percapitaStatusAnalysis?->percapita_aristocratic_space}}</td>
                                    <td>{{ $percapitaStatusAnalysis?->percapita_arena_space}}</td>
                                    <td>{{ $percapitaStatusAnalysis?->year }}</td>
                                    <td>

                                        <a href="{{ route('percapita-status-analyses.edit', $percapitaStatusAnalysis) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        {{--                                        <a href="{{ route('research-output-status-analyses.destroy', $percapitaStatusAnalysis) }}" title="{{ __('validation.buttons.delete') }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $percapitaStatusAnalyses->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
