<td>{{ $researchOutputStatusAnalys?->province?->name . ' - ' . $researchOutputStatusAnalys?->county?->name }}
</td>
@if (filterCol('unit') == true)
<td>{{ $researchOutputStatusAnalys?->unit }}</td>
@endif
@if (filterCol('number_of_valid_scientific_articles') == true)
<td>{{ number_format((int) $researchOutputStatusAnalys?->number_of_valid_scientific_articles) }}</td>
@endif
@if (filterCol('number_of_valid_books') == true)
<td>{{ number_format((int) $researchOutputStatusAnalys?->number_of_valid_books) }}</td>
@endif
@if (filterCol('number_of_authored_books') == true)
<td>{{ number_format((int) $researchOutputStatusAnalys?->number_of_authored_books) }}</td>
@endif
@if (filterCol('number_of_internal_inventions') == true)
<td>{{ number_format((int) $researchOutputStatusAnalys?->number_of_internal_inventions) }}</td>
@endif
@if (filterCol('number_of_international_inventions') == true)
<td>{{ number_format((int) $researchOutputStatusAnalys?->number_of_international_inventions) }}</td>
@endif
@if (filterCol('number_of_theses') == true)
<td>{{ number_format((int) $researchOutputStatusAnalys?->number_of_theses) }}</td>
@endif
@if (filterCol('number_of_research_dissertations') == true)
<td>{{ number_format((int) $researchOutputStatusAnalys?->number_of_research_dissertations) }}</td>
@endif
@if (filterCol('number_of_compiled_dissertations') == true)
<td>{{ number_format((int) $researchOutputStatusAnalys?->number_of_compiled_dissertations) }}</td>
@endif
@if (filterCol('number_of_invented_dissertations') == true)
<td>{{ number_format((int) $researchOutputStatusAnalys?->number_of_invented_dissertations) }}</td>
@endif
@if (filterCol('number_of_product_dissertations') == true)
<td>{{ number_format((int) $researchOutputStatusAnalys?->number_of_product_dissertations) }}</td>
@endif
@if (filterCol('number_of_completed_research_projects') == true)
<td>{{ number_format((int) $researchOutputStatusAnalys?->number_of_completed_research_projects) }}</td>
@endif
@if (filterCol('number_of_theorizing_chairs') == true)
<td>{{ number_format((int) $researchOutputStatusAnalys?->number_of_theorizing_chairs) }}</td>
@endif
@if (filterCol('number_of_memoranda_of_understanding') == true)
<td>{{ number_format((int) $researchOutputStatusAnalys?->number_of_memoranda_of_understanding) }}</td>
@endif
@if (filterCol('amount_of_national_contracts_concluded') == true)
<td>{{ number_format((int) $researchOutputStatusAnalys?->amount_of_national_contracts_concluded) }}</td>
@endif
@if (filterCol('amount_of_local_contracts_concluded') == true)
<td>{{ number_format((int) $researchOutputStatusAnalys?->amount_of_local_contracts_concluded) }}</td>
@endif
@if (filterCol('number_of_scientific_journals') == true)
<td>{{ number_format((int) $researchOutputStatusAnalys?->number_of_scientific_journals) }}</td>
@endif
@if (filterCol('number_of_R&D_research') == true)
<td>{{ number_format((int) $researchOutputStatusAnalys['number_of_R&D_research']) }}</td>
@endif
@if (filterCol('number_of_innovative_ideas') == true)
<td>{{ number_format((int) $researchOutputStatusAnalys?->number_of_innovative_ideas) }}</td>
@endif

<td>{{ $researchOutputStatusAnalys?->year }}</td>

