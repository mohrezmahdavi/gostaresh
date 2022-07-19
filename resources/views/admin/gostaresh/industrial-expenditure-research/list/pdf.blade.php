@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.industrial-expenditure-research.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($industrialExpenditureResearches as $key => $industrialExpenditureResearch)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.industrial-expenditure-research.list.partials.tbody')
        </tr>
    @endforeach
@endsection
