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


    <x-gostaresh.filter-table-list.filter-table-list-component :filterColumnsCheckBoxes="$filterColumnsCheckBoxes"
                                                               :yearSelectedList="$yearSelectedList"/>
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
                                @foreach($filterColumnsCheckBoxes as $key => $value)
                                    @if( filterCol($key))
                                        <th>{{$value}}</th>
                                    @endif
                                @endforeach
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                            @foreach ($revenueStatusAnalyses as $key => $revenueStatusAnalysis)
                                <tr>
                                    <th scope="row">{{ $revenueStatusAnalyses?->firstItem() + $key }}</th>
                                    <td>{{ $revenueStatusAnalysis?->province?->name . ' - ' . $revenueStatusAnalysis->county?->name }}
                                    @foreach( $filterColumnsCheckBoxes as $key => $value)
                                        @if( filterCol($key))
                                            @if( in_array($key,\App\Models\Index\RevenueStatusAnalysis::$numeric_fields))
                                                <td>{{ number_format($revenueStatusAnalysis?->{$key}) }}</td>
                                            @else
                                                <td>{{ $revenueStatusAnalysis->{$key} }}</td>
                                            @endif
                                        @endif
                                    @endforeach
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

                        <div class="text-end mt-3">
                            <x-exports.export-links 
                                excelLink="{{ route('revenue-status-analyses.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('revenue-status-analyses.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('revenue-status-analyses.list.print', request()->query->all()) }}"
                            />
                        </div>
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
    <script src="{{ mix('/js/app.js') }}"></script>

@endsection
