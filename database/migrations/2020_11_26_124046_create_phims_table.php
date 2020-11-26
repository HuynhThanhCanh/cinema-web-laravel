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
            $table->bigIncrements('MaPhim');
            $table->char('TenPhim', 100);
            $table->date('NgayDKChieu');
            $table->date('NgayKetThuc');
            $table->time('ThoiLuong');
            $table->char('DaoDien', 50);
            $table->char('DienVien', 250);
            $table->integer('Diem')->default(0);
            $table->char('HinhAnh');
            $table->char('LinkPhim');
            $table->bigInteger('MaRapChieu');
            $table->bigInteger('MaNV');
            $table->bigInteger('Nhan');
            $table->integer('TrangThai')->default(0);
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
