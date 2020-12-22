<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThanhViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanh_viens', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            //
            $table->bigIncrements('MaThanhVien');
            $table->string('Avatar')->nullable();
            $table->string('HoTV', 50);
            $table->string('TenTV', 50);
            $table->date('NgaySinh');
            $table->string('SDT', 11);
            $table->string('Email', 50);
            $table->string('TenDN', 50);
            $table->string('Password', 45);
            $table->string('DiaChi', 100);
            $table->tinyInteger('TrangThai')->default(0);
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
        Schema::dropIfExists('thanh_viens');
    }
}