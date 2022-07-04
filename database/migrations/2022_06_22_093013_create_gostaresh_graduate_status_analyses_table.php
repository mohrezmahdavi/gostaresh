<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 33 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_graduate_status_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('rural_district_id')->nullable();

            $table->string('unit')->nullable();
            $table->unsignedInteger('total_graduates')->comment('تعداد کل فارغ التحصیلان')->nullable();
            $table->unsignedInteger('employed_graduates')->comment('تعداد فارغ التحصیلان شاغل')->nullable();
            $table->float('graduate_growth_rate')->comment('نرخ رشد فارغ التحصیلان')->nullable();
            $table->unsignedInteger('related_employed_graduates')->comment('تعداد فارغ التحصیلان شاغل در مشاغل مرتبط با رشته تحصیلی')->nullable();
            $table->unsignedInteger('skill_certification_graduates')->comment('تعداد فارغ التحصیلان دارای گواهینامه مهارتی و صلاحیت حرفه ای')->nullable();
            $table->unsignedInteger('employed_graduates_6_months_after_graduation')->comment('تعداد فارغ التحصیلان دارای شغل در مدت 6 ماه بعد از فراغت از تحصیل')->nullable();
            $table->unsignedBigInteger('average_monthly_income_employed_graduates')->comment('متوسط درآمد ماهیانه فارغ التحصیلان دارای شغل مرتبط با رشته تحصیلی')->nullable();

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
        Schema::dropIfExists('gostaresh_graduate_status_analyses');
    }
};
