<th>شهرستان</th>
@if (filterCol('unit') == true)
    <th>واحد</th>
@endif
@if (filterCol('number_of_valid_scientific_articles') == true)
    <th>تعداد مقالات معتبر علمی</th>
@endif
@if (filterCol('number_of_valid_books') == true)
    <th>تعداد کتب معتبر</th>
@endif
@if (filterCol('number_of_authored_books') == true)
    <th>تعداد کتب تالیفی</th>
@endif
@if (filterCol('number_of_internal_inventions') == true)
    <th>تعداد اختراعات ثبت شده داخلی</th>
@endif
@if (filterCol('number_of_international_inventions') == true)
    <th>تعداد اختراعات ثبت شده بین المللی</th>
@endif
@if (filterCol('number_of_theses') == true)
    <th>تعداد پایان نامه ها</th>
@endif
@if (filterCol('number_of_research_dissertations') == true)
    <th>تعداد پایان نامه های منجر به مقاله علمی-پژوهشی</th>
@endif
@if (filterCol('number_of_compiled_dissertations') == true)
    <th>تعداد پایان نامه های تدوین شده بر اساس نظام موضوعات برنامه های علمی دانشگاه</th>
@endif
@if (filterCol('number_of_invented_dissertations') == true)
    <th>تعداد پایان نامه های منجر به ثبت اختراع</th>
@endif
@if (filterCol('number_of_product_dissertations') == true)
    <th>تعداد پایان نامه های منجر به محصول</th>
@endif
@if (filterCol('number_of_completed_research_projects') == true)
    <th>تعداد طرح های تحقیقاتی خاتمه یافته</th>
@endif
@if (filterCol('number_of_theorizing_chairs') == true)
    <th>تعداد کرسی های نظریه پردازی برگزار شده توسط اساتید واحد دانشگاهی</th>
@endif
@if (filterCol('number_of_memoranda_of_understanding') == true)
    <th>تعداد تفاهمنامه ها با صنایع و سازمان‌های محلی/ملی</th>
@endif
@if (filterCol('amount_of_national_contracts_concluded') == true)
    <th>مبلغ قراردهای منعقد شده با صنایع و سازمان‌های ملی</th>
@endif
@if (filterCol('amount_of_local_contracts_concluded') == true)
    <th>مبلغ قراردهای منعقد شده با صنایع و سازمان‌های محلی</th>
@endif
@if (filterCol('number_of_scientific_journals') == true)
    <th>تعداد مجلات علمی</th>
@endif
@if (filterCol('number_of_R&D_research') == true)
    <th>تعداد پژوهش های معطوف به R&D</th>
@endif
@if (filterCol('number_of_innovative_ideas') == true)
    <th>تعداد طرح ها و ایده های فناورانه و نوآورانه تجاری سازی شده</th>
@endif

<th>سال</th>
