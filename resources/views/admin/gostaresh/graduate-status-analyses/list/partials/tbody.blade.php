<td>{{ $graduateStatusAnalysis?->province?->name . ' - ' . $graduateStatusAnalysis?->county?->name }}
</td>

@if (filterCol('unit') == true)
<td>{{ $graduateStatusAnalysis?->unit }}</td>
@endif
@if (filterCol('total_graduates') == true)
<td>{{ number_format((int) $graduateStatusAnalysis?->total_graduates) }}</td>
@endif
@if (filterCol('employed_graduates') == true)
<td>{{ number_format((int) $graduateStatusAnalysis?->employed_graduates) }}</td>
@endif
@if (filterCol('graduate_growth_rate') == true)
<td>{{ number_format((int) $graduateStatusAnalysis?->graduate_growth_rate) }}</td>
@endif
@if (filterCol('related_employed_graduates') == true)
<td>{{ number_format((int) $graduateStatusAnalysis?->related_employed_graduates) }}</td>
@endif
@if (filterCol('skill_certification_graduates') == true)
<td>{{ number_format((int) $graduateStatusAnalysis?->skill_certification_graduates) }}</td>
@endif
@if (filterCol('employed_graduates_6_months_after_graduation') == true)
<td>{{ number_format((int)$graduateStatusAnalysis?->employed_graduates_6_months_after_graduation) }}</td>
@endif
@if (filterCol('average_monthly_income_employed_graduates') == true)
<td>{{ number_format((int) $graduateStatusAnalysis?->average_monthly_income_employed_graduates) }}</td>
@endif

<td>{{ $graduateStatusAnalysis?->year }}</td>
<td>{{ $graduateStatusAnalysis?->month }}</td>
