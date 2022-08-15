<td>{{ $internationalStudentGrowthRate?->province?->name . ' - ' . $internationalStudentGrowthRate->county?->name }}
</td>

@if (filterCol('unit') == true)
    <td>{{ $internationalStudentGrowthRate?->unit }}</td>
@endif
@if (filterCol('department_of_education_title') == true)
    <td>{{ $internationalStudentGrowthRate?->department_of_education_title }}</td>
@endif
@if (filterCol('gender_title') == true)
    <td>{{ $internationalStudentGrowthRate?->gender_title }}</td>
@endif
@if (filterCol('kardani_count') == true)
    <td>{{ $internationalStudentGrowthRate?->kardani_count }}</td>
@endif
@if (filterCol('karshenasi_count') == true)
    <td>{{ $internationalStudentGrowthRate?->karshenasi_count }}</td>
@endif
@if (filterCol('karshenasi_arshad_count') == true)
    <td>{{ $internationalStudentGrowthRate?->karshenasi_arshad_count }}</td>
@endif
@if (filterCol('docktora_count') == true)
    <td>{{ $internationalStudentGrowthRate?->docktora_count }}</td>
@endif
@if (filterCol('year') == true)
    <td>{{ $internationalStudentGrowthRate?->year }}</td>
@endif
