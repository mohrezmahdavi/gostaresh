@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.status-analysis-of-the-number-of-courses.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($statusAnalysisOfTheNumberOfCourses as $key => $statusAnalysisOfTheNumberOfCourse)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.status-analysis-of-the-number-of-courses.list.partials.tbody')
        </tr>
    @endforeach
@endsection
