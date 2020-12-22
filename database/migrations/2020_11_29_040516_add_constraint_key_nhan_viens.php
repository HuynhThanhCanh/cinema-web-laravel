<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintKeyNhanViens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nhan_viens', function (Blueprint $table) {
            //
            $table->foreign('MaCV')->references('MaCV')->on('chuc_vus');
            $table->foreign('MaNQL')->references('id')->on('nhan_viens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nhan_viens', function (Blueprint $table) {
            //
            $table->dropForeign('nhan_viens_macv_foreign');
            $table->dropForeign('nhan_viens_manql_foreign');
        });
    }
}
