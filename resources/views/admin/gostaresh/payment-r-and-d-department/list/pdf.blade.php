@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.payment-r-and-d-department.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($paymentRAndDDepartments as $key => $paymentRAndDDepartment)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.payment-r-and-d-department.list.partials.tbody')
        </tr>
    @endforeach
@endsection
