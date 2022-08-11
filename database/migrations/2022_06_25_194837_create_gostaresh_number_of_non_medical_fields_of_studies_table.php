<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 26 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_number_of_non_medical_fields_of_studies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('rural_district_id')->nullable();

            $table->unsignedBigInteger('kardani_peyvaste_count')->default(0);
            $table->unsignedBigInteger('kardani_na_peyvaste_count')->default(0);
            $table->unsignedBigInteger('karshenasi_peyvaste_count')->default(0);
            $table->unsignedBigInteger('karshenasi_na_peyvaste_count')->default(0);
            $table->unsignedBigInteger('karshenasi_arshad_count')->default(0);
            $table->unsignedBigInteger('docktora_herfei_count')->default(0);
            $table->unsignedBigInteger('docktora_takhasosi_count')->default(0);
            $table->tinyInteger('department_of_education')->nullable();

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
        Schema::dropIfExists('gostaresh_number_of_non_medical_fields_of_studies');
    }
};
