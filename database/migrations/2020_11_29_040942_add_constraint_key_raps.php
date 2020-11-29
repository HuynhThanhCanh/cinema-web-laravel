<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintKeyRaps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('raps', function (Blueprint $table) {
            //
            $table->foreign('MaChiNhanh')->references('MaChiNhanh')->on('chi_nhanhs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('raps', function (Blueprint $table) {
            //
            $table->dropForeign('raps_machinhanh_foreign');
        });
    }
}
