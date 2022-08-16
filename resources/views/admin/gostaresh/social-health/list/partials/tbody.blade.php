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
@if (filterCol('associate_degree') == true)
    <td>{{ $socialHealth?->associate_degree }}</td>
@endif
@if (filterCol('bachelor_degree') == true)
    <td>{{ $socialHealth?->bachelor_degree }}</td>
@endif
@if (filterCol('masters') == true)
    <td>{{ $socialHealth?->masters }}</td>
@endif
@if (filterCol('professional_doctor') == true)
    <td>{{ $socialHealth?->professional_doctor }}</td>
@endif
@if (filterCol('phd') == true)
    <td>{{ $socialHealth?->phd }}</td>
@endif

<td>{{ $socialHealth?->year }}</td>
