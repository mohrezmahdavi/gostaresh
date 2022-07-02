@extends('layouts.dashboard')

@section('title-tag')
    تعداد تحلیل وضعیت درآمد سرانه مقطع-رشتھ-گرایش-محل x شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    تعداد تحلیل وضعیت درآمد سرانه مقطع-رشتھ-گرایش-محل x شھرستان ھای استان
@endsection

@section('page-title')
    تعداد تحلیل وضعیت درآمد سرانه مقطع-رشتھ-گرایش-محل x شھرستان ھای استان
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
                                <th>دانشگاه</th>
                                <th>مقطع تحصیلی</th>
                                <th>تحلیل وضعیت درآمد سرانه</th>
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($percapitaRevenue as $key => $value)
                                <tr>
                                    <th scope="row">{{ $percapitaRevenue?->firstItem() + $key }}</th>
                                    <td>{{ $value?->province?->name . ' - ' . $value->county?->name }}
                                    <td>{{ $value?->unit}}</td>
                                    <td>{{ $value?->university_type_title}}</td>
                                    <td>{{ $value?->grade_title}}</td>
                                    <td>{{ $value?->percapita_revenue_status_analyses}}</td>
                                    <td>{{ $value?->year }}</td>
                                    <td>

                                        <a href="{{ route('percapita-revenue.edit', $value) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        {{--                                        <a href="{{ route('research-output-status-analyses.destroy', $value) }}" title="{{ __('validation.buttons.delete') }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $percapitaRevenue->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
