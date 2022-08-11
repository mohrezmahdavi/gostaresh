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
    <span>
        <a href="{{ route('percapita-revenue.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
    </span>
@endsection

@section('styles-head')
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
                                        <td>{{ number_format($percapitaRevenueItem?->{$key}) }}</td>
                                    @else
                                        <td>{{ $percapitaRevenueItem->{$key} }}</td>
                                @endif
                                @endif
                                @endforeach

                                <td>{{ $percapitaRevenueItem?->year }}</td>
                                <td>

                                    <a href="{{ route('percapita-revenue.edit', $percapitaRevenueItem->id) }}"
                                        title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i></a>

                                    {{-- <a href="{{ route('research-output-status-analyses.destroy', $value) }}" title="{{ __('validation.buttons.delete') }}" --}}
                                    {{-- class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a> --}}

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
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
