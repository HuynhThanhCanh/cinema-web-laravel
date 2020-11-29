<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintKeyLichChieus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lich_chieus', function (Blueprint $table) {
            //
            $table->foreign('MaThoiGianChieu')->references('MaThoiGianChieu')->on('thoi_gian_chieus');
            $table->foreign('MaPhim')->references('MaPhim')->on('phims');
            $table->foreign('MaRap')->references('MaRap')->on('raps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lich_chieus', function (Blueprint $table) {
            //
            $table->dropForeign('lich_chieus_maphim_foreign');
            $table->dropForeign('lich_chieus_marap_foreign');
            $table->dropForeign('lich_chieus_mathoigianchieu_foreign');
        });
    }
}
