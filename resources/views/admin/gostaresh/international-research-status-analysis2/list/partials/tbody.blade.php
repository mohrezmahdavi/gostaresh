<td>{{ $internationalResearchStatusAnalys?->province?->name . ' - ' . $internationalResearchStatusAnalys?->county?->name }}
</td>
@if (filterCol('unit') == true)
<td>{{ $internationalResearchStatusAnalys?->unit }}</td>
@endif
@if (filterCol('number_of_laboratories') == true)
<td>{{  $internationalResearchStatusAnalys?->number_of_laboratories }}</td>
@endif
@if (filterCol('number_of_research_projects') == true)
<td>{{  $internationalResearchStatusAnalys?->number_of_research_projects }}</td>
@endif
@if (filterCol('number_of_shared_articles') == true)
<td>{{  $internationalResearchStatusAnalys?->number_of_shared_articles }}</td>
@endif
@if (filterCol('number_of_international_research_projects') == true)
<td>{{  $internationalResearchStatusAnalys?->number_of_international_research_projects }}</td>
@endif
@if (filterCol('number_of_faculty_members_using_study_abroad') == true)
<td>{{  $internationalResearchStatusAnalys?->number_of_faculty_members_using_study_abroad }}</td>
@endif
@if (filterCol('number_of_graduate_students_with_opportunities_abroad') == true)
<td>{{  $internationalResearchStatusAnalys?->number_of_graduate_students_with_opportunities_abroad }}</td>
@endif
@if (filterCol('number_of_research_opportunities_presented') == true)
<td>{{  $internationalResearchStatusAnalys?->number_of_research_opportunities_presented }}</td>
@endif
@if (filterCol('number_of_foreign_workshops_held') == true)
<td>{{  $internationalResearchStatusAnalys?->number_of_foreign_workshops_held }}</td>
@endif
@if (filterCol('number_of_international_lectures_held') == true)
<td>{{  $internationalResearchStatusAnalys?->number_of_international_lectures_held }}</td>
@endif
@if (filterCol('number_of_international_awards') == true)
<td>{{  $internationalResearchStatusAnalys?->number_of_international_awards }}</td>
@endif
@if (filterCol('average_H_index_of_faculty_members') == true)
<td>{{  $internationalResearchStatusAnalys?->average_H_index_of_faculty_members }}</td>
@endif
@if (filterCol('number_of_articles_science_and_nature') == true)
<td>{{  $internationalResearchStatusAnalys?->number_of_articles_science_and_nature }}</td>
@endif
@if (filterCol('print_ISI_articles') == true)
<td>{{  $internationalResearchStatusAnalys?->print_ISI_articles }}</td>
@endif
@if (filterCol('percentage_of_quality_articles') == true)
<td>{{  $internationalResearchStatusAnalys?->percentage_of_quality_articles }}</td>
@endif
@if (filterCol('number_of_faculty_members_of_world_scientists') == true)
<td>{{  $internationalResearchStatusAnalys?->number_of_faculty_members_of_world_scientists }}</td>
@endif
@if (filterCol('number_of_faculty_members_of_international_journals') == true)
<td>{{  $internationalResearchStatusAnalys?->number_of_faculty_members_of_international_journals }}</td>
@endif
@if (filterCol('number_of_international_conferences_held') == true)
<td>{{  $internationalResearchStatusAnalys?->number_of_international_conferences_held }}</td>
@endif
@if (filterCol('number_of_international_scientific_books') == true)
<td>{{  $internationalResearchStatusAnalys?->number_of_international_scientific_books }}</td>
@endif
@if (filterCol('number_of_international_agreements_implemented') == true)
<td>{{  $internationalResearchStatusAnalys?->number_of_international_agreements_implemented }}</td>
@endif
@if (filterCol('amount_of_international_research_credits') == true)
<td>{{  $internationalResearchStatusAnalys?->amount_of_international_research_credits }}</td>
@endif
@if (filterCol('number_of_international_publications') == true)
<td>{{  $internationalResearchStatusAnalys?->number_of_international_publications }}</td>
@endif

<td>{{ $internationalResearchStatusAnalys?->year }}</td>
