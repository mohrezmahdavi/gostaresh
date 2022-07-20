<td>{{ $multipleDeprivationIndexOfCity?->province?->name . ' - ' . $multipleDeprivationIndexOfCity->county?->name }}
</td>
@if (filterCol('amount') == true)
<td>{{ number_format($multipleDeprivationIndexOfCity?->amount) }}</td>
@endif
@if (filterCol('year') == true)
<td>{{ $multipleDeprivationIndexOfCity?->year }}</td>
@endif