<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 2 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_geographical_location_of_the_unit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();

            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();

            $table->string('unit_university')->nullable();
            $table->string('university_building')->nullable();
            $table->unsignedBigInteger('distance_from_population_density_of_city')->nullable();
            $table->unsignedBigInteger('distance_from_center_of_province')->nullable();
            $table->tinyInteger('climate_type_and_weather_conditions')->unsigned()->nullable();
            $table->string('distance_to_the_nearest_higher_education_center')->nullable();
            $table->string('distance_to_the_nearest_unit_of_azad_university')->nullable();
            $table->tinyInteger('level_and_quality_of_access')->unsigned()->nullable();
            $table->tinyInteger('international_opportunities_geographical_location')->unsigned()->nullable();

            $table->integer('year')->unsigned()->nullable();
            $table->tinyInteger('month')->unsigned()->nullable();
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
        Schema::dropIfExists('gostaresh_geographical_location_of_the_unit');
    }
};
