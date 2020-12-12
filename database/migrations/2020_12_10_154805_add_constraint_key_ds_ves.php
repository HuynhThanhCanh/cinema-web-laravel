<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintKeyDsVes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('ds_ves', function (Blueprint $table) {
            //
            $table->foreign('MaTV')->references('MaThanhVien')->on('thanh_viens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('ds_ves', function (Blueprint $table) {
            //
            $table->dropForeign('ds_ves_matv_foreign');
        });
    }
}