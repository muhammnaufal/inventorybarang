<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id('kode_barang');
            $table->string('nama_barang', 150);
            $table->enum('unit',['Pcs', 'Buah', 'Lembar']);
            $table->string('ukuran', 150);
            $table->string('warna', 50);
            $table->string('jenis', 50);
            $table->integer('harga_satuan');
            $table->integer('stok');
        });

        Schema::create('penerimaan_barang', function (Blueprint $table) {
            $table->id('id_penerimaan');
            $table->date('tgl_penyimpanan');
            $table->text('alamat');
            $table->unsignedBigInteger('kode_barang');
            $table->integer('quantity');
            $table->foreign('kode_barang')->references('kode_barang')->on('barang');
        });

        Schema::create('pengeluaran_barang', function (Blueprint $table) {
            $table->id('id_pengeluaran');
            $table->string('tujuan', 150);
            $table->integer('quantity');
            $table->unsignedBigInteger('kode_barang');
            $table->foreign('kode_barang')->references('kode_barang')->on('barang');
        });

        Schema::create('order_detail', function (Blueprint $table) {
            $table->integer('no_po');
            $table->unsignedBigInteger('kode_barang');
            $table->string('nama_barang');
            $table->integer('harga');
            $table->integer('quantity');
            $table->date('tgl_simpan');
            $table->foreign('kode_barang')->references('kode_barang')->on('barang');
        });

        Schema::create('supplier', function (Blueprint $table) {
            $table->id('kode_supplier');
            $table->string('nama_supplier', 150);
            $table->string('telepon', 15);
            $table->text('alamat');
        });

        Schema::create('order_barang', function (Blueprint $table) {
            $table->date('tanggal');
            $table->unsignedBigInteger('kode_supplier');
            $table->integer('ppn');
            $table->foreign('kode_supplier')->references('kode_supplier')->on('supplier');
        });




    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
        Schema::dropIfExists('penerimaan_barang');
        Schema::dropIfExists('pengeluaran_barang');
        Schema::dropIfExists('order_detail');
        Schema::dropIfExists('order_barang');
        Schema::dropIfExists('supplier');
    }
};
