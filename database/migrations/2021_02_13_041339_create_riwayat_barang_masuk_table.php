<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatBarangMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_barang_masuk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->nullable();
            $table->foreignId('supplier_id')->nullable();
            $table->integer('jumlah');
            $table->integer('nominal');
            $table->string('nama');
            $table->string('supplier');
            $table->timestamps();

            $table->foreign('barang_id')->references('id')
                ->on('barang')->onDelete('set null');
            $table->foreign('supplier_id')->references('id')
            ->on('supplier')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_barang_masuk');
    }
}
