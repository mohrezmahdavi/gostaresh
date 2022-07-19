@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.unemployment-rate.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($unemploymentRates as $key => $unemploymentRate)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.unemployment-rate.list.partials.tbody')
        </tr>
    @endforeach
@endsection
