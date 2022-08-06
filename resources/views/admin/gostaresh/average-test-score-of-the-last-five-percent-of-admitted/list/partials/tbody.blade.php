<td>{{ $averageTestScoreOfTheLastFivePercentOfAdmitted?->province?->name . ' - ' . $averageTestScoreOfTheLastFivePercentOfAdmitted->county?->name }}
</td>

@if (filterCol('university_type_title') == true)
    <td>{{ $averageTestScoreOfTheLastFivePercentOfAdmitted?->university_type_title }}</td>
@endif
@if (filterCol('gender_title') == true)
    <td>{{ $averageTestScoreOfTheLastFivePercentOfAdmitted?->gender_title }}</td>
@endif
@if (filterCol('grade_title') == true)
    <td>{{ $averageTestScoreOfTheLastFivePercentOfAdmitted?->grade_title }}</td>
@endif
@if (filterCol('department_of_education_title') == true)
    <td>{{ $averageTestScoreOfTheLastFivePercentOfAdmitted?->department_of_education_title }}</td>
@endif
@if (filterCol('average_test_score_of_the_last_five_percent_of_admitted') == true)
    <td>{{ number_format($averageTestScoreOfTheLastFivePercentOfAdmitted?->average_test_score_of_the_last_five_percent_of_admitted) }}
    </td>
@endif
@if (filterCol('year') == true)
    <td>{{ $averageTestScoreOfTheLastFivePercentOfAdmitted?->year }}</td>
@endif
