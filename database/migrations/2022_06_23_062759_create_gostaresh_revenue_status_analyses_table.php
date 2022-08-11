<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 48 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_revenue_status_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('rural_district_id')->nullable();

            $table->string('unit')->nullable();
            $table->unsignedInteger('total_revenue')->comment('کل درآمد ها')->nullable();
            $table->unsignedInteger('income_from_student_tuition')->comment('درآمد حاصل از شهریه دانشجویان')->nullable();
            $table->float('income_from_commercialized_technologies')->comment('درصد درآمد حاصل از فروش فناوری و طرح های تجاری سازی شده')->nullable();
            $table->float('income_from_research_activities')->comment('درصد درآمد حاصل از فعالیت های تحقیق و توسعه واحد')->nullable();
            $table->unsignedInteger('income_from_skills_training')->comment('درآمدهای حاصل از مهارت آموزی، فعالیت های کاربنیان و کارآفرینی واحد')->nullable();
            $table->float('operating_income_growth_rate')->comment('نرخ رشد درآمدهای عملیاتی واحد')->nullable();
            $table->unsignedInteger('total_non_tuition_income')->comment('مجموع درآمدهای غیر شهریه ای واحد')->nullable();
            $table->unsignedInteger('total_international_income')->comment('مجموع درآمد های ناشی از فعالیت های بین المللی')->nullable();
            $table->float('shareholder_income')->comment('درآمد ناشی از سهامداری')->nullable();

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
        Schema::dropIfExists('gostaresh_revenue_status_analyses');
    }
};
