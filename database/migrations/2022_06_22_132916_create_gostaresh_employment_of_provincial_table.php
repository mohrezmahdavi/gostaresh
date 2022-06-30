<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 12 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_employment_of_provincial', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();

            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('rural_district_id')->nullable();

            $table->unsignedBigInteger('agriculture_hunting_forestry')->default(0);
            $table->unsignedBigInteger('mining_construction')->default(0);
            $table->unsignedBigInteger('water_electricity_natural_gas_supply')->default(0);
            $table->unsignedBigInteger('building')->default(0);
            $table->unsignedBigInteger('wholesale_retail_vehicle_repair_supply')->default(0);
            $table->unsignedBigInteger('hotel_and_restaurant')->default(0);
            $table->unsignedBigInteger('transportation_warehousing_communications')->default(0);
            $table->unsignedBigInteger('financial_intermediation')->default(0);
            $table->unsignedBigInteger('office_of_public_affairs_urban_services')->default(0);
            $table->unsignedBigInteger('education')->default(0);
            $table->unsignedBigInteger('health_and_social_work')->default(0);
            $table->unsignedBigInteger('activities_of_employed_households')->default(0);
            $table->unsignedBigInteger('overseas_organizations_and_delegations')->default(0);
            $table->unsignedBigInteger('real_estates')->default(0);
            $table->unsignedBigInteger('professional_scientific_technical_activities')->default(0);
            $table->unsignedBigInteger('office_and_support_services')->default(0);
            $table->unsignedBigInteger('art_and_entertainment')->default(0);
            $table->unsignedBigInteger('other_services')->default(0);

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
        Schema::dropIfExists('gostaresh_employment_of_provincial_cities');
    }
};
