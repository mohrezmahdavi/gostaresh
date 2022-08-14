<th>شهرستان</th>

@if (filterCol('experimental_policy_title') == true)                                                       
    <th>عنوان سیاست آزمایشی</th>
@endif
@if (filterCol('title_axis') == true)                                                       
    <th>عنوان محور</th>
@endif
@if (filterCol('project_title') == true)                                                       
    <th>عنوان پروژه</th>
@endif
@if (filterCol('quantitative_goal') == true)                                                       
    <th>هدف کمی</th>
@endif
@if (filterCol('test') == true)                                                       
    <th>سنجش</th>
@endif
@if (filterCol('annual_progress_level') == true)                                                       
    <th>سطح پیشرفت و تحقق سالانه</th>
@endif
@if (filterCol('responsible_for_track') == true)                                                       
    <th>مسئول پیگیری</th>
@endif
@if (filterCol('considerations') == true)                                                       
    <th>ملاحظات</th>
@endif

<th>سال</th>
