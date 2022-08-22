<td>{{ $numberOfStudentsStatusAnalysis?->province?->name . ' - ' . $numberOfStudentsStatusAnalysis->county?->name }}
</td>
@if (filterCol('university_type_title') == true)
    <td>{{ $numberOfStudentsStatusAnalysis?->university_type_title }}</td>
@endif
@if (filterCol('unit') == true)
    <td>{{ $numberOfStudentsStatusAnalysis?->unit }}</td>
@endif
@if (filterCol('gender_title') == true)
    <td>{{ $numberOfStudentsStatusAnalysis?->gender_title }}</td>
@endif
@if (filterCol('number_of_students') == true)
    <td>{{ $numberOfStudentsStatusAnalysis?->number_of_students }}</td>
@endif
@if (filterCol('grade_id') == true)
    <td>{{ $numberOfStudentsStatusAnalysis?->grade?->name }}</td>
@endif
@if (filterCol('major_id') == true)
    <td>{{ $numberOfStudentsStatusAnalysis?->major?->name }}</td>
@endif
@if (filterCol('minor_id') == true)
    <td>{{ $numberOfStudentsStatusAnalysis?->minor?->name }}</td>
@endif
@if (filterCol('year') == true)
    <td>{{ $numberOfStudentsStatusAnalysis?->year }}</td>
@endif
