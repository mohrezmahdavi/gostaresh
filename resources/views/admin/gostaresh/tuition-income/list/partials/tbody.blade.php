<td>{{ $tuitionIncome?->province?->name . ' - ' . $tuitionIncome?->county?->name }}
</td>

@if (filterCol('unit') == true)
<td>{{ $tuitionIncome?->unit }}</td>
@endif
@if (filterCol('university_type_title') == true)
<td>{{ $tuitionIncome?->university_type_title }}</td>
@endif
@if (filterCol('department_of_education_title') == true)
<td>{{ $tuitionIncome?->department_of_education_title }}</td>
@endif
@if (filterCol('associate_degree') == true)
<td>{{ $tuitionIncome?->associate_degree }}</td>
@endif
@if (filterCol('bachelor_degree') == true)
<td>{{ $tuitionIncome?->bachelor_degree }}</td>
@endif
@if (filterCol('masters') == true)
<td>{{ $tuitionIncome?->masters }}</td>
@endif
@if (filterCol('professional_phd') == true)
<td>{{ $tuitionIncome?->professional_phd }}</td>
@endif
@if (filterCol('phd') == true)
<td>{{ $tuitionIncome?->phd }}</td>
@endif

<td>{{ $tuitionIncome?->year }}</td>
