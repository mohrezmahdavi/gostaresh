<th>شهرستان </th>

@if (filterCol('department_of_education_title') == true)
    <th>گروه تحصیلی</th>
@endif
@if (filterCol('azad_eslami_count') == true)
    <th>دانشگاه آزاد اسلامی واحد</th>
@endif
@if (filterCol('dolati_count') == true)
    <th>دولتی</th>
@endif
@if (filterCol('payam_noor_count') == true)
    <th>پیام نور</th>
@endif
@if (filterCol('gheir_entefai_count') == true)
    <th>موسسات غیرانتفاعی</th>
@endif
@if (filterCol('elmi_karbordi_count') == true)
    <th>علمی-کاربردی</th>
@endif
@if (filterCol('year') == true)
    <th>سال</th>
@endif
