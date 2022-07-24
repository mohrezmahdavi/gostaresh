@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.number-of-students-status-analysis.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($numberOfStudentsStatusAnalysises as $key => $numberOfStudentsStatusAnalysis)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.number-of-students-status-analysis.list.partials.tbody')
        </tr>
    @endforeach
@endsection
