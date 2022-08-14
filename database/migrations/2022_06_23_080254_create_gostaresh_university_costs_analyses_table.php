<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table 52,53 Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gostaresh_university_costs_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('rural_district_id')->nullable();

            $table->string('unit')->nullable();
            $table->float('payment_to_faculty_members')->comment('درصد کل پرداختی به اعضای هیات علمی تمام وقت واحد دانشگاهی')->nullable();
            $table->float('total_running_costs')->comment('کل هزینه های جاری')->nullable();
            $table->float('average_salary_of_faculty_members')->comment('میانگین حقوق دریافتی اعضای هیات علمی')->nullable();
            $table->float('average_salaries_of_faculty_members_from_research_contracts')->comment('میانگین حقوق دریافتی اعضای هیات علمی دانشگاه آزاد اسلامی استان از محل قراردهای تحقیقاتی، آموزشی و خدماتی')->nullable();
            $table->float('student_fees')->comment('هزینه دانشجویان')->nullable();
            $table->float('average_salary_of_employees')->comment('میانگین حقوق دریافتی کارمندان')->nullable();
            $table->float('current_expenditure_growth_rate')->comment('نرخ رشد هزینه های جاری')->nullable();
            $table->float('cost_of_paying_office_rent')->comment('هزینه پرداخت اجاره ساختمان اداری')->nullable();
            $table->float('cost_of_rent_for_educational_building')->comment('هزینه پرداخت اجاره ساختمان آموزشی')->nullable();
            $table->float('cost_of_rent_for_research_building')->comment('هزینه پرداخت اجاره ساختمان پژوهشی')->nullable();
            $table->float('extra_charge_for_rent_extracurricular_building')->comment('هزینه پرداخت اجاره ساختمان فوق برنامه')->nullable();
            $table->float('cost_of_rent_innovation_buildings')->comment('هزینه پرداخت اجاره ساختمان فناوری و نوآوری')->nullable();
            $table->float('energy_costs_of_buildings')->comment('هزینه های انرژی ساختمان ها')->nullable();
            $table->float('cost_of_university_equipment')->comment('هزینه های نگهداری، استهلاک و تعمیرات دارایی ها و تجهیزات دانشگاه')->nullable();

            //table 53
            $table->float('training_costs')->comment('هزینه های حوزه آموزش')->nullable();
            $table->float('research_costs')->comment('هزینه های حوزه پژوهش')->nullable();
            $table->float('innovation_costs')->comment('هزینه های حوزه فناوری و نوآوری')->nullable();
            $table->float('educational_costs')->comment('هزینه های حوزه مهارت آموزشی و کارآفرینی')->nullable();
            $table->float('development_costs')->comment('هزینه های حوزه تحقیق و توسعه')->nullable();
            $table->float('cultural_sphere_costs')->comment('هزینه های حوزه فرهنگی')->nullable();
            $table->float('administrative_costs')->comment('هزینه های حوزه اداری')->nullable();
            $table->float('information_technology_costs')->comment('هزینه های حوزه فناوری اطلاعات و زیرساخت های فضای مجازی')->nullable();
            $table->float('International_sphere_costs')->comment('هزینه های حوزه بین الملل')->nullable();
            $table->float('costs_of_staff_training_and_faculty')->comment('هزینه های حوزه آموزش ضمن خدمت کارکنان و اساتید')->nullable();
            $table->float('sports_expenses')->comment('هزینه های حوزه ورزشی')->nullable();
            $table->float('health_costs')->comment('هزینه های حوزه بهداشت و سلامت')->nullable();
            $table->float('entrepreneurship_costs')->comment('هزینه های حوزه ترویج کارآفرینی و اشتغال')->nullable();
            $table->float('graduate_costs')->comment('هزینه های حوزه فارغ التحصیلان')->nullable();
            $table->float('branding_costs')->comment('هزینه های حوزه برند سازی و تبلیغات و جذب دانشجویان')->nullable();

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
        Schema::dropIfExists('gostaresh_university_costs_analyses');
    }
};
