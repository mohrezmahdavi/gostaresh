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
                                @foreach ($paymentRAndDDepartments as $key => $paymentRAndDDepartment)
                                    <tr>
                                        <th scope="row">{{ $paymentRAndDDepartments?->firstItem() + $key }}</th>
        
                                        <td>{{ $paymentRAndDDepartment?->province?->name . ' - ' . $paymentRAndDDepartment->county?->name }}
                                        </td>
                                        <td>{{ $paymentRAndDDepartment?->amount }}</td>
                                        <td>{{ $paymentRAndDDepartment?->year }}</td>
                                        <td>
        
                                            <a href="{{ route('payment.r.and.d.department.edit', $paymentRAndDDepartment) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>
        
                                            <a href="{{ route('payment.r.and.d.department.destroy', $paymentRAndDDepartment) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>
        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
        
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
@endsection
