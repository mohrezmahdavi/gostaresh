@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.number-of-registrants-status-analysis.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($numberOfRegistrants as $key => $numberOfRegistrant)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.number-of-registrants-status-analysis.list.partials.tbody')
        </tr>
    @endforeach
@endsection
