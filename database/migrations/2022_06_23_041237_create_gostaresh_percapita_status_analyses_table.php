<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 46 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_percapita_status_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('rural_district_id')->nullable();

            $table->string('unit')->nullable();
            $table->float('percapita_office_space')->comment('سرانه فضای اداری')->nullable();
            $table->float('percapita_educational_space')->comment('سرانه فضای آموزشی')->nullable();
            $table->float('percapita_innovation_space')->comment('سرانه فضای فناوری و نوآوری')->nullable();
            $table->float('percapita_cultural_space')->comment('سرانه فضای فرهنگی')->nullable();
            $table->float('percapita_civil_space')->comment('سرانه فضای عمرانی')->nullable();
            $table->float('building_under_construction')->comment('ساختمان در دست احداث')->nullable();
            $table->float('percapita_residential')->comment('سرانه اقامتی')->nullable();
            $table->float('percapita_operating_buildings')->comment('سرانه ساختمان های بهره بردار')->nullable();
            $table->float('percapita_sports_space')->comment('سرانه فضای ورزشی')->nullable();
            $table->float('percapita_aristocratic_space')->comment('سرانه فضای اعیانی')->nullable();
            $table->float('percapita_arena_space')->comment('سرانه فضای عرصه')->nullable();

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
        Schema::dropIfExists('gostaresh_percapita_status_analyses');
    }
};
