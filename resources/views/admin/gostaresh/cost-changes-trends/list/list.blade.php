@extends('layouts.dashboard')

@section('title-tag')
    تعداد تحلیل روند تغییرات وضعیت ھزینه ھای دانشگاه در واحدھای شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    تعداد تحلیل روند تغییرات وضعیت ھزینه ھای دانشگاه در واحدھای شھرستان ھای استان
@endsection

@section('page-title')
    تعداد تحلیل روند تغییرات وضعیت ھزینه ھای دانشگاه در واحدھای شھرستان ھای استان
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
                                <th>کل هزینه های سالیانه</th>
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($costChangesTrends as $key => $costChangesTrend)
                                <tr>
                                    <th scope="row">{{ $costChangesTrends?->firstItem() + $key }}</th>
                                    <td>{{ $costChangesTrend?->province?->name . ' - ' . $costChangesTrend->county?->name }}
                                    <td>{{ $costChangesTrend?->unit}}</td>
                                    <td>{{ $costChangesTrend?->total_annual_expenses}}</td>
                                    <td>{{ $costChangesTrend?->year }}</td>
                                    <td>

                                        <a href="{{ route('cost-changes-trends.edit', $costChangesTrend) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        {{--                                        <a href="{{ route('research-output-status-analyses.destroy', $costChangesTrend) }}" title="{{ __('validation.buttons.delete') }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $costChangesTrends->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
