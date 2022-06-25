<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 58 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_roadmap_to_achieve_desired_situations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();

            $table->string('experimental_policy_title')->comment('عنوان سیاست آزمایشی')->nullable();
            $table->string('title_axis')->comment('عنوان محور')->nullable();
            $table->string('project_title')->comment('عنوان پروژه')->nullable();
            $table->string('quantitative_goal')->comment('هدف کمی')->nullable();
            $table->string('test')->comment('سنجش')->nullable();
            $table->string('annual_progress_level')->comment('سطح پیشرفت و تحقق سالانه')->nullable();
            $table->string('responsible_for_track')->comment('مسئول پیگیری')->nullable();
            $table->string('considerations')->comment('ملاحظات')->nullable();

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
        Schema::dropIfExists('gostaresh_roadmap_to_achieve_desired_situations');
    }
};
