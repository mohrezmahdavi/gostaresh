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
@if (filterCol('number_of_students') == true)
    <th>تعداد دانشجویان</th>
@endif

{{--@if (filterCol('grade_id') == true)--}}
{{--    <th>مقطع</th>--}}
{{--@endif--}}
{{--@if (filterCol('major_id') == true)--}}
{{--    <th>رشته</th>--}}
{{--@endif--}}
{{--@if (filterCol('minor_id') == true)--}}
{{--    <th>گرایش</th>--}}
{{--@endif--}}

@if (filterCol('year') == true)
    <th>سال</th>
@endif
