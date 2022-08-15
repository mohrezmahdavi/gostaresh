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
        Schema::table('gostaresh_roadmap_to_achieve_desired_situations', function (Blueprint $table) {
            $table->float('package_number')->comment('شماره بسته متناظر از سند تحول دانشگاه')->nullable();
            $table->float('transformation_document')->comment('شماره راهکنش متناظر از سند تحول دانشگاه')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gostaresh_roadmap_to_achieve_desired_situations', function (Blueprint $table) {
            $table->dropColumn('package_number');
            $table->dropColumn('transformation_document');
        });
    }
};
