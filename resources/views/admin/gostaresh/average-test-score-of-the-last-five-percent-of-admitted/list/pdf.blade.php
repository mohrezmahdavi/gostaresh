@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.average-test-score-of-the-last-five-percent-of-admitted.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($averageTestScoreOfTheLastFivePercentOfAdmitteds as $key => $averageTestScoreOfTheLastFivePercentOfAdmitted)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.average-test-score-of-the-last-five-percent-of-admitted.list.partials.tbody')
        </tr>
    @endforeach
@endsection
