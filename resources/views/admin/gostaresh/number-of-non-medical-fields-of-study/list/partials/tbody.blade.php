<td>{{ $numberOfNonMedicalFieldsOfStudy?->province?->name . ' - ' . $numberOfNonMedicalFieldsOfStudy->county?->name }}
</td>

<td>{{ $numberOfNonMedicalFieldsOfStudy?->department_of_education_title }}</td>
@if (filterCol('kardani_peyvaste_count') == true)
    <td>{{ $numberOfNonMedicalFieldsOfStudy?->kardani_peyvaste_count }}</td>
@endif
@if (filterCol('kardani_na_peyvaste_count') == true)
    <td>{{ $numberOfNonMedicalFieldsOfStudy?->kardani_na_peyvaste_count }}</td>
@endif
@if (filterCol('karshenasi_peyvaste_count') == true)
    <td>{{ $numberOfNonMedicalFieldsOfStudy?->karshenasi_peyvaste_count }}</td>
@endif
@if (filterCol('karshenasi_na_peyvaste_count') == true)
    <td>{{ $numberOfNonMedicalFieldsOfStudy?->karshenasi_na_peyvaste_count }}</td>
@endif
@if (filterCol('karshenasi_arshad_count') == true)
    <td>{{ $numberOfNonMedicalFieldsOfStudy?->karshenasi_arshad_count }}</td>
@endif
@if (filterCol('docktora_herfei_count') == true)
    <td>{{ $numberOfNonMedicalFieldsOfStudy?->docktora_herfei_count }}</td>
@endif
@if (filterCol('docktora_takhasosi_count') == true)
    <td>{{ $numberOfNonMedicalFieldsOfStudy?->docktora_takhasosi_count }}</td>
@endif
@if (filterCol('year') == true)
    <td>{{ $numberOfNonMedicalFieldsOfStudy?->year }}</td>
@endif
