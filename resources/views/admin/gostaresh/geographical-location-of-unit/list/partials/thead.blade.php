<th>شهرستان </th>
<th>واحد دانشگاهی</th>
<th>ساختمان واحد دانشگاهی</th>
@if (filterCol('land_area') == true)
    <th>مساحت زمین</th>
@endif

@if (filterCol('the_size_of_the_building') == true)
    <th>متراژ ساختمانهای ملکی</th>
@endif

@if (filterCol('distance_from_population_density_of_city') == true)
    <th>فاصله از تراکم جمعیتی شهر</th>
@endif
@if (filterCol('distance_from_center_of_province') == true)
    <th>فاصله از مرکز استان</th>
@endif
@if (filterCol('climate_type_and_weather_conditions_title') == true)
    <th>نوع اقلیم و شرایط آب و هوایی</th>
@endif
@if (filterCol('distance_to_the_nearest_higher_education_center') == true)
    <th>فاصله تا نزدیکترین مرکز آموزش عالی</th>
@endif
@if (filterCol('distance_to_the_nearest_unit_of_azad_university') == true)
    <th>فاصله تا نزدیکترین واحد دانشگاه آزاد</th>
@endif
@if (filterCol('level_and_quality_of_access_title') == true)
    <th>سطح و کیفیت دسترسی</th>
@endif
@if (filterCol('international_opportunities_geographical_location_title') == true)
    <th>فرصت های بین الملی موقعیت جغرافیایی</th>
@endif