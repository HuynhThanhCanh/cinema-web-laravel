<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintKeyPhims extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phims', function (Blueprint $table) {
            $table->foreign('MaLoaiPhim')->references('MaLoaiPhim')->on('loai_phims');
            $table->foreign('MaNV')->references('id')->on('nhan_viens');
            $table->foreign('Nhan')->references('MaGioiHan')->on('gioi_han_tuois');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phims', function (Blueprint $table) {
            //
            $table->dropForeign('phims_manv_foreign');
            $table->dropForeign('phims_maloaiphim_foreign');
            $table->dropForeign('phims_nhan_foreign');
        });
    }
}
