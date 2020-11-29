<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintKeyLoaiPhims extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loai_phims', function (Blueprint $table) {
            //
            $table->foreign('MaNV')->references('MaNV')->on('nhan_viens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loai_phims', function (Blueprint $table) {
            //
            $table->dropForeign('loai_phims_manv_foreign');
        });
    }
}
