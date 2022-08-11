<th>شهرستان</th>

@if (filterCol('unit') == true)
    <th>واحد</th>
@endif
{{--@if (filterCol('payment_to_faculty_members') == true)                                 --}}
{{--    <th>درصد کل پرداختی به اعضای هیات علمی تمام وقت واحد دانشگاهی</th>--}}
{{--@endif--}}
{{--@if (filterCol('total_running_costs') == true)                                        --}}
{{--    <th>کل هزینه های جاری</th>--}}
{{--@endif--}}
{{--@if (filterCol('average_salary_of_faculty_members') == true)                          --}}
{{--    <th>میانگین حقوق دریافتی اعضای هیات علمی</th>--}}
{{--@endif--}}
{{--@if (filterCol('average_salaries_of_faculty_members_from_research_contracts') == true)--}}
{{--    <th>میانگین حقوق دریافتی اعضای هیات علمی دانشگاه آزاد اسلامی استان از محل قراردهای تحقیقاتی، آموزشی و خدماتی</th>--}}
{{--@endif--}}
{{--@if (filterCol('student_fees') == true)                                               --}}
{{--    <th>هزینه دانشجویان</th>--}}
{{--@endif--}}
{{--@if (filterCol('average_salary_of_employees') == true)                                --}}
{{--    <th>میانگین حقوق دریافتی کارمندان</th>--}}
{{--@endif--}}
{{--@if (filterCol('current_expenditure_growth_rate') == true)                            --}}
{{--    <th>نرخ رشد هزینه های جاری</th>--}}
{{--@endif--}}
{{--@if (filterCol('cost_of_paying_office_rent') == true)                                 --}}
{{--    <th>هزینه پرداخت اجاره ساختمان اداری</th>--}}
{{--@endif--}}
{{--@if (filterCol('cost_of_rent_for_educational_building') == true)                      --}}
{{--    <th>هزینه پرداخت اجاره ساختمان آموزشی</th>--}}
{{--@endif--}}
{{--@if (filterCol('cost_of_rent_for_research_building') == true)                         --}}
{{--    <th>هزینه پرداخت اجاره ساختمان پژوهشی</th>--}}
{{--@endif--}}
{{--@if (filterCol('extra_charge_for_rent_extracurricular_building') == true)             --}}
{{--    <th>هزینه پرداخت اجاره ساختمان فوق برنامه</th>--}}
{{--@endif--}}
{{--@if (filterCol('cost_of_rent_innovation_buildings') == true)                          --}}
{{--    <th>هزینه پرداخت اجاره ساختمان فناوری و نوآوری</th>--}}
{{--@endif--}}
{{--@if (filterCol('energy_costs_of_buildings') == true)                                  --}}
{{--    <th>هزینه های انرژی ساختمان ها</th>--}}
{{--@endif--}}
{{--@if (filterCol('cost_of_university_equipment') == true)                               --}}
{{--    <th>هزینه های نگهداری، استهلاک و تعمیرات دارایی ها و تجهیزات دانشگاه</th>--}}
{{--@endif--}}
@if (filterCol('training_costs') == true)
    <th>هزینه های حوزه آموزش</th>
@endif
@if (filterCol('research_costs') == true)
    <th>هزینه های حوزه پژوهش</th>
@endif
@if (filterCol('innovation_costs') == true)
    <th>هزینه های حوزه فناوری و نوآوری</th>
@endif
@if (filterCol('educational_costs') == true)
    <th>هزینه های حوزه مهارت آموزشی و کارآفرینی</th>
@endif
@if (filterCol('development_costs') == true)
    <th>هزینه های حوزه تحقیق و توسعه</th>
@endif
@if (filterCol('cultural_sphere_costs') == true)
    <th>هزینه های حوزه فرهنگی</th>
@endif
@if (filterCol('administrative_costs') == true)
    <th>هزینه های حوزه اداری</th>
@endif
@if (filterCol('information_technology_costs') == true)
    <th>هزینه های حوزه فناوری اطلاعات و زیرساخت های فضای مجازی</th>
@endif
@if (filterCol('International_sphere_costs') == true)
    <th>هزینه های حوزه بین الملل</th>
@endif
@if (filterCol('costs_of_staff_training_and_faculty') == true)
    <th>هزینه های حوزه آموزش ضمن خدمت کارکنان و اساتید</th>
@endif
@if (filterCol('sports_expenses') == true)
    <th>هزینه های حوزه ورزشی</th>
@endif
@if (filterCol('health_costs') == true)
    <th>هزینه های حوزه بهداشت و سلامت</th>
@endif
@if (filterCol('entrepreneurship_costs') == true)
    <th>هزینه های حوزه ترویج کارآفرینی و اشتغال</th>
@endif
@if (filterCol('graduate_costs') == true)
    <th>هزینه های حوزه فارغ التحصیلان</th>
@endif
@if (filterCol('branding_costs') == true)
    <th>هزینه های حوزه برند سازی و تبلیغات و جذب دانشجویان</th>
@endif

<th>سال</th>
<th>ماه</th>
