<th>شهرستان</th>
@if (filterCol('unit') == true)
    <th>واحد</th>
@endif
@if (filterCol('total_number_of_curricula') == true)
    <th>تعداد کل برنامه های درسی (رشته گرایش ها)</th>
@endif

@if (filterCol('number_of_modified_curricula') == true)
    <th>تعداد برنامه های درسی بازنگری و اصلاح شده با رویکرد مهارت آموزی</th>
@endif

@if (filterCol('new_interdisciplinary_curricula_implemented') == true)
    <th>برنامه های درسی جدید میان رشته ای مورد اجرا</th>
@endif
@if (filterCol('complete_new_interdisciplinary_curricula') == true)
    <th>کل برنامه های درسی جدید میان رشته ای مورد اجرا</th>
@endif
@if (filterCol('number_of_common_curricula_with_the_world') == true)
    <th>تعداد برنامه های درسی مشترک اجرا شده با سایر دانشگاه های جهان</th>
@endif
@if (filterCol('number_of_curricula_developed') == true)
    <th>تعداد برنامه درسی تدوین شده جهت تاسیس رشته جدید تحصیلی توسط واحد دانشگاهی مورد نظر</th>
@endif
<th>سال</th>
