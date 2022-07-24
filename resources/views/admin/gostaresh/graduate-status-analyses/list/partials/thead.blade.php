<th>شهرستان</th>
@if (filterCol('unit') == true)
    <th>واحد</th>
@endif
@if (filterCol('total_graduates') == true)
    <th>تعداد کل فارغ التحصیلان</th>
@endif

@if (filterCol('employed_graduates') == true)
    <th>تعداد فارغ التحصیلان شاغل</th>
@endif

@if (filterCol('graduate_growth_rate') == true)
    <th>نرخ رشد فارغ التحصیلان</th>
@endif
@if (filterCol('related_employed_graduates') == true)
    <th>تعداد فارغ التحصیلان شاغل در مشاغل مرتبط با رشته تحصیلی</th>
@endif
@if (filterCol('skill_certification_graduates') == true)
    <th>تعداد فارغ التحصیلان دارای گواهینامه مهارتی و صلاحیت حرفه ای</th>
@endif
@if (filterCol('employed_graduates_6_months_after_graduation') == true)
    <th>تعداد فارغ التحصیلان دارای شغل در مدت 6 ماه بعد از فراغت از تحصیل</th>
@endif
@if (filterCol('average_monthly_income_employed_graduates') == true)
    <th>متوسط درآمد ماهیانه فارغ التحصیلان دارای شغل مرتبط با رشته تحصیلی</th>
@endif

<th>سال</th>
<th>ماه</th>
