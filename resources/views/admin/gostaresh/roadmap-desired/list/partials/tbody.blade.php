<td>{{ $roadmapDesired?->province?->name . ' - ' . $roadmapDesired?->county?->name }}
</td>

@if (filterCol('experimental_policy_title') == true)
<td>{{ $roadmapDesired?->experimental_policy_title }}</td>
@endif
@if (filterCol('title_axis') == true)
<td>{{ $roadmapDesired?->title_axis }}</td>
@endif
@if (filterCol('project_title') == true)
<td>{{ $roadmapDesired?->project_title }}</td>
@endif
@if (filterCol('quantitative_goal') == true)
<td>{{ $roadmapDesired?->quantitative_goal }}</td>
@endif
@if (filterCol('test') == true)
<td>{{ $roadmapDesired?->test }}</td>
@endif
@if (filterCol('annual_progress_level') == true)
<td>{{ $roadmapDesired?->annual_progress_level }}</td>
@endif
@if (filterCol('responsible_for_track') == true)
<td>{{ $roadmapDesired?->responsible_for_track }}</td>
@endif
@if (filterCol('considerations') == true)
<td>{{ $roadmapDesired?->considerations }}</td>
@endif

<td>{{ $roadmapDesired?->year }}</td>
