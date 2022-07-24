<td>{{ $assetProduct?->province?->name . ' - ' . $assetProduct?->county?->name }}
</td>
@if (filterCol('unit') == true)
<td>{{ $assetProduct?->unit }}</td>
@endif
@if (filterCol('office_space_utilization_rate') == true)
<td>{{ $assetProduct?->office_space_utilization_rate }}</td>
@endif
@if (filterCol('utilization_rate_of_educational_equipment') == true)
<td>{{ $assetProduct?->utilization_rate_of_educational_equipment }}</td>
@endif
@if (filterCol('utilization_rate_of_technology_equipment') == true)
<td>{{ $assetProduct?->utilization_rate_of_technology_equipment }}</td>
@endif
@if (filterCol('utilization_rate_of_cultural_equipment') == true)
<td>{{ $assetProduct?->utilization_rate_of_cultural_equipment }}</td>
@endif
@if (filterCol('utilization_rate_of_sports_equipment') == true)
<td>{{ $assetProduct?->utilization_rate_of_sports_equipment }}</td>
@endif
@if (filterCol('operation_rate_of_agricultural_equipment') == true)
<td>{{ $assetProduct?->operation_rate_of_agricultural_equipment }}</td>
@endif
@if (filterCol('operation_rate_of_workshop_equipment') == true)
<td>{{ $assetProduct?->operation_rate_of_workshop_equipment }}</td>
@endif
@if (filterCol('faculty_capacity_utilization_rate') == true)
<td>{{ $assetProduct?->faculty_capacity_utilization_rate }}</td>
@endif
@if (filterCol('employee_capacity_utilization_rate') == true)
<td>{{ $assetProduct?->employee_capacity_utilization_rate }}</td>
@endif
@if (filterCol('graduate_capacity_utilization_rate') == true)
<td>{{ $assetProduct?->graduate_capacity_utilization_rate }}</td>
@endif
@if (filterCol('student_capacity_utilization_rate') == true)
<td>{{ $assetProduct?->student_capacity_utilization_rate }}</td>
@endif
@if (filterCol('ratio_of_faculty_members_to_students') == true)
<td>{{ $assetProduct?->ratio_of_faculty_members_to_students }}</td>
@endif
@if (filterCol('ratio_of_staff_to_students') == true)
<td>{{ $assetProduct?->ratio_of_staff_to_students }}</td>
@endif
@if (filterCol('ratio_of_faculty_members_to_teaching_professors') == true)
<td>{{ $assetProduct?->ratio_of_faculty_members_to_teaching_professors }}</td>
@endif
@if (filterCol('ratio_of_faculty_members_to_employees') == true)
<td>{{ $assetProduct?->ratio_of_faculty_members_to_employees }}</td>
@endif
@if (filterCol('ratio_of_unit_faculty_members_to_faculty_members_of_the_province') == true)
<td>{{ $assetProduct?->ratio_of_unit_faculty_members_to_faculty_members_of_the_province }}</td>
@endif
@if (filterCol('ratio_of_unit_students_to_students_of_the_province') == true)
<td>{{ $assetProduct?->ratio_of_unit_students_to_students_of_the_province }}</td>
@endif
@if (filterCol('ratio_of_unit_employees_to_provincial_employees') == true)
<td>{{ $assetProduct?->ratio_of_unit_employees_to_provincial_employees }}</td>
@endif
@if (filterCol('unit_teaching_professors_to_teaching_professors_province') == true)
<td>{{ $assetProduct?->unit_teaching_professors_to_teaching_professors_province }}</td>
@endif

<td>{{ $assetProduct?->year }}</td>
<td>{{ $assetProduct?->month }}</td>
