<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 31 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_status_analysis_of_the_number_of_curricula', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();

            $table->string('unit')->nullable();
            $table->string('total_number_of_curricula')->comment('تعداد کل برنامه های درسی (رشته گرایش ها)')->nullable();
            $table->string('number_of_modified_curricula')->comment('تعداد برنامه های درسی بازنگری و اصلاح شده با رویکرد مهارت آموزی')->nullable();
            $table->string('new_interdisciplinary_curricula_implemented')->comment('برنامه های درسی جدید میان رشته ای مورد اجرا')->nullable();
            $table->string('complete_new_interdisciplinary_curricula')->comment('کل برنامه های درسی جدید میان رشته ای مورد اجرا')->nullable();
            $table->string('number_of_common_curricula_with_the_world')->comment('تعداد برنامه های درسی مشترک اجرا شده با سایر دانشگاه های جهان')->nullable();
            $table->string('number_of_curricula_developed')->comment('تعداد برنامه درسی تدوین شده جهت تاسیس رشته جدید تحصیلی توسط واحد دانشگاهی مورد نظر')->nullable();

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
        Schema::dropIfExists('gostaresh_status_analysis_of_the_number_of_curricula');
    }
};
