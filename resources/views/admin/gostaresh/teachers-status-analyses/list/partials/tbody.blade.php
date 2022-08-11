<td>{{ $teachersStatusAnalys?->province?->name . ' - ' . $teachersStatusAnalys?->county?->name }}
</td>

@if (filterCol('unit') == true)
<td>{{ $teachersStatusAnalys?->unit }}</td>
@endif
@if (filterCol('number_of_faculty_members') == true)
<td>{{ number_format((int) $teachersStatusAnalys?->number_of_faculty_members) }}</td>
@endif
@if (filterCol('scientific_programs_faculty_members') == true)
<td>{{ number_format((int) $teachersStatusAnalys?->scientific_programs_faculty_members) }}</td>
@endif
@if (filterCol('upgraded_faculty_members') == true)
<td>{{ number_format((int) $teachersStatusAnalys?->upgraded_faculty_members) }}</td>
@endif
@if (filterCol('number_of_tuition_teachers') == true)
<td>{{ number_format((int) $teachersStatusAnalys?->number_of_tuition_teachers) }}</td>
@endif
@if (filterCol('number_of_officer_faculty_members_in_other_unit') == true)
<td>{{ number_format((int) $teachersStatusAnalys?->number_of_officer_faculty_members_in_other_unit) }}</td>
@endif
@if (filterCol('number_of_officer_faculty_members_in_central_organization') == true)
<td>{{ number_format((int) $teachersStatusAnalys?->number_of_officer_faculty_members_in_central_organization) }}</td>
@endif
@if (filterCol('number_of_participant_faculty_members_in_cooperation_plan') == true)
<td>{{ number_format((int) $teachersStatusAnalys?->number_of_participant_faculty_members_in_cooperation_plan) }}</td>
@endif
@if (filterCol('number_of_transfer_faculty_members') == true)
<td>{{ number_format((int) $teachersStatusAnalys?->number_of_transfer_faculty_members) }}</td>
@endif
@if (filterCol('number_of_instructor_faculty_members') == true)
<td>{{ number_format((int) $teachersStatusAnalys?->number_of_instructor_faculty_members) }}</td>
@endif
@if (filterCol('number_of_assistant_professor_faculty_members') == true)
<td>{{ number_format((int) $teachersStatusAnalys?->number_of_assistant_professor_faculty_members) }}</td>
@endif
@if (filterCol('number_of_associate_professor_faculty_members') == true)
<td>{{ number_format((int) $teachersStatusAnalys?->number_of_associate_professor_faculty_members) }}</td>
@endif
@if (filterCol('number_of_full_professor_faculty_members') == true)
<td>{{ number_format((int) $teachersStatusAnalys?->number_of_full_professor_faculty_members) }}</td>
@endif
@if (filterCol('number_of_faculty_members_smaller_50_years_old') == true)
<td>{{ number_format((int) $teachersStatusAnalys?->number_of_faculty_members_smaller_50_years_old) }}</td>
@endif
@if (filterCol('number_of_technology_faculty_members') == true)
<td>{{ number_format((int) $teachersStatusAnalys?->number_of_technology_faculty_members) }}</td>
@endif
@if (filterCol('number_of_faculty_members_type_a') == true)
<td>{{ number_format((int) $teachersStatusAnalys?->number_of_faculty_members_type_a) }}</td>
@endif
@if (filterCol('number_of_faculty_members_type_b') == true)
<td>{{ number_format((int) $teachersStatusAnalys?->number_of_faculty_members_type_b) }}</td>
@endif
@if (filterCol('number_of_top_scientific_faculty_members') == true)
<td>{{ number_format((int) $teachersStatusAnalys?->number_of_top_scientific_faculty_members) }}</td>
@endif
@if (filterCol('average_level_of_research_productivity_of_faculty_members') == true)
<td>{{ number_format((int) $teachersStatusAnalys?->average_level_of_research_productivity_of_faculty_members) }}</td>
@endif

<td>{{ $teachersStatusAnalys?->year }}</td>
<td>{{ $teachersStatusAnalys?->month }}</td>