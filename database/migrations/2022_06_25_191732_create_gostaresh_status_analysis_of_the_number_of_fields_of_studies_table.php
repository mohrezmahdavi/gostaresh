<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 25 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_status_analysis_of_the_number_of_fields_of_studies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();

            $table->string('unit')->nullable();
            $table->string('total_number_of_fields_of_study')->comment('تعداد کل رشته های تحصیلی')->nullable();
            $table->string('number_of_international_courses')->comment('تعداد رشته های تحصیلی بین المللی')->nullable();
            $table->string('number_of_virtual_courses')->comment('تعداد رشته های تحصیلی مجازی')->nullable();
            $table->string('number_of_technical_disciplines')->comment('تعداد رشته های فنی و حرفه ای و مهارتی')->nullable();
            $table->string('number_of_newly_established_courses')->comment('تعداد رشته های تحصیلی جدید التاسیس')->nullable();
            $table->string('number_of_courses_not_accepted')->comment('تعداد رشته / محل های فاقد پذیرش')->nullable();
            $table->string('number_of_courses_without_volunteers')->comment('تعداد رشته / محل های فاقد داوطلب')->nullable();
            $table->string('number_of_GDP_courses')->comment('تعدادرشته های تحصیلی مرتبط با حوزه GDP غالب استان')->nullable();
            $table->string('number_of_disciplines_corresponding_to_job_fields')->comment('تعداد رشته های تحصیلی منطبق با حوزه های شغلی مورد نیاز در شهرستان')->nullable();
            $table->string('number_of_fields_corresponding_to_the_specified_specialties')->comment('تعداد رشته های تحصیلی منطبق با تخصص های تعیین شده برای شهرستان')->nullable();
            $table->string('number_of_courses_offered_virtually')->comment('تعداد واحدهای درسی ارایه شده به صورت مجازی')->nullable();
            $table->string('number_of_popular_fields_more_than_eighty_percent_capacity')->comment('تعداد رشته های تحصیلی پر مخاطب (با تعداد کل دانشجوی بیش از 80 درصد ظرفیت)')->nullable();
            $table->string('number_of_courses_with_low_audience')->comment('تعداد رشته های تحصیلی کم مخاطب (با تعداد کل دانشجوی کمتر از 20 درصد ظرفیت)')->nullable();
            $table->string('number_of_fields_of_less_than_5_people')->comment('تعداد رشته های تحصیلی کمتر از 5 نفر')->nullable();
            $table->string('number_of_courses_without_admission')->comment('تعداد رشته های تحصیلی بدون پذیرش')->nullable();
            $table->string('number_of_popular_fields')->comment('تعداد رشته های تحصیلی پر متقاضی')->nullable();
            $table->string('low_number_of_applicants')->comment('تعداد رشته های تحصیلی کم متقاضی')->nullable();

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
        Schema::dropIfExists('gostaresh_status_analysis_of_the_number_of_fields_of_studies');
    }
};
