<td>{{ $numberOfStudentsStatusAnalysis?->province?->name . ' - ' . $numberOfStudentsStatusAnalysis->county?->name }}
</td>
@if (filterCol('university_type_title') == true)
    <td>{{ $numberOfStudentsStatusAnalysis?->university_type_title }}</td>
@endif
@if (filterCol('gender_title') == true)
    <td>{{ $numberOfStudentsStatusAnalysis?->gender_title }}</td>
@endif
@if (filterCol('department_of_education_title') == true)
    <td>{{ $numberOfStudentsStatusAnalysis?->department_of_education_title }}</td>
@endif
@if (filterCol('number_of_students') == true)
    <td>{{ number_format($numberOfStudentsStatusAnalysis?->number_of_students) }}</td>
@endif
@if (filterCol('year') == true)
    <td>{{ $numberOfStudentsStatusAnalysis?->year }}</td>
@endif
