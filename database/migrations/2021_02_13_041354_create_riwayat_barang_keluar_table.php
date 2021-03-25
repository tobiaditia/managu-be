<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatBarangKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_barang_keluar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->nullable();
            $table->integer('jumlah');
            $table->integer('nominal');
            $table->string('nama_pembeli');
            $table->timestamps();

            $table->foreign('barang_id')->references('id')
                ->on('barang')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_barang_keluar');
    }
}
