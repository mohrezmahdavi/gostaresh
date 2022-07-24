@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.tuition-income.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($tuitionIncomes as $key => $tuitionIncome)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.tuition-income.list.partials.tbody')
        </tr>
    @endforeach
@endsection
