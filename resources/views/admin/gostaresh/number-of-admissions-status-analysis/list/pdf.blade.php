@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.number-of-admissions-status-analysis.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($numberOfAdmissionsStatusAnalysises as $key => $numberOfAdmissionsStatusAnalysis)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.number-of-admissions-status-analysis.list.partials.tbody')
        </tr>
    @endforeach
@endsection
