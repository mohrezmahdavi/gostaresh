<td>{{ $creditAndAsset?->province?->name . ' - ' . $creditAndAsset?->county?->name }}
</td>

@if (filterCol('unit') == true)
<td>{{ $creditAndAsset?->unit }}</td>
@endif
@if (filterCol('administrative_credits') == true)
<td>{{ number_format((int) $creditAndAsset?->administrative_credits ) }}</td>
@endif
@if (filterCol('educational_credits') == true)
<td>{{ number_format((int) $creditAndAsset?->educational_credits ) }}</td>
@endif
@if (filterCol('research_credits') == true)
<td>{{ number_format((int) $creditAndAsset?->research_credits ) }}</td>
@endif
@if (filterCol('cultural_credits') == true)
<td>{{ number_format((int) $creditAndAsset?->cultural_credits ) }}</td>
@endif 
@if (filterCol('innovative_credits') == true)
<td>{{ number_format((int) $creditAndAsset?->innovative_credits ) }}</td>
@endif 
@if (filterCol('skills_credits') == true)
<td>{{ number_format((int) $creditAndAsset?->skills_credits ) }}</td>
@endif 
@if (filterCol('total_University_credits') == true)
<td>{{ number_format((int) $creditAndAsset?->total_University_credits ) }}</td>
@endif   
@if (filterCol('total_university_assets') == true)
<td>{{ number_format((int) $creditAndAsset?->total_university_assets ) }}</td>
@endif   

<td>{{ $creditAndAsset?->year }}</td>
