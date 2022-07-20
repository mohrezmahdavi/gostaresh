<td>{{ $graduatesOfHigherEducationCenter?->province?->name . ' - ' . $graduatesOfHigherEducationCenter?->county?->name }}
</td>

@if (filterCol('university') == true)
<td>{{ $graduatesOfHigherEducationCenter?->university }}</td>
@endif
@if (filterCol('gender') == true)
<td>{{ $graduatesOfHigherEducationCenter?->gender }}</td>
@endif
@if (filterCol('department_of_education_title') == true)
<td>{{ $graduatesOfHigherEducationCenter?->department_of_education_title }}</td>
@endif
@if (filterCol('associate_degree') == true)
<td>{{ number_format((int) $graduatesOfHigherEducationCenter?->associate_degree) }}</td>
@endif
@if (filterCol('bachelor_degree') == true)
<td>{{ number_format((int) $graduatesOfHigherEducationCenter?->bachelor_degree) }}</td>
@endif
@if (filterCol('masters') == true)
<td>{{ $graduatesOfHigherEducationCenter?->masters }}</td>
@endif

<td>{{ $graduatesOfHigherEducationCenter?->year }}</td>
<td>{{ $graduatesOfHigherEducationCenter?->month }}</td>
