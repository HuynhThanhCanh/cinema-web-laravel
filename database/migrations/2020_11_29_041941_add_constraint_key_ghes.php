<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintKeyGhes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ghes', function (Blueprint $table) {
            //Tạo khóa ngoại
            $table->foreign('MaLoaiGhe')->references('MaLoaiGhe')->on('loai_ghes');
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
        Schema::table('ghes', function (Blueprint $table) {
            //
            $table->dropForeign('ghes_maloaighe_foreign');
            $table->dropForeign('ghes_marap_foreign');
        });
    }
}