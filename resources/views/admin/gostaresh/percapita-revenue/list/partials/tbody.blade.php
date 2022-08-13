<td>{{ $percapitaRevenue?->province?->name . ' - ' . $percapitaRevenue?->county?->name }}
</td>

@if (filterCol('unit') == true)
<td>{{ $percapitaRevenue?->unit }}</td>
@endif
@if (filterCol('university_type_title') == true)
<td>{{ $percapitaRevenue?->university_type_title }}</td>
@endif
@if (filterCol('grade_title') == true)
<td>{{ $percapitaRevenue?->grade_title }}</td>
@endif
@if (filterCol('major_title') == true)
<td>{{ $percapitaRevenue?->major_title }}</td>
@endif
@if (filterCol('minor_title') == true)
<td>{{ $percapitaRevenue?->minor_title }}</td>
@endif
@if (filterCol('percapita_revenue_status_analyses') == true)
<td>{{ number_format((int) $percapitaRevenue?->percapita_revenue_status_analyses ) }}</td>
@endif

<td>{{ $percapitaRevenue?->year }}</td>
