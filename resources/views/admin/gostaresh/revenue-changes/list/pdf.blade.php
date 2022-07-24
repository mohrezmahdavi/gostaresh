@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.revenue-changes.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($revenueChanges as $key => $revenueChange)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.revenue-changes.list.partials.tbody')
        </tr>
    @endforeach
@endsection
