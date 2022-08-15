<td>{{ $industrialExpenditureResearch?->province?->name . ' - ' . $industrialExpenditureResearch->county?->name }}
</td>
@if (filterCol('amount') == true)
<td>{{ $industrialExpenditureResearch?->amount }}</td>
@endif
@if (filterCol('year') == true)
<td>{{ $industrialExpenditureResearch?->year }}</td>
@endif