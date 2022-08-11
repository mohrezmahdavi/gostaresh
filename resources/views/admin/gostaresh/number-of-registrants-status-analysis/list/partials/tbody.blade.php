<td>{{ $numberOfRegistrant?->province?->name . ' - ' . $numberOfRegistrant->county?->name }}
</td>

@if (filterCol('university_type_title') == true)
    <td>{{ $numberOfRegistrant?->university_type_title }}</td>
@endif
@if (filterCol('gender_title') == true)
    <td>{{ $numberOfRegistrant?->gender_title }}</td>
@endif
@if (filterCol('grade_title') == true)
    <td>{{ $numberOfRegistrant?->grade_title }}</td>
@endif
@if (filterCol('department_of_education_title') == true)
    <td>{{ $numberOfRegistrant?->department_of_education_title }}</td>
@endif
@if (filterCol('number_of_registrants') == true)
    <td>{{ number_format($numberOfRegistrant?->number_of_registrants) }}</td>
@endif
@if (filterCol('year') == true)
    <td>{{ $numberOfRegistrant?->year }}</td>
@endif
