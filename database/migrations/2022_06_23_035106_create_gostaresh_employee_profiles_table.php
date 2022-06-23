<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 45 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_employee_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();

            $table->string('Higher education subsystems')->comment('زیرنظام های آموزش عالی شهرستان')->nullable();
            $table->string('Number of non-faculty staff')->comment('تعداد کارکنان غیر هیات علمی')->nullable();
            $table->string('Average age of employees')->comment('میانگین سنی کارمندان')->nullable();
            $table->string('Number of male employees')->comment('تعداد کارمندان مرد')->nullable();
            $table->string('Number of female employees')->comment('تعداد کارمندان زن')->nullable();
            $table->string('Number of administrative staff')->comment('تعداد کارمندان اداری')->nullable();
            $table->string('Number of training staff')->comment('تعداد کارمندان بخش آموزشی')->nullable();
            $table->string('Number of research staff')->comment('تعداد کارمندان بخش پژوهش و فناوری')->nullable();
            $table->string('Number of PhD staff')->comment('تعداد کارمندان با مدرک دکترا')->nullable();
            $table->string('Number of master staff')->comment('تعداد کارمندان با مدرک کارشناسی ارشد')->nullable();
            $table->string('Number of expert staff')->comment('تعداد کارمندان با مدرک کارشناسی')->nullable();
            $table->string('Number of diploma and sub-diploma employees')->comment('تعداد کارمندان با مدرک دیپلم و زیر دیپلم')->nullable();
            $table->string('Number of employees studying')->comment('تعداد کارمندان در حال تحصیل')->nullable();
            $table->float('growth rate')->comment('نرخ رشد کارمندان')->nullable();

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
        Schema::dropIfExists('gostaresh_employee_profiles');
    }
};
