<th>شهرستان</th>
@if (filterCol('university') == true)
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

<th>سال</th>
<th>ماه</th>
