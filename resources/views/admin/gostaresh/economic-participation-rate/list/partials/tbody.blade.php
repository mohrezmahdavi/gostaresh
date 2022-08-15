<td>{{ $economicParticipationRate?->province?->name . ' - ' . $economicParticipationRate->county?->name }}
</td>
@if (filterCol('education_title') == true)
<td>{{ $economicParticipationRate?->education_title }}</td>
@endif
@if (filterCol('amount') == true)
<td>{{ $economicParticipationRate?->amount }}</td>
@endif
@if (filterCol('year') == true)
<td>{{ $economicParticipationRate?->year }}</td>
@endif