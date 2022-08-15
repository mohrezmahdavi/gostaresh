<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 35 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_research_output_status_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('rural_district_id')->nullable();

            $table->string('unit')->nullable();
            $table->float('number_of_valid_scientific_articles')->comment('تعداد مقالات معتبر علمی')->nullable();
            $table->float('number_of_valid_books')->comment('تعداد کتب معتبر')->nullable();
            $table->float('number_of_authored_books')->comment('تعداد کتب تالیفی')->nullable();
            $table->float('number_of_internal_inventions')->comment('تعداد اختراعات ثبت شده داخلی')->nullable();
            $table->float('number_of_international_inventions')->comment('تعداد اختراعات ثبت شده بین المللی')->nullable();
            $table->float('number_of_theses')->comment('تعداد پایان نامه ها')->nullable();
            $table->float('number_of_research_dissertations')->comment('تعداد پایان نامه های منجر به مقاله علمی-پژوهشی')->nullable();
            $table->float('number_of_compiled_dissertations')->comment('تعداد پایان نامه های تدوین شده بر اساس نظام موضوعات برنامه های علمی دانشگاه')->nullable();
            $table->float('number_of_invented_dissertations')->comment('تعداد پایان نامه های منجر به ثبت اختراع')->nullable();
            $table->float('number_of_product_dissertations')->comment('تعداد پایان نامه های منجر به محصول')->nullable();
            $table->float('number_of_completed_research_projects')->comment('تعداد طرح های تحقیقاتی خاتمه یافته')->nullable();
            $table->float('number_of_theorizing_chairs')->comment('تعداد کرسی های نظریه پردازی برگزار شده توسط اساتید واحد دانشگاهی')->nullable();
            $table->float('number_of_memoranda_of_understanding')->comment('تعداد تفاهمنامه ها با صنایع و سازمان‌های محلی/ملی')->nullable();
            $table->float('amount_of_national_contracts_concluded')->comment('مبلغ قراردهای منعقد شده با صنایع و سازمان‌های ملی')->nullable();
            $table->float('amount_of_local_contracts_concluded')->comment('مبلغ قراردهای منعقد شده با صنایع و سازمان‌های محلی')->nullable();
            $table->float('number_of_scientific_journals')->comment('تعداد مجلات علمی')->nullable();
            $table->float('number_of_R&D_research')->comment('تعداد پژوهش های معطوف به R &D')->nullable();
            $table->float('number_of_innovative_ideas')->comment('تعداد طرح ها و ایده های فناورانه و نوآورانه تجاری سازی شده')->nullable();

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
        Schema::dropIfExists('gostaresh_research_output_status_analyses');
    }
};
