<td>{{ $employmentOfProvincial?->province?->name . ' - ' . $employmentOfProvincial->county?->name }}
</td>

@if (filterCol('agriculture_hunting_forestry') == true)
<td>{{ number_format($employmentOfProvincial?->agriculture_hunting_forestry) }}</td>
@endif
@if (filterCol('mining_construction') == true)
<td>{{ number_format($employmentOfProvincial?->mining_construction) }}</td>
@endif
@if (filterCol('water_electricity_natural_gas_supply') == true)
<td>{{ number_format($employmentOfProvincial?->water_electricity_natural_gas_supply) }}</td>
@endif
@if (filterCol('building') == true)
<td>{{ number_format($employmentOfProvincial?->building) }}</td>
@endif
@if (filterCol('wholesale_retail_vehicle_repair_supply') == true)
<td>{{ number_format($employmentOfProvincial?->wholesale_retail_vehicle_repair_supply) }}</td>
@endif
@if (filterCol('hotel_and_restaurant') == true)
<td>{{ number_format($employmentOfProvincial?->hotel_and_restaurant) }}</td>
@endif
@if (filterCol('transportation_warehousing_communications') == true)
<td>{{ number_format($employmentOfProvincial?->transportation_warehousing_communications) }}</td>
@endif
@if (filterCol('financial_intermediation') == true)
<td>{{ number_format($employmentOfProvincial?->financial_intermediation) }}</td>
@endif
@if (filterCol('office_of_public_affairs_urban_services') == true)
<td>{{ number_format($employmentOfProvincial?->office_of_public_affairs_urban_services) }}</td>
@endif
@if (filterCol('education') == true)
<td>{{ number_format($employmentOfProvincial?->education) }}</td>
@endif
@if (filterCol('health_and_social_work') == true)
<td>{{ number_format($employmentOfProvincial?->health_and_social_work) }}</td>
@endif
@if (filterCol('activities_of_employed_households') == true)
<td>{{ number_format($employmentOfProvincial?->activities_of_employed_households) }}</td>
@endif
@if (filterCol('overseas_organizations_and_delegations') == true)
<td>{{ number_format($employmentOfProvincial?->overseas_organizations_and_delegations) }}</td>
@endif
@if (filterCol('real_estates') == true)
<td>{{ number_format($employmentOfProvincial?->real_estates) }}</td>
@endif
@if (filterCol('professional_scientific_technical_activities') == true)
<td>{{ number_format($employmentOfProvincial?->professional_scientific_technical_activities) }}</td>
@endif
@if (filterCol('office_and_support_services') == true)
<td>{{ number_format($employmentOfProvincial?->office_and_support_services) }}</td>
@endif
@if (filterCol('art_and_entertainment') == true)
<td>{{ number_format($employmentOfProvincial?->art_and_entertainment) }}</td>
@endif
@if (filterCol('other_services') == true)
<td>{{ number_format($employmentOfProvincial?->other_services) }}</td>
@endif
@if (filterCol('year') == true)
<td>{{ $employmentOfProvincial?->year }}</td>
@endif