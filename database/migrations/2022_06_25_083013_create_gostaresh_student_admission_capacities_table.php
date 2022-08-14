<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 24 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_student_admission_capacities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('rural_district_id')->nullable();

            $table->foreignId('gender_id')->unsigned()->nullable();
            $table->foreignId('grade_id')->nullable();
            $table->foreignId('sub_grade_id')->nullable();
            $table->foreignId('major_id')->nullable();
            $table->foreignId('minor_id')->nullable();

            $table->tinyInteger('university_type')->nullable();
            $table->float('student_admission_capacities')->nullable();
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
        Schema::dropIfExists('gostaresh_student_admission_capacities');
    }
};
