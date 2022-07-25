<td>{{ $statusAnalysisOfTheNumberOfFieldsOfStudy?->province?->name . ' - ' . $statusAnalysisOfTheNumberOfFieldsOfStudy->county?->name }}
</td>

@if (filterCol('unit') == true)
    <td>{{ $statusAnalysisOfTheNumberOfFieldsOfStudy?->unit }}</td>
@endif
@if (filterCol('total_number_of_fields_of_study') == true)
    <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->total_number_of_fields_of_study) }}</td>
@endif
@if (filterCol('number_of_international_courses') == true)
    <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_international_courses) }}</td>
@endif
@if (filterCol('number_of_virtual_courses') == true)
    <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_virtual_courses) }}</td>
@endif
@if (filterCol('number_of_technical_disciplines') == true)
    <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_technical_disciplines) }}</td>
@endif
@if (filterCol('number_of_courses_not_accepted') == true)
    <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_courses_not_accepted) }}</td>
@endif
@if (filterCol('number_of_courses_without_volunteers') == true)
    <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_courses_without_volunteers) }}</td>
@endif
@if (filterCol('number_of_GDP_courses') == true)
    <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_GDP_courses) }}</td>
@endif
@if (filterCol('number_of_disciplines_corresponding_to_job_fields') == true)
    <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_disciplines_corresponding_to_job_fields) }}
    </td>
@endif
@if (filterCol('number_of_fields_corresponding_to_the_specified_specialties') == true)
    <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_fields_corresponding_to_the_specified_specialties) }}
    </td>
@endif
@if (filterCol('number_of_courses_offered_virtually') == true)
    <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_courses_offered_virtually) }}</td>
@endif
@if (filterCol('number_of_popular_fields_more_than_eighty_percent_capacity') == true)
    <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_popular_fields_more_than_eighty_percent_capacity) }}
    </td>
@endif
@if (filterCol('number_of_courses_with_low_audience') == true)
    <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_courses_with_low_audience) }}</td>
@endif
@if (filterCol('number_of_fields_of_less_than_5_people') == true)
    <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_fields_of_less_than_5_people) }}</td>
@endif
@if (filterCol('number_of_courses_without_admission') == true)
    <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_courses_without_admission) }}</td>
@endif
@if (filterCol('number_of_popular_fields') == true)
    <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_popular_fields) }}</td>
@endif
@if (filterCol('low_number_of_applicants') == true)
    <td>{{ number_format($statusAnalysisOfTheNumberOfFieldsOfStudy?->low_number_of_applicants) }}</td>
@endif
@if (filterCol('year') == true)
    <td>{{ $statusAnalysisOfTheNumberOfFieldsOfStudy?->year }}</td>
@endif
