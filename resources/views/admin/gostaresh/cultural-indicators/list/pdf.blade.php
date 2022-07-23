@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.cultural-indicators.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($culturalIndicators as $key => $culturalIndicator)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.cultural-indicators.list.partials.tbody')
        </tr>
    @endforeach
@endsection
