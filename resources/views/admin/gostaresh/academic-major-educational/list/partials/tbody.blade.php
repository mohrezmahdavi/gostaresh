<td>{{ strip_trailing_zeros($academicMajorEducational?->province?->name) . ' - ' . strip_trailing_zeros($academicMajorEducational->county?->name) }}
</td>

@if (filterCol('department_of_education_title') == true)
    <td>{{ strip_trailing_zeros($academicMajorEducational?->department_of_education_title) }}</td>
@endif

@if (filterCol('azad_eslami_count') == true)
    <td>{{ strip_trailing_zeros($academicMajorEducational?->azad_eslami_count) }}</td>
@endif
@if (filterCol('azad_eslami_percent') == true)
    <td>{{ strip_trailing_zeros($academicMajorEducational?->azad_eslami_percent) }}</td>
@endif

@if (filterCol('dolati_count') == true)
    <td>{{ strip_trailing_zeros($academicMajorEducational?->dolati_count) }}</td>
@endif
@if (filterCol('dolati_percent') == true)
    <td>{{ strip_trailing_zeros($academicMajorEducational?->dolati_percent) }}</td>
@endif

@if (filterCol('medical_sciences_count') == true)
    <td>{{ strip_trailing_zeros($academicMajorEducational?->medical_sciences_count) }}</td>
@endif
@if (filterCol('medical_sciences_percent') == true)
    <td>{{ strip_trailing_zeros($academicMajorEducational?->medical_sciences_percent) }}</td>
@endif

@if (filterCol('farhangian_count') == true)
    <td>{{ strip_trailing_zeros($academicMajorEducational?->farhangian_count) }}</td>
@endif
@if (filterCol('farhangian_percent') == true)
    <td>{{ strip_trailing_zeros($academicMajorEducational?->farhangian_percent) }}</td>
@endif

@if (filterCol('fani_herfei_count') == true)
    <td>{{ strip_trailing_zeros($academicMajorEducational?->fani_herfei_count) }}</td>
@endif
@if (filterCol('fani_herfei_percent') == true)
    <td>{{ strip_trailing_zeros($academicMajorEducational?->fani_herfei_percent) }}</td>
@endif

@if (filterCol('payam_noor_count') == true)
    <td>{{ strip_trailing_zeros($academicMajorEducational?->payam_noor_count) }}</td>
@endif
@if (filterCol('payam_noor_percent') == true)
    <td>{{ strip_trailing_zeros($academicMajorEducational?->payam_noor_percent) }}</td>
@endif

@if (filterCol('gheir_entefai_count') == true)
    <td>{{ strip_trailing_zeros($academicMajorEducational?->gheir_entefai_count) }}</td>
@endif
@if (filterCol('gheir_entefai_percent') == true)
    <td>{{ strip_trailing_zeros($academicMajorEducational?->gheir_entefai_percent) }}</td>
@endif

@if (filterCol('elmi_karbordi_count') == true)
    <td>{{ strip_trailing_zeros($academicMajorEducational?->elmi_karbordi_count) }}</td>
@endif
@if (filterCol('elmi_karbordi_percent') == true)
    <td>{{ strip_trailing_zeros($academicMajorEducational?->elmi_karbordi_percent) }}</td>
@endif

@if (filterCol('year') == true)
    <td>{{ strip_trailing_zeros($academicMajorEducational?->year) }}</td>
@endif
