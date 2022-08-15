<td>{{ $studentAdmissionCapacity?->province?->name . ' - ' . $studentAdmissionCapacity->county?->name }}
</td>
@if (filterCol('university_type_title') == true)
    <td>{{ $studentAdmissionCapacity?->university_type_title }}</td>
@endif
@if (filterCol('gender_title') == true)
    <td>{{ $studentAdmissionCapacity?->gender_title }}</td>
@endif
@if (filterCol('grade_title') == true)
    <td>{{ $studentAdmissionCapacity?->grade_title }}</td>
@endif
@if (filterCol('department_of_education_title') == true)
    <td>{{ $studentAdmissionCapacity?->department_of_education_title }}</td>
@endif
@if (filterCol('student_admission_capacities') == true)
    <td>{{ $studentAdmissionCapacity?->student_admission_capacities }}</td>
@endif
@if (filterCol('year') == true)
    <td>{{ $studentAdmissionCapacity?->year }}</td>
@endif
