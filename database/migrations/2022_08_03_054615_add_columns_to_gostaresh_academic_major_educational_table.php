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
            $table->float('azad_eslami_percent')->nullable();
            $table->float('dolati_percent')->nullable();
            $table->float('farhangian_percent')->nullable();
            $table->float('fani_herfei_percent')->nullable();
            $table->float('payam_noor_percent')->nullable();
            $table->float('gheir_entefai_percent')->nullable();
            $table->float('elmi_karbordi_percent')->nullable();

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
            $table->dropColumn('azad_eslami_percent');
            $table->dropColumn('dolati_percent');
            $table->dropColumn('farhangian_percent');
            $table->dropColumn('fani_herfei_percent');
            $table->dropColumn('payam_noor_percent');
            $table->dropColumn('gheir_entefai_percent');
            $table->dropColumn('elmi_karbordi_percent');
        });
    }
};
