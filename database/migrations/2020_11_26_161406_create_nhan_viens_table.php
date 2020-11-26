<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhanViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhan_viens', function (Blueprint $table) {
            $table->bigIncrements("MaNV");
            $table->char('TenNV', 20);
            $table->date('NgaySinh');
            $table->char('DiaChi', 100);
            $table->char('SDT', 11);
            $table->char('Email', 30);
            $table->bigInteger('ChucVu');
            $table->char('TenTK', 20);
            $table->char('Pass', 20);
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
        Schema::dropIfExists('nhan_viens');
    }
}
