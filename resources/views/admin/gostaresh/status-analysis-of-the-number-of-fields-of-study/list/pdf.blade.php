@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.status-analysis-of-the-number-of-fields-of-study.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($statusAnalysisOfTheNumberOfFieldsOfStudies as $key => $statusAnalysisOfTheNumberOfFieldsOfStudy)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.status-analysis-of-the-number-of-fields-of-study.list.partials.tbody')
        </tr>
    @endforeach
@endsection
