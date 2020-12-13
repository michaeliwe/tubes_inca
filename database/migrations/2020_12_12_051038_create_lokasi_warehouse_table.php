<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLokasiWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasi_warehouse', function (Blueprint $table) {
            $table->increments('id_warehouse');
            $table->integer('id_pegawai');
            $table->integer('id_bahan')->unsigned()->notNull();
            $table->text('alamat_warehouse');
            $table->string('no_telp');

            $table->foreign('id_bahan')->references('id_bahan')->on('jenis_barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lokasi_warehouse');
    }
}
