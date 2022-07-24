<td>{{ $revenueStatusAnalys?->province?->name . ' - ' . $revenueStatusAnalys?->county?->name }}
</td>

@if (filterCol('unit') == true)
<td>{{ $revenueStatusAnalys?->unit }}</td>
@endif
@if (filterCol('total_revenue') == true)
<td>{{ number_format((int) $revenueStatusAnalys?->total_revenue ) }}</td>
@endif                                   
@if (filterCol('income_from_student_tuition') == true)
<td>{{ number_format((int) $revenueStatusAnalys?->income_from_student_tuition ) }}</td>
@endif            
@if (filterCol('income_from_commercialized_technologies') == true)
<td>{{ number_format((int) $revenueStatusAnalys?->income_from_commercialized_technologies ) }}</td>
@endif
@if (filterCol('income_from_research_activities') == true)
<td>{{ number_format((int) $revenueStatusAnalys?->income_from_research_activities ) }}</td>
@endif        
@if (filterCol('income_from_skills_training') == true)
<td>{{ number_format((int) $revenueStatusAnalys?->income_from_skills_training ) }}</td>
@endif            
@if (filterCol('operating_income_growth_rate') == true)
<td>{{ number_format((int) $revenueStatusAnalys?->operating_income_growth_rate ) }}</td>
@endif          
@if (filterCol('total_non_tuition_income') == true)
<td>{{ number_format((int) $revenueStatusAnalys?->total_non_tuition_income ) }}</td>
@endif              
@if (filterCol('total_international_income') == true)
<td>{{ number_format((int) $revenueStatusAnalys?->total_international_income ) }}</td>
@endif            
@if (filterCol('shareholder_income') == true)
<td>{{ number_format((int) $revenueStatusAnalys?->shareholder_income ) }}</td>
@endif                     

<td>{{ $revenueStatusAnalys?->year }}</td>
<td>{{ $revenueStatusAnalys?->month }}</td>
