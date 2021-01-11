<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLichChieusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lich_chieus', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            //
            $table->bigIncrements('MaLichChieu');
            $table->bigInteger('MaThoiGianChieu')->unsigned();
            $table->date('NgayChieu');
            $table->bigInteger('MaPhim')->unsigned();
            $table->bigInteger('MaRap')->unsigned();
            $table->tinyInteger('TrangThai')->default(0);
            //
            $table->unique(['MaThoiGianChieu', 'MaRap', 'NgayChieu']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lich_chieus');
    }
}