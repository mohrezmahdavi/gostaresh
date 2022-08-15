<td>{{ $numberOfResearchProject?->province?->name . ' - ' . $numberOfResearchProject->county?->name }}
</td>
@if (filterCol('number_of_research') == true)
<td>{{ $numberOfResearchProject?->number_of_research }}</td>
@endif
@if (filterCol('year') == true)
<td>{{ $numberOfResearchProject?->year }}</td>
@endif