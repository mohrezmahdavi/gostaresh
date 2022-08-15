<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 36 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_international_research_status_analysis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('rural_district_id')->nullable();

            $table->string('unit')->nullable();
            $table->float('number_of_laboratories')->comment('تعداد آزمایشگاه ها و کارگاه های دارای استاندارد بین المللی مصوب')->nullable();
            $table->float('number_of_research_projects')->comment('تعداد طرح های تحقیقاتی مشترک با محققان خارجی')->nullable();
            $table->float('number_of_shared_articles')->comment('تعداد مقالات مشترک با محققان خارجی و متخصصان ایرانی مقیم خارج از کشور')->nullable();
            $table->float('number_of_international_research_projects')->comment('تعداد طرح های تحقیقاتی بین المللی با ارزش بالای ۱۰۰ هزار دلار')->nullable();
            $table->float('number_of_faculty_members_using_study_abroad')->comment('تعداد اعضای هیات علمی استفاده کننده از فرصت های مطالعاتی خارج از کشور در هر سال تحصیلی')->nullable();
            $table->float('number_of_graduate_students_with_opportunities_abroad')->comment('تعداد دانشجویان تحصیلات تکمیلی دارای فرصت های مطالعاتی و تحقیقاتی خارج از کشور')->nullable();
            $table->float('number_of_research_opportunities_presented')->comment('تعداد فرصت های تحقیقاتی و پسادکتری ارایه شده به محققان و دانشجویان کشورهای خارجی و محققان ایرانی خارج از کشور')->nullable();
            $table->float('number_of_foreign_workshops_held')->comment('تعداد کارگاهها، دوره های آموزشی و تدریس بین المللی برگزار شده توسط اساتید خارجی و متخصصان ایرانی غیر مقیم')->nullable();
            $table->float('number_of_international_lectures_held')->comment('تعدادسخنرانی وسمینارهای علمی بین المللی برگزارشده توسط اساتیدخارجی و متخصصان ایرانی غیر مقیم')->nullable();
            $table->float('number_of_international_awards')->comment('تعداد جوایز بین المللی کسب شده در ۵ سال اخیر')->nullable();



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
        Schema::dropIfExists('gostaresh_international_research_status_analysis');
    }
};
