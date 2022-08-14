<td>{{ $unitsGeneralStatus?->province?->name . ' - ' . $unitsGeneralStatus?->county?->name }}
</td>

@if (filterCol('unit') == true)
<td>{{ $unitsGeneralStatus?->unit }}</td>
@endif
@if (filterCol('degree/rank') == true)
<td>{{ $unitsGeneralStatus['degree/rank'] }}</td>
@endif
@if (filterCol('score') == true)
<td>{{ $unitsGeneralStatus?->score }}</td>
@endif
@if (filterCol('established_year') == true)
<td>{{ $unitsGeneralStatus?->established_year }}</td>
@endif
@if (filterCol('approved_number_and_titles_of_the_faculty') == true)
<td>{{ $unitsGeneralStatus?->approved_number_and_titles_of_the_faculty }}</td>
@endif  

<td>{{ $unitsGeneralStatus?->year }}</td>
