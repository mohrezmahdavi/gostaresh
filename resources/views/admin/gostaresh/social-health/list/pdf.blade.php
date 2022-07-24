@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.social-health.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($socialHealths as $key => $socialHealth)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.social-health.list.partials.tbody')
        </tr>
    @endforeach
@endsection
