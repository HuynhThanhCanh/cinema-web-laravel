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
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            //
            $table->bigIncrements('MaChiNhanh');
            $table->string('TenChiNhanh', 100);
            $table->tinyInteger('SoLuongRap');
            $table->string('DiaChi', 100);
            $table->string('SDT', 11);
            $table->bigInteger('MaNV')->unsigned(); //khóa ngoại
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
        Schema::dropIfExists('chi_nhanhs');
    }
}