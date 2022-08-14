<th>شهرستان </th>

@if (filterCol('gender_title') == true)
    <th>جنسیت</th>
@endif
{{-- <th>مقطع</th> --}}
@if (filterCol('ebtedai') == true)
    <th>ابتدایی</th>
@endif
@if (filterCol('motevasete_1') == true)
    <th>متوسطه اول</th>
@endif
@if (filterCol('motevasete_2_ensani') == true)
    <th>متوسطه دوم (علوم انسانی)</th>
@endif
@if (filterCol('motevasete_2_math') == true)
    <th>متوسطه دوم (ریاضی)</th>
@endif
@if (filterCol('motevasete_2_science') == true)
    <th>متوسطه دوم (علوم تجربی)</th>
@endif
@if (filterCol('motevasete_2_kar_danesh') == true)
    <th>متوسطه دوم (کار و دانش و فنی و حرفه ای)</th>
@endif

<th>سال</th>
