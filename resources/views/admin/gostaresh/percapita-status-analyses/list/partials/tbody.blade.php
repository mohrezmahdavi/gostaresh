<td>{{ $percapitaStatusAnalys?->province?->name . ' - ' . $percapitaStatusAnalys?->county?->name }}
</td>
@if (filterCol('unit') == true)
<td>{{ $percapitaStatusAnalys?->unit }}</td>
@endif
@if (filterCol('percapita_office_space') == true)
<td>{{ $percapitaStatusAnalys?->percapita_office_space }}</td>
@endif
@if (filterCol('percapita_educational_space') == true)
<td>{{ $percapitaStatusAnalys?->percapita_educational_space }}</td>
@endif
@if (filterCol('percapita_innovation_space') == true)
<td>{{ $percapitaStatusAnalys?->percapita_innovation_space }}</td>
@endif
@if (filterCol('percapita_cultural_space') == true)
<td>{{ $percapitaStatusAnalys?->percapita_cultural_space }}</td>
@endif
@if (filterCol('percapita_civil_space') == true)
<td>{{ $percapitaStatusAnalys?->percapita_civil_space }}</td>
@endif
@if (filterCol('building_under_construction') == true)
<td>{{ $percapitaStatusAnalys?->building_under_construction }}</td>
@endif
@if (filterCol('percapita_residential') == true)
<td>{{ $percapitaStatusAnalys?->percapita_residential }}</td>
@endif
@if (filterCol('percapita_operating_buildings') == true)
<td>{{ $percapitaStatusAnalys?->percapita_operating_buildings }}</td>
@endif
@if (filterCol('percapita_sports_space') == true)
<td>{{ $percapitaStatusAnalys?->percapita_sports_space }}</td>
@endif
@if (filterCol('percapita_aristocratic_space') == true)
<td>{{ $percapitaStatusAnalys?->percapita_aristocratic_space }}</td>
@endif
@if (filterCol('percapita_arena_space') == true)
<td>{{ $percapitaStatusAnalys?->percapita_arena_space }}</td>
@endif

<td>{{ $percapitaStatusAnalys?->year }}</td>
