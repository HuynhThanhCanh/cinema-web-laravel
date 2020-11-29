<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaiGhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai_ghes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            //
            $table->string('MaLoaiGhe', 5);
            $table->string('TenLoaiGhe', 20);
            $table->bigInteger('MaGia')->unsigned(); //khóa ngoại
            $table->integer('TrangThai')->default(0);
            $table->timestamp('ThoiGianTao')->useCurrent();
            $table->timestamp('ThoiGianCapNhatCuoi')->useCurrent();
            //Tạo khóa chính
            $table->primary('MaLoaiGhe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loai_ghes');
    }
}
