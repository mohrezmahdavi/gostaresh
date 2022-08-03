<td>{{ $employmentOfProvincial?->province?->name . ' - ' . $employmentOfProvincial->county?->name }}
</td>

@if (filterCol('agriculture_hunting_forestry') == true)
<td>
    {{employment_status($employmentOfProvincial->agriculture_hunting_forestry)}}
</td>
@endif
@if (filterCol('mining_construction') == true)
<td>{{ employment_status($employmentOfProvincial?->mining_construction) }}</td>
@endif
@if (filterCol('water_electricity_natural_gas_supply') == true)
<td>{{ employment_status($employmentOfProvincial?->water_electricity_natural_gas_supply) }}</td>
@endif
@if (filterCol('building') == true)
<td>{{ employment_status($employmentOfProvincial?->building) }}</td>
@endif
@if (filterCol('wholesale_retail_vehicle_repair_supply') == true)
<td>{{ employment_status($employmentOfProvincial?->wholesale_retail_vehicle_repair_supply) }}</td>
@endif
@if (filterCol('hotel_and_restaurant') == true)
<td>{{ employment_status($employmentOfProvincial?->hotel_and_restaurant) }}</td>
@endif
@if (filterCol('transportation_warehousing_communications') == true)
<td>{{ employment_status($employmentOfProvincial?->transportation_warehousing_communications) }}</td>
@endif
@if (filterCol('financial_intermediation') == true)
<td>{{ employment_status($employmentOfProvincial?->financial_intermediation) }}</td>
@endif
@if (filterCol('office_of_public_affairs_urban_services') == true)
<td>{{ employment_status($employmentOfProvincial?->office_of_public_affairs_urban_services) }}</td>
@endif
@if (filterCol('education') == true)
<td>{{ employment_status($employmentOfProvincial?->education) }}</td>
@endif
@if (filterCol('health_and_social_work') == true)
<td>{{ employment_status($employmentOfProvincial?->health_and_social_work) }}</td>
@endif
@if (filterCol('activities_of_employed_households') == true)
<td>{{ employment_status($employmentOfProvincial?->activities_of_employed_households) }}</td>
@endif
@if (filterCol('overseas_organizations_and_delegations') == true)
<td>{{ employment_status($employmentOfProvincial?->overseas_organizations_and_delegations) }}</td>
@endif
@if (filterCol('real_estates') == true)
<td>{{ employment_status($employmentOfProvincial?->real_estates) }}</td>
@endif
@if (filterCol('professional_scientific_technical_activities') == true)
<td>{{ employment_status($employmentOfProvincial?->professional_scientific_technical_activities) }}</td>
@endif
@if (filterCol('office_and_support_services') == true)
<td>{{ employment_status($employmentOfProvincial?->office_and_support_services) }}</td>
@endif
@if (filterCol('art_and_entertainment') == true)
<td>{{ employment_status($employmentOfProvincial?->art_and_entertainment) }}</td>
@endif
@if (filterCol('other_services') == true)
<td>{{ employment_status($employmentOfProvincial?->other_services) }}</td>
@endif
@if (filterCol('year') == true)
<td>{{ $employmentOfProvincial?->year }}</td>
@endif