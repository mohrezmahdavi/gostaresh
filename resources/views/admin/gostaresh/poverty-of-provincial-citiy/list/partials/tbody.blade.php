<td>{{ $povertyOfProvincialCity?->province?->name . ' - ' . $povertyOfProvincialCity->county?->name }}
</td>
@if (filterCol('amount') == true)
<td>{{ number_format($povertyOfProvincialCity?->amount) }}</td>
@endif
@if (filterCol('year') == true)
<td>{{ $povertyOfProvincialCity?->year }}</td>
@endif