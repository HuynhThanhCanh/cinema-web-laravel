<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThoiGianChieusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thoi_gian_chieus', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            //
            $table->bigIncrements('MaThoiGianChieu');
            $table->time('ThoiGianChieu');
            $table->integer('TrangThai')->default(0);
            $table->timestamp('ThoiGianTao')->useCurrent();
            $table->timestamp('ThoiGianCapNhatCuoi')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thoi_gian_chieus');
    }
}
