<td>{{ $statusAnalysisOfTheNumberOfCurricula?->province?->name . ' - ' . $statusAnalysisOfTheNumberOfCurricula?->county?->name }}
</td>

@if (filterCol('unit') == true)
<td>{{ $statusAnalysisOfTheNumberOfCurricula?->unit }}</td>
@endif
@if (filterCol('total_number_of_curricula') == true)
<td>{{ $statusAnalysisOfTheNumberOfCurricula?->total_number_of_curricula }}</td>
@endif
@if (filterCol('number_of_modified_curricula') == true)
<td>{{ $statusAnalysisOfTheNumberOfCurricula?->number_of_modified_curricula }}</td>
@endif
@if (filterCol('new_interdisciplinary_curricula_implemented') == true)
<td>{{ $statusAnalysisOfTheNumberOfCurricula?->new_interdisciplinary_curricula_implemented }}</td>
@endif
@if (filterCol('complete_new_interdisciplinary_curricula') == true)
<td>{{ $statusAnalysisOfTheNumberOfCurricula?->complete_new_interdisciplinary_curricula }}</td>
@endif
@if (filterCol('number_of_common_curricula_with_the_world') == true)
<td>{{ $statusAnalysisOfTheNumberOfCurricula?->number_of_common_curricula_with_the_world }}</td>
@endif
@if (filterCol('number_of_curricula_developed') == true)
<td>{{ $statusAnalysisOfTheNumberOfCurricula?->number_of_curricula_developed }}</td>
@endif

<td>{{ $statusAnalysisOfTheNumberOfCurricula?->year }}</td>
