@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.international-student-growth-rate.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($internationalStudentGrowthRates as $key => $internationalStudentGrowthRate)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.international-student-growth-rate.list.partials.tbody')
        </tr>
    @endforeach
@endsection
