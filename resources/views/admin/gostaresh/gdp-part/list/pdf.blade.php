@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.gdp-part.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($gdpParts as $key => $gdpPart)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.gdp-part.list.partials.tbody')
        </tr>
    @endforeach
@endsection
