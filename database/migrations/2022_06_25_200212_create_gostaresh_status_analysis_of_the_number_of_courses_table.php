<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 28 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_status_analysis_of_the_number_of_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('rural_district_id')->nullable();

            $table->string('unit')->nullable();
            $table->unsignedBigInteger('total_number_of_courses')->comment('تعداد کل دوره های تحصیلی')->nullable();
            $table->unsignedBigInteger('number_of_international_Persian_language_courses_in_person')->comment('تعداد دوره های تحصیلی بین المللی زبان فارسی  حضوری')->nullable();
            $table->unsignedBigInteger('number_of_international_virtual_Persian_language_courses')->comment('داد دوره های تحصیلی بین المللی برگزار شده به زبان فارسی به صورت مجازی')->nullable();
            $table->unsignedBigInteger('number_of_international_courses_in_the_target_language_in_person')->comment('تعداد دوره های تحصیلی بین المللی برگزار شده به زبان های کشورهای هدف به صورت حضوری')->nullable();
            $table->unsignedBigInteger('number_of_international_courses_in_the_target_language_virtually')->comment('تعداد دوره های تحصیلی بین المللی برگزار شده به زبان های کشورهای هدف به صورت مجازی')->nullable();

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
        Schema::dropIfExists('gostaresh_status_analysis_of_the_number_of_courses');
    }
};
