<th>شهرستان</th>
@if (filterCol('unit') == true)
    <th>واحد</th>
@endif
@if (filterCol('percapita_office_space') == true)       
    <th>سرانه فضای اداری</th>
@endif
@if (filterCol('percapita_educational_space') == true)  
    <th>سرانه فضای آموزشی</th>
@endif
@if (filterCol('percapita_innovation_space') == true)   
    <th>سرانه فضای فناوری و نوآوری</th>
@endif
@if (filterCol('percapita_cultural_space') == true)     
    <th>سرانه فضای فرهنگی</th>
@endif
@if (filterCol('percapita_civil_space') == true)        
    <th>سرانه فضای عمرانی</th>
@endif
@if (filterCol('building_under_construction') == true)  
    <th>ساختمان در دست احداث</th>
@endif
@if (filterCol('percapita_residential') == true)        
    <th>سرانه اقامتی</th>
@endif
@if (filterCol('percapita_operating_buildings') == true)
    <th>سرانه ساختمان های بهره بردار</th>
@endif
@if (filterCol('percapita_sports_space') == true)       
    <th>سرانه فضای ورزشی</th>
@endif
@if (filterCol('percapita_aristocratic_space') == true) 
    <th>سرانه فضای اعیانی</th>
@endif
@if (filterCol('percapita_arena_space') == true)        
    <th>سرانه فضای عرصه</th>
@endif

<th>سال</th>
