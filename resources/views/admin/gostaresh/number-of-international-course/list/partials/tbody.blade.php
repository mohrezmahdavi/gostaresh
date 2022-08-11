<td>{{ $numberOfInternationalCourse?->province?->name . ' - ' . $numberOfInternationalCourse->county?->name }}
</td>


@if (filterCol('unit') == true)
    <td>{{ $numberOfInternationalCourse?->unit }}</td>
@endif
@if (filterCol('department_of_education_title') == true)
    <td>{{ $numberOfInternationalCourse?->department_of_education_title }}</td>
@endif
@if (filterCol('gender_title') == true)
    <td>{{ $numberOfInternationalCourse?->gender_title }}</td>
@endif
@if (filterCol('kardani_count') == true)
    <td>{{ number_format($numberOfInternationalCourse?->kardani_count) }}</td>
@endif
@if (filterCol('karshenasi_count') == true)
    <td>{{ number_format($numberOfInternationalCourse?->karshenasi_count) }}</td>
@endif
@if (filterCol('karshenasi_arshad_count') == true)
    <td>{{ number_format($numberOfInternationalCourse?->karshenasi_arshad_count) }}</td>
@endif
@if (filterCol('docktora_count') == true)
    <td>{{ number_format($numberOfInternationalCourse?->docktora_count) }}</td>
@endif
@if (filterCol('year') == true)
    <td>{{ $numberOfInternationalCourse?->year }}</td>
@endif
