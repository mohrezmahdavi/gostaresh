@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.number-of-research-project.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($numberOfResearchProjects as $key => $numberOfResearchProject)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.number-of-research-project.list.partials.tbody')
        </tr>
    @endforeach
@endsection
