<td>{{ $numberOfResearchProject?->province?->name . ' - ' . $numberOfResearchProject->county?->name }}
</td>
@if (filterCol('number_of_research') == true)
<td>{{ number_format($numberOfResearchProject?->number_of_research) }}</td>
@endif
@if (filterCol('year') == true)
<td>{{ $gdpCity?->year }}</td>
@endif