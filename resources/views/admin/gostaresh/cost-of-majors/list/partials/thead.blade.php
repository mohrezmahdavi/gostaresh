<th>شهرستان</th>

@if (filterCol('university_type_title') == true)                                                       
    <th>دانشگاه</th>
@endif
@if (filterCol('gender') == true)                                 
    <th>جنسیت</th>
@endif
@if (filterCol('department_of_education_title') == true)                                 
    <th>گروه عمده تحصیلی</th>
@endif
@if (filterCol('associate_degree') == true)                                 
    <th>کاردانی</th>
@endif
@if (filterCol('bachelor_degree') == true)                                 
    <th>کارشناسی</th>
@endif
@if (filterCol('masters') == true)                                 
    <th>کارشناسی ارشد</th>
@endif
@if (filterCol('professional_phd') == true)
    <th>دکتری حرفه ای</th>
@endif
@if (filterCol('phd') == true)
    <th>دکتری تخصصی(Ph.D)</th>
@endif

<th>سال</th>
