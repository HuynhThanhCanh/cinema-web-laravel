<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintKeyLoaiGhes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loai_ghes', function (Blueprint $table) {
            //
            $table->foreign('MaGia')->references('MaGia')->on('gias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loai_ghes', function (Blueprint $table) {
            //
            $table->dropForeign('loai_ghes_magia_foreign');
        });
    }
}
