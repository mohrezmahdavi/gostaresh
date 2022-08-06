<th>شهرستان </th>
@if (filterCol('university_type_title') == true)
    <th>دانشگاه</th>
@endif
@if (filterCol('gender_title') == true)
    <th>جنسیت</th>
@endif
@if (filterCol('department_of_education_title') == true)
    <th>گروه عمده تحصیلی</th>
@endif
@if (filterCol('annual_growth_rate_of_student_enrollment') == true)
    <th>نرخ رشد سالانه ثبت نام دانشجو</th>
@endif
@if (filterCol('year') == true)
    <th>سال</th>
@endif
