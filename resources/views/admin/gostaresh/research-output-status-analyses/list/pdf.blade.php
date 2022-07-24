@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.research-output-status-analyses.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($researchOutputStatusAnalyses as $key => $researchOutputStatusAnalys)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.research-output-status-analyses.list.partials.tbody')
        </tr>
    @endforeach
@endsection
