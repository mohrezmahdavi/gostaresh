<td>{{ $costChangesTrend?->province?->name . ' - ' . $costChangesTrend?->county?->name }}
</td>

@if (filterCol('unit') == true)
<td>{{ $costChangesTrend?->unit }}</td>
@endif
@if (filterCol('total_annual_expenses') == true)
<td>{{ $costChangesTrend?->total_annual_expenses }}</td>
@endif     

<td>{{ $costChangesTrend?->year }}</td>
