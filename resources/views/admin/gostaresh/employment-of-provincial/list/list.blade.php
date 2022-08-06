@extends('layouts.dashboard')

@section('title-tag')
    وضعیت اشتغال شهرستان های استان
@endsection

@section('breadcrumb-title')
    وضعیت اشتغال شهرستان های استان
@endsection

@section('page-title')
    وضعیت اشتغال شهرستان های استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('employment.of.provincial.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                    @include('admin.gostaresh.employment-of-provincial.list.partials.thead')

                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($employmentOfProvincials as $key => $employmentOfProvincial)
                                    <tr>
                                        <th scope="row">{{ $employmentOfProvincials?->firstItem() + $key }}</th>

                                        @include('admin.gostaresh.employment-of-provincial.list.partials.tbody')
                                        <td>

                                            <a href="{{ route('employment.of.provincial.edit', $employmentOfProvincial) }}"
                                                title="{{ __('validation.buttons.edit') }}"
                                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                                            <a href="{{ route('employment.of.provincial.destroy', $employmentOfProvincial) }}"
                                                title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-end mt-3">
                            <x-exports.export-links
                                excelLink="{{ route('employment.of.provincial.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('employment.of.provincial.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('employment.of.provincial.list.print', request()->query->all()) }}" />
                        </div>
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $employmentOfProvincials->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
