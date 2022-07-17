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

            $table->float('agriculture_hunting_forestry')->default(0);
            $table->float('mining_construction')->default(0);
            $table->float('water_electricity_natural_gas_supply')->default(0);
            $table->float('building')->default(0);
            $table->float('wholesale_retail_vehicle_repair_supply')->default(0);
            $table->float('hotel_and_restaurant')->default(0);
            $table->float('transportation_warehousing_communications')->default(0);
            $table->float('financial_intermediation')->default(0);
            $table->float('office_of_public_affairs_urban_services')->default(0);
            $table->float('education')->default(0);
            $table->float('health_and_social_work')->default(0);
            $table->float('activities_of_employed_households')->default(0);
            $table->float('overseas_organizations_and_delegations')->default(0);
            $table->float('real_estates')->default(0);
            $table->float('professional_scientific_technical_activities')->default(0);
            $table->float('office_and_support_services')->default(0);
            $table->float('art_and_entertainment')->default(0);
            $table->float('other_services')->default(0);

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
