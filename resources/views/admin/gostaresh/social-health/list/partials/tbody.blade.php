<td>{{ $socialHealth?->province?->name . ' - ' . $socialHealth?->county?->name }}
</td>
@if (filterCol('unit') == true)
<td>{{ $socialHealth?->unit }}</td>
@endif
@if (filterCol('component_title') == true)
<td>{{ $socialHealth?->component_title }}</td>
@endif
@if (filterCol('gender') == true)
<td>{{ $socialHealth?->gender }}</td>
@endif
@if (filterCol('grade') == true)
    <td>{{ $socialHealth?->grade_title }}</td>
@endif
@if (filterCol('associate_degree') == true)
<td>{{ number_format((int) $socialHealth?->associate_degree) }}</td>
@endif
@if (filterCol('bachelor_degree') == true)
<td>{{ number_format((int) $socialHealth?->bachelor_degree) }}</td>
@endif
@if (filterCol('masters') == true)
<td>{{ number_format((int) $socialHealth?->masters) }}</td>
@endif
@if (filterCol('professional_doctor') == true)
<td>{{ number_format((int) $socialHealth?->professional_doctor) }}</td>
@endif
@if (filterCol('phd') == true)
<td>{{ number_format((int) $socialHealth?->phd) }}</td>
@endif

<td>{{ $socialHealth?->year }}</td>
<td>{{ $socialHealth?->month }}</td>
