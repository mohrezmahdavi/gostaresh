@extends('layouts.dashboard')

@section('title-tag')
    تعداد میانگین درآمدھی شھریه ای در گروه ھا و مقاطع مختلف تحصیلی
@endsection

@section('breadcrumb-title')
    تعداد میانگین درآمدھی شھریه ای در گروه ھا و مقاطع مختلف تحصیلی
@endsection

@section('page-title')
    تعداد میانگین درآمدھی شھریه ای در گروه ھا و مقاطع مختلف تحصیلی

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
@can("create-any-AverageTuitionIncome")
    <span>
        <a href="{{ route('tuition-income.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                <div class="card-body">f
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
                                @foreach ($tuitionIncome as $key => $tuitionIncomeItem)
                                    <tr>
                                        <th scope="row">{{ $tuitionIncome?->firstItem() + $key }}</th>
                                        <td>{{ $tuitionIncomeItem?->province?->name . ' - ' . $tuitionIncomeItem->county?->name }}
                                            @foreach ($filterColumnsCheckBoxes as $key => $value)
                                                @if (filterCol($key))
                                                    @if (in_array($key, \App\Models\Index\AverageTuitionIncome::$numeric_fields))
                                        <td>{{ $tuitionIncomeItem?->{$key} }}</td>
                                    @else
                                        <td>{{ $tuitionIncomeItem->{$key} }}</td>
                                @endif
                                @endif
                                @endforeach
                                <td>{{ $tuitionIncomeItem?->year }}</td>
                                <td>
@can("edit-any-AverageTuitionIncome")
                                 <a href="{{ route('tuition-income.edit', $tuitionIncomeItem->id) }}"
                                        title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i></a>
 @endcan
@can("delete-any-AverageTuitionIncome")
                                    <form method="POST" action="{{ route('tuition-income.destroy', $tuitionIncomeItem->id) }}" role="form">
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
                                excelLink="{{ route('tuition-income.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('tuition-income.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('tuition-income.list.print', request()->query->all()) }}" />
                        </div>
                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $tuitionIncome->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-gostaresh.tuition-income.line-chart-by-all-fields-year-component></x-gostaresh.tuition-income.line-chart-by-all-fields-year-component>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <x-gostaresh.tuition-income.pie-chart-department-of-education-component></x-gostaresh.tuition-income.pie-chart-department-of-education-component>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
