@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.revenue-status-analyses.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($revenueStatusAnalyses as $key => $revenueStatusAnalys)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.revenue-status-analyses.list.partials.tbody')
        </tr>
    @endforeach
@endsection
