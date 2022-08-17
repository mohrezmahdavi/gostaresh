<td>{{ $academicMajorEducational?->province?->name . ' - ' . $academicMajorEducational->county?->name }}
</td>

@if (filterCol('department_of_education_title') == true)
    <td>{{ $academicMajorEducational?->department_of_education_title }}</td>
@endif

@if (filterCol('azad_eslami_count') == true)
    <td>{{ $academicMajorEducational?->azad_eslami_count }}</td>
@endif
@if (filterCol('azad_eslami_percent') == true)
    <td>{{ $academicMajorEducational?->azad_eslami_percent }}</td>
@endif

@if (filterCol('dolati_count') == true)
    <td>{{ $academicMajorEducational?->dolati_count }}</td>
@endif
@if (filterCol('dolati_percent') == true)
    <td>{{ $academicMajorEducational?->dolati_percent }}</td>
@endif

@if (filterCol('medical_sciences_count') == true)
    <td>{{ $academicMajorEducational?->medical_sciences_count }}</td>
@endif
@if (filterCol('medical_sciences_percent') == true)
    <td>{{ $academicMajorEducational?->medical_sciences_percent }}</td>
@endif

@if (filterCol('farhangian_count') == true)
    <td>{{ $academicMajorEducational?->farhangian_count }}</td>
@endif
@if (filterCol('farhangian_percent') == true)
    <td>{{ $academicMajorEducational?->farhangian_percent }}</td>
@endif

@if (filterCol('fani_herfei_count') == true)
    <td>{{ $academicMajorEducational?->fani_herfei_count }}</td>
@endif
@if (filterCol('fani_herfei_percent') == true)
    <td>{{ $academicMajorEducational?->fani_herfei_percent }}</td>
@endif

@if (filterCol('payam_noor_count') == true)
    <td>{{ $academicMajorEducational?->payam_noor_count }}</td>
@endif
@if (filterCol('payam_noor_percent') == true)
    <td>{{ $academicMajorEducational?->payam_noor_percent }}</td>
@endif

@if (filterCol('gheir_entefai_count') == true)
    <td>{{ $academicMajorEducational?->gheir_entefai_count }}</td>
@endif
@if (filterCol('gheir_entefai_percent') == true)
    <td>{{ $academicMajorEducational?->gheir_entefai_percent }}</td>
@endif

@if (filterCol('elmi_karbordi_count') == true)
    <td>{{ $academicMajorEducational?->elmi_karbordi_count }}</td>
@endif
@if (filterCol('elmi_karbordi_percent') == true)
    <td>{{ $academicMajorEducational?->elmi_karbordi_percent }}</td>
@endif

@if (filterCol('year') == true)
    <td>{{ $academicMajorEducational?->year }}</td>
@endif
