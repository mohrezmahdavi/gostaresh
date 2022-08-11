<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_university_costs_per_units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('rural_district_id')->nullable();

            $table->string('unit')->nullable();
            $table->float('training_costs')->comment('هزینه های حوزه آموزش')->nullable();
            $table->float('research_costs')->comment('هزینه های حوزه پژوهش')->nullable();
            $table->float('innovation_costs')->comment('هزینه های حوزه فناوری و نوآوری')->nullable();
            $table->float('educational_costs')->comment('هزینه های حوزه مهارت آموزشی و کارآفرینی')->nullable();
            $table->float('development_costs')->comment('هزینه های حوزه تحقیق و توسعه')->nullable();
            $table->float('cultural_sphere_costs')->comment('هزینه های حوزه فرهنگی')->nullable();
            $table->float('administrative_costs')->comment('هزینه های حوزه اداری')->nullable();
            $table->float('information_technology_costs')->comment('هزینه های حوزه فناوری اطلاعات و زیرساخت های فضای مجازی')->nullable();
            $table->float('International_sphere_costs')->comment('هزینه های حوزه بین الملل')->nullable();
            $table->float('costs_of_staff_training_and_faculty')->comment('هزینه های حوزه آموزش ضمن خدمت کارکنان و اساتید')->nullable();
            $table->float('sports_expenses')->comment('هزینه های حوزه ورزشی')->nullable();
            $table->float('health_costs')->comment('هزینه های حوزه بهداشت و سلامت')->nullable();
            $table->float('entrepreneurship_costs')->comment('هزینه های حوزه ترویج کارآفرینی و اشتغال')->nullable();
            $table->float('graduate_costs')->comment('هزینه های حوزه فارغ التحصیلان')->nullable();
            $table->float('branding_costs')->comment('هزینه های حوزه برند سازی و تبلیغات و جذب دانشجویان')->nullable();

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
        Schema::dropIfExists('gostaresh_university_costs_per_units');
    }
};
