@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.organizational-culture.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($organizationalCultures as $key => $organizationalCulture)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.organizational-culture.list.partials.tbody')
        </tr>
    @endforeach
@endsection
