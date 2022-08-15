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
        Schema::table('gostaresh_number_of_non_medical_fields_of_studies2', function (Blueprint $table) {
            $table->dropColumn('department_of_education')->nullable();
            $table->unsignedInteger('major')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gostaresh_number_of_non_medical_fields_of_studies2', function (Blueprint $table) {
            $table->dropColumn('major')->nullable();
        });
    }
};
