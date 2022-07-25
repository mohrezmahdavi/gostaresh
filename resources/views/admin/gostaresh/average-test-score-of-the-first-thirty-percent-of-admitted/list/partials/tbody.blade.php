<td>{{ $averageTestScoreOfTheFirstThirtyPercentOfAdmitted?->province?->name . ' - ' . $averageTestScoreOfTheFirstThirtyPercentOfAdmitted->county?->name }}
</td>

@if (filterCol('university_type_title') == true)
    <td>{{ $averageTestScoreOfTheFirstThirtyPercentOfAdmitted?->university_type_title }}</td>
@endif
@if (filterCol('gender_title') == true)
    <td>{{ $averageTestScoreOfTheFirstThirtyPercentOfAdmitted?->gender_title }}</td>
@endif
@if (filterCol('department_of_education_title') == true)
    <td>{{ $averageTestScoreOfTheFirstThirtyPercentOfAdmitted?->department_of_education_title }}</td>
@endif
@if (filterCol('average_test_score_of_the_first_thirty_percent_of_admitted') == true)
    <td>{{ number_format($averageTestScoreOfTheFirstThirtyPercentOfAdmitted?->average_test_score_of_the_first_thirty_percent_of_admitted) }}
    </td>
@endif
@if (filterCol('year') == true)
    <td>{{ $averageTestScoreOfTheFirstThirtyPercentOfAdmitted?->year }}</td>
@endif
