<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 47 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_index_of_asset_productivity', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('rural_district_id')->nullable();

            $table->string('unit')->nullable();
            $table->float('office_space_utilization_rate')->comment('نرخ بهره برداری از فضای اداری')->nullable();
            $table->float('utilization_rate_of_educational_equipment')->comment('نرخ بهره برداری از فضا و تجهیزات آموزشی')->nullable();
            $table->float('utilization_rate_of_technology_equipment')->comment('نرخ بهره برداری از فضای و تجهیزات فناوری و نوآوری')->nullable();
            $table->float('utilization_rate_of_cultural_equipment')->comment('سرانه نرخ بهره برداری از فضا و تجهیزات فرهنگی')->nullable();
            $table->float('utilization_rate_of_sports_equipment')->comment('نرخ بهره برداری از فضا و تجهیزات ورزشی')->nullable();
            $table->float('operation_rate_of_agricultural_equipment')->comment('نرخ بهره برداری از تجهیزات و فضای کشاورزی و زراعی')->nullable();
            $table->float('operation_rate_of_workshop_equipment')->comment('ﻧـﺮخﺑﻬـﺮهﺑـﺮداری ازتجهیزات و فضای کارگاهی و آزمایشگاهی')->nullable();
            $table->float('faculty_capacity_utilization_rate')->comment('نرخ بهره برداری از ظرفیت اعضای هیات علمی')->nullable();
            $table->float('employee_capacity_utilization_rate')->comment('نرخ بهره برداری از ظرفیت کارمندان')->nullable();
            $table->float('graduate_capacity_utilization_rate')->comment('نرخ بهره برداری از ظرفیت فارغ التحصیلان')->nullable();
            $table->float('student_capacity_utilization_rate')->comment('نرخ بهره برداری از ظرفیت دانشجویان')->nullable();
            $table->unsignedInteger('ratio_of_faculty_members_to_students')->comment('نسبت تعداد اعضای هیات علمی به دانشجویان')->nullable();
            $table->unsignedInteger('ratio_of_staff_to_students')->comment('نسبت تعداد کارمندان به دانشجویان')->nullable();
            $table->unsignedInteger('ratio_of_faculty_members_to_teaching_professors')->comment('نسبت تعداد اعضای هیات علمی به تعداد اساتید مدعو و حق التدریس')->nullable();
            $table->unsignedInteger('ratio_of_faculty_members_to_employees')->comment('نسبت تعداد اعضای هیات علمی به کارمندان واحد')->nullable();
            $table->unsignedInteger('ratio_of_unit_faculty_members_to_faculty_members_of_the_province')->comment('نسبت تعداد اعضای هیات علمی به میانگین تعداد اعضای هیات علمی استان')->nullable();
            $table->unsignedInteger('ratio_of_unit_students_to_students_of_the_province')->comment('نسبت تعداد دانشجویان به میانگین تعداد دانشجویان استان')->nullable();
            $table->unsignedInteger('ratio_of_unit_employees_to_provincial_employees')->comment('نسبت تعداد کارمندان به میانگین تعداد کارمندان استان')->nullable();
            $table->unsignedInteger('unit_teaching_professors_to_teaching_professors_province')->comment('نسبت تعداد اساتید مدعو و حق التدریس به میانگین تعداد اساتید مدعو و حق التدریس استان')->nullable();

            $table->integer('year')->unsigned()->nullable();
            $table->tinyInteger('month')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gostaresh_index_of_asset_productivity');
    }
};
