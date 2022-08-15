<td>{{ $geographicalLocationOfUnit?->province?->name . ' - ' . $geographicalLocationOfUnit->county?->name }}
</td>

@if (filterCol('unit_university') == true)
    <td>{{ $geographicalLocationOfUnit?->unit_university }}</td>
@endif

@if (filterCol('university_building') == true)
    <td>{{ $geographicalLocationOfUnit?->university_building }}</td>
@endif

@if (filterCol('land_area') == true)
    <td>{{ $geographicalLocationOfUnit?->land_area }}
    </td>
@endif

@if (filterCol('the_size_of_the_building') == true)
    <td>{{ $geographicalLocationOfUnit?->the_size_of_the_building }}
    </td>
@endif

@if (filterCol('distance_from_population_density_of_city') == true)
    <td>{{ $geographicalLocationOfUnit?->distance_from_population_density_of_city }}
    </td>
@endif
@if (filterCol('distance_from_center_of_province') == true)
    <td>{{ $geographicalLocationOfUnit?->distance_from_center_of_province }}</td>
@endif
@if (filterCol('climate_type_and_weather_conditions_title') == true)
    <td>{{ $geographicalLocationOfUnit?->climate_type_and_weather_conditions_title }}
    </td>
@endif
@if (filterCol('distance_to_the_nearest_higher_education_center') == true)
    <td>{{ $geographicalLocationOfUnit?->distance_to_the_nearest_higher_education_center }}
    </td>
@endif
@if (filterCol('distance_to_the_nearest_unit_of_azad_university') == true)
    <td>{{ $geographicalLocationOfUnit?->distance_to_the_nearest_unit_of_azad_university }}
    </td>
@endif
@if (filterCol('level_and_quality_of_access_title') == true)
    <td>{{ $geographicalLocationOfUnit?->level_and_quality_of_access_title }}
    </td>
@endif
@if (filterCol('international_opportunities_geographical_location_title') == true)
    <td>{{ $geographicalLocationOfUnit?->international_opportunities_geographical_location_title }}
    </td>
@endif
