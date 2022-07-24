<td>{{ $universityCost?->province?->name . ' - ' . $universityCost?->county?->name }}
</td>

@if (filterCol('unit') == true)
<td>{{ $universityCost?->unit }}</td>
@endif
@if (filterCol('payment_to_faculty_members') == true)
<td>{{ number_format((int) $universityCost?->payment_to_faculty_members ) }}</td>
@endif
@if (filterCol('total_running_costs') == true)
<td>{{ number_format((int) $universityCost?->total_running_costs ) }}</td>
@endif                                        
@if (filterCol('average_salary_of_faculty_members') == true)
<td>{{ number_format((int) $universityCost?->average_salary_of_faculty_members ) }}</td>
@endif                          
@if (filterCol('average_salaries_of_faculty_members_from_research_contracts') == true)
<td>{{ number_format((int) $universityCost?->average_salaries_of_faculty_members_from_research_contracts ) }}</td>
@endif
@if (filterCol('student_fees') == true)
<td>{{ number_format((int) $universityCost?->student_fees ) }}</td>
@endif                                               
@if (filterCol('average_salary_of_employees') == true)
<td>{{ number_format((int) $universityCost?->average_salary_of_employees ) }}</td>
@endif                                
@if (filterCol('current_expenditure_growth_rate') == true)
<td>{{ number_format((int) $universityCost?->current_expenditure_growth_rate ) }}</td>
@endif                            
@if (filterCol('cost_of_paying_office_rent') == true)
<td>{{ number_format((int) $universityCost?->cost_of_paying_office_rent ) }}</td>
@endif                                
@if (filterCol('cost_of_rent_for_educational_building') == true)
<td>{{ number_format((int) $universityCost?->cost_of_rent_for_educational_building ) }}</td>
@endif                      
@if (filterCol('cost_of_rent_for_research_building') == true)
<td>{{ number_format((int) $universityCost?->cost_of_rent_for_research_building ) }}</td>
@endif                         
@if (filterCol('extra_charge_for_rent_extracurricular_building') == true)
<td>{{ number_format((int) $universityCost?->extra_charge_for_rent_extracurricular_building ) }}</td>
@endif             
@if (filterCol('cost_of_rent_innovation_buildings') == true)
<td>{{ number_format((int) $universityCost?->cost_of_rent_innovation_buildings ) }}</td>
@endif                          
@if (filterCol('energy_costs_of_buildings') == true)
<td>{{ number_format((int) $universityCost?->energy_costs_of_buildings ) }}</td>
@endif                                
@if (filterCol('cost_of_university_equipment') == true)
<td>{{ number_format((int) $universityCost?->cost_of_university_equipment ) }}</td>
@endif                              
@if (filterCol('training_costs') == true)
<td>{{ number_format((int) $universityCost?->training_costs ) }}</td>
@endif                                             
@if (filterCol('research_costs') == true)
<td>{{ number_format((int) $universityCost?->research_costs ) }}</td>
@endif                                             
@if (filterCol('innovation_costs') == true)
<td>{{ number_format((int) $universityCost?->innovation_costs ) }}</td>
@endif                                           
@if (filterCol('educational_costs') == true)
<td>{{ number_format((int) $universityCost?->educational_costs ) }}</td>
@endif                                         
@if (filterCol('development_costs') == true)
<td>{{ number_format((int) $universityCost?->development_costs ) }}</td>
@endif                                           
@if (filterCol('cultural_sphere_costs') == true)
<td>{{ number_format((int) $universityCost?->cultural_sphere_costs ) }}</td>
@endif                                   
@if (filterCol('administrative_costs') == true)
<td>{{ number_format((int) $universityCost?->administrative_costs ) }}</td>
@endif                                       
@if (filterCol('information_technology_costs') == true)
<td>{{ number_format((int) $universityCost?->information_technology_costs ) }}</td>
@endif                               
@if (filterCol('International_sphere_costs') == true)
<td>{{ number_format((int) $universityCost?->International_sphere_costs ) }}</td>
@endif                                
@if (filterCol('costs_of_staff_training_and_faculty') == true)
<td>{{ number_format((int) $universityCost?->costs_of_staff_training_and_faculty ) }}</td>
@endif                       
@if (filterCol('sports_expenses') == true)
<td>{{ number_format((int) $universityCost?->sports_expenses ) }}</td>
@endif                                            
@if (filterCol('health_costs') == true)
<td>{{ number_format((int) $universityCost?->health_costs ) }}</td>
@endif                                               
@if (filterCol('entrepreneurship_costs') == true)
<td>{{ number_format((int) $universityCost?->entrepreneurship_costs ) }}</td>
@endif                                     
@if (filterCol('graduate_costs') == true)
<td>{{ number_format((int) $universityCost?->graduate_costs ) }}</td>
@endif                                             
@if (filterCol('branding_costs') == true)
<td>{{ number_format((int) $universityCost?->branding_costs ) }}</td>
@endif                                            

<td>{{ $universityCost?->year }}</td>
<td>{{ $universityCost?->month }}</td>
