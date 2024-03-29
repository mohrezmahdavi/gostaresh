@extends('layouts.dashboard')

@section('title-tag')
    تعداد تحلیل روند تغییرات وضعیت درآمد ھای دانشگاه در واحدھای شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    تعداد تحلیل روند تغییرات وضعیت درآمد ھای دانشگاه در واحدھای شھرستان ھای استان
@endsection

@section('page-title')
    تعداد تحلیل روند تغییرات وضعیت درآمد ھای دانشگاه در واحدھای شھرستان ھای استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    @can("create-any-RevenueChangesTrendsAnalysis")
        <span>
        <a href="{{ route('revenue-changes.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
    <tr>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-light">

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
                                @foreach ($revenueChanges as $key => $revenueChange)
                                    <tr>
                                        <th scope="row">{{ $revenueChanges?->firstItem() + $key }}</th>
                                        <td>{{ $revenueChange?->province?->name . ' - ' . $revenueChange->county?->name }}

                                        @foreach ($filterColumnsCheckBoxes as $key => $value)
                                            @if (filterCol($key))
                                                @if (in_array($key, \App\Models\Index\RevenueChangesTrendsAnalysis::$numeric_fields))
                                                    <td>{{ $revenueChange?->{$key} }}</td>
                                                @else
                                                    <td>{{ $revenueChange->{$key} }}</td>
                                                @endif
                                            @endif
                                        @endforeach

                                        <td>{{ $revenueChange?->year }}</td>
                                        <td>
                                            @can("edit-any-RevenueChangesTrendsAnalysis")

                                                <a href="{{ route('revenue-changes.edit', $revenueChange) }}"
                                                   title="{{ __('validation.buttons.edit') }}"
                                                   class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                            @endcan

                                            @can("delete-any-RevenueChangesTrendsAnalysis")

                                                <form method="POST"
                                                      action="{{ route('revenue-changes.destroy', $revenueChange) }}"
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
                                    excelLink="{{ route('revenue-changes.list.excel', request()->query->all()) }}"
                                    pdfLink="{{ route('revenue-changes.list.pdf', request()->query->all()) }}"
                                    printLink="{{ route('revenue-changes.list.print', request()->query->all()) }}"/>
                            </div>
                        </div>
                        <!-- end table-responsive-->
                        <div class="mt-3">
                            {{ $revenueChanges->withQueryString()->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-gostaresh.revenue-changes.line-chart-by-all-fields-year-component></x-gostaresh.revenue-changes.line-chart-by-all-fields-year-component>
            </div>
        </div>
        @endsection

        @section('body-scripts')
            <script src="{{ mix('/js/app.js') }}"></script>
@endsection
