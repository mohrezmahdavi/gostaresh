<th>شهرستان </th>

@if (filterCol('agriculture_hunting_forestry') == true)
    <th>کشاورزی، شکار و جنگلداری</th>
@endif
@if (filterCol('mining_construction') == true)
    <th>استخراج معدن - ساخت</th>
@endif
@if (filterCol('water_electricity_natural_gas_supply') == true)
    <th>تامین آب، برق و گاز طبیعی</th>
@endif
@if (filterCol('building') == true)
    <th>ساختمان</th>
@endif
@if (filterCol('wholesale_retail_vehicle_repair_supply') == true)
    <th>عمده فروشی، خرده فروشی، تعمیر وسایل نقلیه و تامین کالا</th>
@endif
@if (filterCol('hotel_and_restaurant') == true)
    <th>هتل و رسنوران</th>
@endif
@if (filterCol('transportation_warehousing_communications') == true)
    <th>حمل و نقل، انبارداری و ارتباطات</th>
@endif
@if (filterCol('financial_intermediation') == true)
    <th>واسطه گری های مالی</th>
@endif
@if (filterCol('office_of_public_affairs_urban_services') == true)
    <th>اداره امور عمومی و خدمات شهری، دفاع، و تامین اجتماعی</th>
@endif
@if (filterCol('education') == true)
    <th>آموزش</th>
@endif
@if (filterCol('health_and_social_work') == true)
    <th>بهداشت و مددکاری اجتماعی</th>
@endif
@if (filterCol('activities_of_employed_households') == true)
    <th>فعالیت های خانوارهای دارای مستخدم</th>
@endif
@if (filterCol('overseas_organizations_and_delegations') == true)
    <th>سازمان ها و هیات های برون مرزی</th>
@endif
@if (filterCol('real_estates') == true)
    <th>املاک و مستغلات</th>
@endif
@if (filterCol('professional_scientific_technical_activities') == true)
    <th>فعالیت های حرفه ای ، علمی و فنی</th>
@endif
@if (filterCol('office_and_support_services') == true)
    <th>اداری و خدمات پشتیبانی</th>
@endif
@if (filterCol('art_and_entertainment') == true)
    <th>هنر و سرگرمی</th>
@endif
@if (filterCol('other_services') == true)
    <th>سایر خدمات</th>
@endif
@if (filterCol('year') == true)
    <th>سال</th>
@endif
