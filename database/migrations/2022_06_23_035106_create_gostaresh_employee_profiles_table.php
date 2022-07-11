<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 45 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_employee_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('rural_district_id')->nullable();

            $table->unsignedInteger('higher_education_subsystems')->comment('زیرنظام های آموزش عالی شهرستان')->nullable();
            $table->unsignedInteger('number_of_non_faculty_staff')->comment('تعداد کارکنان غیر هیات علمی')->nullable();
            $table->float('average_age_of_employees')->comment('میانگین سنی کارمندان')->nullable();
            $table->unsignedInteger('number_of_male_employees')->comment('تعداد کارمندان مرد')->nullable();
            $table->unsignedInteger('number_of_female_employees')->comment('تعداد کارمندان زن')->nullable();
            $table->unsignedInteger('number_of_administrative_staff')->comment('تعداد کارمندان اداری')->nullable();
            $table->unsignedInteger('number_of_training_staff')->comment('تعداد کارمندان بخش آموزشی')->nullable();
            $table->unsignedInteger('number_of_research_staff')->comment('تعداد کارمندان بخش پژوهش و فناوری')->nullable();
            $table->unsignedInteger('number_of_PhD_staff')->comment('تعداد کارمندان با مدرک دکترا')->nullable();
            $table->unsignedInteger('number_of_master_staff')->comment('تعداد کارمندان با مدرک کارشناسی ارشد')->nullable();
            $table->unsignedInteger('number_of_expert_staff')->comment('تعداد کارمندان با مدرک کارشناسی')->nullable();
            $table->unsignedInteger('number_of_diploma_and_sub_diploma_employees')->comment('تعداد کارمندان با مدرک دیپلم و زیر دیپلم')->nullable();
            $table->unsignedInteger('number_of_employees_studying')->comment('تعداد کارمندان در حال تحصیل')->nullable();
            $table->float('growth_rate')->comment('نرخ رشد کارمندان')->nullable();

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
        Schema::dropIfExists('gostaresh_employee_profiles');
    }
};
