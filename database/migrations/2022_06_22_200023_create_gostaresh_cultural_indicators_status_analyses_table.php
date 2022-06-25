<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 42 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_cultural_indicators_status_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();

            $table->string('unit')->nullable();
            $table->string('cultural_centers_status_score')->comment('نمره وضعیت کانون های فرهنگی واحد دانشگاهی')->nullable();
            $table->string('printed_publications_status_score')->comment('نمره وضعیت نشریات چاپی و الکترونیکی واحد')->nullable();
            $table->string('cultural_organizations_status_score')->comment('نمره وضعیت تشکلهای فرهنگی واحد')->nullable();
            $table->string('people_coverage_status_score')->comment('نمره وضعیت آراستگی و پوشش دانشجویان، اساتید و کارکنان واحد')->nullable();
            $table->string('free_thinking_status_score')->comment('نمره وضعیت کیفی و کمی کرسی های آزاد اندیشی')->nullable();
            $table->string('interact_with_cyberspace_status_score')->comment('نمره وضعیت تعامل با فضای مجازی در واحد دانشگاهی')->nullable();
            $table->string('fixed_cultural_events_status_score')->comment('نمره وضعیت برنامه ها و رویدادهای ثابت فرهنگی واحد')->nullable();
            $table->string('amounts_of_honors_and_awards')->comment('میزان افتخارات و جوایز فرهنگی کسب شده در واحد در سطوح مختلف منطقه ای و ملی')->nullable();
            $table->string('cultural_industry_products')->comment('میزان تولیدات در صنایع فرهنگی')->nullable();
            $table->string('level_of_initiatives')->comment('سطح ابتکارات و نوآوری های فرهنگی در واحد دانشگاهی')->nullable();
            $table->string('points_for_running_luxury_programs')->comment('امتیاز طراحی و اجرای برنامه های فاخر')->nullable();
            $table->string('election_turnout_score')->comment('نمره میزان مشارکت در انتخابات')->nullable();
            $table->string('score_cultural_skills_training_programs')->comment('امتیاز برنامه های آموزش مهارت های فرهنگی')->nullable();
            $table->string('score_of_cultural_participation_of_Basiji_professors')->comment('نمره مشارکت فرهنگی اساتید بسیجی')->nullable();
            $table->string('participation_of_unit_professors_in_cultural_counseling')->comment('میزان مشارکت اساتید واحد در ارائه مشاوره فرهنگی')->nullable();
            $table->string('position_of_the_university_as_cultural_center')->comment('جایگاه دانشگاه بعنوان قطب فرهنگی شهر')->nullable();
            $table->string('score_cultural_programs')->comment('نمره برنامه های ویژه حل مسایل فرهنگی اختصاصی واحد دانشگاهی')->nullable();
            $table->string('score_Families_of_professors')->comment('نمره برنامه های فرهنگی خانواده های اساتید و کارکنان واحد دانشگاهی')->nullable();
            $table->string('score_of_professors')->comment('نمره برنامه های فرهنگی اساتید واحد دانشگاهی')->nullable();
            $table->string('satisfaction_of_managers_performance')->comment('میزان رضایتمندی از عملکرد مدیران در واحد دانشگاهی')->nullable();
            $table->string('percentage_of_students_participating_in_sports_competitions')->comment('درصد دانشجویان شرکت کننده در مسابقات ورزشی واحد دانشگاهی از کل دانشجویان آن واحد دانشگاهی به تفکیک مقطع تحصیلی و جنسیت')->nullable();
            $table->string('percentage_of_students_participating_in_cultural_competitions')->comment('درصد دانشجویان شرکت کننده در مسابقات فرهنگی واحد دانشگاهی از کل دانشجویان آن واحد دانشگاهی به تفکیک مقطع تحصیلی و جنسیت')->nullable();
            $table->string('percentage_of_students_in_student_organizations')->comment('درصد دانشجویان عضو تشکل های دانشجویی واحد دانشگاهی از کل دانشجویان آن واحد دانشگاهی')->nullable();
            $table->string('student_counseling_centers')->comment('نسبت تعداد مراکز راهنمایی و مشاوره دانشجویی واحد دانشگاهی به کل دانشجویان آن واحد')->nullable();
            $table->string('percentage_of_students_referring_to_student_counseling_centers')->comment('درصد دانشجویان مراجعه کننده به مراکز راهنمایی و مشاوره دانشجویی نسبت به کل دانشجویان واحد دانشگاهی')->nullable();
            $table->string('general_cultural_rank_of_the_university_unit')->comment('رتبه کلی فرهنگی واحد دانشگاهی')->nullable();

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
        Schema::dropIfExists('gostaresh_cultural_indicators_status_analyses');
    }
};
