<td>{{ $gdpCity?->province?->name . ' - ' . $gdpCity->county?->name }}
</td>
@if (filterCol('amount') == true)
<td>{{ $gdpCity?->amount }}</td>
@endif
@if (filterCol('year') == true)
<td>{{ $gdpCity?->year }}</td>
@endif