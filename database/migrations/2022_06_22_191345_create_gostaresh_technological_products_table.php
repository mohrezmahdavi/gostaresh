<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 40 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_technological_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();

            $table->string('unit')->nullable();
            $table->string('number_of_active_technology_cores')->comment('تعداد هسته فناور فعال')->nullable();
            $table->string('number_of_active_technology_units')->comment('تعداد واحدهای فناور فعال')->nullable();
            $table->string('number_of_active_knowledge_based_companies')->comment('تعداد شرکت دانش بنیان فعال')->nullable();
            $table->string('number_of_creative_companies')->comment('تعداد شرکت های خلاق')->nullable();
            $table->string('number_of_commercialized_ideas')->comment('تعداد طرح ها و ایده های فناورانه و نوآورانه تجاری سازی شده')->nullable();
            $table->string('number_of_knowledge_based_products')->comment('تعداد محصولات دانش بنیان')->nullable();
            $table->string('number_of_products_without_license')->comment('تعداد محصولات بدون مجوز')->nullable();
            $table->string('number_of_licensed_products')->comment('تعداد محصولات با مجوز')->nullable();
            $table->string('number_of_active_technology_professors')->comment('تعداد استاد فناور فعال')->nullable();
            $table->string('number_of_active_technology_students')->comment('تعداد دانشجوی فناور فعال')->nullable();

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
        Schema::dropIfExists('gostaresh_technological_products');
    }
};
