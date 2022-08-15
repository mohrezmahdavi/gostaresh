<td>{{ $culturalIndicator?->province?->name . ' - ' . $culturalIndicator?->county?->name }}
</td>
@if (filterCol('unit') == true)
<td>{{ $culturalIndicator?->unit }}</td>
@endif
@if (filterCol('cultural_centers_status_score') == true)
<td>{{ $culturalIndicator?->cultural_centers_status_score }}</td>
@endif
@if (filterCol('printed_publications_status_score') == true)
<td>{{ $culturalIndicator?->printed_publications_status_score }}</td>
@endif
@if (filterCol('cultural_organizations_status_score') == true)
<td>{{ $culturalIndicator?->cultural_organizations_status_score }}</td>
@endif
@if (filterCol('people_coverage_status_score') == true)
<td>{{ $culturalIndicator?->people_coverage_status_score }}</td>
@endif
@if (filterCol('free_thinking_status_score') == true)
<td>{{ $culturalIndicator?->free_thinking_status_score }}</td>
@endif
@if (filterCol('interact_with_cyberspace_status_score') == true)
<td>{{ $culturalIndicator?->interact_with_cyberspace_status_score }}</td>
@endif
@if (filterCol('fixed_cultural_events_status_score') == true)
<td>{{ $culturalIndicator?->fixed_cultural_events_status_score)}}</td>
@endif
@if (filterCol('amounts_of_honors_and_awards') == true)
<td>{{ $culturalIndicator?->amounts_of_honors_and_awards }}</td>
@endif
@if (filterCol('cultural_industry_products') == true)
<td>{{ $culturalIndicator?->cultural_industry_products }}</td>
@endif
@if (filterCol('level_of_initiatives') == true)
<td>{{ $culturalIndicator?->level_of_initiatives }}</td>
@endif
@if (filterCol('points_for_running_luxury_programs') == true)
<td>{{ $culturalIndicator?->points_for_running_luxury_programs }}</td>
@endif
@if (filterCol('election_turnout_score') == true)
<td>{{ $culturalIndicator?->election_turnout_score }}</td>
@endif
@if (filterCol('score_cultural_skills_training_programs') == true)
<td>{{ $culturalIndicator?->score_cultural_skills_training_programs }}</td>
@endif
@if (filterCol('score_of_cultural_participation_of_Basiji_professors') == true)
<td>{{ $culturalIndicator?->score_of_cultural_participation_of_Basiji_professors }}</td>
@endif
@if (filterCol('participation_of_unit_professors_in_cultural_counseling') == true)
<td>{{ $culturalIndicator?->participation_of_unit_professors_in_cultural_counseling }}</td>
@endif
@if (filterCol('position_of_the_university_as_cultural_center') == true)
<td>{{ $culturalIndicator?->position_of_the_university_as_cultural_center }}</td>
@endif
@if (filterCol('score_cultural_programs') == true)
<td>{{ $culturalIndicator?->score_cultural_programs }}</td>
@endif
@if (filterCol('score_Families_of_professors') == true)
<td>{{ $culturalIndicator?->score_Families_of_professors }}</td>
@endif
@if (filterCol('score_of_professors') == true)
<td>{{ $culturalIndicator?->score_of_professors }}</td>
@endif
@if (filterCol('satisfaction_of_managers_performance') == true)
<td>{{ $culturalIndicator?->satisfaction_of_managers_performance }}</td>
@endif
@if (filterCol('percentage_of_students_participating_in_sports_competitions') == true)
<td>{{ $culturalIndicator?->percentage_of_students_participating_in_sports_competitions }}</td>
@endif
@if (filterCol('percentage_of_students_participating_in_cultural_competitions') == true)
<td>{{ $culturalIndicator?->percentage_of_students_participating_in_cultural_competitions }}</td>
@endif
@if (filterCol('percentage_of_students_in_student_organizations') == true)
<td>{{ $culturalIndicator?->percentage_of_students_in_student_organizations }}</td>
@endif
@if (filterCol('student_counseling_centers') == true)
<td>{{ $culturalIndicator?->student_counseling_centers }}</td>
@endif
@if (filterCol('percentage_of_students_referring_to_student_counseling_centers') == true)
<td>{{ $culturalIndicator?->percentage_of_students_referring_to_student_counseling_centers }}</td>
@endif
@if (filterCol('general_cultural_rank_of_the_university_unit') == true)
<td>{{ $culturalIndicator?->general_cultural_rank_of_the_university_unit }}</td>
@endif

<td>{{ $culturalIndicator?->year }}</td>
