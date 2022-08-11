@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.university-costs-per-unit.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($universityCosts as $key => $universityCost)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.university-costs-per-unit.list.partials.tbody')
        </tr>
    @endforeach
@endsection
