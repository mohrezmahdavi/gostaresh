<th>شهرستان</th>
@if (filterCol('unit') == true)
    <th>واحد</th>
@endif
@if (filterCol('number_of_participation') == true)
    <th>تعداد مشارکت در انتقال دانش فنی/ فناوری انتقال یافته از خارج به داخل کشور</th>
@endif
@if (filterCol('number_of_technical_services') == true)
    <th>تعداد خدمات فنی و مشاوره ای ارایه شده به موسسات یا شرکت های خارجی</th>
@endif
@if (filterCol('earnings') == true)
    <th>میزان کسب درآمد از خدمات فنی و مشاوره ای بین المللی</th>
@endif
@if (filterCol('number_of_international_inventions') == true)
    <th>تعداد ثبت و یا فایلینگ اختراعات بین المللی</th>
@endif
@if (filterCol('number_of_international_knowledge_based_companies') == true)
    <th>تعداد شرکت های دانش بنیان با فعالیت بین المللی</th>
@endif

<th>سال</th>
<th>ماه</th>
