@extends('layouts.dashboard')

@section('title-tag')
    تحلیل وضعیت درآمد سرانه (مقطع-رشته-گرایش-محل) شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    تحلیل وضعیت درآمد سرانه (مقطع-رشته-گرایش-محل) شھرستان ھای استان
@endsection

@section('page-title')
    تحلیل وضعیت درآمد سرانه (مقطع-رشته-گرایش-محل) شھرستان ھای استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
@can("create-any-PercapitaRevenueStatusAnalysis")
    <span>
        <a href="{{ route('percapita-revenue.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
    </span>
 @endcan

@endsection

@section('styles-head')
    <!-- Apex js-->
    <script src="{{ asset('assets/admin/libs/apexcharts/apexcharts.min.js') }}"></script>
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')
    <x-gostaresh.filter-table-list.filter-table-list-component :filterColumnsCheckBoxes="$filterColumnsCheckBoxes" :yearSelectedList="$yearSelectedList" :fieldsProvinceSelect="[
        'province' => true,
        'zone' => false,
        'county' => true,
        'city' => false,
    ]" />

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
                                    @foreach ($filterColumnsCheckBoxes as $key => $value)
                                        @if (filterCol($key))
                                            <th>{{ $value }}</th>
                                        @endif
                                    @endforeach
                                    <th>سال</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($percapitaRevenue as $key => $percapitaRevenueItem)
                                    <tr>
                                        <th scope="row">{{ $percapitaRevenue?->firstItem() + $key }}</th>
                                        <td>{{ $percapitaRevenueItem?->province?->name . ' - ' . $percapitaRevenueItem->county?->name }}
                                            @foreach ($filterColumnsCheckBoxes as $key => $value)
                                                @if (filterCol($key))
                                                    @if (in_array($key, \App\Models\Index\PercapitaRevenueStatusAnalysis::$numeric_fields))
                                        <td>{{ $percapitaRevenueItem?->{$key} }}</td>
                                    @else
                                        <td>{{ $percapitaRevenueItem->{$key} }}</td>
                                @endif
                                @endif
                                @endforeach

                                <td>{{ $percapitaRevenueItem?->year }}</td>
                                <td>
@can("edit-any-PercapitaRevenueStatusAnalysis")
                                 <a href="{{ route('percapita-revenue.edit', $percapitaRevenueItem->id) }}"
                                        title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i></a>
 @endcan
@can("delete-any-PercapitaRevenueStatusAnalysis")
                                    <form method="POST" action="{{ route('percapita-revenue.destroy', $percapitaRevenueItem->id) }}" role="form">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button  type="submit" class="btn btn-danger btn-sm" title="{{ __('validation.buttons.delete') }}">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </form>
 @endcan
                                </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="text-end mt-3">
                            <x-exports.export-links
                                excelLink="{{ route('percapita-revenue.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('percapita-revenue.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('percapita-revenue.list.print', request()->query->all()) }}" />
                        </div>
                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $percapitaRevenue->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-gostaresh.percapita-revenue.line-chart-by-all-fields-year-component></x-gostaresh.percapita-revenue.line-chart-by-all-fields-year-component>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <x-gostaresh.percapita-revenue.pie-chart-university-type-component></x-gostaresh.percapita-revenue.pie-chart-university-type-component>
        </div>

        <div class="col-md-6">
            <x-gostaresh.percapita-revenue.pie-chart-grade-component></x-gostaresh.percapita-revenue.pie-chart-grade-component>
        </div>
    </div>

@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
