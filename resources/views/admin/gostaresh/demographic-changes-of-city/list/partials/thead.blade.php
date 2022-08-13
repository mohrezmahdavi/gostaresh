@if (filterCol('population') == true)
    <th>جمعیت </th>
@endif
@if (filterCol('immigration_rates') == true)
    <th>نرخ مهاجرت</th>
@endif
@if (filterCol('growth_rate') == true)
    <th>نرخ رشد</th>
@endif
<th>سال</th>
<th>موقعیت</th>