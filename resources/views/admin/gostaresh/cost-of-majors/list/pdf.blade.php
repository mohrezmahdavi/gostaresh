@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.cost-of-majors.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($costOfMajors as $key => $costOfMajor)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.cost-of-majors.list.partials.tbody')
        </tr>
    @endforeach
@endsection
