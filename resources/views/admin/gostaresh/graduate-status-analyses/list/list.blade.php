{{-- Table 33 View --}}
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
                                @foreach ($graduateStatusAnalyses as $key => $graduateStatusAnalysis)
                                    <tr>
                                        <th scope="row">{{ $graduateStatusAnalyses?->firstItem() + $key }}</th>
                                        <td>{{ $graduateStatusAnalysis?->province?->name . ' - ' . $graduateStatusAnalysis->county?->name }}
                                            @foreach ($filterColumnsCheckBoxes as $key => $value)
                                                @if (filterCol($key))
                                                    @if (in_array($key, \App\Models\Index\GraduateStatusAnalysis::$numeric_fields))
                                        <td>{{ $graduateStatusAnalysis?->{$key} }}</td>
                                    @else
                                        <td>{{ $graduateStatusAnalysis?->{$key} }}</td>
                                @endif
                                @endif
                                @endforeach
                                <td>{{ $graduateStatusAnalysis?->year }}</td>
                                <td>

                                    <a href="{{ route('graduate-status-analyses.edit', $graduateStatusAnalysis) }}"
                                        title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i></a>

                                    <form method="POST" action="{{ route('graduate-status-analyses.destroy', $graduateStatusAnalysis) }}" role="form">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button  type="submit" class="btn btn-danger btn-sm" title="{{ __('validation.buttons.delete') }}">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </form>
                                </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="text-end mt-3">
                            <x-exports.export-links
                                excelLink="{{ route('graduate-status-analyses.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('graduate-status-analyses.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('graduate-status-analyses.list.print', request()->query->all()) }}" />
                        </div>
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
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
