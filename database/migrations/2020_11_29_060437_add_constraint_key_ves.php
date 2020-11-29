<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintKeyVes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ves', function (Blueprint $table) {
            //
            $table->foreign('MaLichChieu')->references('MaLichChieu')->on('lich_chieus');
            $table->foreign('MaGhe')->references('MaGhe')->on('ghes');
            $table->foreign('MaDsve')->references('MaDsVe')->on('ds_ves');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ves', function (Blueprint $table) {
            //
            $table->dropForeign('ves_maghe_foreign');
            $table->dropForeign('ves_malichchieu_foreign');
            $table->dropForeign('ves_madsve_foreign');
        });
    }
}
