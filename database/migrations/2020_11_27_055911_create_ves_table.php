<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ves', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            //
            $table->bigIncrements('MaVe');
            $table->string('TenVe', 50)->nullable();
            $table->bigInteger('MaDsVe')->unsigned(); //Khóa ngoại
            $table->decimal('ThanhTien')->default(0);
            $table->timestamp('ThoiGianMua')->useCurrent();
            $table->bigInteger('MaLichChieu')->unsigned(); //Khóa ngoại
            $table->string('MaGhe', 5); //Khóa ngoại
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
        Schema::dropIfExists('ves');
    }
}
