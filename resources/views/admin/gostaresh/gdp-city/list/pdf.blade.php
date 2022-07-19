@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.gdp-city.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($gdpCities as $key => $gdpCity)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.gdp-city.list.partials.tbody')
        </tr>
    @endforeach
@endsection
