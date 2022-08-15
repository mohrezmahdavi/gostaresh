{{-- Table 36,37 View --}}
@extends('layouts.dashboard')

@section('title-tag')
    تعداد تحلیل وضعیت پژوھش بین المللی در واحدھای مستقر در شھرستان ھای استان ۲
@endsection

@section('breadcrumb-title')
    تعداد تحلیل وضعیت پژوھش بین المللی در واحدھای مستقر در شھرستان ھای استان ۲
@endsection

@section('page-title')
    تعداد تحلیل وضعیت پژوھش بین المللی در واحدھای مستقر در شھرستان ھای استان ۲

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('international-research2.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                @foreach ($internationalResearchStatusAnalyses as $key => $internationalResearchStatusAnalysis)
                                    <tr>
                                        <th scope="row">{{ $internationalResearchStatusAnalyses?->firstItem() + $key }}
                                        </th>
                                        <td>{{ $internationalResearchStatusAnalysis?->province?->name . ' - ' . $internationalResearchStatusAnalysis->county?->name }}
                                            @foreach ($filterColumnsCheckBoxes as $key => $value)
                                                @if (filterCol($key))
                                                    @if (in_array($key, \App\Models\Index\InternationalResearchStatusAnalysis::$numeric_fields))
                                        <td>{{ $internationalResearchStatusAnalysis?->{$key} }}</td>
                                    @else
                                        <td>{{ $internationalResearchStatusAnalysis?->{$key} }}</td>
                                @endif
                                @endif
                                @endforeach
                                <td>{{ $internationalResearchStatusAnalysis?->year }}</td>
                                <td>

                                    <a href="{{ route('international-research2.edit', $internationalResearchStatusAnalysis) }}"
                                        title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i></a>

                                    {{-- <a href="{{ route('research-output-status-analyses.destroy', $internationalResearchStatusAnalysis) }}" title="{{ __('validation.buttons.delete') }}" --}}
                                    {{-- class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a> --}}
                                </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="text-end mt-3">
                            <x-exports.export-links
                                excelLink="{{ route('international-research2.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('international-research2.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('international-research2.list.print', request()->query->all()) }}" />
                        </div>
                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $internationalResearchStatusAnalyses->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
