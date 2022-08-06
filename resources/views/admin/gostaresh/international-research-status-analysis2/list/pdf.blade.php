@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.international-research-status-analysis2.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($internationalResearchStatusAnalyses as $key => $internationalResearchStatusAnalys)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.international-research-status-analysis2.list.partials.tbody')
        </tr>
    @endforeach
@endsection
