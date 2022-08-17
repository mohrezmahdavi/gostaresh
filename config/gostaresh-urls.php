<?php

return [
    'url' => [
        'پایش محیطی'                                       => [
            'جمعیت' => [
                [
                    'title' => 'روند تحولات جمعیتی شهرستان های استان',
                    'model' => \App\Models\Index\DemographicChangesOfCity::class,
                    'name'  => 'demographic.changes.city',
                ],
            ],

            'اقلیم و جغرافیا' => [
                [
                    'title' => 'وضعیت جغرافیایی واحد و دسترسی به آن در استان',
                    'model' => \App\Models\Index\GeographicalLocationOfUnit::class,
                    'name'  => 'geographical.location.unit'
                ],
            ],

            'دانش آموز'     => [
                [
                    'title' => 'تعداد و ترکیب جمعیت دانش آموزی استان',
                    'model' => \App\Models\Index\NumberStudentPopulation::class,
                    'name'  => 'number.student.population'
                ],
                [
                    'title' => ' نرخ رشد و ترکیب جمعیت دانش آموزی استان',
                    'model' => \App\Models\Index\GrowthRateStudentPopulation::class,
                    'name'  => 'growth.rate.student.population'
                ],
                [
                    'title' => ' روند تغییرات سهم تولید ناخالص داخلی شهرستان در مقایسه با تولید ناخالص داخلی',
                    'model' => \App\Models\Index\GDPCity::class,
                    'name'  => 'gdp.city'
                ],
                [
                    'title' => 'روند تغییرات سهم تولید ناخالص داخلی استان ',
                    'model' => \App\Models\Index\GDPPart::class,
                    'name'  => 'gdp.part',
                ],
            ],
            'تحقیق و توسعه' => [
                [
                    'title' => 'روند تغییرات تعداد کل طرح های پژوهشی مورد اجرا در داخل استان',
                    'model' => \App\Models\Index\NumberOfResearchProject::class,
                    'name'  => 'number.of.research.project',
                ],
                [
                    'title' => 'روند تغییرات میزان هزینه کرد در بخش R&D',
                    'model' => \App\Models\Index\PaymentRAndDDepartment::class,
                    'name'  => 'payment.r.and.d.department',
                ],
                [
                    'title' => 'روند تغییرات درصد هزینه‌کرد بخش صنعت در تحقیق‌ و توسعه',
                    'model' => \App\Models\Index\IndustrialExpenditureResearch::class,
                    'name'  => 'industrial.expenditure.research',
                ],
            ],

            'شاغلین'        => [
                [
                    'title' => 'وضعیت نرخ مشارکت اقتصادی',
                    'model' => \App\Models\Index\EconomicParticipationRate::class,
                    'name'  => 'economic.participation.rate',
                ],
                [
                    'title' => 'وضعیت نرخ بیکاری',
                    'model' => \App\Models\Index\UnemploymentRate::class,
                    'name'  => 'unemployment.rate',
                ],
                [
                    'title' => 'وضعیت اشتغال شهرستان های استان ',
                    'model' => \App\Models\Index\EmploymentOfProvincial::class,
                    'name'  => 'employment.of.provincial',
                ],
            ],
            'فقر و محرومیت' => [
                [
                    'title' => 'تحلیل وضعیت شاخص محرومیت چندگانه',
                    'model' => \App\Models\Index\MultipleDeprivationIndexOfCity::class,
                    'name'  => 'multiple.deprivation.index.of.city',
                ],
                [
                    'title' => 'نرخ فقر شهرستان های استان',
                    'model' => \App\Models\Index\PovertyOfProvincialCity::class,
                    'name'  => 'poverty.of.provincial.city',
                ],
            ]
        ],
        'پایش آموزش عالی و محیط درونی دانشگاه آزاد اسلامی' => [
            'آموزش'           => [
                [
                    'title' => ' تحلیل وضعیت تعداد دانشجویان',
                    'model' => \App\Models\Index\NumberOfStudentsStatusAnalysis::class,
                    'name'  => 'number.of.students.status.analysis',
                ],                [
                    'title' => ' تحلیل وضعیت تعداد دانشجویان بر اساس مقطع',
                    'model' => \App\Models\Index\NumberOfStudentsStatusByGradeAnalysis::class,
                    'name'  => 'number.of.students.status.by-grade.analysis',
                ],
                [
                    'title' => 'تحلیل وضعیت تعداد داوطلبان',
                    'model' => \App\Models\Index\NumberOfVolunteersStatusAnalysis::class,
                    'name'  => 'number.of.volunteers.status.analysis',
                ],
                [
                    'title' => ' تعداد پذیرفته شدگان',
                    'model' => \App\Models\Index\NumberOfAdmissionsStatusAnalysis::class,
                    'name'  => 'number.of.admissions.status.analysis',
                ],
                [
                    'title' => 'تعداد ثبت نام شدگان',
                    'model' => \App\Models\Index\NumberOfRegistrantsStatusAnalysis::class,
                    'name'  => 'number.of.registrants.status.analysis',
                ],
                [
                    'title' => 'تحلیل وضعیت تعداد برنامه های درسی',
                    'model' => \App\Models\Index\StatusAnalysisOfTheNumberOfCurricula::class,
                    'name'  => 'status.analysis.of.the.number.of.curricula',
                ],
                [
                    'title' => ' نرخ پوشش تحصیلی بر حسب گروه عمده تحصیلی',
                    'model' => \App\Models\Index\AcademicMajorEducational::class,
                    'name'  => 'academic.major.educational',
                ],

                [
                    'title' => ' نرخ رشد سالانه ثبت نام دانشجو',
                    'model' => \App\Models\Index\AnnualGrowthRateOfStudentEnrollment::class,
                    'name'  => 'annual.growth.rate.of.student.enrollment',
                ],
                [
                    'title' => 'میانگین رتبه آزمون سراسری 30 درصد اول پذیرفته شدگان',
                    'model' => \App\Models\Index\AverageTestScoreOfTheFirstThirtyPercentOfAdmitted::class,
                    'name'  => 'average.test.score.of.the.first.thirty.percent.of.admitted',
                ],
                [
                    'title' => 'میانگین رتبه آزمون سراسری 5 درصد آخر پذیرفته شدگان',
                    'model' => \App\Models\Index\AverageTestScoreOfTheLastFivePercentOfAdmitted::class,
                    'name'  => 'average.test.score.of.the.last.five.percent.of.admitted',
                ],
                [
                    'title' => 'میزان ظرفیت پذیرش دانشجو',
                    'model' => \App\Models\Index\StudentAdmissionCapacity::class,
                    'name'  => 'student.admission.capacity',
                ],
                [
                    'title' => ' تحلیل وضعیت تعداد رشته های تحصیلی',
                    'model' => \App\Models\Index\StatusAnalysisOfTheNumberOfFieldsOfStudy::class,
                    'name'  => 'status.analysis.of.the.number.of.fields.of.study',
                ],
                [
                    'title' => ' تعدادرشته/گرایشهای تحصیلی غیر پزشکی (۱)',
                    'model' => \App\Models\Index\NumberOfNonMedicalFieldsOfStudy::class,
                    'name'  => 'number.of.non.medical.fields.of.study',
                ],
                [
                    'title' => ' تعدادرشته/گرایشهای تحصیلی غیر پزشکی (۲)',
                    'model' => \App\Models\Index\NumberOfNonMedicalFieldsOfStudy2::class,
                    'name'  => 'number.of.non.medical.fields.of.study.2',
                ],
                [
                    'title' => 'تحلیل وضعیت تعداد دوره های تحصیلی',
                    'model' => \App\Models\Index\StatusAnalysisOfTheNumberOfCourse::class,
                    'name'  => 'status.analysis.of.the.number.of.course',
                ],
                [
                    'title' => 'تعداد دانشجویان غیرایرانی و بین الملل واحدهای دانشگاهی',
                    'model' => \App\Models\Index\NumberOfInternationalCourse::class,
                    'name'  => 'number.of.international.course',
                ],
                [
                    'title' => 'نرخ رشد دانشجویان غیرایرانی و بین الملل واحدهای دانشگاهی',
                    'model' => \App\Models\Index\InternationalStudentGrowthRate::class,
                    'name'  => 'international.student.growth.rate',
                ],

                [
                    'title' => 'کل دانش آموختگان از مراکز آموزش عالی موجود',
                    'model' => \App\Models\Index\GraduatesOfHigherEducationCenters::class,
                    'name'  => 'graduates-of-higher-education',
                ],
                [
                    'title' => 'تحلیل وضعیت فارغ التحصیلان',
                    'model' => \App\Models\Index\GraduateStatusAnalysis::class,
                    'name'  => 'graduate-status-analyses',
                ],
            ],
            'فارغ التحصیلان'  => [
                [
                    'title' => 'تحلیل وضعیت اعضای هیات علمی و مدرسین',
                    'model' => \App\Models\Index\TeachersStatusAnalysis::class,
                    'name'  => 'teachers-status-analyses',
                ],
            ],
            'پژوهش'           => [
                [
                    'title' => 'تحلیل وضعیت برونداد پژوهشی',
                    'model' => \App\Models\Index\ResearchOutputStatusAnalysis::class,
                    'name'  => 'research-output-status-analyses',
                ],
                [
                    'title' => 'تحلیل وضعیت پژوهش بین المللی (۱)',
                    'model' => \App\Models\Index\InternationalResearchStatusAnalysis::class,
                    'name'  => 'international-research',
                ],
                [
                    'title' => 'تحلیل وضعیت پژوهش بین المللی (۲)',
                    'model' => \App\Models\Index\InternationalResearchStatusAnalysis2::class,
                    'name'  => 'international-research2',
                ],
                [
                    'title' => ' میزان تسهیلات و حمایت های مالی صورت گرفته ',
                    'model' => \App\Models\Index\AmountOfFacilitiesForResearchAchievements::class,
                    'name'  => 'amount-of-facilities',
                ],
            ],
            'فناوری و نوآوری' => [
                [
                    'title' => 'تعداد زیرساخت های فناوری و نوآوری',
                    'model' => \App\Models\Index\TechnologyAndInnovationInfrastructure::class,
                    'name'  => 'innovation-infrastructures',
                ],
                [
                    'title' => ' تعداد و محصولات فناورانه و نوآورانه',
                    'model' => \App\Models\Index\TechnologicalProduct::class,
                    'name'  => 'technological-product',
                ],
                [
                    'title' => ' انتقال فناوری و نوآوری در عرصه بین المللی',
                    'model' => \App\Models\Index\InternationalTechnology::class,
                    'name'  => 'international-technology',
                ],
            ],
            'فرهنگی'          => [
                [
                    'title' => 'تحلیل وضعیت  شاخص ها و برنامه های فرهنگی',
                    'model' => \App\Models\Index\CulturalIndicatorsStatusAnalysis::class,
                    'name'  => 'cultural-indicators',
                ],
                [
                    'title' => 'تحلیل وضعیت  سلامت اجتماعی در طرح سیمای زندگی',
                    'model' => \App\Models\Index\SocialHealthStatusAnalysis::class,
                    'name'  => 'social-health',
                ],
                [
                    'title' => ' تحلیل وضعیت  فرهنگ سازمانی',
                    'model' => \App\Models\Index\OrganizationalCultureStatusAnalysis::class,
                    'name'  => 'organizational-culture',
                ],
            ],
            'مالی و اداری'    => [
                [
                    'title' => 'تحلیل وضعیت و  مشخصات کارمندان دانشگاه',
                    'model' => \App\Models\Index\EmployeeProfile::class,
                    'name'  => 'employee-profile',
                ],
                [
                    'title' => 'تحلیل وضعیت سرانه فضای دانشگاهی',
                    'model' => \App\Models\Index\PercapitaStatusAnalysis::class,
                    'name'  => 'percapita-status-analyses',
                ],
                [
                    'title' => 'تحلیل وضعیت شاخص میزان بهره وری از دارایی',
                    'model' => \App\Models\Index\IndexOfAssetProductivity::class,
                    'name'  => 'asset-productivity',
                ],
                [
                    'title' => ' تحلیل وضعیت درآمد های دانشگاه',
                    'model' => \App\Models\Index\RevenueStatusAnalysis::class,
                    'name'  => 'revenue-status-analyses',
                ],
                [
                    'title' => 'تحلیل روند تغییرات وضعیت درآمد های دانشگاه',
                    'model' => \App\Models\Index\RevenueChangesTrendsAnalysis::class,
                    'name'  => 'revenue-changes',
                ],
                [
                    'title' => ' میانگین درآمدهی شهریه ای',
                    'model' => \App\Models\Index\AverageTuitionIncome::class,
                    'name'  => 'tuition-income',
                ],
                [
                    'title' => ' تحلیل وضعیت درآمد  سرانه ',
                    'model' => \App\Models\Index\PercapitaRevenueStatusAnalysis::class,
                    'name'  => 'percapita-revenue',
                ],
                [
                    'title' => 'تحلیل وضعیت هزینه های دانشگاه در واحدهای دانشگاهی (۱)',
                    'model' => \App\Models\Index\UniversityCostsAnalysis::class,
                    'name'  => 'university-costs',
                ],[
                    'title' => 'تحلیل وضعیت هزینه های دانشگاه در واحدهای دانشگاهی (۲)',
                    'model' => \App\Models\Index\UniversityCostsPerUnit::class,
                    'name'  => 'university-costs-per-unit',
                ],
                [
                    'title' => 'تحلیل روند تغییرات وضعیت ھزینه ھای دانشگاه',
                    'model' => \App\Models\Index\CostChangesTrendsAnalysis::class,
                    'name'  => 'cost-changes-trends',
                ],
                [
                    'title' => 'تعداد میانگین ھزینه ناشی از اجرای رشته ھای تحصیلی',
                    'model' => \App\Models\Index\AverageCostOfMajor::class,
                    'name'  => 'cost-of-majors',
                ],


                [
                    'title' => 'نقشه راه دستیابی به وضع مطلوب در واحد دانشگاهی',
                    'model' => \App\Models\Index\RoadmapToAchieveDesiredSituation::class,
                    'name'  => 'roadmap-desired',
                ],
            ],
            'دارایی'          => [
                [
                    'title' => 'تحلیل اعتبارات و دارایی های دانشگاه ',
                    'model' => \App\Models\Index\CreditAndAssetAnalysis::class,
                    'name'  => 'credit-and-asset',
                ],
                [
                    'title' => 'وضعیت کلی واحدها و مراکز آموزشی',
                    'model' => \App\Models\Index\UnitsGeneralStatus::class,
                    'name'  => 'units-general-status',
                ],
            ]
        ],
    ],
];
