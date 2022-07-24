@extends('layouts.dashboard')

@section('title-tag')
روند تغییرات درصد هزینه‌کرد بخش صنعت در تحقیق‌ و توسعه
@endsection

@section('breadcrumb-title')
روند تغییرات درصد هزینه‌کرد بخش صنعت در تحقیق‌ و توسعه
@endsection

@section('page-title')
روند تغییرات درصد هزینه‌کرد بخش صنعت در تحقیق‌ و توسعه

<span>
    <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
</span>
<span>
    <a href="{{ route('industrial.expenditure.research.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                    @include('admin.gostaresh.industrial-expenditure-research.list.partials.thead')
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($industrialExpenditureResearches as $key => $industrialExpenditureResearch)
                                    <tr>
                                        <th scope="row">{{ $industrialExpenditureResearches?->firstItem() + $key }}</th>
                                        @include('admin.gostaresh.industrial-expenditure-research.list.partials.tbody')
                                        
                                        <td>
        
                                            <a href="{{ route('industrial.expenditure.research.edit', $industrialExpenditureResearch) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>
        
                                            <a href="{{ route('industrial.expenditure.research.destroy', $industrialExpenditureResearch) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>
        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-end mt-3">
                            <x-exports.export-links 
                                excelLink="{{ route('industrial.expenditure.research.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('industrial.expenditure.research.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('industrial.expenditure.research.list.print', request()->query->all()) }}"
                            />
                        </div>
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $industrialExpenditureResearches->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
