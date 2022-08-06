<th>شهرستان </th>
@if (filterCol('university_type_title') == true)
    <th>دانشگاه</th>
@endif
@if (filterCol('gender_title') == true)
    <th>جنسیت</th>
@endif
@if (filterCol('grade_title') == true)
    <th>مقطع</th>
@endif
@if (filterCol('department_of_education_title') == true)
    <th>گروه عمده تحصیلی</th>
@endif
@if (filterCol('average_test_score_of_the_last_five_percent_of_admitted') == true)
    <th>مقدار میانگین رتبه آزمون 5 درصد آخر پذیرفته شدگان</th>
@endif
@if (filterCol('year') == true)
    <th>سال</th>
@endif
