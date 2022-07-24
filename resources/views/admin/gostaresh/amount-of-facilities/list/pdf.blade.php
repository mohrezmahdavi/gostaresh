@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.amount-of-facilities.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($amountOfFacilitiesForResearchAchievements as $key => $amountOfFacilitiesForResearchAchievement)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.amount-of-facilities.list.partials.tbody')
        </tr>
    @endforeach
@endsection
