<td>{{ $costOfMajor?->province?->name . ' - ' . $costOfMajor?->county?->name }}
</td>

@if (filterCol('university_type_title') == true)
<td>{{ $costOfMajor?->university_type_title }}</td>
@endif
@if (filterCol('gender') == true)
<td>{{ $costOfMajor?->gender }}</td>
@endif
@if (filterCol('department_of_education_title') == true)
<td>{{ $costOfMajor?->department_of_education_title }}</td>
@endif
@if (filterCol('associate_degree') == true)
<td>{{ $costOfMajor?->associate_degree }}</td>
@endif
@if (filterCol('bachelor_degree') == true)
<td>{{ $costOfMajor?->bachelor_degree }}</td>
@endif
@if (filterCol('masters') == true)
<td>{{ $costOfMajor?->masters }}</td>
@endif
@if (filterCol('professional_phd') == true)
<td>{{ $costOfMajor?->professional_phd }}</td>
@endif   
@if (filterCol('phd') == true)
<td>{{ $costOfMajor?->phd }}</td>
@endif

<td>{{ $costOfMajor?->year }}</td>
