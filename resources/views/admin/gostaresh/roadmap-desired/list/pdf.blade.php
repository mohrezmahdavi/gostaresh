@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.roadmap-desired.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($roadmapDesireds as $key => $roadmapDesired)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.roadmap-desired.list.partials.tbody')
        </tr>
    @endforeach
@endsection
