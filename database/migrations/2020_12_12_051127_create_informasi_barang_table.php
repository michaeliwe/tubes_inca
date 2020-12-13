<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformasiBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasi_barang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_warehouse')->unsigned()->notNull();
            $table->integer('id_pegawai');
            $table->string('nama_barang');
            $table->integer('stok_barang');
            $table->date('tanggal_transaksi');
            $table->string('type_keluar_masuk');

            $table->foreign('id_warehouse')->references('id_warehouse')->on('lokasi_warehouse');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informasi_barang');
    }
}
