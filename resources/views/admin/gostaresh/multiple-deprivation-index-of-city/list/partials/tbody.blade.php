<td>{{ $multipleDeprivationIndexOfCity?->province?->name . ' - ' . $multipleDeprivationIndexOfCity->county?->name }}
</td>
@if (filterCol('amount') == true)
<td>{{ $multipleDeprivationIndexOfCity?->amount }}</td>
@endif
@if (filterCol('year') == true)
<td>{{ $multipleDeprivationIndexOfCity?->year }}</td>
@endif