<td>{{ $universityCost?->province?->name . ' - ' . $universityCost?->county?->name }}
</td>

@if (filterCol('unit') == true)
<td>{{ $universityCost?->unit }}</td>
@endif
@if (filterCol('training_costs') == true)
<td>{{ $universityCost?->training_costs }}</td>
@endif
@if (filterCol('research_costs') == true)
<td>{{ $universityCost?->research_costs }}</td>
@endif
@if (filterCol('innovation_costs') == true)
<td>{{ $universityCost?->innovation_costs }}</td>
@endif
@if (filterCol('educational_costs') == true)
<td>{{ $universityCost?->educational_costs }}</td>
@endif
@if (filterCol('development_costs') == true)
<td>{{ $universityCost?->development_costs }}</td>
@endif
@if (filterCol('cultural_sphere_costs') == true)
<td>{{ $universityCost?->cultural_sphere_costs }}</td>
@endif
@if (filterCol('administrative_costs') == true)
<td>{{ $universityCost?->administrative_costs }}</td>
@endif
@if (filterCol('information_technology_costs') == true)
<td>{{ $universityCost?->information_technology_costs }}</td>
@endif
@if (filterCol('International_sphere_costs') == true)
<td>{{ $universityCost?->International_sphere_costs }}</td>
@endif
@if (filterCol('costs_of_staff_training_and_faculty') == true)
<td>{{ $universityCost?->costs_of_staff_training_and_faculty }}</td>
@endif
@if (filterCol('sports_expenses') == true)
<td>{{ $universityCost?->sports_expenses }}</td>
@endif
@if (filterCol('health_costs') == true)
<td>{{ $universityCost?->health_costs }}</td>
@endif
@if (filterCol('entrepreneurship_costs') == true)
<td>{{ $universityCost?->entrepreneurship_costs }}</td>
@endif
@if (filterCol('graduate_costs') == true)
<td>{{ $universityCost?->graduate_costs }}</td>
@endif
@if (filterCol('branding_costs') == true)
<td>{{ $universityCost?->branding_costs }}</td>
@endif

<td>{{ $universityCost?->year }}</td>
