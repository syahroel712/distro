<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->increments('barang_id');
            $table->string('barang_nama');
            $table->integer('kategori_id');
            $table->integer('supplier_id');
            $table->integer('warna_id');
            $table->integer('ukuran_id');
            $table->integer('bahan_id');
            $table->integer('barang_stok');
            $table->text('barang_desk');
            $table->date('barang_tgl_post');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
