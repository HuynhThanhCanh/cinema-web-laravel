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
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            //
            $table->bigIncrements('MaNV');
            $table->string('HoNV', 10);
            $table->string('TenNV', 20);
            $table->date('NgaySinh');
            $table->string('DiaChi', 100);
            $table->string('SDT', 11);
            $table->string('Email', 30);
            $table->bigInteger('MaCV')->unsigned(); //khóa ngoại
            $table->bigInteger('MaNQL')->nullable()->unsigned(); //khóa ngoại
            $table->string('TenTK', 20);
            $table->string('Pass', 20);
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
        Schema::dropIfExists('nhan_viens');
    }
}
