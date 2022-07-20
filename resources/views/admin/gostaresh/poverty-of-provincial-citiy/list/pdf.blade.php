@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.poverty-of-provincial-citiy.list.partials.thead')


    </tr>
@endsection

@section('tbody')
    @foreach ($povertyOfProvincialCities as $key => $povertyOfProvincialCity)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.poverty-of-provincial-citiy.list.partials.tbody')

        </tr>
    @endforeach
@endsection
