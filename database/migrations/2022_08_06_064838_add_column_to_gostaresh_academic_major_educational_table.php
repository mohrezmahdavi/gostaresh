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
        Schema::table('gostaresh_academic_major_educational', function (Blueprint $table) {
            $table->float('medical_sciences_count')->default(0);
            $table->float('medical_sciences_percent')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gostaresh_academic_major_educational', function (Blueprint $table) {
            $table->dropColumn('medical_sciences_count');
            $table->dropColumn('medical_sciences_percent');
        });
    }
};
