@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.economic-participation-rate.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($economicParticipationRates as $key => $economicParticipationRate)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.economic-participation-rate.list.partials.tbody')
        </tr>
    @endforeach
@endsection
