@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.graduate-status-analyses.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($graduateStatusAnalysises as $key => $graduateStatusAnalysis)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.graduate-status-analyses.list.partials.tbody')
        </tr>
    @endforeach
@endsection
