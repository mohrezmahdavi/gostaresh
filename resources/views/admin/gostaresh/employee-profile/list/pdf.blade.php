@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.employee-profile.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($employeeProfiles as $key => $employeeProfile)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.employee-profile.list.partials.tbody')
        </tr>
    @endforeach
@endsection
