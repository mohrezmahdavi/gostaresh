@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.graduates-of-higher-education.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($graduatesOfHigherEducationCenters as $key => $graduatesOfHigherEducationCenter)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.graduates-of-higher-education.list.partials.tbody')
        </tr>
    @endforeach
@endsection
