<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 41 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_international_technologies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('rural_district_id')->nullable();

            $table->string('unit')->nullable();
            $table->unsignedInteger('number_of_participation')->comment('تعداد مشارکت در انتقال دانش فنی/ فناوری انتقال یافته از خارج به داخل کشور (با ارائه گواهی مقام مجاز)')->nullable();
            $table->unsignedInteger('number_of_technical_services')->comment('تعداد خدمات فنی و مشاوره ای ارایه شده به موسسات یا شرکت های خارجی')->nullable();
            $table->unsignedInteger('earnings')->comment('میزان کسب درآمد از خدمات فنی و مشاوره ای بین المللی')->nullable();
            $table->unsignedInteger('number_of_international_inventions')->comment('تعداد ثبت و یا فایلینگ اختراعات بین المللی (Patent) در ۵ سال اخیر')->nullable();
            $table->unsignedInteger('number_of_international_knowledge_based_companies')->comment('تعداد شرکت های دانش بنیان با فعالیت بین المللی')->nullable();

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
        Schema::dropIfExists('gostaresh_international_technologies');
    }
};
