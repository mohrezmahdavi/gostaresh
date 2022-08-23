@extends('layouts.dashboard')

@section('title-tag')
    تحلیل وضعیت شاخص ها و برنامه های فرهنگی
@endsection

@section('breadcrumb-title')
    تحلیل وضعیت شاخص ها و برنامه های فرهنگی
@endsection

@section('page-title')
    تحلیل وضعیت شاخص ها و برنامه های فرهنگی

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
@can("create-any-CulturalIndicatorsStatusAnalysis")
    <span>
        <a href="{{ route('cultural-indicators.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
    </span>
 @endcan

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
                                @foreach ($culturalIndicators as $key => $culturalIndicator)
                                    <tr>
                                        <th scope="row">{{ $culturalIndicators?->firstItem() + $key }}</th>
                                        <td>{{ $culturalIndicator?->province?->name . ' - ' . $culturalIndicator->county?->name }}
                                            @foreach ($filterColumnsCheckBoxes as $key => $value)
                                                @if (filterCol($key))
                                                    @if (in_array($key, \App\Models\Index\CulturalIndicatorsStatusAnalysis::$numeric_fields))
                                        <td>{{ $culturalIndicator?->{$key} }}</td>
                                    @else
                                        <td>{{ $culturalIndicator?->{$key} }}</td>
                                @endif
                                @endif
                                @endforeach

                                <td>{{ $culturalIndicator?->year }}</td>
                                <td>
@can("edit-any-CulturalIndicatorsStatusAnalysis")
                                 <a href="{{ route('cultural-indicators.edit', $culturalIndicator) }}"
                                        title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i></a>
 @endcan
@can("delete-any-CulturalIndicatorsStatusAnalysis")
                                    <form method="POST" action="{{ route('cultural-indicators.destroy', $culturalIndicator) }}" role="form">
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
                                excelLink="{{ route('cultural-indicators.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('cultural-indicators.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('cultural-indicators.list.print', request()->query->all()) }}" />
                        </div>
                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $culturalIndicators->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <x-gostaresh.cultural-indicators-status-analysis.line-chart-by-all-fields-year-component></x-gostaresh.cultural-indicators-status-analysis.line-chart-by-all-fields-year-component>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
