<td>{{ $growthRateStudentPopulation?->province?->name . ' - ' . $growthRateStudentPopulation->county?->name }}</td>

@if (filterCol('gender_title') == true)
    <td>{{ $growthRateStudentPopulation?->gender_title }}</td>
@endif
{{-- <td>{{ $growthRateStudentPopulation?->grade }}</td> --}}

@if (filterCol('ebtedai') == true)
    <td>{{ $growthRateStudentPopulation?->ebtedai }}</td>
@endif
@if (filterCol('motevasete_1') == true)
    <td>{{ $growthRateStudentPopulation?->motevasete_1 }}</td>
@endif
@if (filterCol('motevasete_2_ensani') == true)
    <td>{{ $growthRateStudentPopulation?->motevasete_2_ensani }}</td>
@endif
@if (filterCol('motevasete_2_math') == true)
    <td>{{ $growthRateStudentPopulation?->motevasete_2_math }}</td>
@endif
@if (filterCol('motevasete_2_science') == true)
    <td>{{ $growthRateStudentPopulation?->motevasete_2_science }}</td>
@endif
@if (filterCol('motevasete_2_kar_danesh') == true)
    <td>{{ $growthRateStudentPopulation?->motevasete_2_kar_danesh }}</td>
@endif

<td>{{ $growthRateStudentPopulation?->year }}</td>
