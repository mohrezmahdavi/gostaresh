@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.units-general-status.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($unitsGeneralStatuses as $key => $unitsGeneralStatus)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.units-general-status.list.partials.tbody')
        </tr>
    @endforeach
@endsection
