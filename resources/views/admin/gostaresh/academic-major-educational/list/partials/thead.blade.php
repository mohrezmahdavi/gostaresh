<th>شهرستان </th>

@if (filterCol('department_of_education_title') == true)
    <th>گروه تحصیلی</th>
@endif
@if (filterCol('azad_eslami_count') == true)
    <th>دانشگاه آزاد اسلامی واحد(تعداد)</th>
@endif
@if (filterCol('azad_eslami_percent') == true)
    <th>دانشگاه آزاد اسلامی واحد(درصد)</th>
@endif
@if (filterCol('dolati_count') == true)
    <th>دولتی(تعداد)</th>
@endif
@if (filterCol('dolati_percent') == true)
    <th>دولتی(درصد)</th>
@endif
@if (filterCol('medical_sciences_count') == true)
    <th>علوم پزشکی(تعداد)</th>
@endif
@if (filterCol('medical_sciences_percent') == true)
    <th>علوم پزشکی(درصد)</th>
@endif
@if (filterCol('farhangian_count') == true)
    <th>فرهنگیان(تعداد)</th>
@endif
@if (filterCol('farhangian_percent') == true)
    <th>فرهنگیان(درصد)</th>
@endif
@if (filterCol('fani_herfei_count') == true)
    <th>فنی حرفه ای(تعداد)</th>
@endif
@if (filterCol('fani_herfei_percent') == true)
    <th>فنی حرفه ای(درصد)</th>
@endif
@if (filterCol('payam_noor_count') == true)
    <th>پیام نور(تعداد)</th>
@endif
@if (filterCol('payam_noor_percent') == true)
    <th>پیام نور(درصد)</th>
@endif
@if (filterCol('gheir_entefai_count') == true)
    <th>موسسات غیرانتفاعی(تعداد)</th>
@endif
@if (filterCol('gheir_entefai_percent') == true)
    <th>موسسات غیرانتفاعی(درصد)</th>
@endif
@if (filterCol('elmi_karbordi_count') == true)
    <th>علمی-کاربردی(تعداد)</th>
@endif
@if (filterCol('elmi_karbordi_percent') == true)
    <th>علمی-کاربردی(درصد)</th>
@endif
@if (filterCol('year') == true)
    <th>سال</th>
@endif
