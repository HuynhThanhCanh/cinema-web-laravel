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
            $table->time('ThoiLuong');
            $table->string('DaoDien', 50);
            $table->string('DienVien', 250);
            $table->integer('Diem')->default(0);
            $table->string('HinhAnh')->nullable();
            $table->string('LinkPhim')->nullable();
            $table->bigInteger('MaLoaiPhim')->unsigned(); //khóa ngoại
            $table->bigInteger('MaNV')->unsigned(); //khóa ngoại
            $table->bigInteger('Nhan')->unsigned(); //khóa ngoại
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
        Schema::dropIfExists('phims');
    }
}
