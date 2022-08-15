<td>{{ $numberOfVolunteersStatusAnalysis?->province?->name . ' - ' . $numberOfVolunteersStatusAnalysis->county?->name }}
</td>
@if (filterCol('university_type_title') == true)
    <td>{{ $numberOfVolunteersStatusAnalysis?->university_type_title }}</td>
@endif
@if (filterCol('gender_title') == true)
    <td>{{ $numberOfVolunteersStatusAnalysis?->gender_title }}</td>
@endif
@if (filterCol('department_of_education_title') == true)
    <td>{{ $numberOfVolunteersStatusAnalysis?->department_of_education_title }}</td>
@endif
@if (filterCol('grade_title') == true)
    <td>{{ $numberOfVolunteersStatusAnalysis?->grade_title }}</td>
@endif
@if (filterCol('number_of_volunteers') == true)
    <td>{{ $numberOfVolunteersStatusAnalysis?->number_of_volunteers }}</td>
@endif
@if (filterCol('year') == true)
    <td>{{ $numberOfVolunteersStatusAnalysis?->year }}</td>
@endif
