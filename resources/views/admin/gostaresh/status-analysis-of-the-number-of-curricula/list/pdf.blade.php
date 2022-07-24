@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.status-analysis-of-the-number-of-curricula.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($statusAnalysisOfTheNumberOfCurriculas as $key => $statusAnalysisOfTheNumberOfCurricula)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.status-analysis-of-the-number-of-curricula.list.partials.tbody')
        </tr>
    @endforeach
@endsection
