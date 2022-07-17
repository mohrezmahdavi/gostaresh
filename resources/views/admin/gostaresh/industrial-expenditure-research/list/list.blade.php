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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="{{ asset('assets/datepicker/mds.bs.datetimepicker.style.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/datepicker/mds.bs.datetimepicker.js') }}"></script>
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
                                    <th>شهرستان </th>
                                    @if (filterCol('amount') == true)
                                        <th>مقدار</th>
                                    @endif
                                    @if (filterCol('year') == true)
                                        <th>سال</th>
                                    @endif
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($industrialExpenditureResearches as $key => $industrialExpenditureResearch)
                                    <tr>
                                        <th scope="row">{{ $industrialExpenditureResearches?->firstItem() + $key }}</th>
        
                                        <td>{{ $industrialExpenditureResearch?->province?->name . ' - ' . $industrialExpenditureResearch->county?->name }}
                                        </td>
                                        @if (filterCol('amount') == true)
                                        <td>{{ number_format($industrialExpenditureResearch?->amount) }}</td>
                                        @endif
                                        @if (filterCol('year') == true)
                                        <td>{{ $industrialExpenditureResearch?->year }}</td>
                                        @endif
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
