<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 36,37 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_international_research_status_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();

            $table->string('unit')->nullable();
            $table->string('number_of_laboratories')->comment('تعداد آزمایشگاه ها و کارگاه های دارای استاندارد بین المللی مصوب')->nullable();
            $table->string('number_of_research_projects')->comment('تعداد طرح های تحقیقاتی مشترک با محققان خارجی')->nullable();
            $table->string('number_of_shared_articles')->comment('تعداد مقالات مشترک با محققان خارجی و متخصصان ایرانی مقیم خارج از کشور')->nullable();
            $table->string('number_of_international_research_projects')->comment('تعداد طرح های تحقیقاتی بین المللی با ارزش بالای ۱۰۰ هزار دلار')->nullable();
            $table->string('number_of_faculty_members_using_study_abroad')->comment('تعداد اعضای هیات علمی استفاده کننده از فرصت های مطالعاتی خارج از کشور در هر سال تحصیلی')->nullable();
            $table->string('number_of_graduate_students_with_opportunities_abroad')->comment('تعداد دانشجویان تحصیلات تکمیلی دارای فرصت های مطالعاتی و تحقیقاتی خارج از کشور')->nullable();
            $table->string('number_of_research_opportunities_presented')->comment('تعداد فرصت های تحقیقاتی و پسادکتری ارایه شده به محققان و دانشجویان کشورهای خارجی و محققان ایرانی خارج از کشور')->nullable();
            $table->string('number_of_foreign_workshops_held')->comment('تعداد کارگاهها، دوره های آموزشی و تدریس بین المللی برگزار شده توسط اساتید خارجی و متخصصان ایرانی غیر مقیم')->nullable();
            $table->string('number_of_international_lectures_held')->comment('تعدادسخنرانی وسمینارهای علمی بین المللی برگزارشده توسط اساتیدخارجی و متخصصان ایرانی غیر مقیم')->nullable();
            $table->string('number_of_international_awards')->comment('تعداد جوایز بین المللی کسب شده در ۵ سال اخیر')->nullable();

            //table 37
            $table->string('average_H_index_of_faculty_members')->comment('متوسط H-index اعضای هیات علمی')->nullable();
            $table->string('number_of_articles_science_and_nature')->comment('تعداد مقالات در دو مجله Science  و Nature')->nullable();
            $table->string('print_ISI_articles')->comment('سرانه چاپ مقالات ISI')->nullable();
            $table->string('percentage_of_quality_articles')->comment('درصد مقالات کیفی در ۲۵ درصد بالای فهرست JCR (Q1)')->nullable();
            $table->string('number_of_faculty_members_of_world_scientists')->comment('تعداد اعضای هیات علمی با بیش از ۱۰۰۰ استناد یا در ردیف دانشمندان برتر جهان بر اساس نظام‌های رتبه بندی مصوب')->nullable();
            $table->string('number_of_faculty_members_of_international_journals')->comment('تعداد اعضای هیات علمی عضو هیات تحریریه مجلات معتبر بین المللی')->nullable();
            $table->string('number_of_international_conferences_held')->comment('تعداد همایش های بین المللی برگزار شده مصوب هیات امنا در ۵ سال اخیر')->nullable();
            $table->string('number_of_international_scientific_books')->comment('تعداد کتب علمی بین المللی و چاپ فصلی از کتاب های علمی بین المللی با Affiliation دانشگاه آزاد اسلامی')->nullable();
            $table->string('number_of_international_agreements_implemented')->comment('تعداد تفاهم نامه های بین المللی اجرایی شده')->nullable();
            $table->string('amount_of_international_research_credits')->comment('میزان اعتبارات پژوهشی (گرنت) بین المللی اخذ شده')->nullable();
            $table->string('number_of_international_publications')->comment('تعداد نشریه های دارای نمایه های استنادی بین المللی از جمله (ISI) و (Scopus)')->nullable();

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
        Schema::dropIfExists('gostaresh_international_research_status_analyses');
    }
};
