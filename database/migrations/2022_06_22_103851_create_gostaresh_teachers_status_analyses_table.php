<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 34 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_teachers_status_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();

            $table->string('unit')->nullable();
            $table->string('number_of_faculty_members')->comment('تعداد اعضای هیات علمی')->nullable();
            $table->string('scientific_programs_faculty_members')->comment('تعداد اعضای هیئت علمی مشارکت کننده در برنامه های علمی')->nullable();
            $table->string('upgraded_faculty_members')->comment('تعداد اعضای هیات علمی ارتقا یافته')->nullable();
            $table->string('number_of_tuition_teachers')->comment('تعداد مدرسین حق التدریس و اساتید مدعو')->nullable();
            $table->string('number_of_officer_faculty_members_in_other_unit')->comment('تعداد اعضای هیات علمی مامور در سایر واحدها')->nullable();
            $table->string('number_of_officer_faculty_members_in_central_organization')->comment('تعداد اعضای هیات علمی مامور در سازمان مرکزی')->nullable();
            $table->string('number_of_participant_faculty_members_in_cooperation_plan')->comment('تعداد اعضای هیات علمی شرکت کننده در طرح تعاون')->nullable();
            $table->string('number_of_transfer_faculty_members')->comment('تعداد اعضای هیات علمی انتقالی')->nullable();
            $table->string('number_of_instructor_faculty_members')->comment('تعداد اعضای هیات علمی با درجه مربی')->nullable();
            $table->string('number_of_assistant_professor_faculty_members')->comment('تعداد اعضای هیات علمی با درجه استادیار')->nullable();
            $table->string('number_of_associate_professor_faculty_members')->comment('تعداد اعضای هیات علمی با درجه دانشیار')->nullable();
            $table->string('number_of_full_professor_faculty_members')->comment('تعداد اعضای هیات علمی با درجه استاد تمام')->nullable();
            $table->string('number_of_faculty_members_smaller_50_years_old')->comment('تعداد اعضای هیات علمی دارای سن کمتر از 50 سال')->nullable();
            $table->string('number_of_technology_faculty_members')->comment('تعداد اعضای هیات علمی فناور')->nullable();
            $table->string('number_of_faculty_members_type_a')->comment('تعداد اعضای هیات علمی نوع الف')->nullable();
            $table->string('number_of_faculty_members_type_b')->comment('تعداد اعضای هیات علمی نوع ب')->nullable();
            $table->string('number_of_top_scientific_faculty_members')->comment('تعداد اعضای هیات علمی سرآمد علمی')->nullable();
            $table->string('average_level_of_research_productivity_of_faculty_members')->comment('متوسط سطح بهره وری پژوهشی اعضای هیات علمی')->nullable();

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
        Schema::dropIfExists('gostaresh_teachers_status_analyses');
    }
};
