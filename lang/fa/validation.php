<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'گزینه :attribute باید تایید شود',
    'accepted_if' => 'زمانی که گزینه :other برابر :value است :attribute باید تایید شود',
    'active_url' => 'گزینه :attribute یک آدرس سایت معتبر نیست',
    'after' => 'گزینه :attribute باید تاریخی بعد از :date باشد',
    'after_or_equal' => 'گزینه :attribute باید تاریخی مساوی یا بعد از :date باشد',
    'alpha' => 'گزینه :attribute باید تنها شامل حروف باشد',
    'alpha_dash' => 'گزینه :attribute باید تنها شامل حروف، اعداد، خط تیره و زیر خط باشد',
    'alpha_num' => 'گزینه :attribute باید تنها شامل حروف و اعداد باشد',
    'array' => 'گزینه :attribute باید آرایه باشد',
    'before' => 'گزینه :attribute باید تاریخی قبل از :date باشد',
    'before_or_equal' => 'گزینه :attribute باید تاریخی مساوی یا قبل از :date باشد',
    'between' => [
        'numeric' => 'گزینه :attribute باید بین :min و :max باشد',
        'file' => 'گزینه :attribute باید بین :min و :max کیلوبایت باشد',
        'string' => 'گزینه :attribute باید بین :min و :max کاراکتر باشد',
        'array' => 'گزینه :attribute باید بین :min و :max آیتم باشد',
    ],
    'boolean' => 'گزینه :attribute تنها می تواند صحیح یا غلط باشد',
    'confirmed' => 'تایید مجدد گزینه :attribute صحیح نمی باشد',
    'current_password' => 'رمزعبور صحیح نمی باشد',
    'date' => 'گزینه :attribute یک تاریخ صحیح نمی باشد',
    'date_equals' => 'گزینه :attribute باید تاریخی مساوی با :date باشد',
    'date_format' => 'گزینه :attribute با فرمت :format همخوانی ندارد',
    'different' => 'گزینه :attribute و :other باید متفاوت باشند',
    'digits' => 'گزینه :attribute باید :digits عدد باشد',
    'digits_between' => 'گزینه :attribute باید بین :min و :max عدد باشد',
    'dimensions' => 'ابعاد تصویر گزینه :attribute مجاز نمی باشد',
    'distinct' => 'گزینه :attribute دارای افزونگی داده می باشد',
    'email' => 'گزینه :attribute باید یک آدرس ایمیل صحیح باشد',
    'ends_with' => 'گزینه :attribute باید با یکی از این مقادیر پایان یابد، :values',
    'exists' => 'گزینه انتخاب شده :attribute صحیح نمی باشد',
    'file' => 'گزینه :attribute باید یک فایل باشد',
    'filled' => 'گزینه :attribute نمی تواند خالی باشد',
    'gt' => [
        'numeric' => 'گزینه :attribute باید بزرگتر از :value باشد',
        'file' => 'گزینه :attribute باید بزرگتر از :value کیلوبایت باشد',
        'string' => 'گزینه :attribute باید بزرگتر از :value کاراکتر باشد',
        'array' => 'گزینه :attribute باید بیشتر از :value آیتم باشد',
    ],
    'gte' => [
        'numeric' => 'گزینه :attribute باید بزرگتر یا مساوی :value باشد',
        'file' => 'گزینه :attribute باید بزرگتر یا مساوی :value کیلوبایت باشد',
        'string' => 'گزینه :attribute باید بزرگتر یا مساوی :value کاراکتر باشد',
        'array' => 'گزینه :attribute باید :value آیتم یا بیشتر داشته باشد',
    ],
    'image' => 'گزینه :attribute باید از نوع تصویر باشد',
    'in' => 'گزینه انتخابی :attribute صحیح نمی باشد',
    'in_array' => 'گزینه :attribute در :other وجود ندارد',
    'integer' => 'گزینه :attribute باید از نوع عددی باشد',
    'ip' => 'گزینه :attribute باید آی پی آدرس باشد',
    'ipv4' => 'گزینه :attribute باید آی پی آدرس ورژن 4 باشد',
    'ipv6' => 'گزینه :attribute باید آی پی آدرس ورژن 6 باشد',
    'json' => 'گزینه :attribute باید از نوع رشته جیسون باشد',
    'lt' => [
        'numeric' => 'گزینه :attribute باید کمتر از :value باشد',
        'file' => 'گزینه :attribute باید کمتر از :value کیلوبایت باشد',
        'string' => 'گزینه :attribute باید کمتر از :value کاراکتر باشد',
        'array' => 'گزینه :attribute باید کمتر از :value آیتم داشته باشد',
    ],
    'lte' => [
        'numeric' => 'گزینه :attribute باید مساوی یا کمتر از :value باشد',
        'file' => 'گزینه :attribute باید مساوی یا کمتر از :value کیلوبایت باشد',
        'string' => 'گزینه :attribute باید مساوی یا کمتر از :value کاراکتر باشد',
        'array' => 'گزینه :attribute نباید کمتر از :value آیتم داشته باشد',
    ],
    'max' => [
        'numeric' => 'گزینه :attribute نباید بزرگتر از :max باشد',
        'file' => 'گزینه :attribute نباید بزرگتر از :max کیلوبایت باشد',
        'string' => 'گزینه :attribute نباید بزرگتر از :max کاراکتر باشد',
        'array' => 'گزینه :attribute نباید بیشتر از :max آیتم داشته باشد',
    ],
    'mimes' => 'گزینه :attribute باید دارای یکی از این فرمت ها باشد: :values',
    'mimetypes' =>  'گزینه :attribute باید دارای یکی از این فرمت ها باشد: :values',
    'min' => [
        'numeric' => 'گزینه :attribute باید حداقل :min باشد',
        'file' => 'گزینه :attribute باید حداقل :min کیلوبایت باشد',
        'string' => 'گزینه :attribute باید حداقل :min کاراکتر باشد',
        'array' => 'گزینه :attribute باید حداقل :min آیتم داشته باشد',
    ],
    'multiple_of' => 'گزینه :attribute باید حاصل ضرب :value باشد',
    'not_in' => 'گزینه انتخابی :attribute صحیح نمی باشد',
    'not_regex' => 'فرمت گزینه :attribute صحیح نمی باشد',
    'numeric' => 'گزینه :attribute باید از نوع عددی باشد',
    'password' => 'رمزعبور صحیح نمی باشد',
    'present' => 'گزینه :attribute باید از نوع درصد باشد',
    'regex' => 'فرمت گزینه :attribute صحیح نمی باشد',
    'required' => 'تکمیل گزینه :attribute الزامی است',
    'required_if' => 'تکمیل گزینه :attribute زمانی که :other دارای مقدار :value است الزامی می باشد',
    'required_unless' => 'تکمیل گزینه :attribute الزامی می باشد مگر :other دارای مقدار :values باشد',
    'required_with' => 'تکمیل گزینه :attribute زمانی که مقدار :values درصد است الزامی است',
    'required_with_all' => 'تکمیل گزینه :attribute زمانی که مقادیر :values درصد است الزامی می باشد',
    'required_without' => 'تکمیل گزینه :attribute زمانی که مقدار :values درصد نیست الزامی است',
    'required_without_all' => 'تکمیل گزینه :attribute زمانی که هیچ کدام از مقادیر :values درصد نیست الزامی است',
    'same' => 'گزینه های :attribute و :other باید یکی باشند',
    'size' => [
        'numeric' => 'گزینه :attribute باید :size باشد',
        'file' => 'گزینه :attribute باید :size کیلوبایت باشد',
        'string' => 'گزینه :attribute باید :size  کاراکتر باشد',
        'array' => 'گزینه :attribute باید شامل :size آیتم باشد',
    ],
    'starts_with' => 'گزینه :attribute باید با یکی از این مقادیر شروع شود، :values',
    'string' => 'گزینه :attribute باید تنها شامل حروف باشد',
    'timezone' => 'گزینه :attribute باید از نوع منطقه زمانی صحیح باشد',
    'unique' => 'این :attribute از قبل ثبت شده است',
    'uploaded' => 'آپلود گزینه :attribute شکست خورد',
    'url' => 'فرمت :attribute اشتباه است',
    'uuid' => 'گزینه :attribute باید یک UUID صحیح باشد',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'نام',
        'username' => 'نام کاربری',
        'email' => 'ایمیل',
        'first_name' => 'نام',
        'last_name' => 'نام خانوادگی',
        'password' => 'رمز عبور',
        'password_confirmation' => 'تاییدیه رمز عبور',
        'city' => 'شهر',
        'state' => 'استان',
        'country' => 'کشور',
        'address' => 'آدرس',
        'phone' => 'تلفن',
        'mobile' => 'تلفن همراه',
        'age' => 'سن',
        'sex' => 'جنسیت',
        'gender' => 'جنسیت',
        'day' => 'روز',
        'month' => 'ماه',
        'year' => 'سال',
        'hour' => 'ساعت',
        'minute' => 'دقیقه',
        'second' => 'ثانیه',
        'title' => 'عنوان',
        'text' => 'متن',
        'content' => 'محتوا',
        'description' => 'توضیحات',
        'date' => 'تاریخ',
        'time' => 'زمان',
        'available' => 'موجود',
        'type' => 'نوع',
        'img' => 'تصویر',
        'image' => 'تصویر',
        'size' => 'اندازه',
        'color' => 'رنگ',
        'captcha' => 'کد امنیتی',
        'price' => 'قیمت',
        'pic' => 'تصویر',
        'link' => 'لینک',
        'country_id' => 'کشور',
        'province_id'=> 'استان',
        'county_id'=> 'شهرستان',
        'city_id' => 'شهر',
        'rural_district_id' => 'بخش',
        'grade_id' => 'مقطع تحصیلی',
        'sub_grade_id' => 'پایه تحصیلی',
        'major_id' => 'رشته تحصیلی',
        'minor_id' => 'گرایش تحصیلی',
        'university' => 'دانشگاه',
        'gender_id' => 'جنسیت',
        'department_of_education' => 'گروه عمده تحصیلی',
        'associate_degree' => 'کاردانی',
        'bachelor_degree' => 'کارشناسی',
        'masters' => 'کارشناسی ارشد',
        'phd' => 'دکتری',
        'unit' => 'واحد',
        'total_graduates' => 'تعداد کل فارغ التحصیلان',
        'employed_graduates' => 'تعداد فارغ التحصیلان شاغل',
        'graduate_growth_rate' => 'نرخ رشد فارغ التحصیلان',
        'related_employed_graduates' => 'تعداد فارغ التحصیلان شاغل در مشاغل مرتبط با رشته تحصیلی',
        'skill_certification_graduates' => 'تعداد فارغ التحصیلان دارای گواهینامه مهارتی و صلاحیت حرفه ای',
        'employed_graduates_6_months_after_graduation' => 'تعداد فارغ التحصیلان دارای شغل در مدت 6 ماه بعد از فراغت از تحصیل',
        'average_monthly_income_employed_graduates' => 'متوسط درآمد ماهیانه فارغ التحصیلان دارای شغل مرتبط با رشته تحصیلی',
        'number_of_faculty_members' => 'تعداد اعضای هیات علمی',
        'scientific_programs_faculty_members' => 'تعداد اعضای هیئت علمی مشارکت کننده در برنامه های علمی',
        'upgraded_faculty_members' => 'تعداد اعضای هیات علمی ارتقا یافته',
        'number_of_tuition_teachers' => 'تعداد مدرسین حق التدریس و اساتید مدعو',
        'number_of_officer_faculty_members_in_other_unit' => 'تعداد اعضای هیات علمی مامور در سایر واحدها',
        'number_of_officer_faculty_members_in_central_organization' => 'تعداد اعضای هیات علمی مامور در سازمان مرکزی',
        'number_of_participant_faculty_members_in_cooperation_plan' => 'تعداد اعضای هیات علمی شرکت کننده در طرح تعاون',
        'number_of_transfer_faculty_members' => 'تعداد اعضای هیات علمی انتقالی',
        'number_of_instructor_faculty_members' => 'تعداد اعضای هیات علمی با درجه مربی',
        'number_of_assistant_professor_faculty_members' => 'تعداد اعضای هیات علمی با درجه استادیار',
        'number_of_associate_professor_faculty_members' => 'تعداد اعضای هیات علمی با درجه دانشیار',
        'number_of_full_professor_faculty_members' => 'تعداد اعضای هیات علمی با درجه استاد تمام',
        'number_of_faculty_members_smaller_50_years_old' => 'تعداد اعضای هیات علمی دارای سن کمتر از 50 سال',
        'number_of_technology_faculty_members' => 'تعداد اعضای هیات علمی فناور',
        'number_of_faculty_members_type_a' => 'تعداد اعضای هیات علمی نوع الف',
        'number_of_faculty_members_type_b' => 'تعداد اعضای هیات علمی نوع ب',
        'number_of_top_scientific_faculty_members' => 'تعداد اعضای هیات علمی سرآمد علمی',
        'average_level_of_research_productivity_of_faculty_members' => 'متوسط سطح بهره وری پژوهشی اعضای هیات علمی',
        'number_of_valid_scientific_articles' => 'تعداد مقالات معتبر علمی',
        'number_of_valid_books' => 'تعداد کتب معتبر',
        'number_of_authored_books' => 'تعداد کتب تالیفی',
        'number_of_internal_inventions' => 'تعداد اختراعات ثبت شده داخلی',
        'number_of_international_inventions' => 'تعداد اختراعات ثبت شده بین المللی',
        'number_of_theses' => 'تعداد پایان نامه ها',
        'number_of_research_dissertations' => 'تعداد پایان نامه های منجر به مقاله علمی-پژوهشی',
        'number_of_compiled_dissertations' => 'تعداد پایان نامه های تدوین شده بر اساس نظام موضوعات برنامه های علمی دانشگاه',
        'number_of_invented_dissertations' => 'تعداد پایان نامه های منجر به ثبت اختراع',
        'number_of_product_dissertations' => 'تعداد پایان نامه های منجر به محصول',
        'number_of_completed_research_projects' => 'تعداد طرح های تحقیقاتی خاتمه یافته',
        'number_of_theorizing_chairs' => 'تعداد کرسی های نظریه پردازی برگزار شده توسط اساتید واحد دانشگاهی',
        'number_of_memoranda_of_understanding' => 'تعداد تفاهمنامه ها با صنایع و سازمان‌های محلی/ملی',
        'amount_of_national_contracts_concluded' => 'مبلغ قراردهای منعقد شده با صنایع و سازمان‌های ملی',
        'amount_of_local_contracts_concluded' => 'مبلغ قراردهای منعقد شده با صنایع و سازمان‌های محلی',
        'number_of_scientific_journals' => 'تعداد مجلات علمی',
        'number_of_R&D_research' => 'تعداد پژوهش های معطوف به R &D',
        'number_of_innovative_ideas' => 'تعداد طرح ها و ایده های فناورانه و نوآورانه تجاری سازی شده',
        'number_of_laboratories' => 'تعداد آزمایشگاه ها و کارگاه های دارای استاندارد بین المللی مصوب',
        'number_of_research_projects' => 'تعداد طرح های تحقیقاتی مشترک با محققان خارجی',
        'number_of_shared_articles' => 'تعداد مقالات مشترک با محققان خارجی و متخصصان ایرانی مقیم خارج از کشور',
        'number_of_international_research_projects' => 'تعداد طرح های تحقیقاتی بین المللی با ارزش بالای ۱۰۰ هزار دلار',
        'number_of_faculty_members_using_study_abroad' => 'تعداد اعضای هیات علمی استفاده کننده از فرصت های مطالعاتی خارج از کشور در هر سال تحصیلی',
        'number_of_graduate_students_with_opportunities_abroad' => 'تعداد دانشجویان تحصیلات تکمیلی دارای فرصت های مطالعاتی و تحقیقاتی خارج از کشور',
        'number_of_research_opportunities_presented' => 'تعداد فرصت های تحقیقاتی و پسادکتری ارایه شده به محققان و دانشجویان کشورهای خارجی و محققان ایرانی خارج از کشور',
        'number_of_foreign_workshops_held' => 'تعداد کارگاهها، دوره های آموزشی و تدریس بین المللی برگزار شده توسط اساتید خارجی و متخصصان ایرانی غیر مقیم',
        'number_of_international_lectures_held' => 'تعدادسخنرانی وسمینارهای علمی بین المللی برگزارشده توسط اساتیدخارجی و متخصصان ایرانی غیر مقیم',
        'number_of_international_awards' => 'تعداد جوایز بین المللی کسب شده در ۵ سال اخیر',
        'average_H_index_of_faculty_members' => 'متوسط H-index اعضای هیات علمی',
        'number_of_articles_science_and_nature' => 'تعداد مقالات در دو مجله Science  و Nature',
        'print_ISI_articles' => 'سرانه چاپ مقالات ISI',
        'percentage_of_quality_articles' => 'درصد مقالات کیفی در ۲۵ درصد بالای فهرست JCR (Q1)',
        'number_of_faculty_members_of_world_scientists' => 'تعداد اعضای هیات علمی با بیش از ۱۰۰۰ استناد یا در ردیف دانشمندان برتر جهان بر اساس نظام‌های رتبه بندی مصوب',
        'number_of_faculty_members_of_international_journals' => 'تعداد اعضای هیات علمی عضو هیات تحریریه مجلات معتبر بین المللی',
        'number_of_international_conferences_held' => 'تعداد همایش های بین المللی برگزار شده مصوب هیات امنا در ۵ سال اخیر',
        'number_of_international_scientific_books' => 'تعداد کتب علمی بین المللی و چاپ فصلی از کتاب های علمی بین المللی با Affiliation دانشگاه آزاد اسلامی',
        'number_of_international_agreements_implemented' => 'تعداد تفاهم نامه های بین المللی اجرایی شده',
        'amount_of_international_research_credits' => 'میزان اعتبارات پژوهشی (گرنت) بین المللی اخذ شده',
        'number_of_international_publications' => 'تعداد نشریه های دارای نمایه های استنادی بین المللی از جمله (ISI) و (Scopus)',
        'amount' => 'میزان',
        'number_of_active_innovation_houses' => 'تعداد سرای نوآوری فعال',
        'number_of_active_accelerators' => 'تعداد شتاب دهنده فعال',
        'number_of_active_growth_centers' => 'تعداد مراکز رشد فعال',
        'number_of_active_technology_cores' => 'تعداد هسته فناور فعال',
        'number_of_active_skill_high_schools' => 'تعداد مدارس عالی مهارتی فعال',
        'number_of_skill_training_centers' => 'تعداد مراکز توانمندسازی و آموزش مهارتی',
        'number_of_research_centers' => 'تعداد مراکز تحقیقاتی',
        'number_of_development_offices' => 'تعداد دفاتر توسعه و انتقال فناوری',
        'number_of_industry_trade_offices' => 'تعداددفاتر کلینیک صنعت، معدن و تجارت',
        'number_of_entrepreneurship_centers' => 'تعداد مراکز کارآفرینی',
        'number_of_active_technology_units' => 'تعداد واحدهای فناور فعال',
        'number_of_active_knowledge_based_companies' => 'تعداد شرکت دانش بنیان فعال',
        'number_of_creative_companies' => 'تعداد شرکت های خلاق',
        'number_of_commercialized_ideas' => 'تعداد طرح ها و ایده های فناورانه و نوآورانه تجاری سازی شده',
        'number_of_knowledge_based_products' => 'تعداد محصولات دانش بنیان',
        'number_of_products_without_license' => 'تعداد محصولات بدون مجوز',
        'number_of_licensed_products' => 'تعداد محصولات با مجوز',
        'number_of_active_technology_professors' => 'تعداد استاد فناور فعال',
        'number_of_active_technology_students' => 'تعداد دانشجوی فناور فعال',
        'number_of_participation' => 'تعداد مشارکت در انتقال دانش فنی/ فناوری انتقال یافته از خارج به داخل کشور (با ارائه گواهی مقام مجاز)',
        'number_of_technical_services' => 'تعداد خدمات فنی و مشاوره ای ارایه شده به موسسات یا شرکت های خارجی',
        'earnings' => 'میزان کسب درآمد از خدمات فنی و مشاوره ای بین المللی',
        'number_of_international_knowledge_based_companies' => 'تعداد شرکت های دانش بنیان با فعالیت بین المللی',
        'cultural_centers_status_score' => 'نمره وضعیت کانون های فرهنگی واحد دانشگاهی',
        'printed_publications_status_score' => 'نمره وضعیت نشریات چاپی و الکترونیکی واحد',
        'cultural_organizations_status_score' => 'نمره وضعیت تشکلهای فرهنگی واحد',
        'people_coverage_status_score' => 'نمره وضعیت آراستگی و پوشش دانشجویان، اساتید و کارکنان واحد',
        'free_thinking_status_score' => 'نمره وضعیت کیفی و کمی کرسی های آزاد اندیشی',
        'interact_with_cyberspace_status_score' => 'نمره وضعیت تعامل با فضای مجازی در واحد دانشگاهی',
        'fixed_cultural_events_status_score' => 'نمره وضعیت برنامه ها و رویدادهای ثابت فرهنگی واحد',
        'amounts_of_honors_and_awards' => 'میزان افتخارات و جوایز فرهنگی کسب شده در واحد در سطوح مختلف منطقه ای و ملی',
        'cultural_industry_products' => 'میزان تولیدات در صنایع فرهنگی',
        'level_of_initiatives' => 'سطح ابتکارات و نوآوری های فرهنگی در واحد دانشگاهی',
        'points_for_running_luxury_programs' => 'امتیاز طراحی و اجرای برنامه های فاخر',
        'election_turnout_score' => 'نمره میزان مشارکت در انتخابات',
        'score_cultural_skills_training_programs' => 'امتیاز برنامه های آموزش مهارت های فرهنگی',
        'score_of_cultural_participation_of_Basiji_professors' => 'نمره مشارکت فرهنگی اساتید بسیجی',
        'participation_of_unit_professors_in_cultural_counseling' => 'میزان مشارکت اساتید واحد در ارائه مشاوره فرهنگی',
        'position_of_the_university_as_cultural_center' => 'جایگاه دانشگاه بعنوان قطب فرهنگی شهر',
        'score_cultural_programs' => 'نمره برنامه های ویژه حل مسایل فرهنگی اختصاصی واحد دانشگاهی',
        'score_Families_of_professors' => 'نمره برنامه های فرهنگی خانواده های اساتید و کارکنان واحد دانشگاهی',
        'score_of_professors' => 'نمره برنامه های فرهنگی اساتید واحد دانشگاهی',
        'satisfaction_of_managers_performance' => 'میزان رضایتمندی از عملکرد مدیران در واحد دانشگاهی',
        'percentage_of_students_participating_in_sports_competitions' => 'درصد دانشجویان شرکت کننده در مسابقات ورزشی واحد دانشگاهی از کل دانشجویان آن واحد دانشگاهی به تفکیک مقطع تحصیلی و جنسیت',
        'percentage_of_students_participating_in_cultural_competitions' => 'درصد دانشجویان شرکت کننده در مسابقات فرهنگی واحد دانشگاهی از کل دانشجویان آن واحد دانشگاهی به تفکیک مقطع تحصیلی و جنسیت',
        'percentage_of_students_in_student_organizations' => 'درصد دانشجویان عضو تشکل های دانشجویی واحد دانشگاهی از کل دانشجویان آن واحد دانشگاهی',
        'student_counseling_centers' => 'نسبت تعداد مراکز راهنمایی و مشاوره دانشجویی واحد دانشگاهی به کل دانشجویان آن واحد',
        'percentage_of_students_referring_to_student_counseling_centers' => 'درصد دانشجویان مراجعه کننده به مراکز راهنمایی و مشاوره دانشجویی نسبت به کل دانشجویان واحد دانشگاهی',
        'general_cultural_rank_of_the_university_unit' => 'رتبه کلی فرهنگی واحد دانشگاهی',
        'professional_doctor' => 'دکتری حرفه ای',
        'student_satisfaction' => 'میزان رضایت دانشجویان و فارغ التحصیلان واحد از خدمات دانشگاه',
        'unique_organizational_learning_capability' => 'قابلیت یادگیری سازمانی واحد',
        'students_religious_beliefs' => 'میزان پایبندی به فضایل اخلاقی و باورهای دینی در میان دانشجویان واحد دانشگاهی',
        'student_study_research_culture' => 'میزان پایبندی به فرهنگ تحقیق مطالعه، تتبع و تحقیق در میان دانشجویان واحد',
        'hijab_culture_of_students' => 'میزان پایبندی به فرهنگ عفاف و حجاب و سبک پوشش اسلامی در میان دانشجویان واحد',
        'culture_of_participation' => 'سطح فرهنگ مشارکت پذیری و کار گروهی در واحد',
        'faculty_members_self_confidence' => 'سطح خودباوری و تعلق سازمانی در میان اعضای هیات علمی و کارکنان واحد',
        'amount_of_physical_elements' => 'میزان المان های فیزیکی و نمایه های بصری هویت دار در واحد دانشگاهی',
        'percentage_of_sample_professors_in_unit' => 'درصد اساتید نمونه واحد دانشگاهی از کل اساتید نمونه دانشگاه آزاد اسلامی استان',
        'percentage_of_sample_professors_in_province' => 'درصد اساتید نمونه دانشگاه آزاد اسلامی استان از کل اساتید نمونه دانشگاه آزاد اسلامی',
        'percentage_of_sample_students_in_unit' => 'درصد دانشجویان نمونه واحد دانشگاهی از کل دانشجویان نمونه دانشگاه آزاد اسلامی استان',
        'percentage_of_sample_students_in_province' => 'درصد دانشجویان نمونه دانشگاه آزاد اسلامی استان از کل دانشجویان نمونه دانشگاه آزاد اسلامی',
        'brand_influence_in_the_province' => 'میزان نفوذ برند دانشگاه آزاد اسلامی و هویت بصری آن در سطح شهرستان/استان',
        'level_of_intelligence' => 'میزان سامانه سپاری و هوشمندسازی ساختار تشکیلاتی، فرایندها و نظام های مدیریت در واحد',
        'axial_program' => 'برنامه محوری (وجود برنامه راهبردی-عملیاتی در سطح واحد/استان مبتنی بر طرح آمایش)',
        'higher_education_subsystems' => 'زیرنظام های آموزش عالی شهرستان',
        'number_of_non_faculty_staff' => 'تعداد کارکنان غیر هیات علمی',
        'average_age_of_employees' => 'میانگین سنی کارمندان',
        'number_of_male_employees' => 'تعداد کارمندان مرد',
        'number_of_female_employees' => 'تعداد کارمندان زن',
        'number_of_administrative_staff' => 'تعداد کارمندان اداری',
        'number_of_training_staff' => 'تعداد کارمندان بخش آموزشی',
        'number_of_research_staff' => 'تعداد کارمندان بخش پژوهش و فناوری',
        'number_of_PhD_staff' => 'تعداد کارمندان با مدرک دکترا',
        'number_of_master_staff' => 'تعداد کارمندان با مدرک کارشناسی ارشد',
        'number_of_expert_staff' => 'تعداد کارمندان با مدرک کارشناسی',
        'number_of_diploma_and_sub_diploma_employees' => 'تعداد کارمندان با مدرک دیپلم و زیر دیپلم',
        'number_of_employees_studying' => 'تعداد کارمندان در حال تحصیل',
        'growth_rate' => 'نرخ رشد کارمندان',
        'percapita_office_space' => 'سرانه فضای اداری',
        'percapita_educational_space' => 'سرانه فضای آموزشی',
        'percapita_innovation_space' => 'سرانه فضای فناوری و نوآوری',
        'percapita_cultural_space' => 'سرانه فضای فرهنگی',
        'percapita_civil_space' => 'سرانه فضای عمرانی',
        'building_under_construction' => 'ساختمان در دست احداث',
        'percapita_residential' => 'سرانه اقامتی',
        'percapita_operating_buildings' => 'سرانه ساختمان های بهره بردار',
        'percapita_sports_space' => 'سرانه فضای ورزشی',
        'percapita_aristocratic_space' => 'سرانه فضای اعیانی',
        'percapita_arena_space' => 'سرانه فضای عرصه',
        'office_space_utilization_rate' => 'نرخ بهره برداری از فضای اداری',
        'utilization_rate_of_educational_equipment' => 'نرخ بهره برداری از فضا و تجهیزات آموزشی',
        'utilization_rate_of_technology_equipment' => 'نرخ بهره برداری از فضای و تجهیزات فناوری و نوآوری',
        'utilization_rate_of_cultural_equipment' => 'سرانه نرخ بهره برداری از فضا و تجهیزات فرهنگی',
        'utilization_rate_of_sports_equipment' => 'نرخ بهره برداری از فضا و تجهیزات ورزشی',
        'operation_rate_of_agricultural_equipment' => 'نرخ بهره برداری از تجهیزات و فضای کشاورزی و زراعی',
        'operation_rate_of_workshop_equipment' => 'ﻧـﺮخﺑﻬـﺮهﺑـﺮداری ازتجهیزات و فضای کارگاهی و آزمایشگاهی',
        'faculty_capacity_utilization_rate' => 'نرخ بهره برداری از ظرفیت اعضای هیات علمی',
        'employee_capacity_utilization_rate' => 'نرخ بهره برداری از ظرفیت کارمندان',
        'graduate_capacity_utilization_rate' => 'نرخ بهره برداری از ظرفیت فارغ التحصیلان',
        'student_capacity_utilization_rate' => 'نرخ بهره برداری از ظرفیت دانشجویان',
        'ratio_of_faculty_members_to_students' => 'نسبت تعداد اعضای هیات علمی به دانشجویان',
        'ratio_of_staff_to_students' => 'نسبت تعداد کارمندان به دانشجویان',
        'ratio_of_faculty_members_to_teaching_professors' => 'نسبت تعداد اعضای هیات علمی به تعداد اساتید مدعو و حق التدریس',
        'ratio_of_faculty_members_to_employees' => 'نسبت تعداد اعضای هیات علمی به کارمندان واحد',
        'ratio_of_unit_faculty_members_to_faculty_members_of_the_province' => 'نسبت تعداد اعضای هیات علمی به میانگین تعداد اعضای هیات علمی استان',
        'ratio_of_unit_students_to_students_of_the_province' => 'نسبت تعداد دانشجویان به میانگین تعداد دانشجویان استان',
        'ratio_of_unit_employees_to_provincial_employees' => 'نسبت تعداد کارمندان به میانگین تعداد کارمندان استان',
        'unit_teaching_professors_to_teaching_professors_province' => 'نسبت تعداد اساتید مدعو و حق التدریس به میانگین تعداد اساتید مدعو و حق التدریس استان',
        'total_revenue' => 'کل درآمد ها',
        'income_from_student_tuition' => 'درآمد حاصل از شهریه دانشجویان',
        'income_from_commercialized_technologies' => 'درصد درآمد حاصل از فروش فناوری و طرح های تجاری سازی شده',
        'income_from_research_activities' => 'درصد درآمد حاصل از فعالیت های تحقیق و توسعه واحد',
        'income_from_skills_training' => 'درآمدهای حاصل از مهارت آموزی، فعالیت های کاربنیان و کارآفرینی واحد',
        'operating_income_growth_rate' => 'نرخ رشد درآمدهای عملیاتی واحد',
        'total_non_tuition_income' => 'مجموع درآمدهای غیر شهریه ای واحد',
        'total_international_income' => 'مجموع درآمد های ناشی از فعالیت های بین المللی',
        'shareholder_income' => 'درآمد ناشی از سهامداری',
        'total_annual_income' => 'کل درآمد های سالیانه',
        'university_type' => 'دانشگاه',
        'grade' => 'مقطع تحصیلی',
        'percapita_revenue_status_analyses' => 'تحلیل وضعیت درآمد سرانه',
        'payment_to_faculty_members' => 'درصد کل پرداختی به اعضای هیات علمی تمام وقت واحد دانشگاهی',
        'total_running_costs' => 'کل هزینه های جاری',
        'average_salary_of_faculty_members' => 'میانگین حقوق دریافتی اعضای هیات علمی',
        'average_salaries_of_faculty_members_from_research_contracts' => 'میانگین حقوق دریافتی اعضای هیات علمی دانشگاه آزاد اسلامی استان از محل قراردهای تحقیقاتی، آموزشی و خدماتی',
        'student_fees' => 'هزینه دانشجویان',
        'average_salary_of_employees' => 'میانگین حقوق دریافتی کارمندان',
        'current_expenditure_growth_rate' => 'نرخ رشد هزینه های جاری',
        'cost_of_paying_office_rent' => 'هزینه پرداخت اجاره ساختمان اداری',
        'cost_of_rent_for_educational_building' => 'هزینه پرداخت اجاره ساختمان آموزشی',
        'cost_of_rent_for_research_building' => 'هزینه پرداخت اجاره ساختمان پژوهشی',
        'extra_charge_for_rent_extracurricular_building' => 'هزینه پرداخت اجاره ساختمان فوق برنامه',
        'cost_of_rent_innovation_buildings' => 'هزینه پرداخت اجاره ساختمان فناوری و نوآوری',
        'energy_costs_of_buildings' => 'هزینه های انرژی ساختمان ها',
        'cost_of_university_equipment' => 'هزینه های نگهداری، استهلاک و تعمیرات دارایی ها و تجهیزات دانشگاه',
        'training_costs' => 'هزینه های حوزه آموزش',
        'research_costs' => 'هزینه های حوزه پژوهش',
        'innovation_costs' => 'هزینه های حوزه فناوری و نوآوری',
        'educational_costs' => 'هزینه های حوزه مهارت آموزشی و کارآفرینی',
        'development_costs' => 'هزینه های حوزه تحقیق و توسعه',
        'cultural_sphere_costs' => 'هزینه های حوزه فرهنگی',
        'administrative_costs' => 'هزینه های حوزه اداری',
        'information_technology_costs' => 'هزینه های حوزه فناوری اطلاعات و زیرساخت های فضای مجازی',
        'International_sphere_costs' => 'هزینه های حوزه بین الملل',
        'costs_of_staff_training_and_faculty' => 'هزینه های حوزه آموزش ضمن خدمت کارکنان و اساتید',
        'sports_expenses' => 'هزینه های حوزه ورزشی',
        'health_costs' => 'هزینه های حوزه بهداشت و سلامت',
        'entrepreneurship_costs' => 'هزینه های حوزه ترویج کارآفرینی و اشتغال',
        'graduate_costs' => 'هزینه های حوزه فارغ التحصیلان',
        'branding_costs' => 'هزینه های حوزه برند سازی و تبلیغات و جذب دانشجویان',
        'total_annual_expenses' => 'کل هزینه های سالیانه',
        'administrative_credits' => 'اعتبارات اداری',
        'educational_credits' => 'اعتبارات آموزشی',
        'research_credits' => 'اعتبارات پژوهشی',
        'cultural_credits' => 'اعتبارات فرهنگی',
        'innovative_credits' => 'اعتبارات فناورانه و نوآورانه',
        'skills_credits' => 'اعتبارات حوزه مهارتی',
        'total_University_credits' => 'کل اعتبارات دانشگاه',
        'total_university_assets' => 'کل دارایی های دانشگاه',
        'degree/rank' => 'درجه/رتبه',
        'score' => 'امتیاز',
        'established_year' => 'سال تاسیس',
        'approved_number_and_titles_of_the_faculty' => 'تعداد و عناوین دانشکده مصوب',
        'experimental_policy_title' => 'عنوان سیاست آزمایشی',
        'title_axis' => 'عنوان محور',
        'project_title' => 'عنوان پروژه',
        'quantitative_goal' => 'هدف کمی',
        'test' => 'سنجش',
        'annual_progress_level' => 'سطح پیشرفت و تحقق سالانه',
        'responsible_for_track' => 'مسئول پیگیری',
        'considerations' => 'ملاحظات',
        'immigration_rates' => 'نرخ مهاجرت',
        'population' => 'جمعیت',
        'unit_university' => 'واحد دانشگاهی',
        'university_building' => 'ساختمان واحد دانشگاهی',
        'distance_from_population_density_of_city' => 'فاصله از تراکم جمعیتی شهر',
        'distance_from_center_of_province' => 'فاصله از مرکز استان',
        'climate_type_and_weather_conditions' => 'نوع اقلیم و شرایط آب و هوایی',
        'distance_to_the_nearest_higher_education_center' => 'فاصله تا نزدیکترین مرکز آموزش عالی',
        'distance_to_the_nearest_unit_of_azad_university' => 'فاصله تا نزدیکترین واحد دانشگاه آزاد',
        'level_and_quality_of_access' => 'سطح و کیفیت دسترسی',
        'international_opportunities_geographical_location' => 'فرصت های بین الملی موقعیت جغرافیایی',
        'ebtedai' => 'ابتدایی',
        'motevasete_1' => 'متوسطه اول',
        'motevasete_2_ensani' => 'متوسطه دوم (علوم انسانی)',
        'motevasete_2_math' => 'متوسطه دوم (ریاضی)',
        'motevasete_2_science' => 'متوسطه دوم (علوم تجربی)',
        'motevasete_2_kar_danesh' => 'متوسطه دوم (کار و دانش و فنی حرفه ای)',
        'amount' => 'مقدار (درصد)',
        'part' => 'بخش',
        'number_of_research' => 'تعداد پژوهش',
        'amount_payment_rd' => 'میزان هزینه کرد',
        'education_id' => 'تحصیلات',
        'agriculture_hunting_forestry' => 'کشاورزی، شکار و جنگلداری',
        'mining_construction' => 'استخراج معدن - ساخت',
        'water_electricity_natural_gas_supply' => 'تامین آب، برق و گاز طبیعی',
        'building' => 'ساختمان',
        'wholesale_retail_vehicle_repair_supply' => 'عمده فروشی، خرده فروشی، تعمیر وسایل نقلیه و تامین کالا',
        'hotel_and_restaurant' => 'هتل و رسنوران',
        'transportation_warehousing_communications' => 'حمل و نقل، انبارداری و ارتباطات',
        'financial_intermediation' => 'واسطه گری های مالی',
        'office_of_public_affairs_urban_services' => 'اداره امور عمومی و خدمات شهری، دفاع، و تامین اجتماعی',
        'education' => 'آموزش',
        'health_and_social_work' => 'بهداشت و مددکاری اجتماعی',
        'activities_of_employed_households' => 'فعالیت های خانوارهای دارای مستخدم',
        'overseas_organizations_and_delegations' => 'سازمان ها و هیات های برون مرزی',
        'real_estates' => 'املاک و مستغلات',
        'professional_scientific_technical_activities' => 'فعالیت های حرفه ای ، علمی و فنی',
        'office_and_support_services' => 'اداری و خدمات پشتیبانی',
        'art_and_entertainment' => 'هنر  و سرگرمی',
        'other_services' => 'سایر خدمات',
        'azad_eslami_count' => 'دانشگاه آزاد اسلامی',
        'dolati_count' => 'دانشگاه دولتی',
        'payam_noor_count' => 'دانشگاه پیام نور',
        'gheir_entefai_count' => 'دانشگاه غیر انتفاعی',
        'elmi_karbordi_count' => 'دانشگاه علمی کاربردی',
        'number_of_students' => 'تعداد دانشجویان',
        'number_of_volunteers' => 'تعداد دانشجویان',
        'number_of_admissions' => 'تعداد پذیرفته شدگان',
        'number_of_registrants' => 'تعداد دانشجویان',
        'annual_growth_rate_of_student_enrollment' => 'نرخ رشد',
        'average_test_score_of_the_first_thirty_percent_of_admitted' => 'مقدار',
        'average_test_score_of_the_last_five_percent_of_admitted' => 'مقدار',
        'student_admission_capacities' => 'تعداد',
        "total_number_of_fields_of_study" => 'تعداد کل رشته های تحصیلی',
        "number_of_international_courses" => 'تعداد رشته های تحصیلی بین المللی',
        "number_of_virtual_courses" => 'تعداد رشته های تحصیلی مجازی',
        "number_of_technical_disciplines" => 'تعداد رشته های فنی و حرفه ای و مهارتی',
        "number_of_newly_established_courses" => 'تعداد رشته های تحصیلی جدید التاسیس',
        "number_of_courses_not_accepted" => 'تعداد رشته / محل های فاقد پذیرش',
        "number_of_courses_without_volunteers" => 'تعداد رشته / محل های فاقد داوطلب',
        "number_of_GDP_courses" => 'تعداد تعدادرشته های تحصیلی مرتبط با حوزه GDP غالب استان',
        "number_of_disciplines_corresponding_to_job_fields" => 'تعداد رشته های تحصیلی منطبق با حوزه های شغلی مورد نیاز در شهرستان',
        "number_of_fields_corresponding_to_the_specified_specialties" => 'تعداد رشته های تحصیلی منطبق با تخصص های تعیین شده برای شهرستان',
        "number_of_courses_offered_virtually" => 'تعداد واحدهای درسی ارایه شده به صورت مجازی',
        "number_of_popular_fields_more_than_eighty_percent_capacity" => 'تعداد رشته های تحصیلی پر مخاطب',
        "number_of_courses_with_low_audience" => 'تعداد رشته های تحصیلی کم مخاطب',
        "number_of_fields_of_less_than_5_people" => 'تعداد رشته های تحصیلی کمتر از 5 نفر',
        "number_of_courses_without_admission" => 'تعداد رشته های تحصیلی بدون پذیرش',
        "number_of_popular_fields" => 'تعداد رشته های تحصیلی پر متقاضی',
        "low_number_of_applicants" => 'تعداد رشته های تحصیلی کم متقاضی',
        "kardani_peyvaste_count" => 'تعداد کاردانی پیوسته',
        "kardani_na_peyvaste_count" => 'تعداد کاردانی ناپیوسته',
        "karshenasi_peyvaste_count" => 'تعداد کارشناسی پیوسته',
        "karshenasi_na_peyvaste_count" => 'تعداد کارشناسی ناپیوسته',
        "karshenasi_arshad_count" => 'تعداد کارشناسی ارشد',
        "docktora_herfei_count" => 'تعداد دکتری حرفه ای',
        "docktora_takhasosi_count" => 'تعداد دکتری تخصصی',
        "total_number_of_courses" => 'تعداد کل دوره های تحصیلی',
        "number_of_international_Persian_language_courses_in_person" => 'تعداد دوره های تحصیلی بین المللی زبان فارسی حضوری',
        "number_of_international_virtual_Persian_language_courses" => 'تعداد دوره های تحصیلی بین المللی برگزار شده به زبان فارسی به صورت مجازی',
        "number_of_international_courses_in_the_target_language_in_person" => 'تعداد دوره های تحصیلی بین المللی برگزار شده به زبان های کشورهای هدف به صورت حضوری',
        "number_of_international_courses_in_the_target_language_virtually" => 'تعداد دوره های تحصیلی بین المللی برگزار شده به زبان های کشورهای هدف به صورت مجازی',
        "kardani_count" => 'تعداد کاردانی',
        "karshenasi_count" => 'تعداد کارشناسی',
        "docktora_count" => 'تعداد دکتری',
        "phone_number" => 'شماره همراه',
        'total_number_of_curricula' => 'تعداد کل برنامه های درسی (رشته گرایش ها)',
        'number_of_modified_curricula' => 'تعداد برنامه های درسی بازنگری و اصلاح شده با رویکرد مهارت آموزی',
        'new_interdisciplinary_curricula_implemented' => 'برنامه های درسی جدید میان رشته ای مورد اجرا',
        'complete_new_interdisciplinary_curricula' => 'کل برنامه های درسی جدید میان رشته ای مورد اجرا',
        'number_of_common_curricula_with_the_world' => 'تعداد برنامه های درسی مشترک اجرا شده با سایر دانشگاه های جهان',
        'number_of_curricula_developed' => 'تعداد برنامه درسی تدوین شده جهت تاسیس رشته جدید تحصیلی توسط واحد دانشگاهی مورد نظر',

]
];
