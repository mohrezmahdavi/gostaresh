@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.international-technology.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($internationalTechnologies as $key => $internationalTechnology)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.international-technology.list.partials.tbody')
        </tr>
    @endforeach
@endsection
