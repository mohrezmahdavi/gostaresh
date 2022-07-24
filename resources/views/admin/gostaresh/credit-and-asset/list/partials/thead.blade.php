<th>شهرستان</th>

@if (filterCol('unit') == true)                                                       
    <th>واحد</th>
@endif
@if (filterCol('administrative_credits') == true)                                 
    <th>اعتبارات اداری</th>
@endif
@if (filterCol('educational_credits') == true)                                 
    <th>اعتبارات آموزشی</th>
@endif
@if (filterCol('research_credits') == true)                                 
    <th>اعتبارات پژوهشی</th>
@endif
@if (filterCol('cultural_credits') == true)                                 
    <th>اعتبارات فرهنگی</th>
@endif
@if (filterCol('innovative_credits') == true)                                 
    <th>اعتبارات فناورانه و نوآورانه</th>
@endif
@if (filterCol('skills_credits') == true)                                 
    <th>اعتبارات حوزه مهارتی</th>
@endif
@if (filterCol('total_University_credits') == true)                                 
    <th>کل اعتبارات دانشگاه</th>
@endif
@if (filterCol('total_university_assets') == true)                                 
    <th>کل دارایی های دانشگاه</th>
@endif

<th>سال</th>
<th>ماه</th>
