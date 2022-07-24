@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.credit-and-asset.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($creditAndAssets as $key => $creditAndAsset)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.credit-and-asset.list.partials.tbody')
        </tr>
    @endforeach
@endsection
