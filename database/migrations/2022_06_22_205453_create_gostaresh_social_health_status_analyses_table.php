<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 43 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_social_health_status_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('rural_district_id')->nullable();

            $table->foreignId('grade_id')->nullable();
            $table->foreignId('sub_grade_id')->nullable();
            $table->foreignId('major_id')->nullable();
            $table->foreignId('minor_id')->nullable();

            $table->string('unit')->nullable();
            $table->unsignedTinyInteger('component')->comment('مولفه')->nullable();
            $table->unsignedTinyInteger('gender_id')->unsigned()->nullable();
            $table->float('associate_degree')->nullable();
            $table->float('bachelor_degree')->nullable();
            $table->float('masters')->nullable();
            $table->float('professional_doctor')->nullable();
            $table->float('phd')->nullable();

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
        Schema::dropIfExists('gostaresh_social_health_status_analyses');
    }
};
