@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.average-test-score-of-the-first-thirty-percent-of-admitted.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($averageTestScoreOfTheFirstThirtyPercentOfAdmitteds as $key => $averageTestScoreOfTheFirstThirtyPercentOfAdmitted)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.average-test-score-of-the-first-thirty-percent-of-admitted.list.partials.tbody')
        </tr>
    @endforeach
@endsection
