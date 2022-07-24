<th>شهرستان</th>
@if (filterCol('unit') == true)
    <th>واحد</th>
@endif
@if (filterCol('office_space_utilization_rate') == true)
    <th>نرخ بهره برداری از فضای اداری</th>
@endif
@if (filterCol('utilization_rate_of_educational_equipment') == true)
    <th>نرخ بهره برداری از فضا و تجهیزات آموزشی</th>
@endif
@if (filterCol('utilization_rate_of_technology_equipment') == true)
    <th>نرخ بهره برداری از فضای و تجهیزات فناوری و نوآوری</th>
@endif
@if (filterCol('utilization_rate_of_cultural_equipment') == true)
    <th>سرانه نرخ بهره برداری از فضا و تجهیزات فرهنگی</th>
@endif
@if (filterCol('utilization_rate_of_sports_equipment') == true)
    <th>نرخ بهره برداری از فضا و تجهیزات ورزشی</th>
@endif
@if (filterCol('operation_rate_of_agricultural_equipment') == true)
    <th>نرخ بهره برداری از تجهیزات و فضای کشاورزی و زراعی</th>
@endif
@if (filterCol('operation_rate_of_workshop_equipment') == true)
    <th>ﻧـﺮخﺑﻬـﺮهﺑـﺮداری ازتجهیزات و فضای کارگاهی و آزمایشگاهی</th>
@endif
@if (filterCol('faculty_capacity_utilization_rate') == true)
    <th>نرخ بهره برداری از ظرفیت اعضای هیات علمی</th>
@endif
@if (filterCol('employee_capacity_utilization_rate') == true)
    <th>نرخ بهره برداری از ظرفیت کارمندان</th>
@endif
@if (filterCol('graduate_capacity_utilization_rate') == true)
    <th>نرخ بهره برداری از ظرفیت فارغ التحصیلان</th>
@endif
@if (filterCol('student_capacity_utilization_rate') == true)
    <th>نرخ بهره برداری از ظرفیت دانشجویان</th>
@endif
@if (filterCol('ratio_of_faculty_members_to_students') == true)
    <th>نسبت تعداد اعضای هیات علمی به دانشجویان</th>
@endif
@if (filterCol('ratio_of_staff_to_students') == true)
    <th>نسبت تعداد کارمندان به دانشجویان</th>
@endif
@if (filterCol('ratio_of_faculty_members_to_teaching_professors') == true)
    <th>نسبت تعداد اعضای هیات علمی به تعداد اساتید مدعو و حق التدریس</th>
@endif
@if (filterCol('ratio_of_faculty_members_to_employees') == true)
    <th>نسبت تعداد اعضای هیات علمی به کارمندان واحد</th>
@endif
@if (filterCol('ratio_of_unit_faculty_members_to_faculty_members_of_the_province') == true)
    <th>نسبت تعداد اعضای هیات علمی به میانگین تعداد اعضای هیات علمی استان</th>
@endif
@if (filterCol('ratio_of_unit_students_to_students_of_the_province') == true)
    <th>نسبت تعداد دانشجویان به میانگین تعداد دانشجویان استان</th>
@endif
@if (filterCol('ratio_of_unit_employees_to_provincial_employees') == true)
    <th>نسبت تعداد کارمندان به میانگین تعداد کارمندان استان</th>
@endif
@if (filterCol('unit_teaching_professors_to_teaching_professors_province') == true)
    <th>نسبت تعداد اساتید مدعو و حق التدریس به میانگین تعداد اساتید مدعو و حق التدریس استان</th>
@endif

<th>سال</th>
<th>ماه</th>
