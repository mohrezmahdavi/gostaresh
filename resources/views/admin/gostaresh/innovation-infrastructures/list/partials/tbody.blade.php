<td>{{ $innovationInfrastructure?->province?->name . ' - ' . $innovationInfrastructure?->county?->name }}
</td>
@if (filterCol('unit') == true)
<td>{{ $innovationInfrastructure?->unit }}</td>
@endif
@if (filterCol('number_of_active_innovation_houses') == true)
<td>{{ $innovationInfrastructure?->number_of_active_innovation_houses }}</td>
@endif
@if (filterCol('number_of_active_accelerators') == true)
<td>{{ $innovationInfrastructure?->number_of_active_accelerators }}</td>
@endif
@if (filterCol('number_of_active_growth_centers') == true)
<td>{{ $innovationInfrastructure?->number_of_active_growth_centers }}</td>
@endif
@if (filterCol('number_of_active_technology_cores') == true)
<td>{{ $innovationInfrastructure?->number_of_active_technology_cores }}</td>
@endif
@if (filterCol('number_of_active_skill_high_schools') == true)
<td>{{ $innovationInfrastructure?->number_of_active_skill_high_schools }}</td>
@endif
@if (filterCol('number_of_skill_training_centers') == true)
<td>{{ $innovationInfrastructure?->number_of_skill_training_centers }}</td>
@endif
@if (filterCol('number_of_research_centers') == true)
<td>{{ $innovationInfrastructure?->number_of_research_centers }}</td>
@endif
@if (filterCol('number_of_development_offices') == true)
<td>{{ $innovationInfrastructure?->number_of_development_offices }}</td>
@endif
@if (filterCol('number_of_industry_trade_offices') == true)
<td>{{ $innovationInfrastructure?->number_of_industry_trade_offices }}</td>
@endif
@if (filterCol('number_of_entrepreneurship_centers') == true)
<td>{{ $innovationInfrastructure?->number_of_entrepreneurship_centers }}</td>
@endif

<td>{{ $innovationInfrastructure?->year }}</td>
