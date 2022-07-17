@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.number-student-population.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($geographicalLocationOfUnits as $key => $geographicalLocationOfUnit)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.number-student-population.list.partials.tbody')
        </tr>
    @endforeach
@endsection
