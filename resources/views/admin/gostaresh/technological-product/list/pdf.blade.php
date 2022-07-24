@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.technological-product.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($technologicalProducts as $key => $technologicalProduct)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.technological-product.list.partials.tbody')
        </tr>
    @endforeach
@endsection
