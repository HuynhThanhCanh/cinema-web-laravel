<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinhLuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binh_luans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('MaTV')->unsigned(); //khóa ngoại
            $table->bigInteger('MaPhim')->unsigned(); //khóa ngoại
            $table->text('NoiDungBinhLuan');
            $table->timestamp('ThoiGianBinhLuan')->useCurrent();
            $table->tinyInteger('TrangThai')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('binh_luans');
    }
}