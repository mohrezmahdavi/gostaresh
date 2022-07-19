<td>{{ $unemploymentRate?->province?->name . ' - ' . $unemploymentRate->county?->name }}
</td>

@if (filterCol('education_title') == true)
<td>{{ $unemploymentRate?->education_title }}</td>
@endif
@if (filterCol('amount') == true)
<td>{{ number_format($unemploymentRate?->amount) }}</td>
@endif
@if (filterCol('year') == true)
<td>{{ $unemploymentRate?->year }}</td>
@endif