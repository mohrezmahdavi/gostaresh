<td>{{ $numberStudentPopulation?->province?->name . ' - ' . $numberStudentPopulation->county?->name }}
</td>
@if (filterCol('gender_title') == true)
    <td>{{ $numberStudentPopulation?->gender_title }}</td>
@endif

{{-- <td>{{ $numberStudentPopulation?->grade }}</td> --}}
@if (filterCol('ebtedai') == true)
    <td>{{ $numberStudentPopulation?->ebtedai }}</td>
@endif

@if (filterCol('motevasete_1') == true)
    <td>{{ $numberStudentPopulation?->motevasete_1 }}</td>
@endif
@if (filterCol('motevasete_2_ensani') == true)
    <td>{{ $numberStudentPopulation?->motevasete_2_ensani }}</td>
@endif
@if (filterCol('motevasete_2_math') == true)
    <td>{{ $numberStudentPopulation?->motevasete_2_math }}</td>
@endif
@if (filterCol('motevasete_2_science') == true)
    <td>{{ $numberStudentPopulation?->motevasete_2_science }}</td>
@endif
@if (filterCol('motevasete_2_kar_danesh') == true)
    <td>{{ $numberStudentPopulation?->motevasete_2_kar_danesh }}</td>
@endif

<td>{{ $numberStudentPopulation?->year }}</td>
