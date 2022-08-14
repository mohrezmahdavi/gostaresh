<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 15 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_academic_major_educational', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();

            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('rural_district_id')->nullable();

            $table->tinyInteger('department_of_education')->nullable();

            $table->float('azad_eslami_count')->default(0);
            $table->float('dolati_count')->default(0);
            $table->float('farhangian_count')->default(0);
            $table->float('fani_herfei_count')->default(0);
            $table->float('payam_noor_count')->default(0);
            $table->float('gheir_entefai_count')->default(0);
            $table->float('elmi_karbordi_count')->default(0);


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
        Schema::dropIfExists('academic_coverage_by_major_educational_group');
    }
};
