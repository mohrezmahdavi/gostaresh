<td>{{ $annualGrowthRateOfStudentEnrollment?->province?->name . ' - ' . $annualGrowthRateOfStudentEnrollment->county?->name }}
</td>

@if (filterCol('university_type_title') == true)
    <td>{{ $annualGrowthRateOfStudentEnrollment?->university_type_title }}</td>
@endif
@if (filterCol('gender_title') == true)
    <td>{{ $annualGrowthRateOfStudentEnrollment?->gender_title }}</td>
@endif
@if (filterCol('grade_title') == true)
    <td>{{ $annualGrowthRateOfStudentEnrollment?->grade_title }}</td>
@endif
@if (filterCol('department_of_education_title') == true)
    <td>{{ $annualGrowthRateOfStudentEnrollment?->department_of_education_title }}</td>
@endif
@if (filterCol('annual_growth_rate_of_student_enrollment') == true)
    <td>{{ $annualGrowthRateOfStudentEnrollment?->annual_growth_rate_of_student_enrollment }}</td>
@endif
@if (filterCol('year') == true)
    <td>{{ $annualGrowthRateOfStudentEnrollment?->year }}</td>
@endif
