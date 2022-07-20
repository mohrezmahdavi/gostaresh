@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.innovation-infrastructures.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($innovationInfrastructures as $key => $innovationInfrastructure)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.innovation-infrastructures.list.partials.tbody')
        </tr>
    @endforeach
@endsection
