@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.demographic-changes-of-city.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($demographicChangesOfCities as $key => $demographicChangesOfCity)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.demographic-changes-of-city.list.partials.tbody')
        </tr>
    @endforeach
@endsection
