<td>{{ $amountOfFacilitiesForResearchAchievement?->province?->name . ' - ' . $amountOfFacilitiesForResearchAchievement?->county?->name }}
</td>
@if (filterCol('unit') == true)
<td>{{ $amountOfFacilitiesForResearchAchievement?->unit }}</td>
@endif
@if (filterCol('amount') == true)
<td>{{ number_format((int) $amountOfFacilitiesForResearchAchievement?->amount) }}</td>
@endif

<td>{{ $amountOfFacilitiesForResearchAchievement?->year }}</td>
