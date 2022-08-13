<td>{{ $internationalTechnology?->province?->name . ' - ' . $internationalTechnology?->county?->name }}
</td>
@if (filterCol('unit') == true)
<td>{{ $internationalTechnology?->unit }}</td>
@endif
@if (filterCol('number_of_participation') == true)
<td>{{ number_format((int) $internationalTechnology?->number_of_participation) }}</td>
@endif
@if (filterCol('number_of_technical_services') == true)
<td>{{ number_format((int) $internationalTechnology?->number_of_technical_services) }}</td>
@endif
@if (filterCol('earnings') == true)
<td>{{ number_format((int) $internationalTechnology?->earnings) }}</td>
@endif
@if (filterCol('number_of_international_inventions') == true)
<td>{{ number_format((int) $internationalTechnology?->number_of_international_inventions) }}</td>
@endif
@if (filterCol('number_of_international_knowledge_based_companies') == true)
<td>{{ number_format((int) $internationalTechnology?->number_of_international_knowledge_based_companies) }}</td>
@endif

<td>{{ $internationalTechnology?->year }}</td>

