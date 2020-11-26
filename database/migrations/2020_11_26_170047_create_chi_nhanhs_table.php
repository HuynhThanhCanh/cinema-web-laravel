<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiNhanhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_nhanhs', function (Blueprint $table) {
            $table->bigIncrements('MaChiNhanh');
            $table->char('TenChiNhanh');
            $table->integer('SoLuongRap');
            $table->char('DiaChi', 100);
            $table->char('SDT', 11);
            $table->bigInteger('MaNV');
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
        Schema::dropIfExists('chi_nhanhs');
    }
}
