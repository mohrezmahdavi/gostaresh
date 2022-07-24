@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.percapita-revenue.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($percapitaRevenues as $key => $percapitaRevenue)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.percapita-revenue.list.partials.tbody')
        </tr>
    @endforeach
@endsection
