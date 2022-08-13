@if (filterCol('population') == true)
<td>{{ number_format((int) $demographicChangesOfCity?->population) }}</td>
@endif
@if (filterCol('immigration_rates') == true)
<td>{{ $demographicChangesOfCity?->immigration_rates }}</td>
@endif
@if (filterCol('growth_rate') == true)
<td>{{ $demographicChangesOfCity?->growth_rate }}</td>
@endif



<td>{{ $demographicChangesOfCity?->year }}</td>
<td>{{ $demographicChangesOfCity?->province?->name . ' - ' . $demographicChangesOfCity?->county?->name }}
</td>