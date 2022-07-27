@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.number-of-volunteers-status-analysis.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($numberOfVolunteersStatusAnalyses as $key => $numberOfVolunteersStatusAnalysis)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.number-of-volunteers-status-analysis.list.partials.tbody')
        </tr>
    @endforeach
@endsection
