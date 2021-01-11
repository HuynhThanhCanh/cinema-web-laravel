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
            $table->bigIncrements('id');
            $table->string('HoNV', 10);
            $table->string('name', 20);
            $table->string('Avatar')->nullable();
            $table->date('NgaySinh');
            $table->string('DiaChi', 100);
            $table->string('SDT', 11);
            $table->string('email', 30); // sửa Email thành email cho giống trong user
            $table->bigInteger('MaCV')->unsigned(); //khóa ngoại
            $table->bigInteger('MaNQL')->nullable()->unsigned(); //khóa ngoại
            $table->string('TenTK', 20);
            $table->string('password', 255); // sửa lại lengh cao hơn để tạo md5
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
        Schema::dropIfExists('nhan_viens');
    }
}