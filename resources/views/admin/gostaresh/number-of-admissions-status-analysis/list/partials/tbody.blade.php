<td>{{ $numberOfAdmissionsStatusAnalysis?->province?->name . ' - ' . $numberOfAdmissionsStatusAnalysis->county?->name }}
</td>
@if (filterCol('university_type_title') == true)
<td>{{ $numberOfAdmissionsStatusAnalysis?->university_type_title }}</td>
@endif
@if (filterCol('gender_title') == true)
<td>{{ $numberOfAdmissionsStatusAnalysis?->gender_title }}</td>
@endif
@if (filterCol('grade_title') == true)
<td>{{ $numberOfAdmissionsStatusAnalysis?->grade_title }}</td>
@endif
@if (filterCol('department_of_education_title') == true)
<td>{{ $numberOfAdmissionsStatusAnalysis?->department_of_education_title }}</td>
@endif
@if (filterCol('number_of_admissions') == true)
<td>{{ number_format($numberOfAdmissionsStatusAnalysis?->number_of_admissions) }}</td>
@endif
@if (filterCol('year') == true)
<td>{{ $numberOfAdmissionsStatusAnalysis?->year }}</td>
@endif