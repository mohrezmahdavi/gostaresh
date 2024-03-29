<td>{{ $universityCost?->province?->name . ' - ' . $universityCost?->county?->name }}
</td>

@if (filterCol('unit') == true)
<td>{{ $universityCost?->unit }}</td>
@endif
@if (filterCol('payment_to_faculty_members') == true)
<td>{{ $universityCost?->payment_to_faculty_members }}</td>
@endif
@if (filterCol('total_running_costs') == true)
<td>{{ $universityCost?->total_running_costs }}</td>
@endif
@if (filterCol('average_salary_of_faculty_members') == true)
<td>{{ $universityCost?->average_salary_of_faculty_members }}</td>
@endif
@if (filterCol('average_salaries_of_faculty_members_from_research_contracts') == true)
<td>{{ $universityCost?->average_salaries_of_faculty_members_from_research_contracts }}</td>
@endif
@if (filterCol('student_fees') == true)
<td>{{ $universityCost?->student_fees }}</td>
@endif
@if (filterCol('average_salary_of_employees') == true)
<td>{{ $universityCost?->average_salary_of_employees }}</td>
@endif
@if (filterCol('current_expenditure_growth_rate') == true)
<td>{{ $universityCost?->current_expenditure_growth_rate }}</td>
@endif
@if (filterCol('cost_of_paying_office_rent') == true)
<td>{{ $universityCost?->cost_of_paying_office_rent }}</td>
@endif
@if (filterCol('cost_of_rent_for_educational_building') == true)
<td>{{ $universityCost?->cost_of_rent_for_educational_building }}</td>
@endif
@if (filterCol('cost_of_rent_for_research_building') == true)
<td>{{ $universityCost?->cost_of_rent_for_research_building }}</td>
@endif
@if (filterCol('extra_charge_for_rent_extracurricular_building') == true)
<td>{{ $universityCost?->extra_charge_for_rent_extracurricular_building }}</td>
@endif
@if (filterCol('cost_of_rent_innovation_buildings') == true)
<td>{{ $universityCost?->cost_of_rent_innovation_buildings }}</td>
@endif
@if (filterCol('energy_costs_of_buildings') == true)
<td>{{ $universityCost?->energy_costs_of_buildings }}</td>
@endif
@if (filterCol('cost_of_university_equipment') == true)
<td>{{ $universityCost?->cost_of_university_equipment }}</td>
@endif
{{--@if (filterCol('training_costs') == true)--}}
{{--<td>{{ $universityCost?->training_costs }}</td>--}}
{{--@endif                                             --}}
{{--@if (filterCol('research_costs') == true)--}}
{{--<td>{{ $universityCost?->research_costs ) }}</td>--}}
{{--@endif                                             --}}
{{--@if (filterCol('innovation_costs') == true)--}}
{{--<td>{{ $universityCost?->innovation_costs }}</td>--}}
{{--@endif                                           --}}
{{--@if (filterCol('educational_costs') == true)--}}
{{--<td>{{ $universityCost?->educational_costs }}</td>--}}
{{--@endif                                         --}}
{{--@if (filterCol('development_costs') == true)--}}
{{--<td>{{ $universityCost?->development_costs }}</td>--}}
{{--@endif                                           --}}
{{--@if (filterCol('cultural_sphere_costs') == true)--}}
{{--<td>{{ $universityCost?->cultural_sphere_costs }}</td>--}}
{{--@endif                                   --}}
{{--@if (filterCol('administrative_costs') == true)--}}
{{--<td>{{ $universityCost?->administrative_costs }}</td>--}}
{{--@endif                                       --}}
{{--@if (filterCol('information_technology_costs') == true)--}}
{{--<td>{{ $universityCost?->information_technology_costs }}</td>--}}
{{--@endif                               --}}
{{--@if (filterCol('International_sphere_costs') == true)--}}
{{--<td>{{ $universityCost?->International_sphere_costs }}</td>--}}
{{--@endif                                --}}
{{--@if (filterCol('costs_of_staff_training_and_faculty') == true)--}}
{{--<td>{{ $universityCost?->costs_of_staff_training_and_faculty }}</td>--}}
{{--@endif                       --}}
{{--@if (filterCol('sports_expenses') == true)--}}
{{--<td>{{ $universityCost?->sports_expenses }}</td>--}}
{{--@endif                                            --}}
{{--@if (filterCol('health_costs') == true)--}}
{{--<td>{{ $universityCost?->health_costs }}</td>--}}
{{--@endif                                               --}}
{{--@if (filterCol('entrepreneurship_costs') == true)--}}
{{--<td>{{ $universityCost?->entrepreneurship_costs }}</td>--}}
{{--@endif                                     --}}
{{--@if (filterCol('graduate_costs') == true)--}}
{{--<td>{{ $universityCost?->graduate_costs }}</td>--}}
{{--@endif                                             --}}
{{--@if (filterCol('branding_costs') == true)--}}
{{--<td>{{ $universityCost?->branding_costs }}</td>--}}
{{--@endif                                            --}}

<td>{{ $universityCost?->year }}</td>
