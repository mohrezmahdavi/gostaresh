@extends('layouts.dashboard')

@section('title-tag')
    تحلیل وضعیت تعداد برنامه های درسی
@endsection

@section('breadcrumb-title')
    تحلیل وضعیت تعداد برنامه های درسی
@endsection

@section('page-title')
    تحلیل وضعیت تعداد برنامه های درسی

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    @can("create-any-StatusAnalysisOfTheNumberOfCurricula")
        <span>
        <a href="{{ route('status.analysis.of.the.number.of.curricula.create')  }}" class="btn btn-success btn-sm">افزودن رکورد
            جدید</a>
    </span>
    @endcan
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')

    <x-gostaresh.filter-table-list.filter-table-list-component :filterColumnsCheckBoxes="$filterColumnsCheckBoxes"
                                                               :yearSelectedList="$yearSelectedList"
                                                               :fieldsProvinceSelect="[
        'province' => true,
        'zone' => false,
        'county' => true,
        'city' => false,
    ]"/>

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
                            @foreach ($statusAnalysisOfTheNumberOfCurriculas as $key => $statusAnalysisOfTheNumberOfCurricula)
                                <tr>
                                    <th scope="row">{{ $statusAnalysisOfTheNumberOfCurriculas?->firstItem() + $key }}
                                    </th>


                                    <td>{{ $statusAnalysisOfTheNumberOfCurricula?->province?->name . ' - ' . $statusAnalysisOfTheNumberOfCurricula->county?->name }}
                                    </td>
                                    @foreach ($filterColumnsCheckBoxes as $key => $value)
                                        @if (filterCol($key))
                                            @if (in_array($key, \App\Models\Index\StatusAnalysisOfTheNumberOfCurricula::$numeric_fields))
                                                <td>{{ $statusAnalysisOfTheNumberOfCurricula?->{$key} }}
                                                </td>
                                            @else
                                                <td>{{ $statusAnalysisOfTheNumberOfCurricula->{$key} }}</td>
                                            @endif
                                        @endif
                                    @endforeach

                                    <td>{{ $statusAnalysisOfTheNumberOfCurricula?->year }}</td>
                                    <td>

                                        @can("edit-any-StatusAnalysisOfTheNumberOfCurricula")
                                            <a href="{{ route('status.analysis.of.the.number.of.curricula.edit', $statusAnalysisOfTheNumberOfCurricula) }}"
                                               title="{{ __('validation.buttons.edit') }}"
                                               class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        @endcan

                                        @can("delete-any-StatusAnalysisOfTheNumberOfCurricula")
                                            <form method="POST"
                                                  action="{{ route('status.analysis.of.the.number.of.curricula.destroy', $statusAnalysisOfTheNumberOfCurricula) }}"
                                                  role="form">
                                                @csrf
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="{{ __('validation.buttons.delete') }}">
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
                                excelLink="{{ route('status.analysis.of.the.number.of.curricula.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('status.analysis.of.the.number.of.curricula.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('status.analysis.of.the.number.of.curricula.list.print', request()->query->all()) }}"/>
                        </div>
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $statusAnalysisOfTheNumberOfCurriculas->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <x-gostaresh.status-analysis-of-the-number-of-curricula.line-chart-all-fields-by-year-component/>
            </div>
        </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
