@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.academic-major-educational.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($academicMajorEducationals as $key => $academicMajorEducational)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.academic-major-educational.list.partials.tbody')
        </tr>
    @endforeach
@endsection
