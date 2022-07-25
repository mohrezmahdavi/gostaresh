@extends('layouts.pdf')

@section('thead')
    <tr>
        <th>#</th>
        @include('admin.gostaresh.number-of-non-medical-fields-of-study.list.partials.thead')

    </tr>
@endsection

@section('tbody')
    @foreach ($numberOfNonMedicalFieldsOfStudies as $key => $numberOfNonMedicalFieldsOfStudy)
        <tr>
            <td>{{ $key + 1 }}</td>

            @include('admin.gostaresh.number-of-non-medical-fields-of-study.list.partials.tbody')
        </tr>
    @endforeach
@endsection
