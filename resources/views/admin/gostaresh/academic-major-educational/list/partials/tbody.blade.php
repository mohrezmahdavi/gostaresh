<td>{{ $academicMajorEducational?->province?->name . ' - ' . $academicMajorEducational->county?->name }}
</td>

@if (filterCol('department_of_education_title') == true)
    <td>{{ $academicMajorEducational?->department_of_education_title }}</td>
@endif
@if (filterCol('azad_eslami_count') == true)
    <td>{{ number_format($academicMajorEducational?->azad_eslami_count) }}</td>
@endif
@if (filterCol('dolati_count') == true)
    <td>{{ number_format($academicMajorEducational?->dolati_count) }}</td>
@endif
@if (filterCol('payam_noor_count') == true)
    <td>{{ number_format($academicMajorEducational?->payam_noor_count) }}</td>
@endif
@if (filterCol('gheir_entefai_count') == true)
    <td>{{ number_format($academicMajorEducational?->gheir_entefai_count) }}</td>
@endif
@if (filterCol('elmi_karbordi_count') == true)
    <td>{{ number_format($academicMajorEducational?->elmi_karbordi_count) }}</td>
@endif
@if (filterCol('year') == true)
    <td>{{ $academicMajorEducational?->year }}</td>
@endif
