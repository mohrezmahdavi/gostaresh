<td>{{ $technologicalProduct?->province?->name . ' - ' . $technologicalProduct?->county?->name }}
</td>
@if (filterCol('unit') == true)
<td>{{ $technologicalProduct?->unit }}</td>
@endif
@if (filterCol('number_of_active_technology_cores') == true)
<td>{{ number_format((int) $technologicalProduct?->number_of_active_technology_cores) }}</td>
@endif
@if (filterCol('number_of_active_technology_units') == true)
<td>{{ number_format((int) $technologicalProduct?->number_of_active_technology_units) }}</td>
@endif
@if (filterCol('number_of_active_knowledge_based_companies') == true)
<td>{{ number_format((int) $technologicalProduct?->number_of_active_knowledge_based_companies) }}</td>
@endif
@if (filterCol('number_of_creative_companies') == true)
<td>{{ number_format((int) $technologicalProduct?->number_of_creative_companies) }}</td>
@endif
@if (filterCol('number_of_commercialized_ideas') == true)
<td>{{ number_format((int) $technologicalProduct?->number_of_commercialized_ideas) }}</td>
@endif
@if (filterCol('number_of_knowledge_based_products') == true)
<td>{{ number_format((int) $technologicalProduct?->number_of_knowledge_based_products) }}</td>
@endif
@if (filterCol('number_of_products_without_license') == true)
<td>{{ number_format((int) $technologicalProduct?->number_of_products_without_license) }}</td>
@endif
@if (filterCol('number_of_licensed_products') == true)
<td>{{ number_format((int) $technologicalProduct?->number_of_licensed_products) }}</td>
@endif
@if (filterCol('number_of_active_technology_professors') == true)
<td>{{ number_format((int) $technologicalProduct?->number_of_active_technology_professors) }}</td>
@endif
@if (filterCol('number_of_active_technology_students') == true)
<td>{{ number_format((int) $technologicalProduct?->number_of_active_technology_students) }}</td>
@endif


<td>{{ $technologicalProduct?->year }}</td>
<td>{{ $technologicalProduct?->month }}</td>
