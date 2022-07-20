@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.employment-of-provincial.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($employmentOfProvincials as $key => $employmentOfProvincial)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.employment-of-provincial.list.partials.tbody')
        </tr>
    @endforeach
@endsection
