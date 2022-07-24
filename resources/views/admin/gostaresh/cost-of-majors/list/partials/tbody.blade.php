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
<td>{{ number_format((int) $costOfMajor?->associate_degree ) }}</td>
@endif
@if (filterCol('bachelor_degree') == true)
<td>{{ number_format((int) $costOfMajor?->bachelor_degree ) }}</td>
@endif
@if (filterCol('masters') == true)
<td>{{ number_format((int) $costOfMajor?->masters ) }}</td>
@endif
@if (filterCol('phd') == true)
<td>{{ number_format((int) $costOfMajor?->phd ) }}</td>
@endif   

<td>{{ $costOfMajor?->year }}</td>
<td>{{ $costOfMajor?->month }}</td>
