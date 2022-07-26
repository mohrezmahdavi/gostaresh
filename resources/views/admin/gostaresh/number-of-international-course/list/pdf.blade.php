@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.number-of-international-course.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($statusAnalysisOfTheNumberOfCourses as $key => $statusAnalysisOfTheNumberOfCourse)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.number-of-international-course.list.partials.tbody')
        </tr>
    @endforeach
@endsection
