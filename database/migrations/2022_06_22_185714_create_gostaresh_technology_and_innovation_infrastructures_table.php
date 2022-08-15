<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 39 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_technology_and_innovation_infrastructures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('rural_district_id')->nullable();

            $table->string('unit')->nullable();
            $table->float('number_of_active_innovation_houses')->comment('تعداد سرای نوآوری فعال')->nullable();
            $table->float('number_of_active_accelerators')->comment('تعداد شتاب دهنده فعال')->nullable();
            $table->float('number_of_active_growth_centers')->comment('تعداد مراکز رشد فعال')->nullable();
            $table->float('number_of_active_technology_cores')->comment('تعداد هسته فناور فعال')->nullable();
            $table->float('number_of_active_skill_high_schools')->comment('تعداد مدارس عالی مهارتی فعال')->nullable();
            $table->float('number_of_skill_training_centers')->comment('تعداد مراکز توانمندسازی و آموزش مهارتی')->nullable();
            $table->float('number_of_research_centers')->comment('تعداد مراکز تحقیقاتی')->nullable();
            $table->float('number_of_development_offices')->comment('تعداد دفاتر توسعه و انتقال فناوری')->nullable();
            $table->float('number_of_industry_trade_offices')->comment('تعداددفاتر کلینیک صنعت، معدن و تجارت')->nullable();
            $table->float('number_of_entrepreneurship_centers')->comment('تعداد مراکز کارآفرینی')->nullable();

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
        Schema::dropIfExists('gostaresh_technology_and_innovation_infrastructures');
    }
};
