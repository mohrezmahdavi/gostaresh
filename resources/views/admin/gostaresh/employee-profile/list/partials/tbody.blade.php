<td>{{ $employeeProfile?->province?->name . ' - ' . $employeeProfile?->county?->name }}
</td>
@if (filterCol('university_type_title') == true)
<td>{{ $employeeProfile?->university_type_title }}</td>
@endif
@if (filterCol('number_of_non_faculty_staff') == true)
<td>{{ number_format((int) $employeeProfile?->number_of_non_faculty_staff) }}</td>
@endif
@if (filterCol('average_age_of_employees') == true)
<td>{{ $employeeProfile?->average_age_of_employees }}</td>
@endif
@if (filterCol('number_of_male_employees') == true)
<td>{{ number_format((int) $employeeProfile?->number_of_male_employees) }}</td>
@endif
@if (filterCol('number_of_female_employees') == true)
<td>{{ number_format((int) $employeeProfile?->number_of_female_employees) }}</td>
@endif
@if (filterCol('number_of_administrative_staff') == true)
<td>{{ number_format((int) $employeeProfile?->number_of_administrative_staff) }}</td>
@endif
@if (filterCol('number_of_training_staff') == true)
<td>{{ number_format((int) $employeeProfile?->number_of_training_staff) }}</td>
@endif
@if (filterCol('number_of_research_staff') == true)
<td>{{ number_format((int) $employeeProfile?->number_of_research_staff) }}</td>
@endif
@if (filterCol('number_of_PhD_staff') == true)
<td>{{ number_format((int) $employeeProfile?->number_of_PhD_staff) }}</td>
@endif
@if (filterCol('number_of_master_staff') == true)
<td>{{ number_format((int) $employeeProfile?->number_of_master_staff) }}</td>
@endif
@if (filterCol('number_of_expert_staff') == true)
<td>{{ number_format((int) $employeeProfile?->number_of_expert_staff) }}</td>
@endif
@if (filterCol('number_of_diploma_and_sub_diploma_employees') == true)
<td>{{ number_format((int) $employeeProfile?->number_of_diploma_and_sub_diploma_employees) }}</td>
@endif
@if (filterCol('number_of_employees_studying') == true)
<td>{{ number_format((int) $employeeProfile?->number_of_employees_studying) }}</td>
@endif
@if (filterCol('growth_rate') == true)
<td>{{ $employeeProfile?->growth_rate }}</td>
@endif


<td>{{ $employeeProfile?->year }}</td>
