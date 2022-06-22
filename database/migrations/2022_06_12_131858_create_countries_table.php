<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country_key');
            $table->timestamps();
        });
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('code')->nullable();
            $table->integer('short_code')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
        });
        Schema::create('counties', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->string('code')->nullable();
            $table->string('short_code')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
        });
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('sector_id')->nullable();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('short_code')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
        });
        Schema::create('rural_districts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('sector_id')->nullable();
            $table->string('code')->nullable();
            $table->string('short_code')->nullable();
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('countries');
        Schema::dropIfExists('provinces');
        Schema::dropIfExists('counties');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('rural_districts');
    }
};
