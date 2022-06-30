@extends('layouts.dashboard')

@section('title-tag')
روند تغییرات درصد هزینه‌کرد بخش صنعت در تحقیق‌ و توسعه
@endsection

@section('breadcrumb-title')
روند تغییرات درصد هزینه‌کرد بخش صنعت در تحقیق‌ و توسعه
@endsection

@section('page-title')
روند تغییرات درصد هزینه‌کرد بخش صنعت در تحقیق‌ و توسعه
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')

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
                                    <th>مقدار </th>
                                    <th>سال</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($industrialExpenditureResearches as $key => $industrialExpenditureResearch)
                                    <tr>
                                        <th scope="row">{{ $industrialExpenditureResearches?->firstItem() + $key }}</th>
        
                                        <td>{{ $industrialExpenditureResearch?->province?->name . ' - ' . $industrialExpenditureResearch->county?->name }}
                                        </td>
                                        <td>{{ $industrialExpenditureResearch?->amount }}</td>
                                        <td>{{ $industrialExpenditureResearch?->year }}</td>
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
@endsection
