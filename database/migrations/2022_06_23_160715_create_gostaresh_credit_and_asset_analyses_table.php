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

            $table->string('unit')->nullable();
            $table->string('administrative_credits')->comment('اعتبارات اداری')->nullable();
            $table->string('educational_credits')->comment('اعتبارات آموزشی')->nullable();
            $table->string('research_credits')->comment('اعتبارات پژوهشی')->nullable();
            $table->string('cultural_credits')->comment('اعتبارات فرهنگی')->nullable();
            $table->string('innovative_credits')->comment('اعتبارات فناورانه و نوآورانه')->nullable();
            $table->string('skills_credits')->comment('اعتبارات حوزه مهارتی')->nullable();
            $table->string('total_University_credits')->comment('کل اعتبارات دانشگاه')->nullable();
            $table->string('total_university_assets')->comment('کل دارایی های دانشگاه')->nullable();

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
