<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintKeyChiNhanhs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chi_nhanhs', function (Blueprint $table) {
            //
            $table->foreign('MaNV')->references('id')->on('nhan_viens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chi_nhanhs', function (Blueprint $table) {
            //
            $table->dropForeign('chi_nhanhs_manv_foreign');
        });
    }
}
