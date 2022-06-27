<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 43 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_social_health_status_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('rural_district_id')->nullable();

            $table->string('unit')->nullable();
            $table->foreignId('gender_id')->unsigned()->nullable();
            $table->foreignId('grade_id')->nullable();
            $table->foreignId('sub_grade_id')->nullable();
            $table->foreignId('major_id')->nullable();
            $table->foreignId('minor_id')->nullable();

            $table->string('average_status_of_high_risk_behaviors')->comment('میانگین نمره کلی وضعیت رفتارهای پر خطر دانشجویان  براساس طرح سیمای زندگی')->nullable();
            $table->string('average_of_family_status')->comment('میانگین نمره کلی وضعیت خانوادگی دانشجویان  براساس طرح سیمای زندگی')->nullable();
            $table->string('average_of_educational_status')->comment('میانگین نمره کلی وضعیت تحصیلی و آموزشی دانشجویان براساس طرح سیمای زندگی')->nullable();
            $table->string('average_of_attitudes_status')->comment('میانگین نمره کلی وضعیت نگرش ها و باورهای دانشجویان براساس طرح سیمای زندگی')->nullable();
            $table->string('average_of_life_style_status')->comment('میانگین نمره کلی وضعیت سبک زندگی دانشجویان  براساس طرح سیمای زندگی')->nullable();
            $table->string('average_of_attitude_towards_marriage_status')->comment('میانگین نمره کلی وضعیت نگرش دانشجویان نسبت به ازدواج براساس طرح سیمای زندگی')->nullable();
            $table->string('average_of_addiction_status')->comment('میانگین نمره کلی وضعیت اعتیاد دانشجویان براساس طرح سیمای زندگی')->nullable();
            $table->string('average_of_addiction_to_internet_status')->comment('میانگین نمره کلی وضعیت ریتم زیستی (اعتیاد به اینترنت) دانشجویان براساس طرح سیمای زندگی')->nullable();

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
        Schema::dropIfExists('gostaresh_social_health_status_analyses');
    }
};
