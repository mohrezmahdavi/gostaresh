<td>{{ $statusAnalysisOfTheNumberOfCourse?->province?->name . ' - ' . $statusAnalysisOfTheNumberOfCourse->county?->name }}
</td>


@if (filterCol('unit') == true)
    <td>{{ $statusAnalysisOfTheNumberOfCourse?->unit }}</td>
@endif
@if (filterCol('total_number_of_courses') == true)
    <td>{{ number_format($statusAnalysisOfTheNumberOfCourse?->total_number_of_courses) }}</td>
@endif
@if (filterCol('number_of_international_Persian_language_courses_in_person') == true)
    <td>{{ number_format($statusAnalysisOfTheNumberOfCourse?->number_of_international_Persian_language_courses_in_person) }}
    </td>
@endif
@if (filterCol('number_of_international_virtual_Persian_language_courses') == true)
    <td>{{ number_format($statusAnalysisOfTheNumberOfCourse?->number_of_international_virtual_Persian_language_courses) }}
    </td>
@endif
@if (filterCol('number_of_international_courses_in_the_target_language_in_person') == true)
    <td>{{ number_format($statusAnalysisOfTheNumberOfCourse?->number_of_international_courses_in_the_target_language_in_person) }}
    </td>
@endif
@if (filterCol('number_of_international_courses_in_the_target_language_virtually') == true)
    <td>{{ number_format($statusAnalysisOfTheNumberOfCourse?->number_of_international_courses_in_the_target_language_virtually) }}
    </td>
@endif
@if (filterCol('year') == true)
    <td>{{ $statusAnalysisOfTheNumberOfCourse?->year }}</td>
@endif
