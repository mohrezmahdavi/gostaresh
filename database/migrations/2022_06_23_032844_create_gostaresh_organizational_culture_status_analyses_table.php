<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 44 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_organizational_culture_status_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();

            $table->string('unit')->nullable();
            $table->string('student_satisfaction')->comment('میزان رضایت دانشجویان و فارغ التحصیلان واحد از خدمات دانشگاه')->nullable();
            $table->string('unique_organizational_learning_capability')->comment('قابلیت یادگیری سازمانی واحد')->nullable();
            $table->string('students_religious_beliefs')->comment('میزان پایبندی به فضایل اخلاقی و باورهای دینی در میان دانشجویان واحد دانشگاهی')->nullable();
            $table->string('student_study_research_culture')->comment('میزان پایبندی به فرهنگ تحقیق مطالعه، تتبع و تحقیق در میان دانشجویان واحد')->nullable();
            $table->string('hijab_culture_of_students')->comment('میزان پایبندی به فرهنگ عفاف و حجاب و سبک پوشش اسلامی در میان دانشجویان واحد')->nullable();
            $table->string('culture_of_participation')->comment('سطح فرهنگ مشارکت پذیری و کار گروهی در واحد')->nullable();
            $table->string('faculty_members_self_confidence')->comment('سطح خودباوری و تعلق سازمانی در میان اعضای هیات علمی و کارکنان واحد')->nullable();
            $table->string('amount_of_physical_elements')->comment('میزان المان های فیزیکی و نمایه های بصری هویت دار در واحد دانشگاهی')->nullable();
            $table->string('percentage_of_sample_professors_in_unit')->comment('درصد اساتید نمونه واحد دانشگاهی از کل اساتید نمونه دانشگاه آزاد اسلامی استان')->nullable();
            $table->string('percentage_of_sample_professors_in_province')->comment('درصد اساتید نمونه دانشگاه آزاد اسلامی استان از کل اساتید نمونه دانشگاه آزاد اسلامی')->nullable();
            $table->string('percentage_of_sample_students_in_unit')->comment('درصد دانشجویان نمونه واحد دانشگاهی از کل دانشجویان نمونه دانشگاه آزاد اسلامی استان')->nullable();
            $table->string('percentage_of_sample_students_in_province')->comment('درصد دانشجویان نمونه دانشگاه آزاد اسلامی استان از کل دانشجویان نمونه دانشگاه آزاد اسلامی')->nullable();
            $table->string('brand_influence_in_the_province')->comment('میزان نفوذ برند دانشگاه آزاد اسلامی و هویت بصری آن در سطح شهرستان/استان')->nullable();
            $table->string('level_of_intelligence')->comment('میزان سامانه سپاری و هوشمندسازی ساختار تشکیلاتی، فرایندها و نظام های مدیریت در واحد')->nullable();
            $table->string('axial_program')->comment('برنامه محوری (وجود برنامه راهبردی-عملیاتی در سطح واحد/استان مبتنی بر طرح آمایش)')->nullable();

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
        Schema::dropIfExists('gostaresh_organizational_culture_status_analyses');
    }
};
