<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstrainKeyBinhLuans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('binh_luans', function (Blueprint $table) {
            //
            $table->foreign('MaTV')->references('MaThanhVien')->on('thanh_viens');
            $table->foreign('MaPhim')->references('MaPhim')->on('phims');
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
        Schema::table('binh_luans', function (Blueprint $table) {
            //
            $table->dropForeign('binh_luans_maphim_foreign');
            $table->dropForeign('binh_luans_matv_foreign');
        });
    }
}