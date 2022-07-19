<td>{{ $gdpPart?->province?->name . ' - ' . $gdpPart->county?->name }}</td>

@if (filterCol('part_title') == true)
    <td>{{ $gdpPart?->part_title }}</td>
@endif
@if (filterCol('amount') == true)
    <td>{{ number_format($gdpPart?->amount) }}</td>
@endif
@if (filterCol('year') == true)
    <td>{{ $gdpPart?->year }}</td>
@endif
