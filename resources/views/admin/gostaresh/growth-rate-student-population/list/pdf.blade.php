@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.growth-rate-student-population.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($growthRateStudentPopulations as $key => $growthRateStudentPopulation)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.growth-rate-student-population.list.partials.tbody')
        </tr>
    @endforeach
@endsection
