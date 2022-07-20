@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.multiple-deprivation-index-of-city.list.partials.thead')


    </tr>
@endsection

@section('tbody')
    @foreach ($multipleDeprivationIndexOfCities as $key => $multipleDeprivationIndexOfCity)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.multiple-deprivation-index-of-city.list.partials.tbody')

        </tr>
    @endforeach
@endsection
