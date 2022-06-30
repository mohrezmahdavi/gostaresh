<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 56 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_credit_and_asset_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('rural_district_id')->nullable();

            $table->string('unit')->nullable();
            $table->unsignedInteger('administrative_credits')->comment('اعتبارات اداری')->nullable();
            $table->unsignedInteger('educational_credits')->comment('اعتبارات آموزشی')->nullable();
            $table->unsignedInteger('research_credits')->comment('اعتبارات پژوهشی')->nullable();
            $table->unsignedInteger('cultural_credits')->comment('اعتبارات فرهنگی')->nullable();
            $table->unsignedInteger('innovative_credits')->comment('اعتبارات فناورانه و نوآورانه')->nullable();
            $table->unsignedInteger('skills_credits')->comment('اعتبارات حوزه مهارتی')->nullable();
            $table->unsignedInteger('total_University_credits')->comment('کل اعتبارات دانشگاه')->nullable();
            $table->unsignedInteger('total_university_assets')->comment('کل دارایی های دانشگاه')->nullable();

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
        Schema::dropIfExists('gostaresh_credit_and_asset_analyses');
    }
};
