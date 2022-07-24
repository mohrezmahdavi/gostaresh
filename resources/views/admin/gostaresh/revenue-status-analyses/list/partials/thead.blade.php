<th>شهرستان</th>
@if (filterCol('unit') == true)
    <th>واحد</th>
@endif
@if (filterCol('total_revenue') == true)
    <th>کل درآمد ها</th>
@endif
@if (filterCol('income_from_student_tuition') == true)
    <th>"درآمد حاصل از شهریه دانشجویان</th>
@endif
@if (filterCol('income_from_commercialized_technologies') == true)
    <th>"درصد درآمد حاصل از فروش فناوری و طرح های تجاری سازی شده</th>
@endif
@if (filterCol('income_from_research_activities') == true)
    <th>"درصد درآمد حاصل از فعالیت های تحقیق و توسعه واحد</th>
@endif
@if (filterCol('income_from_skills_training') == true)
    <th>"درآمدهای حاصل از مهارت آموزی، فعالیت های کاربنیان و کارآفرینی واحد</th>
@endif
@if (filterCol('operating_income_growth_rate') == true)
    <th>"نرخ رشد درآمدهای عملیاتی واحد</th>
@endif
@if (filterCol('total_non_tuition_income') == true)
    <th>"مجموع درآمدهای غیر شهریه ای واحد</th>
@endif
@if (filterCol('total_international_income') == true)
    <th>"مجموع درآمد های ناشی از فعالیت های بین المللی</th>
@endif
@if (filterCol('shareholder_income') == true)
    <th>"درآمد ناشی از سهامداری</th>
@endif

<th>سال</th>
<th>ماه</th>
