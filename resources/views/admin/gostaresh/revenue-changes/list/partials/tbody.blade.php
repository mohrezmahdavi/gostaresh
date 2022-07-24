<td>{{ $revenueChange?->province?->name . ' - ' . $revenueChange?->county?->name }}
</td>

@if (filterCol('unit') == true)
<td>{{ $revenueChange?->unit }}</td>
@endif
@if (filterCol('total_annual_income') == true)
<td>{{ number_format((int) $revenueChange?->total_annual_income ) }}</td>
@endif

<td>{{ $revenueChange?->year }}</td>
<td>{{ $revenueChange?->month }}</td>
