<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phims', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            //
            $table->bigIncrements('MaPhim');
            $table->string('TenPhim', 100);
            $table->date('NgayDKChieu');
            $table->date('NgayKetThuc');
            $table->smallInteger('ThoiLuong');
            $table->string('DaoDien', 50);
            $table->string('DienVien', 250);
            $table->string('NoiDung', 509);
            $table->tinyInteger('Diem')->default(0);
            $table->string('HinhAnh')->nullable();
            $table->string('LinkPhim')->nullable();
            $table->bigInteger('MaLoaiPhim')->unsigned(); //khóa ngoại
            $table->bigInteger('MaNV')->unsigned(); //khóa ngoại
            $table->bigInteger('Nhan')->unsigned(); //khóa ngoại
            $table->tinyInteger('TrangThai')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phims');
    }
}