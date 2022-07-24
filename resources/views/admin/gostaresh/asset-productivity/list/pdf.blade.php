@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.asset-productivity.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($assetProductivity as $key => $assetProduct)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.asset-productivity.list.partials.tbody')
        </tr>
    @endforeach
@endsection
