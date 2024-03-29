<td>{{ $organizationalCulture?->province?->name . ' - ' . $organizationalCulture?->county?->name }}
</td>
@if (filterCol('unit') == true)
<td>{{ $organizationalCulture?->unit }}</td>
@endif
@if (filterCol('student_satisfaction') == true)
<td>{{ $organizationalCulture?->student_satisfaction }}</td>
@endif
@if (filterCol('unique_organizational_learning_capability') == true)
<td>{{ $organizationalCulture?->unique_organizational_learning_capability }}</td>
@endif
@if (filterCol('students_religious_beliefs') == true)
<td>{{ $organizationalCulture?->students_religious_beliefs }}</td>
@endif
@if (filterCol('student_study_research_culture') == true)
<td>{{ $organizationalCulture?->student_study_research_culture }}</td>
@endif
@if (filterCol('hijab_culture_of_students') == true)
<td>{{ $organizationalCulture?->hijab_culture_of_students }}</td>
@endif
@if (filterCol('culture_of_participation') == true)
<td>{{ $organizationalCulture?->culture_of_participation }}</td>
@endif
@if (filterCol('faculty_members_self_confidence') == true)
<td>{{ $organizationalCulture?->faculty_members_self_confidence }}</td>
@endif
@if (filterCol('amount_of_physical_elements') == true)
<td>{{ $organizationalCulture?->amount_of_physical_elements }}</td>
@endif
@if (filterCol('percentage_of_sample_professors_in_unit') == true)
<td>{{ $organizationalCulture?->percentage_of_sample_professors_in_unit }}</td>
@endif
@if (filterCol('percentage_of_sample_professors_in_province') == true)
<td>{{ $organizationalCulture?->percentage_of_sample_professors_in_province }}</td>
@endif
@if (filterCol('percentage_of_sample_students_in_unit') == true)
<td>{{ $organizationalCulture?->percentage_of_sample_students_in_unit }}</td>
@endif
@if (filterCol('percentage_of_sample_students_in_province') == true)
<td>{{ $organizationalCulture?->percentage_of_sample_students_in_province }}</td>
@endif
@if (filterCol('brand_influence_in_the_province') == true)
<td>{{ $organizationalCulture?->brand_influence_in_the_province }}</td>
@endif
@if (filterCol('level_of_intelligence') == true)
<td>{{ $organizationalCulture?->level_of_intelligence }}</td>
@endif
@if (filterCol('axial_program') == true)
<td>{{ $organizationalCulture?->axial_program }}</td>
@endif

<td>{{ $organizationalCulture?->year }}</td>
