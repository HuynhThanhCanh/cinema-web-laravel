<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ghes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            //
            $table->string('MaGhe', 10);
            $table->bigInteger('MaRap')->unsigned(); //khóa ngoại
            $table->string('MaLoaiGhe', 5);
            $table->string('ChiSoHang');
            $table->tinyInteger('ChiSoCot');
            $table->tinyInteger('TrangThai')->default(0);
            //
            $table->primary('MaGhe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ghes');
    }
}