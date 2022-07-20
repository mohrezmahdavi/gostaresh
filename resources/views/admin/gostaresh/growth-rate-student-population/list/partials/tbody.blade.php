<td>{{ $growthRateStudentPopulation?->province?->name . ' - ' . $growthRateStudentPopulation->county?->name }}</td>

@if (filterCol('gender_title') == true)
    <td>{{ $growthRateStudentPopulation?->gender_title }}</td>
@endif
{{-- <td>{{ $growthRateStudentPopulation?->grade }}</td> --}}

@if (filterCol('ebtedai') == true)
    <td>{{ number_format($growthRateStudentPopulation?->ebtedai) }}</td>
@endif
@if (filterCol('motevasete_1') == true)
    <td>{{ number_format($growthRateStudentPopulation?->motevasete_1) }}</td>
@endif
@if (filterCol('motevasete_2_ensani') == true)
    <td>{{ number_format($growthRateStudentPopulation?->motevasete_2_ensani) }}</td>
@endif
@if (filterCol('motevasete_2_math') == true)
    <td>{{ number_format($growthRateStudentPopulation?->motevasete_2_math) }}</td>
@endif
@if (filterCol('motevasete_2_science') == true)
    <td>{{ number_format($growthRateStudentPopulation?->motevasete_2_science) }}</td>
@endif
@if (filterCol('motevasete_2_kar_danesh') == true)
    <td>{{ number_format($growthRateStudentPopulation?->motevasete_2_kar_danesh) }}</td>
@endif

<td>{{ $growthRateStudentPopulation?->year }}</td>
<td>{{ $growthRateStudentPopulation?->month }}</td>
