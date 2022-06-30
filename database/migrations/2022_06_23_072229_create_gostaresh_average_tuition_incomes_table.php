<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 50 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_average_tuition_incomes', function (Blueprint $table) {
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
            $table->string('university_type')->comment('دانشگاه')->nullable();
            $table->unsignedTinyInteger('department_of_education')->nullable();
            $table->unsignedSmallInteger('associate_degree')->nullable();
            $table->unsignedSmallInteger('bachelor_degree')->nullable();
            $table->unsignedSmallInteger('masters')->nullable();
            $table->unsignedSmallInteger('phd')->nullable();

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
        Schema::dropIfExists('gostaresh_average_tuition_incomes');
    }
};
