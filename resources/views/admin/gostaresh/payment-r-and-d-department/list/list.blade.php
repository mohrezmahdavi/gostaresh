@extends('layouts.dashboard')

@section('title-tag')
    روند تغییرات میزان هزینه کرد در بخش R&D
@endsection

@section('breadcrumb-title')
    روند تغییرات میزان هزینه کرد در بخش R&D
@endsection

@section('page-title')
    روند تغییرات میزان هزینه کرد در بخش R&D

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('payment.r.and.d.department.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                    @include('admin.gostaresh.payment-r-and-d-department.list.partials.thead')
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($paymentRAndDDepartments as $key => $paymentRAndDDepartment)
                                    <tr>
                                        <th scope="row">{{ $paymentRAndDDepartments?->firstItem() + $key }}</th>

                                        @include('admin.gostaresh.payment-r-and-d-department.list.partials.tbody')
                                        <td>

                                            <a href="{{ route('payment.r.and.d.department.edit', $paymentRAndDDepartment) }}"
                                                title="{{ __('validation.buttons.edit') }}"
                                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                                            <a href="{{ route('payment.r.and.d.department.destroy', $paymentRAndDDepartment) }}"
                                                title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-end mt-3">
                            <x-exports.export-links
                                excelLink="{{ route('payment.r.and.d.department.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('payment.r.and.d.department.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('payment.r.and.d.department.list.print', request()->query->all()) }}" />
                        </div>
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $paymentRAndDDepartments->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
